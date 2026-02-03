<?php if (!$query) {
$getTeacherFiles = "SELECT * FROM teacher_files WHERE teacher_fileOwner = $registrantId ORDER BY teacher_fileUpdateDate DESC";
}

if ($query) {
    $getTeacherFiles = "SELECT * FROM teacher_files WHERE teacher_fileTitle LIKE '%$query%' AND teacher_fileOwner = $registrantId ORDER BY teacher_fileUpdateDate DESC";
}


$getTeacherFilesResult = mysqli_query($conn,$getTeacherFiles); ?>


<div id="files-teacher" class="workspace-sidebar workspace-sidebar-content-list-container">
    <h5>Teacher Workspace</h5>

    <?php if ($sellerSubscribed) {?>

    <span id="show-bank-details-button" class="link-tag-button">Show Bank Details</span>
    <span id="show-review-schedules-button" class="link-tag-button">Show Review Schedules</span>

    <?php if ($sqlFilePurchasesResult->num_rows>0) {?>

        <?php if (!$showPurchases && !$fileToEdit){?>
            <a id="show-file-purchases-button" class="link-tag-button" href="?show-purchases=enabled">Show Purchases</a>
        <?php } ?>

        <?php if ($showPurchases && !$fileToEdit){?>
            <a id="show-file-purchases-button" class="link-tag-button" href="/public/workspace/teacher.php">Hide Purchases</a>
        <?php } ?>

        <?php if (!$showPurchases && $fileToEdit){?>
            <a id="show-file-purchases-button" class="link-tag-button" href="<?php echo '?edit=yes&file='.$fileToEdit.'&show-purchases=enabled'?>">Show Purchases</a>
        <?php } ?>
        
        <?php if ($showPurchases && $fileToEdit){?>
            <a id="show-file-purchases-button" class="link-tag-button" href="<?php echo '?edit=yes&file='.$fileToEdit?>">Hide Purchases</a>
        <?php } ?>

    <?php } ?>

    <form action="../../private/includes/processing/update-details-processing.php" id="bank-details" method="post">
        <input type="text" name="teacherIdHidden" value="<?php echo $registrantId?>"hidden>
        <input type="text" name="fileIdHidden" value="<?php echo $fileToEdit?>"hidden>

        <input type="text" name="paymentChannel" placeholder="Payment Channel" value="<?php echo $paymentChannel?>">
        <input type="text" name="accountName" placeholder="Account Name" value="<?php echo $bankAccountName?>">
        <input type="text" name="accountNumber" placeholder="Account Number" value="<?php echo $bankAccountNumber?>">
        <button tyle="submit" name="updateBankDetails">Update Bank Details</button>
    </form>

    <form action="../../private/includes/processing/update-details-processing.php" id="review-schedules" method="post">
        <input type="text" name="teacherIdHidden" value="<?php echo $registrantId?>"hidden>
        <input type="text" name="fileIdHidden" value="<?php echo $fileToEdit?>"hidden>
        <input type="text" name="reviewSchedules" placeholder="Type your schedule to review purchases..." value="<?php echo $reviewSchedules?>">
        <button tyle="submit" name="updateReviewSchedules">Update Schedules</button>
    </form>

    <?php if($showPurchases=='enabled') {?>
    <div id="file-purchases">
        <?php if($sqlFilePurchasesResult->num_rows > 0) {
            while ($filePurchase = $sqlFilePurchasesResult->fetch_assoc()) { 
            $filePurchaseId = $filePurchase ['file_purchaseId'];
            $filePurchaseTimestamp = dcomplete_format($filePurchase ['file_purchaseTimestamp']);
            $filePurchaseFileId = $filePurchase ['file_purchaseFileId']; 
            
            if ($filePurchaseFileId) {
                $sqlfilePurchaseInfo = "SELECT * FROM teacher_files WHERE teacher_fileId = $filePurchaseFileId";
                $sqlfilePurchaseInfoResult = mysqli_query($conn,$sqlfilePurchaseInfo);
                $filePurchaseInfo = $sqlfilePurchaseInfoResult->fetch_assoc();
            }

            $filePurchaseTitle = $filePurchaseInfo ['teacher_fileTitle'];
            $filePurchaseAmount = $filePurchaseInfo ['teacher_fileAmount'];

            $filePurchasePurchaserId = $filePurchase ['file_purchasePurchaserUserId'];

            if ($filePurchasePurchaserId) {
                $sqlFilePurchaser = "SELECT * FROM registrations WHERE registrantId = $filePurchasePurchaserId";
                $filePurchaserResult = mysqli_query($conn,$sqlFilePurchaser);
                $filePurchaser = $filePurchaserResult->fetch_assoc();
            }

            $filePurchaserAccountName = $filePurchaser ['registrantAccountName'];
            $filePurchasePaymentChannel = $filePurchase ['file_purchasePaymentChannel'];
            $filePurchaseReferenceNumber = $filePurchase ['file_purchaseReferenceNumber'];
            $filePurchaseProofLink = $privateFolder.$filePurchase ['file_purchaseProofLink'];
            $filePurchaseStatus = $filePurchase ['file_purchaseStatus'];

        ?>
        <div id="purchase-item">
            <p>Timestamp : <?php echo $filePurchaseTimestamp ;?></p>
            <p>File : <?php echo $filePurchaseTitle;?></p><br>
            <p>Purchaser : <?php echo $filePurchaserAccountName;?></p>
            <p>Amount : <?php echo '₱'.$filePurchaseAmount;?></p>
            <p>Payment Channel : <?php echo $filePurchasePaymentChannel ;?></p>
            <p>Reference Number : <?php echo $filePurchaseReferenceNumber ;?></p>
            <p>Proof Link : <a href="<?php echo $filePurchaseProofLink ;?>">Click Here</a></p>
            <p>Status : <?php echo $filePurchaseStatus ;?></p>
            <div class="list-buttons-container">  
                <?php if ($filePurchaseStatus =='Pending') {?>         
                <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-file-purchase-processing.php?purchase-id='.$filePurchaseId.'&action=approve'?>">Approve</a>
                
                <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-file-purchase-processing.php?purchase-id='.$filePurchaseId.'&action=reject'?>">Reject</a>
                <?php } ?>
            </div>
        </div>
       
        <?php }
        }?>
   
    </div>
    <?php } ?>


    <?php if (isset($_SESSION['payment-updated'])){         
        echo "<div class='alert alert-success' id='payment-pop-up'>Bank details are updated successfully.</div>";
        unset ($_SESSION['payment-updated']);
    }?>

    <?php if (isset($_SESSION['schedules-updated'])){         
        echo "<div class='alert alert-success' id='payment-pop-up'>Schedules are updated successfully.</div>";
        unset ($_SESSION['schedules-updated']);
    }?>

    <?php } ?>

    <?php if (!$sellerSubscribed && !$pendingSellerSubscription) {?>
    <a class="link-tag-button" href="<?php echo $website.'/account/?subscription=enabled'?>">Have a seller subscription to sell your files.</a> 
    <?php } ?>

    <?php if (!$sellerSubscribed && $pendingSellerSubscription) {?>
        <a class="link-tag-button" href="<?php echo $website.'/account/?subscription=enabled'?>">You seller subscription is currently pending.</a>
        
    <?php } ?>

    <hr>


    <?php if($getTeacherFilesResult->num_rows > 0) { 
    while($teacherFile=$getTeacherFilesResult->fetch_assoc()) {
    $fileId = $teacherFile ['teacher_fileId'];
    $fileTitle = $teacherFile ['teacher_fileTitle'];
    $fileSlug = $teacherFile ['teacher_fileSlug'];
    $fileCategory = $teacherFile ['teacher_fileCategory'];
    $fileDescription = $teacherFile ['teacher_fileDescription'];
    $fileImage = $teacherFile ['teacher_fileImage'];
    
    if (strlen($fileDescription)>150) {
            $fileDescription = substr($fileDescription,0,150).'...';    
        } else {
        $fileDescription = $fileDescription; 
    }

    $fileStatus = $teacherFile ['teacher_fileStatus'];
    $fileAccessType = $teacherFile ['teacher_fileAccessType'];
    $fileForSale = $teacherFile ['teacher_fileForSale'];
    $fileAmount = $teacherFile ['teacher_fileAmount'];
    $fileUploadDate = $teacherFile ['teacher_fileUploadDate'];
    $filePubDate = $teacherFile ['teacher_filePubDate'];
    $fileUpdateDate = $teacherFile ['teacher_fileUpdateDate'];
    ?>

    <p><?php echo 'Title: '.$fileTitle;?></p>
    <p><?php echo 'Category: '.$fileCategory;?></p>
    <p><?php echo 'Description: '.nl2br($fileDescription);?></p>
    <p><?php echo 'Access Type: '.$fileAccessType;?></p>

    <?php if ($sellerSubscribed) {?>
    <p><?php echo 'Amount: '.$fileAmount;?></p>
    <?php }?>

    <p><?php echo 'Status: '.$fileStatus;?></p>
    <p><?php echo 'Uploaded: '.dcomplete_format($fileUploadDate);?></p>
    <?php if ($filePubDate!='0000-00-00 00:00:00'){?>
    <p><?php echo 'Published: '.dcomplete_format($filePubDate);?></p>
    <?php } ?>
    <p><?php echo 'Updated: '.dcomplete_format($fileUpdateDate);?></p>

    
    <?php if ($fileId!=$fileToEdit) {?>
      <div class="workspace-sidebar-content-list-buttons">  
            <?php if ($fileStatus != 'Published') {?>
                <a class="link-tag-button" href="<?php echo $website.'/workspace/teacher.php?edit=yes&file='.$fileId?>" title="Edit">Edit</a>
            <?php } ?>

            <?php if($fileStatus=='Published') { ?>
                <a class="link-tag-button" href="<?php echo $website.'/teacher-files/'.$fileSlug;?>" title="View">View</a>
            <?php } ?>

            <?php if($fileStatus!='Published') { ?>
                <a class="link-tag-button" href="<?php echo $website.'/teacher-files/'.$fileSlug.'?preview=yes';?>" title="Preview">Preview</a>
            <?php } ?>

        </div>
        
        <?php if(!$fileImage) {?>
            <small class="small-text">No thumbnail</small>
        <?php }?>
        
        <?php if ($sellerSubscribed) { ?>
         <?php $toUpdate = [];

            if (!$paymentChannel) {
                array_push( $toUpdate,'Payment Channel');
            }

            if (!$bankAccountName) {
                array_push( $toUpdate,'Bank Account Name');
            }

            if (!$bankAccountNumber) {
                array_push( $toUpdate,'Bank Account Number');
            }

            if (!$reviewSchedules) {
                array_push( $toUpdate,'Review Schedules');
            }

            if (!$amount) {
                array_push( $toUpdate,'Amount');
            } ?>

            <?php if ($toUpdate) {?>
            <small class="small-text">Not updated: <?php echo implode(', ',$toUpdate);?></small>
            <?php } ?>

        <?php } ?>
    
    <?php } ?>

    <?php if($fileToEdit ==$fileId ) {?>
        <p class="small-text">On edit mode</p>
    <?php }?>

           
            



             

            

    <hr>
        <?php } }?>
   

</div>