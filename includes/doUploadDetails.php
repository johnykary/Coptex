<?php
session_start();
include_once("config.php");

$id = $_POST["id"];


    $name1 =  mysqli_real_escape_string($con,$_POST["name"]);


    $name2 =  mysqli_real_escape_string($con,$_POST["dimensions"]);


    $name3 =  mysqli_real_escape_string($con,$_POST["processing"]);


    $name4 =  mysqli_real_escape_string($con,$_POST["other"]);

// $dimensions = mysqli_real_escape_string($con,$_POST["dimensions"]);
// $processing = mysqli_real_escape_string($con,$_POST["processing"]);
// $other = mysqli_real_escape_string($con,$_POST["other"]);
$error="";


                $sql="INSERT INTO `productdetails`
                (`property1`, `property2`, `property3`, `property4`, `product_Fid`) 
                VALUES 
                ('$name1','$name2','$name3','$name4','$id')";

                $result = mysqli_query($con,$sql);
                
                if(!$result){
                    $error = mysqli_error($con);
                }else{
                    $error="success";
                }      
            
    echo $error;
?>