<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");

    $user_account=$_POST["user_account"];
    $user_email=$_POST["user_email"];
    $user_role=$_POST["user_role"];
    //$massage=nl2br($message);

    $SQL="SELECT * FROM user WHERE user_account='$user_account' AND user_email='$user_email' AND user_role='$user_role'";
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            $user_password=$row["user_password"];
        }
    }

#
# Based on PHPMailer v6.0.5
# ref.: https://github.com/PHPMailer/PHPMailer
#

require "src/PHPMailer.php";
require "src/Exception.php";
require "src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
//Server settings
$mail->SMTPDebug = 2; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify SMTP server
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'a1083358@mail.nuk.edu.tw'; // SMTP username//目前不能用，在要demo的時候再改
$mail->Password = 'cc3358yy'; // SMTP password//目前不能用，在要demo的時候再改
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
)
    );

//Recipients
$mail->setFrom('a1083358@mail.nuk.edu.tw', 'Test Sender');//目前不能用，在要demo的時候再改
$mail->addAddress($user_email, $user_account); // Add a recipient
//$mail->addAddress(‘ellen@example.com’); // Name is optional
//$mail->addReplyTo(‘info@example.com’, ‘Information’);
//$mail->addCC(‘cc@example.com’);
//$mail->addBCC(‘bcc@example.com’);

 

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

 

//Content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = "=?utf-8?B?".base64_encode('租車網密碼')."?=";
$mail->Body = '您好<b>'.$user_account.'</b>，您的密碼為 <b>'.$user_password.'</b>，請進入網站登入成功後立刻修改密碼!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
echo "<script type='text/javascript'>";
            echo "alert('密碼已傳送到您的信箱')";//Message has been sent
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
} catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
echo "<script type='text/javascript'>";
            echo "alert('錯誤，請檢查資料有無填寫錯誤')";//Message has been sent
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=forget.php'>";
}

