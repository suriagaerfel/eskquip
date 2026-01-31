<?php

require '../../initialize.php';
require '../../database.php';

require "mailer.php";
 

//Sanitized already


$logoutUserId = isset($_GET ['userid']) ? $_GET ['userid'] : '';
$logoutEmailAddress = isset($_GET ['email-address']) ? $_GET ['email-address'] : '';

 if (isset($_GET ['logout-id'])) {

    $logoutId = htmlspecialchars($_SESSION ['logout-id']);

    $sqlAccountDetails= "SELECT * FROM registrations WHERE registrantId = $logoutId";
    $sqlAccountDetailsResult = mysqli_query($conn,$sqlAccountDetails );
    $AccountDetails = $sqlAccountDetailsResult-> fetch_assoc();

    if ($AccountDetails) {
        $logoutEmail = $AccountDetails ['registrantEmailAddress'];
    }


 }

$mail->addAddress($logoutEmailAddress);
$mail->Subject = "Logout Account";
$mail->Body = <<<END
    
    <p>Click <a href='$domain$privateFolder/includes/processing/logout-processing.php?userid=$logoutUserId'> here </a> to logout your account from other device.</p>
               
END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        
    }
$_SESSION ['logout-link-sent'] = "yes";
 
header ('Location: ' . $website.'/login/');

