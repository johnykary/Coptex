<!-- header -->
<?php 
    session_start();
    include_once("includes/header.php");
?>
<!-- menu -->
<?php 
    include_once("includes/menu.php");
?>
<?php
 $id = $_GET["categoryId"];
?>


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>ΠΡΟΪΟΝΤΑ</strong>
                    </h2>
                    <hr>
                </div>
                 <?php 
                addProduct($id);
                createProducts($con,$id); ?>
            </div>
        </div>

    </div>




<?php 
    include_once("includes/footer.php");
?>
