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
    require_once("includes/menu.php");
    $id=$_GET["productId"];
?>


    <div class="container-fluid" style="background-color:rgba(0,0,0,0.8);">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1" >
                <h1 class="page-header" style="color:white">Edit
                    <small></small>
                </h1>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-8 col-lg-offset-1">
                <h3></h3>
                <form name="newNames" id="newNames">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label style="color:white">Property 1:</label>
                            <input type="text" class="form-control" id="property1" name="property1" value="" >
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label style="color:white">Property 2:</label>
                            <input type="text" class="form-control" id="property2" name="property2" value="">
                        </div>
                    </div>                   
                    <div class="control-group form-group">
                        <div class="controls">
                            <label style="color:white">Property 3:</label>
                            <input type="text" class="form-control" id="property3" name="property3" value="">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label style="color:white">Property 4:</label>
                            <input type="text" class="form-control" id="property4" name="property4" value="">
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>
                    <div id="success"></div>                    
                    <button type="button" class="btn btn-primary newBtnNames" id="newBtnNames">Update Table Names</button>
                </form>
            </div>
        </div>
<?php
    include_once("includes/footer.php");
?>