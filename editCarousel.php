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
?><!-- set admin session when loged in, if not show error 404 -->

<!-- /Add new Carousel content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div id="carousel" class="tab-pane table">
                <br/>
                <button type="button" class="btn btn-primary newBtnCarsousel" data-toggle="modal" data-target="#myNewCarousel">Add a New Image</button>
                <br/>
                <br/>
                    <!-- Table content -->
                <table class="table-bordered table table-striped">
                    <tr>
                        <th>Image</th> 
                        <th>Caption</th> 
                        <th>Active</th> 
                        <th>Position</th> 
                        <th>Edit</th> 
                        <th>Delete</th>
                    </tr>
                        <?php
                            $sql = "SELECT * FROM carousel";
                            $result = mysqli_query($con,$sql);
                            $tableOutput="";
                            while($row=mysqli_fetch_assoc($result)){
                                $tableOutput.= "<tr id='carid-{$row['id']}'>
                                    <td style='width:250px'><img style='width:250px' src='{$row["imageurl"]}'/></td> 
                                    <td>{$row["caption"]}</td> 
                                    <td>{$row["active"]}</td> 
                                    <td>{$row["position"]}</td> 
                                    <td>
                                    <a class='btn btn-warning' href='doEditCarousel.php?carouselid={$row["id"]}'>
                                    <i class=\"glyphicon glyphicon-pencil\"></i>
                                    </a>
                                    </td> 
                                    <td>
                                    <button type='button'class='deleteBtnCarousel btn btn-danger' carouselid='{$row["id"]}'><i class=\"glyphicon glyphicon-trash\"></i></button>
                                    </td>
                                    </tr>";
                            }
                                echo $tableOutput;
                        ?><!-- create table with the details of image carousel -->
                </table><!-- /Table content -->
            </div>
        </div>
    </div>
</div><!-- /Add new Carousel content -->
<!-- Modal "Add a new Image"-->
<div class="modal fade" id="myNewCarousel" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SAE | WDD 1016</h4>
            </div>
            <div class="modal-body">
                <h4>New Carousel</h4>
                    <form name="newCarousel" id="newCarousel">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Caption:</label>
                                <input type="text" class="form-control" id="caption" name="caption">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Position:</label>
                                <input type="text" class="form-control" id="position" name="position">
                            </div>
                        </div>
                        <div class="control-group form-group">

                            <div class="controls">
                                <label>Active:</label>
                                <input type="checkbox" class="" id="active" name="active" value="1">
                            </div>
                        </div>                             
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Upload New Image:</label>
                                <input type="file" class="" id="image" name="image">
                            </div>
                        </div>                    
                        <div id="success"></div>
                    </form>
            </div>
            <div class="modal-footer">
           <button type="button" class="btn btn-primary newBtnCarousel" id="newBtnCarousel">New Carousel</button>
            </div>
        </div>
    </div><!-- /Modal content-->
</div><!-- /Modal "Add a new Image"-->
<?php
    include_once("includes/footer.php");
?>
