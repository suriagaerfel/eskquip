
<?php


require '../../private/initialize.php'; 

$filePreview = isset($_GET['preview']) ? true : false;
$fileToView = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : "";
$fileTitle="";
$unpublishedNotice=false;
$username= '';

$fileInfo = '';

if ($fileToView) {
    $sqlFileInfo = "SELECT * FROM teacher_files WHERE teacher_fileSlug = '$fileToView'";
    $sqlFileInfoResult = mysqli_query($conn,$sqlFileInfo);
    $fileInfo = $sqlFileInfoResult->fetch_assoc();

    $fileDescription= "";
    $filePubDate= "";
    $fileUpdateDate= "";
    $fileOwnerId="";
    $fileAccessType= "";
    $filePurchased= "";
    $fileAmount= "";
    $registrantPurchaseStatus="";
    $shared='';

    if ($fileInfo) {
        $fileId = $fileInfo ['teacher_fileId'];
        $fileOwnerId = $fileInfo ['teacher_fileOwner'];
            $sqlOwnerInfo = "SELECT * FROM registrations WHERE registrantId = $fileOwnerId";
            $sqlOwnerInfoResult = mysqli_query($conn,$sqlOwnerInfo);
            $ownerInfo = $sqlOwnerInfoResult->fetch_assoc();
            if($ownerInfo) {
                $fileOwner = $ownerInfo ['registrantAccountName'];
            } else {
                $fileOwner = "";
            }

        $fileTitle = $fileInfo ['teacher_fileTitle'];
        $fileCategory = $fileInfo ['teacher_fileCategory'];
        $fileDescription = $fileInfo ['teacher_fileDescription'];
        $fileImage = $fileInfo ['teacher_fileImage'];
        $filePubDate = dcomplete_format($fileInfo ['teacher_filePubDate']);
        $fileUpdateDate = dcomplete_format($fileInfo ['teacher_fileUpdateDate']);
        $fileStatus = $fileInfo ['teacher_fileStatus'];
        $fileAccessType = $fileInfo ['teacher_fileAccessType'];
        $fileFormat = $fileInfo ['teacher_fileFormat'];
        $fileAmount = $fileInfo ['teacher_fileAmount'];
        $fileSharedWith = $fileInfo ['teacher_fileSharedWith'];
        $fileLink = $privateFolder.$fileInfo ['teacher_fileLink'];

        $registrantPurchaseAmount = "";

        if ($fileStatus!="Published") {
            $unpublishedNotice = "yes";

        }

        if($username) {
            if (strpos($fileSharedWith, $username) !== false) {
            $shared="yes";
        } 
        }


         $sqlFilePurchased = "SELECT * FROM file_purchase WHERE file_purchasePurchaserUserId='$registrantId' AND file_purchaseFileId='$fileId'";
        $sqlFilePurchasedResult = mysqli_query ($conn,$sqlFilePurchased);

        if ($sqlFilePurchasedResult->num_rows > 0) {
            $filePurchased = true;
            $filePurchase=$sqlFilePurchasedResult->fetch_assoc();

        if ($filePurchased) {
            $registrantPurchaseStatus=$filePurchase['file_purchaseStatus'];
            $registrantPurchaseAmount=$filePurchase['file_purchaseAmount'];
        }
          

        }else {
                $filePurchased=false;
        }






        if ($filePreview) {

                if ($fileStatus=='Published') {
                    if ($registrantId && $fileOwnerId ==$registrantId) {
                    header('Location:'.$website.'/teacher-files/'.$fileToView);
                    } 

                    if (!$registrantId) {
                    header('Location:'.$website.'/teacher-files/'.$fileToView);
                    }
                }

                if ($fileStatus !='Published') {
                    if (!$registrantId || $fileOwnerId !=$registrantId) {
                    header('Location:'.$website.'/teacher-files/'.$fileToView);
                    }
                }

            }

            if (!$filePreview) {
                if ($fileStatus!='Published' && $fileOwnerId ==$registrantId) {
                    header('Location:'.$website.'/teacher-files/'.$fileToView.'?preview=yes');
                }
            }

    } 
  
   
}




$pageName =$fileTitle ? $fileTitle :  "Teacher Files";

if ($filePreview) {
    $pageName = '[Preview] '.$pageName;
}

