<?php
require '../../initialize.php';
require '../../database.php';





if (isset($_POST['promotion_submit'])) {

$promotionId = htmlspecialchars($_POST['promotion_id']);

$promotionNameCompany = htmlspecialchars($_POST['promotion_name_company']);
$promotionTitle = htmlspecialchars($_POST['promotion_title']);
$promotionType = htmlspecialchars($_POST['promotion_type']);
$promotionTopics = htmlspecialchars($_POST['promotion_topics']);
$promotionDescription = htmlspecialchars($_POST['promotion_description']);
$promotionLink = htmlspecialchars($_POST['promotion_link']);
$promotionDuration = htmlspecialchars($_POST['promotion_duration']);
$promotionAmount = htmlspecialchars($_POST['promotion_amount']);

$promotionImageLink = htmlspecialchars($_POST['promotion_image_link']);
$promotionAgreementLink = htmlspecialchars($_POST['promotion_agreement_link']);

$promotionImage = '';
$promotionImageFileName= '';
$promotionImageFileNameExt = '';
$promotionImageFileNameActualExt = '';

if (isset($_FILES['promotion_image'])) {
  $promotionImage = $_FILES ['promotion_image'];
  $promotionImageFileName= $promotionImage ['name'];
  $promotionImageFileNameExt = explode ('.',$promotionImageFileName);
  $promotionImageFileNameActualExt = strtolower(end($promotionImageFileNameExt));
}

$promotionAgreement = '';
$promotionAgreementFileName= '';
$promotionAgreementFileNameExt = '';
$promotionAgreementFileNameActualExt = '';

if (isset($_FILES['promotion_agreement'])) {
  $promotionAgreement = $_FILES ['promotion_agreement'];
  $promotionAgreementFileName= $promotionAgreement ['name'];
  $promotionAgreementFileNameExt = explode ('.',$promotionAgreementFileName);
  $promotionAgreementFileNameActualExt = strtolower(end($promotionAgreementFileNameExt));
}

$allowedExtPromotionImage = ['jpeg','jpg'];
$allowedExtPromotionAgreement = ['pdf'];

$promotionErrors = [];
$responses = [];


if (!$promotionNameCompany) {
  $error= "Please provide a person's or company's name.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionTitle) {
  $error= "Please provide a title.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionType) {
  $error= "Please select a type.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionTopics) {
  $error= "Please provide at least one topic.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionDescription) {
  $error= "Please provide a description.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionLink) {
  $error= "Please provide a link.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionDuration) {
  $error= "Please provide a duration.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionAmount) {
  $error= "Please provide an amount.";
  array_push($promotionErrors,$error);
  array_push($responses,$error);
}

if (!$promotionId) {

  if (!$promotionImageFileName) {
    $error= "Please upload the image.";
    array_push($promotionErrors,$error);
    array_push($responses,$error);
  }

  if (!$promotionAgreement) {
    $error= "Please upload the agreement.";
    array_push($promotionErrors,$error);
    array_push($responses,$error);
  }

}



if (!$promotionErrors) {

  $promotionDate = dcomplete_format ($currentTime);
  $promotionExpiry = dcomplete_format($currentTime + (86400 * $promotionDuration));

  $slugNameCompany = str_replace(" ","_",strtolower($promotionNameCompany));
  $promotionStatus = "Draft";

  $promotionImageFileLink = $promotionImageLink;

  if ($promotionImageFileName)  {
      $promotionImageFolder = '../../uploads/promotion/image/';

      if (!is_dir($promotionImageFolder)) {
        mkdir($promotionImageFolder, 0777, true);
    }

    $promotionImageFile = $promotionImageFolder.$slugNameCompany."-".date("YmdHis",time()).".".$promotionImageFileNameActualExt;

    if (move_uploaded_file($promotionImage["tmp_name"], $promotionImageFile)) {
      $uploadOk = 1;
    }

    $promotionImageFileLink= substr($promotionImageFile,5);
  } 

  

  $promotionAgreementFileLink= $promotionAgreementLink;
  if ($promotionAgreementFileName) {
    $promotionAgreementFolder = '../../uploads/promotion/agreement/'; 

    if (!is_dir($promotionAgreementFolder)) {
        mkdir($promotionAgreementFolder, 0777, true);
    }

    $promotionAgreementFile = $promotionAgreementFolder.$slugNameCompany."-".date("YmdHis",time()).".".$promotionAgreementFileNameActualExt;

    $uploadOk = 1;

    if (move_uploaded_file($promotionAgreement["tmp_name"], $promotionAgreementFile)) {
      $uploadOk = 1;
    }
       
    $promotionAgreementFileLink= substr($promotionAgreementFile,5);

  } 
    


    $sqlAddPromotion = "INSERT INTO promotions (promotionNameCompany,promotionTitle,promotionType, promotionTopics,promotionDescription,promotionImage,promotionLink,promotionDuration,promotionAmount,promotionStatus,promotionAgreement) VALUES ( ?, ?, ?, ?,?,?,?,?,?,?,?)";

    $stmt =$conn->prepare($sqlAddPromotion);

    $stmt ->bind_param("sssssssssss", $promotionNameCompany,$promotionTitle,$promotionType,$promotionTopics,$promotionDescription,$promotionImageFileLink,$promotionLink,$promotionDuration,$promotionAmount,$promotionStatus,$promotionAgreementFileLink);

    $stmt-> execute();

    echo 'Promotion Sent';
   
} else {
  foreach ($responses as $response) {
            echo $response."<br>";
            }
}

           
 


}

