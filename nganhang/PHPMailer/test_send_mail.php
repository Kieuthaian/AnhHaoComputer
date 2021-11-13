<?php
//phpmailer/test_sen_mail.php
//test chức năng gửi mail nên dùng phpmailer
?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// vì đạn này dùng cho fameword
//require 'vendor/autoload.php';

//nhúng các class yêu câgu
    require_once 'src/Exception.php';
    require_once 'src/PHPMailer.php';
    require_once 'src/SMTP.php';
//
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->CharSet="UTF-8";
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//    sử dụng server gmail để gửi mail
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//    nhập tài khoản gmail cho username
    $mail->Username   = 'hoangmanhtu0809@gmail.com';                     // SMTP username
    //password k phải là pasword gmail mà gmail có 1 cơ chế tạ password cho các ứng dụng
//    password này sẽ đọc lập với password của bạn
    $mail->Password   = 'sdywepqwzyatyzuk';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('binlun@gmail.com', 'Hoàng Mạnh Tú');
//    gửi tới ai
    $mail->addAddress('hoangmanhtu0809@gmail.com');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    // Attachments
//    đính kèm file muốn gửi cùng mail
      $mail->addAttachment('1.jpg');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Tiêu đề gửi mail';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}