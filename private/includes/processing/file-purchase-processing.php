<?php

  require '../../initialize.php';
require '../../database.php';

if (isset($_POST['submitPurchase'])) {

   $fileId = htmlspecialchars($_POST ['fileIdHidden']);
  $purchaserId = htmlspecialchars($_POST['purchaserIdHidden']);
  $ownerId = htmlspecialchars($_POST['ownerIdHidden']);
  $fileAmount = htmlspecialchars($_POST ['fileAmount']);
  $paymentChannel = htmlspecialchars($_POST ['paymentChannel']);
  $referenceNumber= htmlspecialchars($_POST['referenceNumber']);
  $purchaseStatus = 'Pending';

  $_SESSION ['paymentChannel'] = $paymentChannel;
  $_SESSION ['referenceNumber'] = $referenceNumber;

   $proofOfPayment = $_FILES ['proofOfPayment'];
  $proofOfPaymentFileName = $proofOfPayment ['name'];
  $proofOfPaymentFileNameFileNameExt = explode ('.',$proofOfPaymentFileName);
  $proofOfPaymentFileNameActualExt = strtolower(end($proofOfPaymentFileNameFileNameExt));
  $allowedExtsProofOfPayment = ['jpeg', 'jpg', 'pdf', 'docx'];

  $goBackURL= 'Location:'.$website.'/file-purchase/'.$fileId;

  $purchaseErrors=[];

  if (empty($paymentChannel)) {
    array_push($purchaseErrors,'Payment channel empty');
    $_SESSION ['payment-channel-empty'] ="yes";
    header($goBackURL);
  } 

  if (empty($referenceNumber)) {
    array_push($purchaseErrors,'Reference number empty');
    $_SESSION ['reference-number-empty']="yes";
    header($goBackURL);
  } 

  if (empty($proofOfPaymentFileName)) {
    array_push($purchaseErrors,'Proof of payment empty');
    $_SESSION ['proof-of-payment-empty']="yes";
    header($goBackURL);
  } else {
    if (!in_array($proofOfPaymentFileNameActualExt,$allowedExtsProofOfPayment)) {
      array_push($purchaseErrors,"Invalid format proof of payment");
      $_SESSION ['proof-of-payment-invalid-format'] = "yes";
      header($goBackURL); 
      } 

  }

  
  


  if (!$purchaseErrors) {
    $proofOfPaymentFolder = '../../uploads/file-purchase/proof/';
            
                if (!is_dir($proofOfPaymentFolder)) { 
                mkdir($proofOfPaymentFolder, 0777, true);
                }

                $proofOfPaymentFile = $proofOfPaymentFolder ."userid-".$purchaserId."-".date("YmdHis",time()).".".$proofOfPaymentFileNameActualExt;

                $uploadOk = 1;

              
              if (move_uploaded_file($_FILES['proofOfPayment']["tmp_name"], $proofOfPaymentFile)) {
                  $uploadOk = 1;
              } 

                $proofOfPaymentLink= substr($proofOfPaymentFile,5);

                
                $sql = "INSERT INTO file_purchase (file_purchaseFileId,file_purchaseAmount,file_purchasePurchaserUserId,file_purchaseFileOwnerId,file_purchasePaymentChannel,file_purchaseReferenceNumber,file_purchaseStatus,file_purchaseProofLink) VALUES (?, ?, ?, ?,?,?,?,?)";

                $stmt =$conn->prepare($sql);

                $stmt ->bind_param("sissssss", $fileId, $fileAmount,$purchaserId,$ownerId,$paymentChannel,$referenceNumber,$purchaseStatus,$proofOfPaymentLink);

                $stmt-> execute();

                unset($_SESSION ['paymentChannel']);
                unset($_SESSION ['referenceNumber']);

                header('Location:'.$website.'/teacher-files/');
  }





}