<?php 
use PHPMailer\PHPMailer\PHPMailer;              //ovde ispred klase uvozimo phpMailer koji nam treba za funkciju zaboravljena lozinka
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";



 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];
 

// header('Location: index.html');

 $mail = new PHPMailer();
 $mail->Host = "smtp.gmail.com";
 //$mail->IsSMTP();
 $mail->SMPTAuth = true;
 $mail->Username = "slanjefakture@gmail.com";
 $mail->Password = "8!slanjefakture!8";
 $mail->SMTPSecure = "tls";
 $mail->Port = 587;
 $mail->addAddress('ginderfilip@gmail.com'); //ovde definisemo da uvek poruke salju na moj email
 $mail->setFrom($email);   //ovde definisemo da meni u emailu pise ko mi je poslao poruku
 $mail->Subject = $subject;   //ovde samo da je naslov Korisnicko Pitanje - da znam o kojoj puruci je rec
 $mail->isHTML(true);
 $mail->Body = $message;  // poruka

 if($mail->send()){
   exit(json_encode('Email je uspesno poslat!'));
 }
 else{
   exit(json_encode('Doslo je do greske prilikom slanja Emaila-a!'));
 }

 ?>