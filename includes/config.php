<?php

$host="localhost";
$username="root";
$password="";
$database="coptexdb";

$con=mysqli_connect($host,$username,$password,$database);

if(!$con){
    die("Error!".mysqli_connect_error());
}
mysqli_set_charset($con,"utf8");

?>