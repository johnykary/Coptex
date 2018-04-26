<?php
session_start();
include_once("config.php");

$id = $_POST["id"];

$property1 =  mysqli_real_escape_string($con,$_POST["property1"]);
$property2 = mysqli_real_escape_string($con,$_POST["property2"]);
$property3 = mysqli_real_escape_string($con,$_POST["property3"]);
$property4 = mysqli_real_escape_string($con,$_POST["property4"]);
$error="";


                $sql="INSERT INTO `producttablenames`
                (`name1`, `name2`, `name3`, `name4`, `product_Fid`) 
                VALUES 
                ('$property1','$property2','$property3','$property4','$id')";

                $result = mysqli_query($con,$sql);
                
                if(!$result){
                    $error = mysqli_error($con);
                }else{
                    $error="success";
                }      
            
    echo $error;
?>