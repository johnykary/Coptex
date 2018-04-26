<?php
session_start();
include_once("config.php");

$title =  mysqli_real_escape_string($con,$_POST["title"]);
$position =  mysqli_real_escape_string($con,$_POST["position"]);
$id = $_POST["id"];


$acceptedFormats = array("image/png","image/gif","image/jpeg","image/jpg","image/JPG");
$error="";
$image = $_FILES["image"]["name"];

    if($_FILES["image"]["error"]>0){
       $error =  $_FILES["image"]["error"];        
    }else{
        //serach in an array and returns true when the value is found
        if(in_array($_FILES["image"]["type"],$acceptedFormats)){
            //create the path
            $firstPath = "../img/".$_FILES["image"]["name"]; 
            //use pathinfo to get only the filename
            $pathinfoFileName = pathinfo($firstPath,PATHINFO_FILENAME);
            //use pathinfo to get only the extension
            $pathinfoExtension = pathinfo($firstPath,PATHINFO_EXTENSION);
            //create unique file name
            $finalName = $pathinfoFileName."_".uniqid(); 
            //path to move the image
            $targetPath = "../img/".$finalName.".".$pathinfoExtension;
            //path to insert into database
            $targetPathDB = "img/".$finalName.".".$pathinfoExtension; 
            //mving the image from temp folder to project's folder
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$targetPath)){
                //insert into db
                $sql="INSERT INTO `products`
                (`imageurl`,`position`,`title`,`cat_Fid`) 
                VALUES 
                ('$targetPathDB','$position','$title','$id')";
                
                $result = mysqli_query($con,$sql);
                
                if(!$result){
                    $error = mysqli_error($con);
                }else{
                    $error="success";
                }
            }
        }
    }
    echo $error;
?>