<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$conn = mysqli_connect("localhost", "root", "", "hospital");

//Load Composer's autoloader
// require 'vendor/autoload.php';


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//E-mail detail feed


$id = $_POST['smail'];


//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host      = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
    $mail->Username   = 'your Email';                     //SMTP username
    $mail->Password   = 'password';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('vcare@visitdetails.com', 'V-Care');

    $sql = "select * from visits where v_id=$id";

    $p_mail = "select patients.email from patients
                INNER JOIN visits 
                ON patients.p_id=visits.p_id
                WHERE visits.v_id=$id";

    $res = mysqli_query($conn, $sql);


    $x =  mysqli_fetch_array($res);

    $result = mysqli_query($conn, $p_mail);

    $row = mysqli_fetch_array($result);

    $email = $row['email'];

    if (mysqli_num_rows($res) != 0) {

        $mail->addReplyTo('your email', 'Information');

        $mail->addBCC($email);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "About : Hospital Visit";
        $mail->Body    = "<big><p><b><u>Your visit details :</u></b></p> <p><b>Doctor's Name : </b>" . $x["doctor"] . "</p><p><b> Name of disease : </b>" . $x["dis_name"] . "</p><p><b> Medicine's name : </b>" . $x["med_name"] . "</p><p><b> Note : </b>" . $x["note"] . "</p><p><b> Next Visit : </b>" . $x["date"] . " </p></big>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients SUCCESS';

        $mail->send();
        echo 'Message has been sent';
    } else {
        echo "record not found";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
