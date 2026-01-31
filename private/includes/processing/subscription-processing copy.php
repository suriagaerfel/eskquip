<?php

require '../../initialize.php';
require '../../database.php';



if(isset($_POST['subscription_submit'])) {
            $registrantId = htmlspecialchars($_POST ['subscription_registrant_hidden_id']);
            $toolSubscriptionList = htmlspecialchars($_POST ['in_tool_subscription_list']);
            $fileSubscriptionList = htmlspecialchars($_POST ['in_file_subscription_list']);
            $sellerSubscriptionList = htmlspecialchars($_POST ['in_seller_subscription_list']);
            $teacherRegistration = htmlspecialchars($_POST ['in_teacher_registration']);

            $type = htmlspecialchars($_POST ['subscription_type']);        
            $duration = htmlspecialchars($_POST ['subscription_duration']);
            $paymentOption = htmlspecialchars($_POST ['subscription_payment_option']);
            $referenceNumber = htmlspecialchars($_POST ['subscription_reference_number']);

            $responses = [];

            if (!$type) {
                array_push($responses,"Please select subscription type.");
            }

            if (!$duration) {
                array_push($responses,"Please enter subscription duration.");
            }

            if (!$paymentOption) {
                array_push($responses,"Please select payment option.");
            }

            if (!$referenceNumber) {
                array_push($responses,"Please provide reference number.");
            }
        
            
            $_SESSION ['type'] = $type;
            $_SESSION ['duration'] = $duration;
            $_SESSION ['paymentOptionName'] = $paymentOption;
            $_SESSION ['referenceNumber'] = $referenceNumber;

            if (isset($_FILES ['subscription_proof_of_payment'])) {

            $proofOfPayment = $_FILES ['subscription_proof_of_payment'];
            $proofOfPaymentFileName = $proofOfPayment ['name'];
            $proofOfPaymentFileNameFileNameExt = explode ('.',$proofOfPaymentFileName);
            $proofOfPaymentFileNameActualExt = strtolower(end($proofOfPaymentFileNameFileNameExt));
            $allowedExtsProofOfPayment = ['jpeg', 'jpg'];
        
             
            } else {
                echo 'Please attach a proof of payment.';
            }
        
        
            $fileErrors = [];

      
                 if (!in_array($proofOfPaymentFileNameActualExt,$allowedExtsProofOfPayment)) {
                $error = "Invalid format for proof of payment.";
                array_push($fileErrors,$error);
                array_push($responses,$error);
                
               
                } 

                if (!is_numeric($duration)) {
                  $error = "Please enter a number only for duration.";
                array_push($fileErrors,$error);
                array_push($responses,$error);
               
                }

                 if ($duration < 1) {
                $error = "Duration must be greater than 0";
                array_push($fileErrors,$error);
                array_push($responses,$error); 
               
                }




            $subscriptionNotice = [];

            if ($toolSubscriptionList && $type=='Tools') {
                $notice = 'Subscription for tools is disabled.';
                array_push($subscriptionNotice,$notice);
                array_push($responses,$notice);
                
                }

        if ($fileSubscriptionList && $type=='Files') {
                $notice = 'Subscription for files is disabled.';
                array_push($subscriptionNotice,$notice);
                array_push($responses,$notice);
                }

        if ($sellerSubscriptionList && $type=='Seller') {
                $notice = 'Subscription for seller is disabled.';
                array_push($subscriptionNotice,$notice);
                array_push($responses,$notice);
                }

        if (!$teacherRegistration && $type=='Seller') {
                $notice = 'Subscription for files is not allowed.';
                array_push($subscriptionNotice,$notice);
                array_push($responses,$notice);
                }


        if (!$fileErrors && !$subscriptionNotice) {
                $proofOfPaymentFolder = '../../uploads/subscription/proof/';
            
                if (!is_dir($proofOfPaymentFolder)) {
                mkdir($proofOfPaymentFolder, 0777, true);
                }

                $proofOfPaymentFile = $proofOfPaymentFolder ."userid-".$registrantId."-".date("YmdHis",time()).".".$proofOfPaymentFileNameActualExt;

                $uploadOk = 1;

              
              if (move_uploaded_file($proofOfPayment["tmp_name"], $proofOfPaymentFile)) {
                  $uploadOk = 1;
              } 

                $proofOfPaymentLink= substr($proofOfPaymentFile,5);

                
                $sql = "INSERT INTO registrant_subscriptions (registrant_subscriptionUserId,registrant_subscriptionType,registrant_subscriptionDuration,registrant_subscriptionPaymentOption,registrant_subscriptionRefNumber,registrant_subscriptionProofOfPayment) VALUES (?, ?, ?, ?,?,?)";

                $stmt =$conn->prepare($sql);

                $stmt ->bind_param("ssssss", $registrantId, $type,$duration,$paymentOption, $referenceNumber,$proofOfPaymentLink);

                $stmt-> execute();

                unset($_SESSION ['type']);
                unset($_SESSION ['duration']);
                unset($_SESSION ['paymentOptionName']);
                unset($_SESSION ['referenceNumber']);
                unset($_SESSION ['proofOfPayment']);


                
                array_push($responses,'Subscription Sent');

                echo $responses;

        }


            

        
            

} 