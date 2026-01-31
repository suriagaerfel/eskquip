<?php 
// date_default_timezone_set('Asia/Manila');
// require "database.php";

require '../../initialize.php';
require '../../database.php';
require "mailer.php";

//Sanitized already
        if (isset($_POST["getPasswordLinkBtn"])) {
        session_start();

        $credential = htmlspecialchars($_POST["email_username"]);

        $goBackURL = 'Location:'.$website.'/get-password-reset-link/';
        $_SESSION['email_username']= $credential;

        if (empty($credential)) {
        
            $_SESSION ['empty-credentials']="yes";

            header($goBackURL);


        } else {

            $sql = "SELECT * FROM registrations WHERE registrantEmailAddress = '$credential' or registrantUsername = '$credential'";
            $result = mysqli_query($conn, $sql);
            $registrant = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($registrant) {

            $receivingEmail = $registrant ['registrantEmailAddress'];
            $userID = $registrant ['registrantId'];

            $token = bin2hex(random_bytes(16));

            $tokenHash = hash("sha256",$token);
        
            $tokenHashExpiration = date("Y-m-d H:i:s",time()+ 60 * 30);

            $sql = "UPDATE registrations 
                    SET resetTokenHash = ?,
                        resetTokenHashExpiration = ?
                        WHERE registrantUsername=? or registrantEmailAddress = ?";


            $stmt =$conn->prepare($sql);

            $stmt ->bind_param("ssss",$tokenHash,$tokenHashExpiration,$credential,$credential);

            $stmt-> execute();


            if ($conn->affected_rows) {

                $mail->addAddress($receivingEmail);
                $mail->Subject = "Password Reset";
                $mail->Body = <<<END


                <p>Click <a href='$domain$publicFolder/change-password?userid=$userID&token=$tokenHash'> here </a> to reset your password.\nThe link will expire after 30 minutes.</p>
               
                END;

                try {
                    $mail->send();


                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                    header('Location:'.$website.'/get-password-reset-link/');
                }

            }
 
            $_SESSION ['pwd-reset-link-sent'] = "yes";
            header('Location:'.$website.'/login/');

        } else {
                
                $_SESSION ['credentials-not-registered'] = "yes";
                header($goBackURL); 
              
            }

            } 

        }
        
       
        
        
        ?>


