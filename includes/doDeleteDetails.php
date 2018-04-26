<?php
/*
    Το συγκεκριμένο αρχείο εκτελείτε ασύγχρονα.
    Εκτελείτε όταν θέλουμε να διαγράψουμε κάποια εικόνα από το carousel.
*/
 include_once("config.php");

 $id = $_POST["id"];




        $sql="DELETE FROM productdetails WHERE id='{$id}'";
        $result = mysqli_query($con,$sql);
        
        if(!$result){
            echo "ERROR:".mysqli_error($con);
        }else{
            echo "success";
        }


?>