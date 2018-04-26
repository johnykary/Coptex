<?php
function createMenu($connection){
    $showMenu="";
    $sql = "SELECT * FROM menu WHERE active=1 ORDER BY position ASC";
    $result = mysqli_query($connection,$sql);
    $active="";
    $pageName = basename($_SERVER["SCRIPT_NAME"]);
    while($row=mysqli_fetch_assoc($result)){
        
        if($pageName==$row['url']){
            $active="active";
        }else{
            $active="";
        }
     $showMenu.= "<li class='{$active}'><a href='{$row['url']}?menuId={$row['id']}'>{$row['menuname']}</a></li>";
	} 
    echo $showMenu; 
}//Create dynamicaly Menu 


function createPartners($connection){
    $showPartners="";
    $sql = "SELECT * FROM partners  ORDER BY position ASC";
    $result = mysqli_query($connection,$sql);

    $pageName = basename($_SERVER["SCRIPT_NAME"]);
    while($row=mysqli_fetch_assoc($result)){
    // $showPartners.="<div  style='padding-bottom: 20px;'>";
     $showPartners.= "<li><a target='blank' href='{$row['partnerurl']}'><img src ='{$row['partnerimageurl']}' alt='' style: width='200px;' height='50px;' class='col-md-3'></a></li>";
    // $showPartners.= "</div>";
     
   } 
    echo $showPartners; 
}//Create dynamicaly partners from database

function sendmail ($text,$email) {
    $email = $email;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From:'.$email. "\r\n";

    
    mail('aris.margaritopoulos@gmail.com','kalhmera',$text,$headers);
    
    
}
function createCategory($connection){
    $showCategories="";
    $sql = "SELECT * FROM categories  ORDER BY position ASC";
    $result = mysqli_query($connection,$sql);
    
    while($row=mysqli_fetch_assoc($result)){
    $showCategories .= "<div class='col-lg-3 text-center'>";
    $showCategories .= "<img class='img-border img-responsive img-full' src='{$row['imageurl']}' alt=''>";// style:width='255px;' height='129.5px;'
    $showCategories .= "<strong style='word-wrap: break-word;'>";
    $showCategories .=substr($row['title'],0,50)."</strong>";
    $showCategories .= "<br/><br/><br/>" ;
    $showCategories .= "<a href='showProduct.php?categoryId={$row['id']}' class='btn btn-default btn-lg'>Προϊόντα</a>";
    $showCategories .= "<br/><br/>";
    $showCategories .= "<hr>";
    $showCategories .= "</div>";
}  
    echo $showCategories;
}//Create dynamicaly categories 


   
function createProducts($connection,$categoryId){
    $showProducts="";
    $catId=$categoryId;
    $sql = "SELECT * FROM products WHERE cat_Fid = $catId  ORDER BY position ASC";

    $result = mysqli_query($connection,$sql);
    while($row=mysqli_fetch_assoc($result)){

     $productId=$row{'id'};
    
     $showProducts .="<div class='col-lg-12'>";
     $showProducts .="<div class='col-lg-3'>";
     $showProducts .="<img class='img-responsive img-border' src='{$row['imageurl']}' alt=''>";
     $showProducts .= "</div>";
     $showProducts .="<div class='col-lg-9' style='padding-bottom: 90px;'>";
     $showProducts .="<h3 style='margin-top:-5px;' class=' text-center'>{$row['title']}";
     $showProducts .="<br>";
     $showProducts .="</h3>";
     $showProducts .="<p>{$row['content']}";
     $showProducts .="<table class='table'>";
   
    $showProducts .= showDetails($connection,$productId); 
    
     $showProducts .="</table>";   
     $showProducts .="</div>";                 
     $showProducts .="</div>";
     $showProducts .="<br/><br/><br/><br/><br/><br/>";
    }  
    echo $showProducts;
    
}

