

<?php


$user_ip_address = $_SERVER['REMOTE_ADDR'];
$contentViewTimeNew = isset ($_POST['time_spent']) ? $_POST['time_spent'] : 0;
$currentTimeZone = date_default_timezone_get();//Get the default time zone.

$hasAccess = false;

$query = isset($_GET['query']) ? trim(htmlspecialchars($_GET['query'])) : "";
$queryIn = isset($_GET['query-in']) ? htmlspecialchars($_GET['query-in']) : "";

$table="";
$titleColumn="";
$contentColumn="";


$firstName = '';
$middleName = '';
$lastName = '';
$accountName = '';
$registrantDescription = '';
$type = '';

$username = '';
$emailAddress = '';
$mobileNumber = '';

$birthdate = '';
$gender = '';
$civilStatus = '';

$education = '';
$school = '';
$occupation = '';

$street_subd_village = '';
$barangay = '';
$city_municipality = '';
$province_state = '';
$region='';
$country = '';
$zipcode = '';

 $basicRegistration = '';
$teacherRegistration = '';
$writerRegistration = '';
$editorRegistration = '';
$siteManagerRegistration = '';
$dataAnalystRegistration = '';
$developerRegistration = '';
$funderRegistration = '';
$researchesRegistration='';

$inSubscriptionSellerList='';
$inSubscriptionToolList='';
$inSubscriptionFileList='';
$inSubscriptionShelfList='';

$toolSubscribed=false; 
$fileSubscribed=false; 
$sellerSubscribed=false;
$shelfSubscribed=false; 

$pendingToolSubscription=false;
$pendingFileSubscription=false;
$pendingSellerSubscription=false;
$pendingShelfSubscription=false;



$haveOtherRegistration = false;
$haveAllRegistrations=false;

$subscriptionStatus="";
$subscriptionExpiry="";
$subscription="";

$filledOutSellingDetails="";
$credential=""; 


$query= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ""; 


