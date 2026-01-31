<?php

require '../../initialize.php';
require '../../database.php';

require "mailer.php";

//Send verification email...

//Sanitized already
if (isset($_GET['userid'])) {
    $verifyingId = htmlspecialchars($_GET['userid']);
    $verificationStatus = "Verified";

    $sqlVerify = "UPDATE registrations 
                    SET registrantVerificationStatus = ?
                        WHERE registrantId = $verifyingId";

     $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlVerify);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $verificationStatus);

    mysqli_stmt_execute($stmt);

            session_start();
          
            $_SESSION ['account-verified'] = "yes";

            header('Location:'.$website.'/login/');
        }
}