function showDetails($connection,$id){
 $productId = $id;
 $showDetails="";

       $sql="SELECT * FROM producttablenames WHERE product_Fid=$productId";
       $showDetails .="<thead>";
       $showDetails .="<tr>";
       $result = mysqli_query($connection,$sql);
       while($row=mysqli_fetch_assoc($result)){    
            $showDetails .="<th>{$row['name1']}</th>";
            $showDetails .="<th>{$row['name2']}</th>";
            $showDetails .="<th>{$row['name3']}</th>";
            $showDetails .="<th>{$row['name4']}</th>";
       }
  
            if(isset($_SESSION["isadmin"])){
                $showDetails .="<th><a class='btn btn-primary' 
                href='editProductDetailsName.php?productId=$productId'>
                <i class=\"glyphicon glyphicon-pencil\"></i></a></th>";
                $showDetails .="<th><a class='btn btn-primary' 
                href='addDetails.php?productId=$productId'>
                <i class=\"glyphicon glyphicon-plus\"></i></a></th>";   
            }
            $showDetails .="</tr>";
            $showDetails .="</thead>";
            $showDetails .="<tbody>";
        
        $sql="SELECT * FROM productdetails WHERE product_Fid = $productId";
        $result = mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
                    
            $showDetails .="<tr id='carid-{$row['id']}'>";
            $showDetails .="<td>{$row['property1']}</td>";
            $showDetails .="<td>{$row['property2']}</td>";
            $showDetails .="<td>{$row['property3']}</td>";
            $showDetails .="<td>{$row['property4']}</td>";
            if(isset($_SESSION["isadmin"])){
                $showDetails .="<td><button type='button'class='deleteBtnDetails btn btn-danger' productdetailsid='{$row["id"]}'><i class=\"glyphicon glyphicon-trash\"></i></button></td></tr>";
            }
            $showDetails .="</tr>";
            $showDetails .="</tbody>";  
        }
        
 return $showDetails;

}



function createHomeContent($connection){
    $showContent="";
    
    $sql = "SELECT * FROM homecontent";

    $result = mysqli_query($connection,$sql);
    
    while($row=mysqli_fetch_assoc($result)){

    
     $showContent.="<div class='box'>";
     $showContent.="<div class='col-lg-12'>";
     $showContent.="<hr>";
     $showContent.="<h1 class='intro-text text-center'><strong>{$row['title']}</strong></h1>";
     $showContent.="<hr>";
     $showContent.="<img class='img-responsive img-border img-left' src='{$row['imageurl']}' style: width='250px;' height='250px;' alt=''>";
     $showContent.="<p>{$row['content']}<p>";
     $showContent.="</div>";
     $showContent.="</div>";     
    }  
    echo $showContent;
}


function addCategory(){
    $finalCategories="";
        if(isset($_SESSION["isadmin"])){
        $finalCategories.="<br/><a   class='btn btn-primary col-md-2 pull-right' 
        href='addCategory.php'>
        <i class=\"glyphicon glyphicon-plus\"> Add Category</i></a>";          
        }
        echo $finalCategories;
}

function addHomeContent(){
     $finalContent="";
        if(isset($_SESSION["isadmin"])){
        $finalContent.="<br/><a   class='btn btn-primary col-md-2 pull-right' 
        href='addHomeContent.php'>
        <i class=\"glyphicon glyphicon-plus\"> Add Content</i></a>";          
        }
        echo $finalContent;
}



function editCarousel(){
  
        $finalCarousel="";
        if(isset($_SESSION["isadmin"])){
        $finalCarousel.="<br/><a  class='btn btn-primary  col-md-2 pull-right' 
        href='editCarousel.php'>
        <i class=\"glyphicon glyphicon-plus\"> Edit Carousel</i></a>";          
        }
        echo $finalCarousel;
}

function addProduct($id){
    $categoryId=$id;
     $finalContent="";
        if(isset($_SESSION["isadmin"])){
        $finalContent.="<br/><a   class='btn btn-primary col-md-2 pull-right' 
        href='addProduct.php?categoryId=$categoryId'>
        <i class=\"glyphicon glyphicon-plus\"> Add Product</i></a>";          
        }
        echo $finalContent;
}

// function productToAdd($connection,$id){
//     $productToAdd ="";
//     $productId=$id;

//     $sql="SELECT * FROM producttablenames WHERE product_Fid = $productId";
//     $result = mysqli_query($connection,$sql);
//     $count=1;
//     while($row=mysqli_fetch_assoc($result)){
//         $productToAdd.="<div class='control-group form-group'>";
        
//         $productToAdd.="<div class='controls'>";
//         $productToAdd.="<label style='color:white'>{$row['name1']}:</label>";
//         $productToAdd.="<input type='text' class='form-control' id='name{$count}'";
//         $productToAdd.= "name='name{$count}'";
//         $productToAdd.=" value=''";
//         $productToAdd.="</div>";
//         $productToAdd.="</div>";
        
//         $count++;
//     }
                
//     echo $productToAdd;


// }
?>
