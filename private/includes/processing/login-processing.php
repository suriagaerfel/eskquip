<?php

require '../../initialize.php';
require '../../database.php';


        if (isset($_POST["login_submit"])) {

           $credential = htmlspecialchars($_POST["login_email_username"]);
           $pwd = htmlspecialchars($_POST["login_password"]);

         
           $responses = [];


           if ($credential) {

            if ($pwd) {

                     $sqlRegistration = "SELECT * FROM registrations WHERE registrantEmailAddress = '$credential' or registrantUsername = '$credential'";

                    $result = mysqli_query($conn, $sqlRegistration);
                    $registrant= $result->fetch_assoc();

                    if ($registrant) {
                            $registrantId = $registrant ['registrantId'];
                            $registrantEmailAddress =  $registrant ['registrantEmailAddress'];
                            $registrantVerificationStatus =  $registrant ['registrantVerificationStatus'];
                            $registrantPassword = $registrant["registrantPassword"];

                            if (password_verify($pwd,$registrantPassword)) {

                                  if ($registrantVerificationStatus=="Verified") {
                                  
                                      //Check login status
                                      $sqlCheckLogin = "SELECT * FROM registrant_activities WHERE registrant_activityUserId=$registrantId ORDER BY registrant_activityId DESC LIMIT 1";
                                      $sqlCheckLoginResult = mysqli_query($conn,$sqlCheckLogin);
                                      $login=$sqlCheckLoginResult->fetch_assoc();

                                      if ($login) {
                                        $loginContent = $login['registrant_activityContent'];

                                          if ($loginContent=='Logged in') {

                                          $error = 'You are logged in in the other device. Open the email sent to log out.';
                                            $responses ['login-status'] = 'Unsuccessful';
                                            $responses ['error'] =  $error;  
                                          
                                            
                                          } else {

                                          $activityContent='Logged in';
                                          
                                          $sqlInsertActivity = "INSERT INTO registrant_activities (registrant_activityUserId,registrant_activityContent) VALUES (?, ?)";
                                          $stmt = mysqli_stmt_init($conn);

                                          $prepareStmt = mysqli_stmt_prepare($stmt,$sqlInsertActivity);

                                            if ($prepareStmt) {
                                                mysqli_stmt_bind_param($stmt,"ss", $registrantId,$activityContent);
                                                mysqli_stmt_execute($stmt);

                                                $_SESSION['id'] = $registrantId;
                                                $responses ['login-status'] = 'Successful';
                                                $responses ['error'] = 'No error';
                                            }
                                             
                                          }
                                      }



                                    } else {
                                            $error = 'Your account is not yet verified. Check your email to verify.';
                                            $responses ['login-status'] = 'Unsuccessful';
                                            $responses ['error'] =  $error;        
                                    }

              
                                  } else {
                                      $error = 'The password is not correct.';
                                      $responses ['login-status'] = 'Unsuccessful';
                                      $responses ['error'] =  $error;
                                  }
                        

                    } else{
                        $error = 'Credential not found.';
                        $responses ['login-status'] = 'Unsuccessful';
                        $responses ['error'] =  $error;

                    }

                } elseif (!$pwd) {
                  $error = 'Please provide your password.';
                 
                  $responses ['login-status'] = 'Unsuccessful';
                  $responses ['error'] =  $error;
                }

           } else {
            $error = 'Please provide your email address or username.';
            $responses ['login-status'] = 'Unsuccessful';
            $responses ['error'] = $error;

           }

           

          if ($responses) {
              header('Content-Type: application/json');
              $jsonResponses = json_encode($responses,JSON_PRETTY_PRINT);
              echo  $jsonResponses;
          } 
        }        