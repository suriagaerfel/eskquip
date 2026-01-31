<!------------------------------------------- INITIALIZAIONS-------------------------------------------->
<?php

//Initializing the paths.
require '../../private/initialize.php'; 

//Set the page name
$pageName = "File Purchase";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');

$purchaserPaymentChannel = isset ($_SESSION['paymentChannel']) ? $_SESSION['paymentChannel'] : "";
$referenceNumber = isset ($_SESSION['referenceNumber']) ? $_SESSION['referenceNumber'] : "";
$ownerSellerSubscribed=false;





$purchaseFileId = isset($_GET['file-id']) ? $_GET['file-id'] : "";

//Get the file info
$sqlPurchaseFileInfo = "SELECT * FROM teacher_files WHERE teacher_fileId = '$purchaseFileId'";
$sqlPurchaseFileInfoResult = mysqli_query($conn,$sqlPurchaseFileInfo);
$purchaseFileInfo = $sqlPurchaseFileInfoResult->fetch_assoc();

if ($purchaseFileInfo) {
$fileAmount = $purchaseFileInfo ['teacher_fileAmount'];
$fileTitle= $purchaseFileInfo ['teacher_fileTitle'];
$fileAccess=$purchaseFileInfo ['teacher_fileAccessType'];
$purchaseFileOwnerId = $purchaseFileInfo ['teacher_fileOwner'];//File owner
} else {
    header ('Location:'.$website.'/teacher-files/');
}

if ($fileAccess=='Free' || $fileAccess=='Subscription') {
    header ('Location:'.$website.'/teacher-files/?title='.urlencode($fileTitle));
}
//Check the seller subscription of the file owner
$sqlOwnerSellerSubscription = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $purchaseFileOwnerId AND registrant_subscriptionType='Seller' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                $sqlOwnerSellerSubscriptionResults = mysqli_query($conn,$sqlOwnerSellerSubscription);
                $ownerSellerSubscription = $sqlOwnerSellerSubscriptionResults->fetch_assoc();


                if ($ownerSellerSubscription) {
                    $ownerSellerSubscriptionStatus = $ownerSellerSubscription ['registrant_subscriptionStatus'];
                    $ownerSellerSubscriptionExpiry = $ownerSellerSubscription['registrant_subscriptionExpiry'];


                   
                    if ($ownerSellerSubscriptionStatus == 'Approved' AND strtotime($ownerSellerSubscriptionExpiry)-$currentTime>0) {
                    $_SESSION ['seller-subscribed'] = "yes";
                    $ownerSellerSubscribed=true;    
                    }    
               
                }


//Get the file owner's info
$ownerPaymentChannel="";
$ownerBankAccountName="";
$ownerBankAccountNumber="";
$ownerReviewSchedules="";

$qslOwnerInfo = "SELECT * FROM registrations WHERE registrantId = '$purchaseFileOwnerId'";
$sqlOwnerInfoResult = mysqli_query($conn,$qslOwnerInfo);
$ownerInfo = $sqlOwnerInfoResult->fetch_assoc();

if($ownerInfo) {
    $ownerId=$ownerInfo['registrantUserId'];
    $ownerPaymentChannel=$ownerInfo['registrantPaymentChannel'];
    $ownerBankAccountName=$ownerInfo['registrantBankAccountName']; 
    $ownerBankAccountNumber=$ownerInfo['registrantBankAccountNumber'];
    $ownerReviewSchedules=$ownerInfo['registrantReviewSchedules'];  
}




//Check the purchase record of the logged in registrant
$registrantPurchaseStatus = "";
$sqlRegistrantPurchase = "SELECT * FROM file_purchase WHERE file_purchasePurchaserUserId = '$registrantId' AND file_purchaseFileId = '$purchaseFileId' ORDER BY file_purchaseId DESC LIMIT 1";
$sqlRegistrantPurchaseResult = mysqli_query($conn,$sqlRegistrantPurchase);
$registrantPurchase = $sqlRegistrantPurchaseResult->fetch_assoc();

if ($registrantPurchase) {
    $registrantPurchaseStatus= $registrantPurchase ['file_purchaseStatus'];
}


