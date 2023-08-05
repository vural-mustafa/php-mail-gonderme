<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$email = isset($_POST['email']) ? $_POST['email']:null;

$konu = isset($_POST['konu']) ? $_POST['konu']:'Konu';

$mesaj = isset($_POST['mesaj']) ? $_POST['mesaj']:null;

if(!$email)
{
    echo "Lütfen email adresinizi girin";
}
elseif(!$mesaj)
{
    echo "Lütfen mail içeriğini yaz";
}
else
{

    $mail=new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mustafavural5282@gmail.com';                     //SMTP username
        $mail->Password   = 'abc123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;  
        $mail->charset    ="UTF-8";
        $mail->setLanguage('tr');                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mustafavural5282@gmail.com', 'Mustafa Vural');
        $mail->addAddress($email);     //Add a recipient                    
        $mail->addReplyTo('ozel37080@gmail.com', 'Emre Özel Gmail');
       
        if(isset($_FILES['dosya']['name']))
        {
              $email-> addAttachment($_FILES['dosya']['tmp_name'],$_FILES['dosya']['name']);
        }
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $konu;
        $mail->Body    = $mesaj;
        $mail->send();
        echo "Mail işleminiz tamamlandi";
    }
    catch (Exception $e)
     {
        echo $e-> errorMessage();
    }

}
?>