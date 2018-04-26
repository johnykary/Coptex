<?php
/*
    Το συγκεκριμένο αρχείο εκτελείτε ασύγχρονα.
    Εκτελείτε όταν θέλουμε να διαγράψουμε κάποια εικόνα από το carousel.
*/
 include_once("config.php");

    $id = $_POST["id"];

    $sql="SELECT imageurl FROM carousel WHERE id='{$id}'";
    $result = mysqli_query($con,$sql);
    $imageUrl="";
    
    while($row=mysqli_fetch_assoc($result)){
        $imageUrl= $row["imageurl"];
    }

    if(unlink("../".$imageUrl)){
       
    }else{
        echo "ERROR: Problem when deleting the file";
    }


        $sql2="DELETE FROM carousel WHERE id='{$id}'";
        $result2 = mysqli_query($con,$sql2);
        
        if(!$result2){
            echo "ERROR:".mysqli_error($con);
        }else{
            echo "success";
        }


?>