if ($loggedIn) {

            $sqlMyRecords = "SELECT * FROM registrations where registrantId = $registrantId";
            $sqlMyRecordsResults = mysqli_query($conn,$sqlMyRecords);
            $myRecords = $sqlMyRecordsResults->fetch_assoc();


            if($myRecords) {

                $firstName = $myRecords['registrantFirstName'];
                $middleName = $myRecords['registrantMiddleName'];
                $lastName = $myRecords['registrantLastName'];
                $type = $myRecords['registrantAccountType'];
                $accountName = $myRecords['registrantAccountName'];
                $registrantDescription = $myRecords ['registrantDescription'];

                $username = $myRecords['registrantUsername'];
                $emailAddress = $myRecords['registrantEmailAddress'];
                $mobileNumber = $myRecords['registrantMobileNumber'];

                $birthdate = $myRecords['registrantBirthdate'];
                $gender = $myRecords['registrantGender'];
                $civilStatus = $myRecords['registrantCivilStatus'];

                $education = $myRecords['registrantEducationalAttainment'];
                $school = $myRecords['registrantSchool'];
                $occupation = $myRecords['registrantOccupation'];

                $street_subd_village = $myRecords ['registrantAddressStreet'];
                $barangay = $myRecords ['registrantAddressBarangay'];
                $city_municipality = $myRecords ['registrantAddressCity'];
                $province_state = $myRecords ['registrantAddressProvince'];
                $region = $myRecords ['registrantAddressRegion'];
                $country = $myRecords ['registrantAddressCountry'];
                $zipcode = $myRecords ['registrantAddressZipCode'];

                $paymentChannel = $myRecords ['registrantPaymentChannel'];
                $bankAccountName = $myRecords ['registrantBankAccountName'];
                $bankAccountNumber = $myRecords ['registrantBankAccountNumber'];
                $reviewSchedules = $myRecords ['registrantReviewSchedules'];



                if ($paymentChannel && $bankAccountName && $bankAccountNumber && $reviewSchedules) {
                    $filledOutSellingDetails = "yes";
                } 
               

                $profilePictureLink = $myRecords['registrantProfilePictureLink'] ? $privateFolder.$myRecords['registrantProfilePictureLink'] : $website."/assets/images/user.svg";

                $coverPhotoLink = $myRecords['registrantCoverPhotoLink'] ? $privateFolder.$myRecords['registrantCoverPhotoLink'] : $website."/assets/images/cover-photo.jpeg";

                $basicRegistration = $myRecords['registrantBasicAccount'];
                $teacherRegistration = $myRecords['registrantTeacherAccount'];
                $writerRegistration = $myRecords['registrantWriterAccount'];
                $editorRegistration = $myRecords['registrantEditorAccount'];
                $siteManagerRegistration = $myRecords['registrantSiteManagerAccount'];
                $dataAnalystRegistration = $myRecords['registrantDataAnalystAccount'];
                $developerRegistration = $myRecords['registrantDeveloperAccount'];
                $funderRegistration = $myRecords['registrantFunderAccount']; 
                $researchesRegistration = $myRecords['registrantResearchesAccount']; 

                $accounts = [];
              
                    if ($basicRegistration) {
                        array_push($accounts,$basicRegistration);
                    }

                    if ($teacherRegistration) {
                        array_push($accounts,$teacherRegistration);
                    }

                    if ($writerRegistration) {
                        array_push($accounts,$writerRegistration);
                    }
                    if ($editorRegistration) {
                        array_push($accounts,$editorRegistration);
                    }

                    if ($developerRegistration) {
                        array_push($accounts,$developerRegistration);
                    }

                    if ($siteManagerRegistration) {
                        array_push($accounts,$siteManagerRegistration);
                    }

                    if ($dataAnalystRegistration) {
                        array_push($accounts,$dataAnalystRegistration);
                    }

                    if ($funderRegistration) {
                        array_push($accounts,$funderRegistration);
                    }
            

                
                
          
                $sqlSubscriptionTool = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $registrantId AND registrant_subscriptionType='Tools' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                $sqlSubscriptionToolResults = mysqli_query($conn,$sqlSubscriptionTool);
                $inSubscriptionToolList = $sqlSubscriptionToolResults->fetch_assoc();


                if ($inSubscriptionToolList) {
                    $subscriptionStatusTool = $inSubscriptionToolList['registrant_subscriptionStatus'];
                    $subscriptionExpiryTool = dcomplete_format($inSubscriptionToolList['registrant_subscriptionExpiry']);

                    $subscriptionRemainingDaysTool = floor((strtotime($subscriptionExpiryTool) - $currentTime)/86400);
                    
                    $inSubscriptionToolList="yes";

                   
                    if ($subscriptionStatusTool == 'Approved' AND strtotime($subscriptionExpiryTool)-$currentTime>0) {
                    $_SESSION ['tool-subscribed'] = "yes";
                    $toolSubscribed=true;    
                    }

                    elseif ($subscriptionStatusTool == 'Pending') {
                     $_SESSION ['pending-tool-subscription'] = "yes";
                     $pendingToolSubscription=true;

                   }     
               
                }


                $sqlSubscriptionFile = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $registrantId AND registrant_subscriptionType='Files' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                $sqlSubscriptionFileResults = mysqli_query($conn,$sqlSubscriptionFile);
                $inSubscriptionFileList = $sqlSubscriptionFileResults->fetch_assoc();


                if ($inSubscriptionFileList) {
                    $subscriptionStatusFile = $inSubscriptionFileList['registrant_subscriptionStatus'];
                    $subscriptionExpiryFile = dcomplete_format($inSubscriptionFileList['registrant_subscriptionExpiry']);

                     $subscriptionRemainingDaysFile = floor((strtotime($subscriptionExpiryFile) - $currentTime)/86400);

                     $inSubscriptionFileList="yes";

                   
                    if ($subscriptionStatusFile == 'Approved' AND strtotime($subscriptionExpiryFile)-$currentTime>0) {
                    $_SESSION ['file-subscribed'] = "yes";
                    $fileSubscribed=true;    
                    }

                    elseif ($subscriptionStatusFile == 'Pending') {
                     $_SESSION ['pending-file-subscription'] = "yes";
                     $pendingFileSubscription=true;

                   }     
               
                }






                $sqlSubscriptionSeller = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $registrantId AND registrant_subscriptionType='Seller' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                $sqlSubscriptionSellerResults = mysqli_query($conn,$sqlSubscriptionSeller);
                $inSubscriptionSellerList = $sqlSubscriptionSellerResults->fetch_assoc();


                if ($inSubscriptionSellerList) {
                    $subscriptionStatusSeller = $inSubscriptionSellerList ['registrant_subscriptionStatus'];
                    $subscriptionExpirySeller = dcomplete_format($inSubscriptionSellerList['registrant_subscriptionExpiry']);

                    $subscriptionRemainingDaysSeller = floor((strtotime($subscriptionExpirySeller) - $currentTime)/86400);

                    $inSubscriptionSellerList="yes";

                   
                    if ($subscriptionStatusSeller == 'Approved' AND strtotime($subscriptionExpirySeller)-$currentTime>0) {
                    $_SESSION ['seller-subscribed'] = "yes";
                    $sellerSubscribed=true;    
                    }

                    elseif ($subscriptionStatusSeller == 'Pending') {
                     $_SESSION ['pending-seller-subscription'] = "yes";
                     $pendingSellerSubscription=true;

                   }     
               
                }


                $sqlSubscriptionShelf = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $registrantId AND registrant_subscriptionType='Shelf' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                $sqlSubscriptionShelfResults = mysqli_query($conn,$sqlSubscriptionShelf);
                $inSubscriptionShelfList = $sqlSubscriptionShelfResults->fetch_assoc();


                if ($inSubscriptionShelfList) {
                    $subscriptionStatusShelf = $inSubscriptionShelfList ['registrant_subscriptionStatus'];

                    $subscriptionExpiryShelf = dcomplete_format($inSubscriptionShelfList['registrant_subscriptionExpiry']);

                    $subscriptionRemainingDaysShelf = floor((strtotime($subscriptionExpiryShelf) - $currentTime)/86400);

                    $inSubscriptionShelfList="yes";

                   
                    if ($subscriptionStatusShelf == 'Approved' AND strtotime($subscriptionExpiryShelf)-$currentTime>0) {
                    $_SESSION ['shelf-subscribed'] = "yes";
                    $shelfSubscribed=true;    
                    }

                    elseif ($subscriptionStatusShelf == 'Pending') {
                     $_SESSION ['pending-shelf-subscription'] = "yes";
                     $pendingShelfSubscription=true;

                   }     
               
                }

                if ($type=='Personal') {
                    if ($teacherRegistration) {
                        if ($inSubscriptionToolList && $inSubscriptionSellerList) {
                        $subscription = "disabled";
                        } 
                    }

                    if (!$teacherRegistration) {
                        if ($inSubscriptionToolList) {
                        $subscription = "disabled";
                        } 
                    }
                }
                
                if ($type=='School') {
                    if ($inSubscriptionShelfList) {
                    $subscription = "disabled";
                    }
                }
                


                //Check login status
                        
                        $sqlCheckLogin = "SELECT * FROM registrant_activities WHERE registrant_activityUserId= $registrantId ORDER BY registrant_activityId DESC LIMIT 1";
                        $sqlCheckLoginResult = mysqli_query($conn,$sqlCheckLogin);
                        $login=$sqlCheckLoginResult->fetch_assoc();

                        if ($login) {
                          $loginContent = $login['registrant_activityContent'];
                        }

                        if ($loginContent=='Logged out') {
                           session_destroy(); 
                           header('Location:'.$website.'/login/');
                        }

            } else {
                header('Location:'.INCLUDESPROCESSING_PATH.'/logout-processing.php');
            }

            
 } 
 
