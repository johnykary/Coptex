<div class="container-fluid">
    <div class="row" style="background:rgba(255,255,255,0.9)">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="brand"><a href="index.php"><img class="img-responsive" src='img/COPTEX_LOGO.png' alt=""/></a>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            <div class="address-bar">Γ.ΑΡΓΥΡΗ 15 ΛΥΚΟΒΡΥΣΗ |ΤΗΛ: +30210 2835396 |KIN: +30 694 6328346
            </div>
        </div>
    </div>
</div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                        <img class="img-responsive col-xs-6" src='img/COPTEX_LOGO.png' alt=""/>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                           <?php
                                createMenu($con);
                            ?>
                        </ul>

                    </div>
            
            <!-- /.navbar-collapse -->
                    </div>
                </div>
        </div>
        
        <!-- /.container -->
    </nav>