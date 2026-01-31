<?php

require "mailer.php";

$mail->addAddress($verifyingEmail);
$mail->Subject = "Account Verification";
$mail->Body = <<<END
    
    <p>Click <a href='$domain$privateFolder/includes/processing/account-verification-processing.php?userid=$verifyingId'> here </a> to to verify your account.</p>
               
END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        
    }


