<?php

require '../../initialize.php';
require '../../database.php';

require "mailer.php";
 
//Sanitized already

 $verifyingId= isset($_GET['userid']) ? htmlspecialchars($_GET['userid']) :'';
 $verifyingEmail=isset($_GET['email-address']) ? htmlspecialchars($_GET['email-address']) :'';

 

$mail->addAddress($verifyingEmail);
$mail->Subject = "Account Verification";
$mail->Body = <<<END
    
    <p>Click <a href="$domain$privateFolder/includes/processing/account-verification-processing.php?userid=$verifyingId"> here </a> to to verify your account..</p>
               
END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}"; 
    }
    
unset($_SESSION ['firstName']);
unset($_SESSION ['lastName']); 
unset($_SESSION ['birthdate']);
unset($_SESSION ['gender']);
unset($_SESSION ['emailAddress']);
unset($_SESSION ['username']);
unset($_SESSION ['pwd']);
unset($_SESSION ['pwdRetype']);



 $_SESSION ['signup-successful'] = "yes";
header ('Location:'.$website.'/login/');

