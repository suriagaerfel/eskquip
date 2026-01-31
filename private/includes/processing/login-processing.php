<?php

require '../../initialize.php';
require '../../database.php';

//Sanitized already
        if (isset($_POST["login_submit"])) {

          // session_reset();

           $credential = htmlspecialchars($_POST["login_email_username"]);
           $pwd = htmlspecialchars($_POST["login_password"]);

           $loginErrors = [];
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

                                            // header('Location:send-logout-link-processing.php?userid='.$registrantId.'&email-address='.$registrantEmailAddress) ;
                                            
                                            // ob_end_flush();

                                          $error = 'You are logged in in the other device. Open the email sent to log out.';
                                          array_push($loginErrors,$error);
                                          array_push($responses,$error);
                                            
                                          } else {

                                          //Log the activity and make a session
                                          $activityContent='Logged in';
                                          
                                          $sqlInsertActivity = "INSERT INTO registrant_activities (registrant_activityUserId,registrant_activityContent) VALUES (?, ?)";
                                          $stmt = mysqli_stmt_init($conn);

                                          $prepareStmt = mysqli_stmt_prepare($stmt,$sqlInsertActivity);

                                            if ($prepareStmt) {
                                                mysqli_stmt_bind_param($stmt,"ss", $registrantId,$activityContent);
                                                mysqli_stmt_execute($stmt);

                                                $_SESSION['id'] = $registrantId;
                                                echo 'Login Successful';
                                            }
                                            
                                            
            
                                          }
                                      }



                                    } else {
                                            $error = 'Your account is not yet verified. Check your email to verify.';
                                            array_push($loginErrors,$error);
                                            array_push($responses,$error);       
                                    }

              
                                  } else {
                                      $error = 'The password is not correct.';
                                      array_push($loginErrors,$error);
                                      array_push($responses,$error);
                                  }
                        

                    } else{

                        $error = 'Credential not found.';
                        array_push($loginErrors,$error);
                        array_push($responses,$error);
                    }

                } elseif (!$pwd) {
                  $error = 'Please provide your password.';
                  array_push($loginErrors,$error);
                  array_push($responses,$error);  
                }

           } else {
                
            $error = 'Please provide your credential.';
            array_push($loginErrors,$error);
            array_push($responses,$error);
               
           }

           


           


           if ($responses) {
              foreach ($responses as $response) {
                echo $response ."<br>";         
              }  
           } 

        }        