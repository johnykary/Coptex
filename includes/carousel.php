<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
    <?php 
        
        
            $indicators="<ol class=\"carousel-indicators \">";
			$sqlIndicators="SELECT * FROM carousel WHERE active=1 ORDER BY position ASC";
			$resultIndicator=mysqli_query($con,$sqlIndicators);
			$countIndicator=0;
			while($row=mysqli_fetch_assoc($resultIndicator)){
				if($countIndicator==0){				
					$indicators.="<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$countIndicator}\" class=\"active\"></li>";
				}else{
					$indicators.="<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$countIndicator}\"></li>";
				}
				$countIndicator++;
			}
		
			$indicators.="</ol>";
			echo $indicators;
    ?>
                        <!-- Wrapper for slides -->   
                        <div class="carousel-inner">
        <?php
            /*
                εμφανίσουμε από την βάση δεδομένων τις εικόνες που έχουμε προσθέσει
            */
			$resultItems=mysqli_query($con,$sqlIndicators);
			$imageItems="";
			$imageCounter=0;
			
            
            while($rowcarousel=mysqli_fetch_assoc($resultItems)){
				if($imageCounter==0){
					$imageItems.="<div class=\"item active\">";
				}else{
					$imageItems.="<div class=\"item\">";
				}
					$imageItems.="<img class='img-responsive img-full' src='{$rowcarousel['imageurl']}' alt=''>";
					$imageItems.="<div class=\"carousel-caption\"><h2>{$rowcarousel['caption']}</h2></div>";	
					$imageItems.="</div>";	
					$imageCounter++;
			}
			
			echo $imageItems;
		?>
                
           

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
        </a>
                      
    </div>
</div>
                    <h2 class="brand-before">
                        <?php
                          if(isset($_SESSION["isadmin"])){
                              echo("<small>Welcome to admin</small>");
                          }else{
                             echo("<small>Welcome to </small>");
                          }
                        ?>
                    </h2>
                    <h1 class="brand-name">Coptex Comp!!!!</h1>
                    <hr class="tagline-divider">