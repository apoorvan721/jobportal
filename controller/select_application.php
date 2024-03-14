<?php
include '../config.php';
$admin = new Admin();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['app_status']) && ($_GET['app_id'])) {
    $id = $_GET['app_id'];
    if ($_GET['app_status'] == "Application sent") {
        $status = "Shortlisted";
        $stmt = $admin->cud(
            "UPDATE `application` SET `application_status`='$status' WHERE `application_id`='$id'",
            "update"
        );
        echo "<script>alert('Application In Process');window.location='../view_application.php';</script>";
    }
    if ($_GET['app_status'] == "Shortlisted") {
        $status = "Selected";
        $sid = $_GET['sid'];
        $stmt = $admin->ret("SELECT * FROM `seeker` WHERE `seeker_id`='$sid'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        //Load Composer's autoloader
        require '../vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'apoorvan1330@gmail.com';                     //SMTP username
            $mail->Password = 'yvjximbiilyvsciv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('apoorvan1330@gmail.com', 'JOBPORTAL');
            $mail->addAddress($row['seeker_email'], $row['seeker_name']);
            $mail->addReplyTo('apoorvan1330@gmail.com', 'JOBPORTAL');     //Add a recipient
        

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Status of Job Application';
            $mail->Body = 'Congratulations!! Your resume has been shortlisted. Futher Updates regarding the interview rounds will be shared through mail';

            $mail->send();
            $stmt = $admin->cud(
                "UPDATE `application` SET `application_status`='$status' WHERE `application_id`='$id'",
                "update");
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        echo "<script>alert('Application In Process');window.location='../view_application.php';</script>";
    }
}







?>