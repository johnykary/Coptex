<?php
session_start();
include_once("config.php");

$title =  mysqli_real_escape_string($con,$_POST["title"]);
$content = mysqli_real_escape_string($con,$_POST["content"]);

//$featured;
//if (isset($_POST["featured"])){
//    $featured=1;
//}else{
//    $featured=0;
//}
//array with the values that we are accepting to upload
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
                $sql="INSERT INTO `categories`
                (`imageurl`,`position`,`active`,`title`, `content`)
                VALUES
                ('$targetPathDB','3','1','$title','$content')";

                $result = mysqli_query($con,$sql);

                if(!$result){
                    $error = mysqli_error($con);
                }
            }else{
                $error = "Something went wrong please try again!";
            }
        }else{
             $error = "Not accepted file format!";
        }
    }
    echo $error;
?>