require (INCLUDESLAYOUT_PATH.'/head.php');




if (!$fileToView) {

    $table = 'teacher_files';
    $statusColumn = 'teacher_fileStatus';
    $statusValue = 'Published';
    $sortColumn = 'teacher_filePubDate';

    //$resultsPerPage variable is set in the header.
    $result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue'");
    $totalRows = (int)$result->fetch_assoc()['total'];
    $totalPages = (int)ceil($totalRows / $resultsPerPage);

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $page= max(1,min($page,$totalPages));

    $offset = ($page - 1) * $resultsPerPage;


    $sqlFilesList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";
    $sqlFilesListResult = mysqli_query($conn,$sqlFilesList);

}


?>



<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="files-page"class="page with-sidebars-page with-single-sidebar-page" >
     
    <div class="page-details page-details-single-sidebar">
        

        <?php if (!$fileToView) { ?>
        
                <?php if ($sqlFilesListResult->num_rows > 0) {
            
                while ($filesList = $sqlFilesListResult->fetch_assoc()) { 
                $fileListId = $filesList ['teacher_fileId'];
                $fileListTitle = $filesList['teacher_fileTitle'];
                $fileListSlug = $filesList['teacher_fileSlug']; 
                $fileListCategory = $filesList ['teacher_fileCategory'];
                $fileListDescription = $filesList ['teacher_fileDescription'];
                $fileListImage = $filesList ['teacher_fileImage'] ? $privateFolder.$filesList ['teacher_fileImage']: $website."/assets/images/teacher-file.jpg";
                
                if (strlen($fileListDescription)>150) {
                // $fileListDescription = substr($fileListDescription,0,150).' <a class=read-more href=?page='.$page.'&readmore=yes&file='.urlencode($fileListTitle).'>Read More >>></a>'; 
                } else {
                $fileListDescription = $fileListDescription; 
                }

                $fileListOwnerId = $filesList ['teacher_fileOwner'];
                

                //Get the owner's info
                $sqlFileListOwnerInfo = "SELECT * FROM registrations WHERE registrantId = '$fileListOwnerId'";
                $sqlFileListOwnerInfoResult = mysqli_query($conn,$sqlFileListOwnerInfo);
                $fileListOwnerInfo =$sqlFileListOwnerInfoResult->fetch_assoc();

                //Get the owner's seller subscription
                $ownerSellerSubscribed=false;
                $sqlOwnerSellerSubscription = "SELECT * FROM registrant_subscriptions WHERE registrant_subscriptionUserId = $fileListOwnerId AND registrant_subscriptionType='Seller' ORDER BY registrant_subscriptionId DESC LIMIT 1";
                    $sqlOwnerSellerSubscriptionResults = mysqli_query($conn,$sqlOwnerSellerSubscription);
                    $ownerSellerSubscription = $sqlOwnerSellerSubscriptionResults->fetch_assoc();


                    if ($ownerSellerSubscription) {
                        $ownerSellerSubscriptionStatus = $ownerSellerSubscription ['registrant_subscriptionStatus'];
                        $ownerSellerSubscriptionExpiry = $ownerSellerSubscription['registrant_subscriptionExpiry'];


                    
                        if ($ownerSellerSubscriptionStatus == 'Approved' AND strtotime($ownerSellerSubscriptionExpiry)-$currentTime>0) {
                        $ownerSellerSubscribed=true;    
                        }    
                
                    }

                $fileListOwner = $fileListOwnerInfo ? $fileListOwnerInfo ['registrantAccountName'] : "";
                $fileListUploadDate = $filesList ['teacher_fileUploadDate'];
                $fileListPubDate = $filesList ['teacher_filePubDate'];
                $fileListUpdateDate = $filesList ['teacher_fileUpdateDate'];
                $fileListForSale = $filesList ['teacher_fileForSale'];
                $fileListAmount = $filesList ['teacher_fileAmount'];
                $fileListLink = $filesList ['teacher_fileLink'] ?  $privateFolder.$filesList ['teacher_fileLink'] : "";
                
                $registrantPurchaseStatus="";
                $registrantPurchaseAmount="";
                $sqlRegistrantPurchase = "SELECT * FROM file_purchase WHERE file_purchaseFileId = '$fileListId' AND file_purchasePurchaserUserId = '$registrantId' ORDER BY file_purchaseId DESC LIMIT 1";
                $sqlRegistrantPurchaseResult= mysqli_query($conn,$sqlRegistrantPurchase);
                $registrantPurchase = $sqlRegistrantPurchaseResult->fetch_assoc();
        
                if ($registrantPurchase) {
                    $registrantPurchaseStatus = $registrantPurchase ['file_purchaseStatus'];
                    $registrantPurchaseAmount = $registrantPurchase ['file_purchaseAmount'];
                } 

                ?>

            <div class="list">
                <div class="list-image">
                    <img src="<?php echo $fileListImage?>" alt="<?php echo $fileListTitle;?>">
                </div>

                <div class="list-info">
                    <p>Title: <?php echo $fileListTitle;?></p>
                    <p>Category: <?php echo $fileListCategory;?></p>
                    
                    <?php if (str_word_count($fileListDescription) <= $word_limit) {?>
                    <p>Description: <?php echo nl2br(limit_words($fileListDescription,$word_limit));?></p>
                    <?php } ?>

                     <?php if (str_word_count($fileListDescription) > $word_limit) {?>
                    <p class="content-list-description file-list-description">
                        Description: <?php echo nl2br(limit_words($fileListDescription,$word_limit));?>
                        <small id="<?php echo 'full-description-for-teacher_files-'.$fileListId;?>" class="read-more-button">
                            Read More>>>
                        </small>
                    </p>

                    <div id="<?php echo 'full-description-for-teacher_files-'.$fileListId.'-modal';?>" style="display: none;" class="modal website-modal website-modal-wrapper">
                            <div class="website-modal-content website-modal-content-for-readmore">
                                <a class="close close-without-null-redirection">&times;</a>
                                    <p><?php echo nl2br($fileListDescription); ?></p>
                            </div>
                    </div>
                    <?php } ?>






                    <p>Owner: <?php echo $fileListOwner;?></p>
                    <p>Published: <?php echo dcomplete_format($fileListPubDate);?></p>
                    <?php if ($fileListUpdateDate>$fileListPubDate){?>
                    <p>Updated: <?php echo dcomplete_format($fileListUpdateDate);?></p>
                    <?php } ?>

                    <div class="list-buttons-container">
                        <?php if ($fileListForSale=='For Sale' && $fileListOwnerId != $registrantId) {?>
                        <?php if(!$registrantPurchase) {?>
                        <a class="link-tag-button" href="<?php echo $website.'/file-purchase/'.$fileListId?>">Purchase for <?php echo '₱'.$fileListAmount?></a>
                        <?php } ?>

                        <?php if($registrantPurchase && $registrantPurchaseStatus=='Pending') {?>
                        <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                        <a class="link-tag-button" href="">Pending</a>
                        <?php } ?>

                        <?php if($registrantPurchase && $registrantPurchaseStatus=='Rejected') {?>
                        <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                        <a class="link-tag-button" href="">Rejected</a>
                        <?php } ?>

                        <?php if($registrantPurchase && $registrantPurchaseStatus=='Approved') {
                        $_SESSION ['have-file-access'] = "yes";?>
                        <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                        <a class="link-tag-button" href="<?php echo $website.'/teacher-files/'.$fileListSlug;?>">View</a>
                        <a class="link-tag-button" href="">Rate</a>
                        <?php } ?>

                        <?php } ?>

                        <?php if ($fileListForSale=='Not for Sale' || $fileListOwnerId == $registrantId) {?>
                        <?php if($registrantPurchase) {?>
                            <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                        <?php } ?>
                        <a class="link-tag-button" href="<?php echo $website.'/teacher-files/'.$fileListSlug;?>">View</a>

                        <?php if($fileListOwnerId == $registrantId) {?>
                            <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-teacher-file-info-processing.php?unpublish='.$fileListId;?>">Unpublish</a>

                            <button class="link-tag-button" id="<?php echo 'main-unpublish-teacher-file-'.$fileListId;?>">AJAX Unpublish</button> 
                        <?php } ?>


                        <?php } ?>

                        
                    </div>

                </div>
    
            </div>

            <hr>

        <?php } }?>

        <?php if($totalPages > 1) {?>
                <?php require (INCLUDESLAYOUT_PATH.'/pagination.php');?>  
        <?php } ?>  

        <?php } ?>

        <?php if ($fileToView) {?>    
            <?php if ($fileInfo && !$unpublishedNotice || $fileOwnerId==$registrantId){?>
                <?php if ($fileSubscribed || $fileAccessType =='Free' || $registrantPurchaseStatus=='Approved' || $shared || $fileOwnerId == $registrantId) { ?>
                    <?php if ($fileFormat=="pdf"){?>
                    <button class="show-details link-tag-button">Show Details</button>
                    <button class="hide-details link-tag-button">Hide Details</button>
                    <br>
                    <div class="live-content-details-container">
                        <h1 class="live-content-title"><?php echo $fileTitle;?></h1>
                    <hr>
                    <div class="details-container">
                            <p><strong>Category: </strong><?php echo $fileCategory;?></p>
                            <p><strong> Owner: </strong><?php echo $fileOwner;?></p>

                            <?php if ($filePurchased) {?>
                            <p><strong>Purchased for: </strong><?php echo '₱'.$registrantPurchaseAmount;?></p>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="details-container">
                            <p><strong>Published:</strong> <?php echo $filePubDate;?></p>
                    
                            <?php if ($fileUpdateDate > $filePubDate) {?>
                            <p><strong>Updated:</strong> <?php echo $fileUpdateDate;?></p>
                            <?php } ?>
                        </div>
                        <hr>
                        <p><strong>Description:</strong> <?php echo $fileDescription;?></p>
                    </div>
                
                    <iframe class="pdf-reader" src="<?php echo $fileLink.'?iframe=true'?>"></iframe>
                    <?php }?>

                    <?php if($fileFormat=="docx") {?>
                    <div class="content-notice">
                        <p>Docx file cannot be loaded.</p>  
                    </div>  
                    <?php } ?>

                <?php } ?>

                <?php if ($fileAccessType=='Subscription' && !$fileSubscribed) { ?>
                    <div class="content-notice">
                        <p> It seems that you have no active file subscription. Access to <?php echo '<strong>'.$fileTitle.'</strong>'?> is denied.</p>  
                    </div>
                <?php } ?>

                <?php if ($fileAccessType=='Purchased' && $filePurchased && $registrantPurchaseStatus=='Pending') { ?>
                    <div class="content-notice">
                        <p> Your purchase for <?php echo '<strong>'.$fileTitle.'</strong>'?> has not been approved yet by the owner. </p> 
                    </div> 
                <?php } ?>

                <?php if ($fileAccessType=='Purchased' && $filePurchased && $registrantPurchaseStatus=='Rejected') { ?>
                    <div class="content-notice">
                        <p>
                            Your purchase for <?php echo '<strong>'.$fileTitle.'</strong>'?> has been rejected by the owner.
                        </p> 
                    </div> 
                <?php } ?>

                <?php if ($fileAccessType=='Purchased' && !$shared && !$filePurchased) { ?>
                    <?php if ($registrantId) { ?>
                    <div class="content-notice">
                        <p>
                            <a href="<?php echo $website.'/teacher-files/purchase.php?file-id='.$fileId?>">Purchase</a> <?php echo '<strong>'.$fileTitle.'</strong>'?> for <?php echo 'P'.$fileAmount?> to get an access.
                        </p>  
                    </div>
                    <?php } ?>

                    <?php if (!$registrantId ) {?>  
                    <div class="content-notice">
                        <p> <?php echo '<strong>'.$fileTitle.'</strong>'?> was restricted by the owner. <a href="<?php echo $website.'/login/'?>">Login</a> to view.
                        </p>
                    </div>
                    <?php } ?>

                <?php } ?>
            <?php } ?>

            

            <?php if ($fileInfo && $unpublishedNotice && $fileOwnerId!=$registrantId) {?> 
                <div class="content-notice">
                        <p>
                            It seems that the file is currently not published.
                        </p>  
                    </div>             
            <?php } ?>


            <?php if (!$fileInfo) {?> 
                <div class="content-notice">     
                    <p>Opps! We cannot find the file.</p>
                </div> 
            <?php }  ?>

        <?php require (INCLUDESLAYOUT_PATH.'/native-ad.php'); ?>
        <?php require (INCLUDESPROCESSING_PATH.'/content-performance-tracking-processing.php');?>
        

    <?php }  ?>

        
        
        



    </div>



    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>


</div>





<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>