//THIS AREA IS FOR GETTING THE INFO OF THE REGISTRANT  BEING SEARCHED. 
$u= isset($_GET['u']) ? htmlspecialchars($_GET['u']) : "";
$uInfo="";


$showShared= isset($_GET['show-shared']) ? true : false;
$uInfo="";

 if ($u) {
   
        $sqlGetUInfo = "SELECT * FROM registrations WHERE registrantUsername = '$u'";
        $sqlGetUInfoResult = mysqli_query ($conn,$sqlGetUInfo);
        $uInfo = $sqlGetUInfoResult->fetch_assoc();

        if($uInfo) {
            $u_userId=$uInfo ['registrantId'];
            $u_username = $uInfo ['registrantUsername'];
            $u_firstName = $uInfo ['registrantFirstName'];
            $u_middleName = $uInfo ['registrantMiddleName'];
            $u_lastName = $uInfo ['registrantLastName'];
            $u_accountName = $uInfo ['registrantAccountName'];
            $u_registrantDescription = $uInfo ['registrantDescription'];


            $u_type = $uInfo['registrantAccountType'];
                $u_accountName = $uInfo['registrantAccountName'];

                $u_emailAddress = $uInfo['registrantEmailAddress'];
                $u_mobileNumber = $uInfo['registrantMobileNumber'];

                // $birthdate = date ("M j, Y",strtotime($myRecords['registrantBirthdate']));
                $u_birthdate = $uInfo['registrantBirthdate'];
                $u_gender = $uInfo['registrantGender'];
                $u_civilStatus = $uInfo['registrantCivilStatus'];

                $u_education = $uInfo['registrantEducationalAttainment'];
                $u_school = $uInfo['registrantSchool'];
                $u_occupation = $uInfo['registrantOccupation'];

                $u_street_subd_village = $uInfo ['registrantAddressStreet'];
                $u_barangay = $uInfo ['registrantAddressBarangay'];
                $u_city_municipality = $uInfo ['registrantAddressCity'];
                $u_province_state = $uInfo ['registrantAddressProvince'];
                $u_region = $uInfo ['registrantAddressRegion'];
                $u_country = $uInfo ['registrantAddressCountry'];
                $u_zipcode = $uInfo ['registrantAddressZipCode'];



             $u_profilePictureLink = $uInfo['registrantProfilePictureLink'] ? $privateFolder.$uInfo['registrantProfilePictureLink'] : $website."/assets/images/user.svg";
            $u_coverPhotoLink = $uInfo['registrantCoverPhotoLink'] ? $privateFolder.$uInfo['registrantCoverPhotoLink'] : $website."/assets/images/cover-photo.jpeg";

            $u_basicRegistration = $uInfo['registrantBasicAccount'];
                $u_teacherRegistration = $uInfo['registrantTeacherAccount'];
                $u_writerRegistration = $uInfo['registrantWriterAccount'];
                $u_editorRegistration = $uInfo['registrantEditorAccount'];
                $u_siteManagerRegistration = $uInfo['registrantSiteManagerAccount'];
                $u_dataAnalystRegistration = $uInfo['registrantDataAnalystAccount'];
                $u_developerRegistration = $uInfo['registrantDeveloperAccount'];
                $u_funderRegistration = $uInfo['registrantFunderAccount']; 


                $accounts = [];
              
                    if ($u_basicRegistration) {
                        array_push($accounts,$u_basicRegistration);
                    }

                    if ($u_teacherRegistration) {
                        array_push($accounts,$u_teacherRegistration);
                    }

                    if ($u_writerRegistration) {
                        array_push($accounts,$u_writerRegistration);
                    }
                    if ($u_editorRegistration) {
                        array_push($accounts,$u_editorRegistration);
                    }

                    if ($u_developerRegistration) {
                        array_push($accounts,$u_developerRegistration);
                    }

                    if ($u_siteManagerRegistration) {
                        array_push($accounts,$u_siteManagerRegistration);
                    }

                    if ($u_dataAnalystRegistration) {
                        array_push($accounts,$u_dataAnalystRegistration);
                    }

                    if ($u_funderRegistration) {
                        array_push($accounts,$u_funderRegistration);
                    }


                if ($u_userId===$registrantId) {
                    header('Location:'.$website.'/account/');
                } 
        } else {
            header('Location:'.$website);
        }

      
 }

 