?>
<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="file-purchase-page"class="page with-sidebars-page with-single-sidebar-page" >
  
    <div class="page-details page-details-single-sidebar purchase-details" >

    <?php if($ownerSellerSubscribed && $fileAccess=='Purchased') { ?>
        <div class="purchase-notes">
                
            <small>Please send your payment to the owner's bank details shown below and fill-out the form.</small>

            <hr>
            <p>Payment Channel: <?php  echo  $ownerPaymentChannel?></p><br>
            <p>Account Name: <?php  echo  $ownerBankAccountName?></p><br>
            <p>Account Number: <?php  echo  $ownerBankAccountNumber?></p><br>
            <hr>

            <small>After the form submission, wait for the owner to review your purchase on this schedule: <?php echo '<strong>'.$ownerReviewSchedules.'</strong>'?>.</small><br><br>

            <small>Seller subscription of the owner is active until <?php echo '<strong>'.dcomplete_format($ownerSellerSubscriptionExpiry).'</strong>'?>.</small><br><br>

            <small>Please be noted that the owner still holds the copyright of the file, unless changes have been done by the purchaser. Continuing with the purchase means that you agree with this term.</small>

        </div>
    
        <?php if (!$registrantPurchase) {?>
       
        <form action="../../private/includes/processing/file-purchase-processing.php" method="post"  enctype="multipart/form-data" id="purchase-form">

                <?php 
                if (isset($_SESSION ['payment-channel-empty'])) {
                    echo "<div class='alert alert-danger'>Please select a payment channel.</div>";
                    unset ($_SESSION ['payment-channel-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['reference-number-empty'])) {
                    echo "<div class='alert alert-danger'>Please provide a reference number.</div>";
                    unset ($_SESSION ['reference-number-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['proof-of-payment-empty'])) {
                    echo "<div class='alert alert-danger'>Please attach your proof of payment.</div>";
                    unset ($_SESSION ['proof-of-payment-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['proof-of-payment-invalid-format'])) {
                    echo "<div class='alert alert-danger'>Only JPEG, JPG, PDF and DOCX formats are accepted for your proof of payment.</div>";
                    unset ($_SESSION ['proof-of-payment-invalid-format']);
                }?>
            <div >
            <input type="text"  value="<?php echo $fileTitle?>" disabled>
            <input type="text"  value="<?php echo  '₱'.$fileAmount?>" disabled>
            <input type="text" name="fileAmount" value="<?php echo $fileAmount?>" hidden>
            <input type="text" name="purchaserIdHidden" value="<?php echo $registrantId?>" hidden>
            <input type="text" name="ownerIdHidden" value="<?php echo $purchaseFileOwnerId?>" hidden>
            <input type="text" name="fileIdHidden" value="<?php echo $purchaseFileId?>" hidden>

            <select name="paymentChannel">
                <option value="" hidden>Your Payment Channel</option>
                <option value="GCASH" <?php if ($purchaserPaymentChannel=='GCASH') {echo 'selected';}?>>GCASH</option>
                <option value="Other" <?php if ($purchaserPaymentChannel=='Other') {echo 'selected';}?>>Other</option>
            </select>

            <input type="text" name="referenceNumber" placeholder="Your Reference Number" value="<?php echo $referenceNumber?>">
            <label for="proofOfPayment">Proof of Payment [JPEG, JPG, PDF or DOCX format]</label>
            <input type="file" name="proofOfPayment" id="payment-proof">
            
            </div>
            <button type="submit" name="submitPurchase">Submit</button>
            </form>
  
        <?php } ?>

        <?php if ($registrantPurchase) {?>
        <div  class="purchase-update">
            <?php if ($registrantPurchaseStatus=='Pending') { ?>
            <small>Your purchase is currently under review.</small><br>
            <small>Access to the file will be automatically activated once approved.  </small>
            <?php } ?>

            <?php if ($registrantPurchaseStatus=='Approved') { ?>
            <small>You purchase of the file has been approved.</small><br>
            <?php } ?>
        
        </div>
    <?php } ?>


    <?php } ?>



    <?php if(!$ownerSellerSubscribed) { ?>
    <div>
        <p>
            The file owner is currently not subscribed to seller subscription. Your purchase won't be possible this time. 
        </p>
        <br>
        <p>
            However, you can message the owner <a href="">here</a> if you badly need the file.
        </p>
    </div>
    
    <?php } ?>
    
    
  

    







   







    </div>



    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>


</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>
