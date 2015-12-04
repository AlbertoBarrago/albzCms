<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<?php

  if(isset($_POST['sendEmail'])){
	  
	  
	  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  
		  $validate = $_POST['email'];
		  
	  }
	  
	  $server = $_SERVER['HTTP_USER_AGENT'];
	  $ip = $_SERVER['SERVER_ADDR'];
	  
	  
	 

      $to         = 'studio@albertobarrago.it';
      $subject    = wordwrap($_POST['subject'],70);
      $body       = $_POST['body'];
	  $headers  = 'MIME-Version: 1.0' . "\r\n";
	  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	  $headers .= 'From: ' . $validate . "\r\n";
 


	      if(!empty($subject) && !empty($body) && $headers ){
	
	       		 mail($to,$subject,$body, $headers);
	
		   		 	echo '<div class="alert alert-success" role="alert"> Messaggio inviato corretamente a ' . $to . '</div> ';
	
	
						}  else {
	
	
						echo '<div class="alert alert-danger" role="alert"> Compila i campi richiesti o verifica questo indirizzo '. $_POST['email'] .'</div>';
	
	
					}
	        
	      }



?>
<!-- Page Content -->
<div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>

                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email*</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="someusername@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject*</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                        </div>
                         <div class="form-group">
                            <textarea name="body" rows="8" cols="40" class="form-control"></textarea>
                        </div>

                        <input type="submit" name="sendEmail" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Invia Email">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>




<?php include "includes/footer.php";?>
