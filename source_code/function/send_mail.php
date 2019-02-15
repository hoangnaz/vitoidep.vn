<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
require $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/SMTP.php';
class Mail{
    function sendMail($toEmail,$nameCustomer,$subjectEmail,$template){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->IsSMTP(); // Chứng thực SMTP
                $mail->SMTPAuth=TRUE;
                $mail->Host="smtp.gmail.com";                // Enable SMTP authentication
                $mail->Username = 'webhocduong@gmail.com';                 // SMTP username
                $mail->Password = 'webhocduong7294';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('webhocduong@gmail.com', 'Vì tôi đẹp Shop');
                $mail->addAddress($toEmail, $nameCustomer);     // Add a recipient
                $mail->addAddress('nguyenanhhoangltqbh@gmail.com');               // Name is optional
                
                 $mail->addCC('nguyenanhhoang.qb.72@gmail.com');
                 $urlImageLogo=$_SERVER['DOCUMENT_ROOT'].'/images/logo_new.jpg';
                 $urlImageDeliver=$_SERVER['DOCUMENT_ROOT'].'/images/delivery_email.gif';
                 $mail->AddEmbeddedImage($urlImageLogo, 'logo');
                 $mail->AddEmbeddedImage($urlImageDeliver, 'deliver');
                 // $mail->addBCC('bcc@example.com');
                /* Server google*/
						$mail->CharSet="utf-8";
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subjectEmail;
                $mail->Body    = $template;
                $mail->AltBody = 'Đây là email xác nhận tự động từ Vì tôi đẹp shop';

                $mail->send();
                return 200;
            } catch (Exception $e) {
                return 400;
            }
    }
}
