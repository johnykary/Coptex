<?php
/*
    Η συγκεκριμένη σελίδα είναι υπέυθυνη για να πραγματοποιήσει το Login ο χρήστης.
    Εκτελείτε ένα ερώτημα προς την βάση δεδομένων και εφόσον βρεθεί ο χρήστης τότε γίνεται establish το session.
*/
include_once("config.php");


$sql = "SELECT isadmin FROM admin WHERE active=1";
$result=mysqli_query($con,$sql);
$row_count=mysqli_num_rows($result);
$isAdmin="";
$resultArray;//variable on order to fill it for result
if($row_count==1){    
    while($row=mysqli_fetch_assoc($result)){    
       $isAdmin=$row["isadmin"];
    }
    
   if($username == $usernamedb && $Passworddb == $password){       
       session_start();
       $_SESSION['username']=$username;
       $_SESSION['isadmin']=$isAdmin;
       $resultArray["success"]="ok";//fill associative array with values
   }else{
     $resultArray["error"]="Wrong password";//fill associative array with values   
   }    
}else{
    $resultArray["error"]="Your username or password is wrong";//fill associative array with values
}

echo json_encode($resultArray);//convert associative array to JSON

?>