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
    $id = $_GET["carouselid"];

    $sql = "SELECT * FROM carousel WHERE id='{$id}'";
    $result = mysqli_query($con,$sql);
    $imageurl;
    $position;
    $caption;
    $active;

    while($row=mysqli_fetch_assoc($result)){
        $imageurl = $row["imageurl"];
        $position = $row["position"];
        $caption = $row["caption"];
        $active = $row["active"];
    }
?>

<div class="container-fluid" style='background-color:rgba(0,0,0,0.8);'>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:white">Edit Carousel
                    <small></small>
                </h1>
            </div>
        </div>        
            <div class="row">
                <div class="col-md-8">
                    <h3></h3>
                    <form name="editCarousel" id="editCarousel">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Caption:</label>
                                <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Position:</label>
                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $position;?>">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Active:</label>
                                <input type="checkbox" class="" id="active" name="active" value="1"
                                    <?php if($active==1){echo " checked";} ?>>
                            </div>
                        </div>
                         <div class="control-group form-group">
                            <div class="controls">
                                <label style="color:white">Image:</label>
                                <img src="<?php echo $imageurl;?>" class="img-responsive"/>
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
                        <button type="submit" class="btn btn-primary editBtnCarousel" id="editBtnCarousel">Update Carousel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once("includes/footer.php");
?>