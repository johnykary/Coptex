<?php
    session_start();
    require_once("includes/config.php");
?>
<?php
    if(!isset($_SESSION["isadmin"])){
        http_response_code(404);
        include('includes/my404.php');
        die();
    }
?>
<?php
    require_once("includes/header.php");
    include_once("includes/menu.php");
    $id=$_GET["categoryId"];
?>

    
<div class="container-fluid" style='background-color:rgba(0,0,0,0.8);'>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1"> 
        <!-- Content of "Add new Article" and "Add new Carousel"-->
            <div class="tab-content">
            <!-- Add new Article content -->
                <div id="Artciles" class="tab-pane fade in active">
                    <h3 style="color:white" >Add Product</h3>
                    <form name="addProduct" id="addProduct" method="post">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Title:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Position:</label>
                                <input type="text" class="form-control" id="position" name="position">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>
                        <div id="success"></div>                    
                        <button type="button" class="btn btn-primary" id="productBtn">Add Product</button>
                    </form>
                </div><!-- /Add new Article content --> 
            </div>
        </div>
    </div>
</div>
<?php
    include_once("includes/footer.php");
?>