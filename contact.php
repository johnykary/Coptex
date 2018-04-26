<?php
    session_start();
	include_once("includes/header.php");
    include_once("includes/menu.php");	
    
    $resultMessage="";	 
    $emailErr="";
    if(isset($_POST['submit']) && !empty($_POST["email"])){
    	include_once("includes/config.php");
    
            
    		require_once("Libraries/PHPMailer/PHPMailerAutoload.php");
    		
    			$email = $_POST["email"];
                $text = $_POST["text"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $phone = $_POST["phone"];
    			
    			
    			$sendEmail = new PHPMailer;
    			$sendEmail->isSMTP();
    			
    			$sendEmail->SMTPDebug=0;
    			$sendEmail->Debugoutput="html";
    			
    			$sendEmail->Host="titan.indns.gr";
    			$sendEmail->Port=465;
    			$sendEmail->SMTPAuth=true;
    			$sendEmail->SMTPSecure=true;
    			$sendEmail->Username="test1@arismargaritopoulos.com";//cpanel mail
    			$sendEmail->Password="sanevbs1991Omgk33lol";//cpanel pass
    			$sendEmail->setFrom("test1@arismargaritopoulos.com",$email);//details about client
    			$sendEmail->addAddress("john.stef.kary@gmail.com","COPTEX",$name);//email to sent the forms
    			$sendEmail->Subject="COPTEX Consumer";//subject of eimail 
    			$sendEmail->msgHTML($text."<br/><br/><br/>"."Name: ".$name."<br/>"."Surname: ".$surname."<br/>"."Contact Details: ".$phone);//the message of email
    			
    			
    			
    			if(!$sendEmail->send()){
    			 //echo	$resultMessage = "Mailer Error: ".$sendEmail->ErrorInfo;
    			  $resultMessage ="<p class='alert alert-success'>MAIL!</p>";
                    header("Refresh:1;url=contact.php");
    			}else{
    				echo $resultMessage ="<p class='alert alert-success'>ΤΟ ΜΗΝΥΜΑ ΣΑΣ ΣΤΑΛΘΗΚΕ!</p>";
                    header("Refresh:1;url=contact.php");
    			}
    		
    }elseif(isset($_POST['submit']) && empty($_POST["email"])){
    	    echo $resultMessage ="<p class='alert alert-danger'>ΠΑΡΑΚΑΛΩ ΣΥΜΠΛΗΡΩΣΤΕ ΤΟ MAIL ΣΑΣ!</p>";
            header("Refresh:1;url=contact.php"); 
    }
?>
    
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact
                    <strong>business casual</strong>
                </h2>
                <hr>
            </div>
            <div class="col-md-8">
                <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3141.071073045586!2d23.783724415738412!3d38.068725879707046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a19f48337f055f%3A0xdfc0276a306c7017!2zzpHPgc6zz43Pgc63IM6TzrXPic-BzrPOr86_z4UgMTUsIM6bz4XOus-MzrLPgc-Fz4POtyAxNDEgMjM!5e0!3m2!1sel!2sgr!4v1508168244550" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <p>Σταθερό:
                    <strong>+30 210 2824356</strong>
                </p>
                <p>Κινητό:
                    <strong>+30 694 6328346</strong>
                </p>
                <p>FAX:
                    <strong>+30 210 2824356</strong>
                </p>
                <p>Email:
                    <strong><a href="mailto:name@example.com">info@coptex.gr</a></strong>
                </p>
                <p>Διεύθυνση:
                         <strong> Γ.ΑΡΓΥΡΗ 15 ΛΥΚΟΒΡΥΣΗ 14123</strong>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p>
                    <p><span class="error" style="color:red; font-size:15px">* Required field.</span></p>
					<form role="form" method="post" action="contact.php">
                        <div class="form-group col-lg-3">
							<label for="name"><span class="glyphicon glyphicon-user"></span> Όνομα</label>
				            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name"/>
						</div><!--input name-->
                        <div class="form-group col-lg-3">
							<label for="name"><span class="glyphicon glyphicon-user"></span> Επίθετο</label>
				            <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter your Surname">
						</div><!--input surname-->
						<div class="form-group col-lg-3">
                            <label for="email"><span  class="glyphicon glyphicon-envelope" ></span> Email <span class="error" style="color:red">*</span></label>
				            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div><!--input email-->
                        <div class="form-group col-lg-3">
							<label for="phone"><span class="glyphicon glyphicon-phone"></span> Τηλέφωνο</label>
									<input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone"/>
						</div><!--input phone-->
                        <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <textarea id="text" name="text" type="text" class="form-control" rows="6" placeholder="Message" ></textarea>
                            </div><!--text area-->
                            <div class="form-group col-lg-12">
                                <div class="g-recaptcha" data-sitekey="6LcS6zQUAAAAAD9O11MXws4u9R92r4vAg8Qh-GS5" data-callback="recaptchaCallback"></div>
                        </div>
						<div class="form-group ">
    						<button id="submitBtn" type="submit" name="submit" class="btn btn-default" disabled>Submit</button><!--πάτημα κουμπιού για την αποστολή της φόρμας-->
                        </div><!-- submit button -->
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php
    include_once("includes/footer.php");     
?>