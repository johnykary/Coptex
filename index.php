<!-- header -->
<?php
    session_start();
    include_once("includes/header.php");
?>
<!-- menu -->
<?php 
    include_once("includes/menu.php");
?>


    <!-- Navigation -->


    <div class="container">
        <div class="row">
            <?php
                    editCarousel();
             ?>
            <div class="box">
                <div class="col-lg-12 text-center">
                  <?php 
                    include_once("includes/carousel.php"); 
                  ?>  
                </div>
            </div>
        </div>

        <div class="row">
           <?php addHomeContent(); ?>
           <?php createHomeContent($con); ?>
        </div>
        
        <div class="row">
            <div class="box box-yo">
                <?php include_once("includes/partners.php") ?>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- footer -->
<?php 

    include_once("includes/footer.php");
?>
