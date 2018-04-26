$(document).ready(function(){
       //initialize tinymce for upload Articles
    tinymce.init({
        selector:"#content",
        height:300
    });
    
     tinymce.init({
        selector:"#editContent",
        height:300
    });
    

$("#LoginBtn").click(function(){        
        var usernameVal = $("#username").val();
        var passwordVal = $("#password").val();
        var buttonVar = $("#LoginBtn").val();
        var jsonParsed="";
        $.ajax({           
            url:"includes/doLogin.php",
            method:"POST",
            data:{ 
                username:usernameVal,
                password:passwordVal
            },
            success: function(data){
              jsonParsed=JSON.parse(data);//parse string to JSON
              if(jsonParsed.success=="ok"){
                   buttonVar.val=1;
                    window.location.href="index.php"; 
                }else{
                    $("#success").html(jsonParsed.error);
                }
            },
            error:function(data){
                alert(data);
            }
        });
    });

    
$("form#addCategory").submit(function(event){
        event.preventDefault();
        //tinymce.get('content').save();this line saves the tinymce to the input #content and then it's available to do post
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doAddCategory.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert("Your category has been succesfully uploaded");   
             window.location.href = "categories.php";
           },
           error:function(data){
             alert(data);
           }
        });
    });

$("form#addHomeContent").submit(function(event){
        event.preventDefault();
        tinymce.get('content').save();//this line saves the tinymce to the input #content and then it's available to do post
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doAddHomeContent.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert("Your content has been succesfully uploaded");   
             window.location.href = "index.php";
           },
           error:function(data){
             alert(data);
           }
        });
    });    
    

 $("#newBtnCarousel").click(function(){        
        $("#newCarousel").submit();
    });
    
    $("#newCarousel").submit(function(event){
        event.preventDefault();
       
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doUploadCarousel.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert("success =>" +  data);  
             //console.dir(data);
               if(data=="success"){
                   location.reload();
               }
           },
           error:function(data){
              alert("error =>" +  data);  
              //console.dir(data);
           }
        });        
    });
    
    $("form#editCarousel").submit(function(event){
        
        event.preventDefault();
       
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doUpdateCarousel.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert(data);
             window.location.href = "editCarousel.php";
           },
           error:function(data){
             alert(data);
           }
        });   
    });

    
    
    $(".deleteBtnCarousel").click(function(){
        
       var carouselid=$(this).attr("carouselid");                
      //prompt to user a message if ok cliked returns true else false
       var confirmMsg=confirm("Are you sure you want to delete this caption??");
       if(confirmMsg){
           //do ajax in order to delete the post
           $.ajax({
              url:"includes/doDeleteCarousel.php",
              method:"POST",
              data:{
                  id:carouselid
              },
              success:function(data){
                alert(data);  
                  if(data=="success"){
                     $("#carid-"+carouselid).hide(1000);
                 }
              },
              error:function(data){
                alert(data);
              }
           });
       }
        
    });
    
    
    $(".deleteBtnDetails").click(function(){
        
       var productdetailsid=$(this).attr("productdetailsid");                
      //prompt to user a message if ok cliked returns true else false
       var confirmMsg=confirm("Are you sure you want to delete this caption??");
       if(confirmMsg){
           //do ajax in order to delete the post
           $.ajax({
              url:"includes/doDeleteDetails.php",
              method:"POST",
              data:{
                  id:productdetailsid
              },
              success:function(data){
                alert(data);  
                  if(data=="success"){
                     $("#carid-"+productdetailsid).hide(1000);
                 }
              },
              error:function(data){
                alert(data);
              }
           });
       }
        
    });
    
    

    
$("#newBtnDetails").click(function(){        
        $("#newDetails").submit();
    });
    
    $("#newDetails").submit(function(event){
        event.preventDefault();
       
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doUploadDetails.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert("success =>" +  data);  
             //console.dir(data);
               if(data=="success"){
                   //window.location.href = "categories.php";
                   location.replace(document.referrer);
               }
           },
           error:function(data){
              alert("error =>" +  data);  
              //console.dir(data);
           }
        });        
    });
    

    
$("#productBtn").click(function(){        
        $("#addProduct").submit();
    });
    
    $("#addProduct").submit(function(event){
        event.preventDefault();
       
        var dataFromForm = new FormData(this);
        
        $.ajax({
           url:"includes/doUploadProduct.php",
           method:"POST",
           data:dataFromForm,
           cache:false, //do not cache
           contentType:false,//format contetype in order to send files
           processData:false,
           success:function(data){
             alert("success =>" +  data);  
             //console.dir(data);
               if(data=="success"){
                   //window.location.href = "categories.php";
                   location.replace(document.referrer);
               }
           },
           error:function(data){
              alert("error =>" +  data);  
              //console.dir(data);
           }
        });        
    });
        
$("#newBtnNames").click(function(){        
    $("#newNames").submit();
});

$("#newNames").submit(function(event){
    event.preventDefault();
   
    var dataFromForm = new FormData(this);
    
    $.ajax({
       url:"includes/doEditProductDetailsNames.php",
       method:"POST",
       data:dataFromForm,
       cache:false, //do not cache
       contentType:false,//format contetype in order to send files
       processData:false,
       success:function(data){
         alert("success =>" +  data);  
         //console.dir(data);
           if(data=="success"){
               //window.location.href = "categories.php";
                location.replace(document.referrer);
           }
       },
       error:function(data){
          alert("error =>" +  data);  
          //console.dir(data);
       }
    });        
});
});