if ($teacherRegistration || $writerRegistration || $editorRegistration || $siteManagerRegistration || $dataAnalystRegistration || $developerRegistration || $funderRegistration || $researchesRegistration) {
$haveOtherRegistration = true;
}


if ($teacherRegistration && $writerRegistration && $editorRegistration && $siteManagerRegistration && $dataAnalystRegistration && $developerRegistration && $funderRegistration) {
$haveAllRegistrations = true;
}



 
 //THIS AREA IS FOR PAGE RESULTS PAGINATION
 $resultsPerPage = 10; 


//THIS AREA IS INTENDED FOR REDIRECTION AUTO SET.
// if ($pageName=="Home") { 
//     if(!$loggedIn){
//     header('Location:'.$website.'/login/');
//     }
// }

// if ($pageName=="Teacher Files") { 
//     if(!$loggedIn){
//     header('Location:'.$website.'/login/');
//     }
// }

// if ($pageName=="Articles") { 
//     if(!$loggedIn){
//     header('Location:'.$website.'/login/');
//     }
// }

// if ($pageName=="Tools") { 
//     if(!$loggedIn){
//     header('Location:'.$website.'/login/');
//     }
// }

// if ($pageName=="Researches") { 
//     if(!$loggedIn){
//     header('Location:'.$website.'/login/');
//     }
// }

if ($pageName=="My Account") { 
    if(!$loggedIn){
    header('Location:'.$website.'/login/');
    }
}

if ($pageName=="File Purchase") { 
    if($loggedIn){
    header('Location:'.$website.'/login/');
    }
}



