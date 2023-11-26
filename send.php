<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';




if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$select=$_POST['select'];
$week=$_POST['week'];
$time=$_POST['time'];
$date=$_POST['date'];
$subject=$_POST['subject'];
$message=$_POST['message'];





$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.alimulquran.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@alimulquran.com';                     //SMTP username
    $mail->Password   = 'B5cdCH{{-+aE';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('noreply@alimulquran.com', 'Enquiry - Alim ul Quran Institute' );
    $mail->addAddress('ammar4lhr@gmail.com', 'Ammar Saeed');     //Add a recipient
    $mail->addReplyTo('info@alimulquran.com', 'Alim ul Quran');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<h1>Registration - Alim ul Quran Institute<br>
    </h1><h3> Name: $name <br>E-mail: $email<br>Phone: $phone<br>Course: $select <br>Week: $week <br>Time: $time <br>Date: $date <br>Subject: $subject<br>Message: $message</h3>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    $mail->send();
    echo '<label>
  <input type="checkbox" class="alertCheckbox" autocomplete="off" />
  <div class="alert success">
    <span class="alertClose">X</span>
    <span class="alertText">Thank you for your application. Our team will review it and contact you soon.
    <br class="clear"/></span>
  </div>
</label>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

}

 




?>