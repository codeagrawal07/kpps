<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\Exception.php'; 
require 'PHPMailer\PHPMailer.php'; 
require 'PHPMailer\SMTP.php'; 
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form input
    $name     = htmlspecialchars($_POST['name']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $subject  = htmlspecialchars($_POST['subject']);
    $message  = htmlspecialchars($_POST['message']);

    // Email content
    $mail = new PHPMailer(true);
    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ramroy76680@gmail.com'; // 👈 Replace with your Gmail
        $mail->Password = 'urpp ppli uwci belb';   // 👈 Use Gmail App Password, NOT your real password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email headers
        $mail->setFrom('ramroy76680@gmail.com','Contact Form');  // Same as your Username above
        $mail->addAddress('ashuagarwal176@gmail.com','hari wed site'); // Recipient

        $mail->Subject = "New Contact Form Message: $subject";
        $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage:\n$message";

        $mail->send();
        echo "Thank you, $name! Your message has been sent successfully.";
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