if ($pageName=="Messages") { 
    if(!$loggedIn){
    header('Location:'.$website.'/login/');
    } else {
        if(!$developerRegistration){
        header('Location:'.$website.'/account/');
        } 

    }
}

if ($pageName=="Notifications") { 
    if(!$loggedIn){
    header('Location:'.$website.'/login/');
    } else {
        if(!$developerRegistration){
    header('Location:'.$website.'/account/');
    }
    } 
}



if ($pageName=="Login") { 
    if ($loggedIn) {
    header('Location:'.$website.'/account/');
    }
}

if ($pageName=="Create Account") { 
     if ($loggedIn) {
    header('Location:'.$website.'/account/');
    }
}

if ($pageName=="Get Password Link") { 
     if ($loggedIn) {
    header('Location:'.$website.'/account/');
    }
}

if ($pageName=="Workspace - Teacher") {
    if (!$teacherRegistration) {
    header('Location:'.$website.'/account/');
    }   

    if ($fileToEdit && isset($_GET['query']) && !$query) {
    header('Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$fileToEdit);
    }
}

if ($pageName=="Workspace - Writer") {
    if (!$writerRegistration) {
    header('Location:'.$website.'/account/');
    }  

    if ($articleToEdit && isset($_GET['query']) && !$query) {
    header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleToEdit);
    }
}

if ($pageName=="Workspace - Editor") {
    if (!$editorRegistration) { 
    header('Location:'.$website.'/account/');
    }  

    if ($articleToEdit && isset($_GET['query']) && !$query) {
    header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleToEdit);
    }
}

if ($pageName=="Workspace - Site Manager") {
    if (!$siteManagerRegistration) {
    header('Location:'.$website.'/account/');
    }   
}

if ($pageName=="Workspace - Data Analyst") {
    if (!$dataAnalystRegistration) { 
    header('Location:'.$website.'/account/');
    }
}


if ($pageName=="Workspace - Developer") {
    if (!$developerRegistration) {
    header('Location:'.$website.'/account/');
    }   

    if ($toolToEdit && isset($_GET['query']) && !$query) {
    header('Location:'.$website.'/workspace/developer.php?edit=yes&tool='.$toolToEdit);
    }
}


if ($pageName=="Dashboard - Funder") {
    if (!$funderRegistration) {
    header('Location:'.$website.'/account/');
    }
    
}

if ($pageName=="School Workspace - Researches") {
    if ($type!='School') {
    header('Location:'.$website.'/account/');
    }  
}







if ($pageName =="Change Password") {
    $userIdReset = isset($_GET['userid']) ? htmlspecialchars($_GET['userid']) : "" ;
    $tokenReset = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : "" ;
    
    $sqlValidate = "SELECT * FROM registrations WHERE registrantId= '$userIdReset'";
    $sqlValidateResult = mysqli_query($conn,$sqlValidate);
    $validated = $sqlValidateResult->fetch_assoc();

    if ($validated) {
        $expiration = strtotime($validated['resetTokenHashExpiration']);
        $tokenHash = $validated['resetTokenHash'];

        if ($tokenReset==$tokenHash) {
                         
            if ($expiration-time()>0) {
                $_SESSION ['reset-now'] = "yes";

            } else {
                $_SESSION ['link-expired'] = "yes";
                header('Location:'.$website.'/get-password-reset-link/');

            }
            
        } else {
            $_SESSION['its-not-you'] = "yes";
            header('Location:'.$website.'/get-password-reset-link/');     
        }

    } else {
        $_SESSION['account-not-found'] = "yes";
        header('Location:'.$website.'/create-account/');
        
    }

}

































 ?>

<?php //----------------------------------------- HEAD------------------------------------------------?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $website.'/assets/images/eskquip-icon-new.png';?>">
    <title><?php echo $pageName?></title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

    <!-- include summernote css/js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <!-- include font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- include my website's own css -->
    <link rel="stylesheet" href="<?php echo $website.'/assets/css/styles.css'; ?>">
    <link rel="stylesheet" href="<?php echo $website.'/assets/css/media-queries.css'; ?>">

    

</head>



<?php 
    //THIS AREA IF FOR HANDLING ERRORS.
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    function customErrorHandler ($errno,$errstr,$errfile,$errline) {
        $message = "Error : [$errno] $errstr - $errfile : $errline";
        error_log($message .PHP_EOL,3, PUBLIC_PATH.'/error_log.txt');
    }

    set_error_handler("customErrorHandler");
?>


