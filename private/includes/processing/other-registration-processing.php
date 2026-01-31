<?php
require '../../initialize.php';
require '../../database.php';


if (isset($_POST['other_registration_submit'])) {

$regIdHidden = htmlspecialchars($_POST['other_registration_registrant_hidden_id']);
$regTypeHidden = strtolower(htmlspecialchars($_POST['other_registration_hidden_regtype']));
$regTypeHiddenCap = ucfirst($regTypeHidden);
$accountName = htmlspecialchars($_POST['other_registration_registrant_hidden_accountName']);

$licenseCertification = ''; 
$licenseCertificationFileName = ''; 
$licenseCertificationFileNameExt = ''; 
$licenseCertificationFileNameActualExt = ''; 
if ($regTypeHiddenCap ==  'Teacher') {
  if (isset($_FILES ['other_registration_license_certification'])) {
    $licenseCertification = $_FILES['other_registration_license_certification']; 
    $licenseCertificationFileName = $licenseCertification ['name'];
    $licenseCertificationFileNameExt = explode ('.',$licenseCertificationFileName);
    $licenseCertificationFileNameActualExt = strtolower(end($licenseCertificationFileNameExt));        
    
  }
}


$sample = '';
if ($regTypeHiddenCap ==  'Writer' || $regTypeHiddenCap ==  'Editor' || $regTypeHiddenCap ==  'Developer') {
$sample =htmlspecialchars($_POST['other_registration_sample']);
}

$agreement = ''; 
$agreementFileName = ''; 
$agreementFileNameExt = ''; 
$agreementFileNameActualExt = ''; 

if (isset($_FILES ['other_registration_agreement'])) {
$agreement = $_FILES['other_registration_agreement']; 
$agreementFileName = $agreement ['name'];
$agreementFileNameExt = explode ('.',$agreementFileName);
$agreementFileNameActualExt = strtolower(end($agreementFileNameExt));
}



$allowedExtLicenseCertification = ['pdf'];
$allowedExtAgreement = ['pdf'];
// $regTypeForSample = ['writer','editor','developer'];

$inputErrors = [];
$responses = [];

 

 if ($regTypeHiddenCap =='Teacher'){
    if (empty($licenseCertificationFileName)) {
      $error = "Please provide  your license or certification.";
      array_push($inputErrors,$error);
      array_push($responses,$error);
    } else{
      if (!in_array($licenseCertificationFileNameActualExt,$allowedExtLicenseCertification)) {
        $error = "Invalid format for license or cetification.";
      array_push($inputErrors,$error);
      array_push($responses,$error);
        }
    }
  }

if ($regTypeHiddenCap ==  'Writer' || $regTypeHiddenCap ==  'Editor' || $regTypeHiddenCap ==  'Developer'){
  if (empty($sample)) {
    $error = "Please provide a sample";
    array_push($inputErrors,$error);
    array_push($responses,$error);
  }
          
}


 if (empty($agreementFileName)) {
    $error = "Please attach an agreement.";
    array_push($inputErrors,$error);
    array_push($responses,$error);
} else{
    if (!in_array($agreementFileNameActualExt,$allowedExtAgreement)) {
      $error = "Invalid format for agreement.";
    array_push($inputErrors,$error);
    array_push($responses,$error);
      }
}





if (!$inputErrors) {
  $checkRegistrant = "SELECT * FROM other_registrations WHERE otherUserId = $regIdHidden AND otherType='$regTypeHiddenCap'";
  $checkRegistrantResult = mysqli_query($conn,$checkRegistrant);
  $recordedRegistration = $checkRegistrantResult->fetch_assoc();

  if (!$recordedRegistration) {
        $licenseCertificationFileLink = '';
        if ($regTypeHiddenCap == 'Teacher') {
          if ($licenseCertificationFileName) {
            $licenseCertificationFolder = '../../uploads/registration/'.$regTypeHidden.'/license-certification/';

            if (!is_dir($licenseCertificationFolder)) {
                mkdir($licenseCertificationFolder, 0777, true);
            }

            $licenseCertificationFile = $licenseCertificationFolder.str_replace(' ','-',$accountName)."-".date("YmdHis",time()).".".$licenseCertificationFileNameActualExt;

            $uploadOk = 1;

            if (move_uploaded_file($licenseCertification["tmp_name"], $licenseCertificationFile)) {
                $uploadOk = 1;
            } 

            $licenseCertificationFileLink= substr($licenseCertificationFile,5);
            }  

          }
         
        
        
          if ($regTypeHiddenCap ==  'Writer' || $regTypeHiddenCap ==  'Editor' || $regTypeHiddenCap ==  'Developer'){
            if ($sample) {
              $sample = $sample;
              }      
          }
       


        $agreementFolder = '../../uploads/registration/'.$regTypeHidden.'/agreement/';

        if (!is_dir($agreementFolder)) {
            mkdir($agreementFolder, 0777, true);
        }

        $agreementFile = $agreementFolder.str_replace(' ','-',$accountName)."-".date("YmdHis",time()).".".$agreementFileNameActualExt;
 
        $uploadOk = 1;

        if (move_uploaded_file($agreement["tmp_name"], $agreementFile)) {
            $uploadOk = 1;
        }

        $agreementFileLink= substr($agreementFile,5);

        $sqlRegister = "INSERT INTO other_registrations(otherUserId,otherType,otherLicenseCertification,otherSample,otherAgreement) VALUES ( ?, ?, ?, ?,?)";

        $stmt =$conn->prepare( $sqlRegister);

        $stmt ->bind_param("sssss", $regIdHidden,$regTypeHiddenCap,$licenseCertificationFileLink,$sample,$agreementFileLink);

        $stmt-> execute();      

        echo 'Registration Sent';

  } else {
        echo 'You have an existing registration.';
  }


} else {

     foreach ($responses as $response) {
                echo $response ."<br>";         
    }   
    
}

        

 }




