<?php
require '../../initialize.php';
require '../../database.php';





if (isset($_POST['register'])) {

$regIdHidden = isset ($_POST['regIdHidden']) ? htmlspecialchars($_POST['regIdHidden']) : "";
$regTypeHidden = isset ($_POST['regTypeHidden']) ? htmlspecialchars($_POST['regTypeHidden']) :"";
$regTypeHiddenCap = ucfirst($regTypeHidden);
$accountName = isset ($_POST['accountNameHidden']) ? htmlspecialchars($_POST['accountNameHidden']) : "";


// $goBackURL = 'Location:'.$website.'/account/?other-registration=enabled&regtype='.$regTypeHidden;



$licenseCertification = $_FILES['licenseCertification']; 
$licenseCertificationFileName = $licenseCertification ['name'];
$licenseCertificationFileNameExt = explode ('.',$licenseCertificationFileName);
$licenseCertificationFileNameActualExt = strtolower(end($licenseCertificationFileNameExt));

$sample = isset ($_POST['sample']) ? htmlspecialchars($_POST['sample']) : "";


$agreement = $_FILES['agreement']; 
$agreementFileName = $agreement ['name'];
$agreementFileNameExt = explode ('.',$agreementFileName);
$agreementFileNameActualExt = strtolower(end($agreementFileNameExt));


$allowedExtLicenseCertification = ['pdf'];

$allowedExtAgreement = ['pdf'];

$otherRegistrationErrors = [];

if ($regTypeHidden == 'teacher' && empty($licenseCertification['name'])){
  
      $_SESSION ['license-certification-empty'] = "yes";
      array_push($otherRegistrationErrors,'Empty license or certification');
      header ($goBackURL);
      
} else {
  if ($regTypeHidden == 'teacher' && !in_array($licenseCertificationFileNameActualExt,$allowedExtLicenseCertification)) {
      $_SESSION ['license-certification-invalid-format'] = "yes";
      array_push($otherRegistrationErrors,'Not accepted format for license or certification');
       header ($goBackURL);
      } 
}

$regTypeForSample = ['writer','editor','developer'];

if (in_array($regTypeHidden,$regTypeForSample) && empty($sample)){
  
      $_SESSION ['sample-empty'] = "yes";
      array_push($otherRegistrationErrors,'Empty sample');
      header ($goBackURL);
      
} 


if ($regTypeHidden && empty($agreementFileName)){
  
      $_SESSION ['agreement-empty'] = "yes";
      array_push($otherRegistrationErrors,'Empty agreement');
      header ($goBackURL);
      
} else {
   if (!in_array($agreementFileNameActualExt,$allowedExtAgreement)) {
      $_SESSION ['agreement-invalid-format'] = "yes";
      array_push($otherRegistrationErrors,'Not accepted format for agreement');
       header ($goBackURL);
      }
}



if (!$otherRegistrationErrors) {

  $checkRegistrant = "SELECT * FROM other_registrations WHERE otherUserId = $regIdHidden AND otherType='$regTypeHiddenCap'";
  $checkRegistrantResult = mysqli_query($conn,$checkRegistrant);
  $recordedRegistration = $checkRegistrantResult->fetch_assoc();

  if (!$recordedRegistration) {


       
       
      if ($licenseCertificationFileName) {

         $licenseCertificationFolder = '../../uploads/registration/'.$regTypeHidden.'/license-certification/';
       

        if (!is_dir($licenseCertificationFolder)) {
            mkdir($licenseCertificationFolder, 0777, true);
        }

        $licenseCertificationFile = $licenseCertificationFolder.$accountName."-".date("YmdHis",time()).".".$licenseCertificationFileNameActualExt;

        $uploadOk = 1;

         if (move_uploaded_file($_FILES['licenseCertification']["tmp_name"], $licenseCertificationFile)) {
            $uploadOk = 1;
        } 

        $licenseCertificationFileLink= substr($licenseCertificationFile,5);

        } else {
          $licenseCertificationFileLink="";
        }
        


        $agreementFolder = '../../uploads/registration/'.$regTypeHidden.'/agreement/';

        if (!is_dir($agreementFolder)) {
            mkdir($agreementFolder, 0777, true);
        }

        $agreementFile = $agreementFolder.$accountName."-".date("YmdHis",time()).".".$agreementFileNameActualExt;
 
        $uploadOk = 1;

        if (move_uploaded_file($_FILES['agreement']["tmp_name"], $agreementFile)) {
            $uploadOk = 1;
        }

        $agreementFileLink= substr($agreementFile,5);



        $sqlRegister = "INSERT INTO other_registrations(otherUserId,otherType,otherLicenseCertification,otherSample,otherAgreement) VALUES ( ?, ?, ?, ?,?)";

        $stmt =$conn->prepare( $sqlRegister);

        $stmt ->bind_param("sssss", $regIdHidden,$regTypeHiddenCap,$licenseCertificationFileLink,$sample,$agreementFileLink);

        $stmt-> execute();      

        // header('Location:'.$website.'/account/');

  

  } else {
        
    $_SESSION ['other-reg-on-record'] = "yes";
  // header ($goBackURL);
  }


} else {

    echo "There was an error with the files.";
}

        

 


}

