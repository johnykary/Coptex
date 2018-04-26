<!-- header -->
<?php 
    session_start();
    include_once("includes/header.php");
?>
<!-- menu -->
<?php 
    include_once("includes/menu.php");
?>
    

<div class="container">
    <div class="row">
        <?php
            addCategory();
        ?>
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">ΚΑΤΗΓΟΡΙΕΣ
                    <strong>ΠΡΟΪΟΝΤΩΝ</strong>  
                </h2>
                <hr>
            </div>

              <?php 
                createCategory($con);
              ?>  
 
        </div>
    </div>
</div><!-- /.container -->

<!-- footer -->
<?php 
    include_once("includes/footer.php");
?>
