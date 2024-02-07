<?php
 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$quantity = $_POST["quantity"];
$select = $_POST["select"];

$body = "Name: $name \n"."Address: $address \n"." Phone Number: $phone \n"."Order: $select \n"."$Quantity: $quantity";
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["submit"])) {
 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'fkangire@gmail.com';   //SMTP write your email
    $mail->Password   = '';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    /*$mail->setFrom( $_POST["email"], $_POST["name"]);*/ // Sender Email and name
    $mail->addAddress('franciskagumire408@gmail.com');     //Add a recipient email  
    /*$mail->addReplyTo($_POST["email"], $_POST["name"]);*/ // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "Order from Website";   // email subject headings
    $mail->Body    = $body; //email message
      
    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.php';
    </script>
    ";
}
?>
