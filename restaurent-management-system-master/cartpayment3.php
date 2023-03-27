<?php
include 'connection.php';
session_start();
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($email)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';
    $mail = new PHPMailer(true);
    try {
        //Server settings

        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'noreply.myhotel106@gmail.com'; //SMTP username
        $mail->Password = 'hybeymxjykprcgjn'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply.myhotel106@gmail.com', 'Hotel Management Systems');
        $mail->addAddress($email); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'One time Password for Payment';
        
        $otp = rand(100000, 999999);
        $_SESSION['session_otp'] = $otp;
        $mail->Body = "OTP for your payment: " .$otp;
// TODO
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['card-purchase'])) {
  $_POST['ccname'] = strtoupper($_POST['ccname']);
  $_SESSION['ccnumber'] = substr($_POST['ccnumber'],0,4) . " #### #### " . substr($_POST['ccnumber'],12,4);
        
  $username = $_SESSION['username'];
  
  $qry = "SELECT * FROM `registered_users` WHERE `username`='$username'";
    $result = mysqli_query($con, $qry);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (sendMail($result_fetch['email'], $result_fetch['mno'])) {
              $_SESSION['email'] = $result_fetch['email'];
                echo "
                    <script>
                      // alert('OTP send to email " . $result_fetch['email']."');
                      window.location.href='cartpayment.php';
                    </script>

                    ";
            } else {
                echo "
                    <script>
                      alert('Server Down Try Again later');
                      window.location.href='index.php';
                    </script>

                    ";
            }
        } else {
            echo "
            <script>
              alert('Incorrect Email Or Username');
              window.location.href='index.php';
            </script>

            ";
        }
    }
}
?>