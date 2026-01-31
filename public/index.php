<?php

require '../private/initialize.php'; 

$pageName = "Home";

require (INCLUDESLAYOUT_PATH.'/head.php');


if (!$u) {
    $table = 'contents'; 
    $statusColumn = 'contentStatus';
    $statusValue = 'Published';
    $sortColumn = 'contentPubDate';
}

if ($u) {
    if (!$showShared) {
    $table = 'contents'; 
    $statusColumn = 'contentStatus';
    $statusValue = 'Published';
    $sortColumn = 'contentPubDate';
    }

    if ($showShared) {
    $table = 'teacher_files'; 
    $statusColumn = 'teacher_fileStatus';
    $statusValue = 'Published';
    $sortColumn = 'teacher_filePubDate';
    }

}




if (!$u) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue'");
}

if ($u && $uInfo && !$showShared) {
$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue' and contentRegistrantId='$u_userId'");
} 


if ($u && $uInfo && $showShared) {
$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue' and teacher_fileSharedWith LIKE '%$u%'");
}





$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));

$offset = ($page - 1) * $resultsPerPage;



if (!$u) {
     $sqlContentsList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";
}


if ($u && $uInfo && !$showShared) {
   $sqlContentsList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' and contentRegistrantId =$u_userId ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage"; 
}

if ($u && $uInfo && $showShared) {
   $sqlContentsList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' and teacher_fileSharedWith LIKE '%$u%' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage"; 
}


$sqlContentsListResult = mysqli_query($conn,$sqlContentsList);

?>




<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>


<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="home-page" class="page <?php if ($u && $uInfo) { echo 'with-sidebars-page';} ?> <?php if (!$u) { echo 'with-single-sidebar-page';} ?>">


<?php if ($u && $uInfo){?>
<div id="account-details" class="page-details">  
    <?php require (INCLUDESLAYOUT_PATH.'/profile.php') ?>   
    
    <div class="account-contents-filter">
    <?php if (!$showShared) {?>
        <small>Contents by <?php echo $u_accountName;?></small>
    <?php }?>

    <?php if ($showShared) {?>
        <a href="<?php echo $u;?>"class="link-tag-button">Contents by <?php echo $u_accountName;?></a>
    <?php }?>

    <?php if (!$showShared) {?>
        <a href="<?php echo $u.'?show-shared=yes';?>"class="link-tag-button">Shared with <?php echo $u_accountName;?></a>
    <?php }?>

    <?php if ($showShared) {?>
        <small>Shared with <?php echo $u_accountName;?></small>
    <?php }?>
    </div>
</div>
    <?php } ?>

   
    <div class="page-details <?php if ($u && $uInfo) {echo 'page-details-no-sidebar';}?> <?php if (!$u && !$uInfo) {echo 'page-details-single-sidebar';}?>">
        <?php if ($sqlContentsListResult->num_rows > 0) {

            while ($contentsList = $sqlContentsListResult->fetch_assoc()) { 

            if (!$showShared) {
            $contentListId = $contentsList ['contentForeignId'];
            $contentListTitle = $contentsList ['contentTitle'];
            $contentListSlug = $contentsList ['contentSlug'];
            $contentListTable = $contentsList ['contentTable'];
            
                if ($contentListTable=='developer_tools') {
                    $contentListType = 'Tool';
                    $contentListIdColumn = 'developer_toolId';
                    $categoryColumn= 'developer_toolCategory';
                    $descriptionColumn = 'developer_toolDescription';
                    $imageColumn = 'developer_toolIcon';
                    $linkColumn = 'developer_toolLink';
                    $defaultImage = $website."/assets/images/default-tool-icon.jpg";
                    $createdDateColumn='developer_toolCreatedDate';
                    $pubDateColumn='developer_toolPubDate';
                    $updateDateColumn='developer_toolUpdateDate';
                    $moreParameter = 'tool';
                    $registrantIdColumn= 'developer_toolOwner';
                    $pageLink=$website.'/tools/';
                }

                if ($contentListTable=='teacher_files') {
                    $contentListType = 'Teacher File';
                    $contentListIdColumn = 'teacher_fileId';
                    $categoryColumn= 'teacher_fileCategory';
                    $descriptionColumn = 'teacher_fileDescription';
                    $imageColumn = 'teacher_fileImage';
                    $linkColumn = 'teacher_fileLink';
                    $defaultImage = $website."/assets/images/teacher-file.jpg";
                    $createdDateColumn='teacher_fileUploadDate';
                    $pubDateColumn='teacher_filePubDate';
                    $updateDateColumn='teacher_fileUpdateDate';
                    $moreParameter = 'file';
                    $registrantIdColumn= 'teacher_fileOwner';
                    $pageLink=$website.'/teacher-files/';
                    $forSaleColumn= 'teacher_fileForSale';
                    $amountColumn= 'teacher_fileAmount';
                    $sharedWithColumn = 'teacher_fileSharedWith';
                }

                if ($contentListTable=='writer_articles') {
                    $contentListType = 'Article';
                    $contentListIdColumn = 'writer_articleId';
                    $editorIdColumn = 'writer_articleEditors';
                    $categoryColumn= 'writer_articleCategory';
                    $topicColumn= 'writer_articleTopic';
                    $descriptionColumn = 'writer_articleContent';
                    $imageColumn = 'writer_articleImage';
                    $defaultImage = $website."/assets/images/default-featured-image.jpg";
                    $createdDateColumn='writer_articleWriteDate';
                    $pubDateColumn='writer_articlePubDate';
                    $updateDateColumn='writer_articleUpdateDate';
                    $moreParameter = 'article';
                    $registrantIdColumn= 'writer_articleWriterId';
                    $pageLink=$website.'/articles/';
                }

                if ($contentListTable=='school_researches') {
                    $contentListType = 'Research';
                    $contentListIdColumn = 'school_researchId';
                    $categoryColumn= 'school_researchCategory';
                    $descriptionColumn = 'school_researchAbstract';
                    $imageColumn = 'school_researchImage';
                    $linkColumn = 'school_researchLink';
                    $defaultImage = $website."/assets/images/research.jpg";
                    $dateColumn='school_researchDate';
                    $createdDateColumn='school_researchUploadDate';
                    $pubDateColumn='school_researchLiveDate';
                    $updateDateColumn='school_researchUpdateDate';
                    $moreParameter = 'research';
                    $registrantIdColumn= 'school_researchUploader';
                    $pageLink=$website.'/researches/';
                    $proponentsColumn = 'school_researchProponents';
                }

                $sqlContentInfo = "SELECT * FROM $contentListTable WHERE $contentListIdColumn = $contentListId";
                $sqlContentInfoResult = mysqli_query($conn,$sqlContentInfo);
                $contentInfo = $sqlContentInfoResult->fetch_assoc();

                if ($contentInfo) {
                    $contentListCategory = $contentInfo [$categoryColumn];
  
                    if ($contentListType=='Article'){
                        $contentListEditor="";
                        $contentListTopic = $contentInfo [$topicColumn];
                        $contentListEditorId = $contentInfo [$editorIdColumn];
                    
                
                        if ($contentListEditorId) {
                            $sqlEditorInfo = "SELECT * FROM registrations WHERE registrantId = '$contentListEditorId'";
                            $sqlEditorInfoResult = mysqli_query($conn,$sqlEditorInfo);
                            $editorInfo = $sqlEditorInfoResult->fetch_assoc();

                            if ($editorInfo) {
                                $contentListEditor = $editorInfo ['registrantAccountName'];
                            }
                        }

                }

                    if ($contentListType=='Research'){
                        $contentListProponents = $contentInfo [$proponentsColumn];
                        $contentListDate = $contentInfo [$dateColumn];
                    }

                $contentListDescription = $contentInfo [$descriptionColumn];
                $contentListRegistrantId= $contentInfo [$registrantIdColumn];

                    if ($contentListTable=='developer_tools' || $contentListTable=='teacher_files' ||$contentListTable=='school_researches') {

                    if (strlen($contentListDescription)>150) {
                            // if ($u) {
                            //     $contentListDescription = substr($contentListDescription,0,150).'<a class=read-more href=?u='.$u.'&page='.$page.'&readmore=yes&'.$moreParameter.'='.urlencode($contentListTitle).'> Read More >>></a>'; 
                            // } else {
                            //     $contentListDescription = substr($contentListDescription,0,150).'<a class=read-more href=?page='.$page.'&readmore=yes&'.$moreParameter.'='.urlencode($contentListTitle).'> Read More >>></a>'; 
                            // }


                            //   if ($u) {
                            //     $contentListDescription = substr($contentListDescription,0,150).'<a class=read-more href=?u='.$u.'&page='.$page.'&readmore=yes&'.$moreParameter.'='.urlencode($contentListTitle).'> Read More >>></a>'; 
                            // } else {
                            //     $contentListDescription = substr($contentListDescription,0,150).'<a class=read-more href=?page='.$page.'&readmore=yes&'.$moreParameter.'='.urlencode($contentListTitle).'> Read More >>></a>'; 
                            // }

                            //  $contentListDescription = substr($contentListDescription,0,150);
                        } else {
                        $contentListDescription = $contentListDescription; 
                        }
                    }


                $contentListCreatedDate = $contentInfo [$createdDateColumn];
                $contentListPubDate = $contentInfo [$pubDateColumn];
                $contentListUpdateDate = $contentInfo [$updateDateColumn];
                $contentListImage = $contentInfo [$imageColumn] ? $privateFolder.$contentInfo [$imageColumn] : $defaultImage;
                
                    //If tool, teacher file or school research...
                    if ($contentListTable=='developer_tools' || $contentListTable=='teacher_files' ||$contentListTable=='school_researches') {
                        $contentListLink = $contentInfo [$linkColumn];
                    }

                    //If teacher file...
                    if ($contentListTable=='teacher_files') {
                        $fileListForSale = $contentInfo [$forSaleColumn];
                        $fileListAmount = $contentInfo [$amountColumn];
                        $fileListId = $contentInfo [$contentListIdColumn];
                        
                        $sqlRegistrantPurchase = "SELECT * FROM file_purchase WHERE file_purchaseFileId = '$contentListId' AND file_purchasePurchaserUserId = '$registrantId' ORDER BY file_purchaseId DESC LIMIT 1";
                        $sqlRegistrantPurchaseResult= mysqli_query($conn,$sqlRegistrantPurchase);
                        $registrantPurchase = $sqlRegistrantPurchaseResult->fetch_assoc();

                        if ($registrantPurchase) {
                            $registrantPurchaseStatus = $registrantPurchase ['file_purchaseStatus'];
                            $registrantPurchaseAmount = $registrantPurchase ['file_purchaseAmount'];
                        } 
                    }

                }
   

        } 





        
            if ($showShared) {
                $contentListTitle = $contentsList ['teacher_fileTitle'];
                $contentListSlug = $contentsList ['teacher_fileSlug'];
                $contentListId = $contentsList ['teacher_fileId'];
                $contentListImage = $contentsList ['teacher_fileImage'] ? $privateFolder.$contentsList ['teacher_fileImage']: $website."/assets/images/teacher-file.jpg";;
                $contentListCategory = $contentsList ['teacher_fileCategory'];
                $contentListDescription = $contentsList ['teacher_fileDescription'];
                $contentListPubDate = $contentsList ['teacher_filePubDate'];
                $contentListRegistrantId = $contentsList ['teacher_fileOwner'];
                $contentListType = 'Teacher File';
                $pageLink = $website.'/teacher-files/';


                $forSaleColumn = 'teacher_fileForSale';
                $amountColumn = 'teacher_fileAmount';
                $sharedWithColumn = 'teacher_fileSharedWith';
            
                $fileListForSale = $contentsList [$forSaleColumn];
                $fileListAmount = $contentsList [$amountColumn];
            
                
                $sqlRegistrantPurchase = "SELECT * FROM file_purchase WHERE file_purchaseFileId = '$contentListId' AND file_purchasePurchaserUserId = '$registrantId' ORDER BY file_purchaseId DESC LIMIT 1";
                $sqlRegistrantPurchaseResult= mysqli_query($conn,$sqlRegistrantPurchase);
                $registrantPurchase = $sqlRegistrantPurchaseResult->fetch_assoc();

                    if ($registrantPurchase) {
                        $registrantPurchaseStatus = $registrantPurchase ['file_purchaseStatus'];
                        $registrantPurchaseAmount = $registrantPurchase ['file_purchaseAmount'];
                    } 
        
            }



            //Content List Registrant Info
            $sqlContentRegistrantInfo = "SELECT * FROM registrations WHERE registrantId = '$contentListRegistrantId'";
            $sqlContentRegistrantInfoResult = mysqli_query($conn,$sqlContentRegistrantInfo);
            $contentRegistrantInfo = $sqlContentRegistrantInfoResult->fetch_assoc();
            $contentListRegistrant="";
            if ($contentRegistrantInfo) {
                 $contentListRegistrant = $contentRegistrantInfo ['registrantAccountName'];
            }


        ?>

        





        <div class="list">
            <div class="list-image">
                <img src="<?php echo $contentListImage?>">
            </div>

            <div class="list-info">
                <p>Title: <?php echo $contentListTitle?><?php echo ' <strong>['.$contentListType.']</strong>';?></p>
                <p>Category: <?php echo $contentListCategory?></p>

                <?php if ($contentListType=='Research'){?>
                
                <?php if (str_word_count($contentListDescription) <= $word_limit) {?>
                <p>Abstract: <?php echo nl2br($contentListDescription);?></p>
                <?php } ?>

                <?php if (str_word_count($contentListDescription) > $word_limit) {?>
                    
                <p class="content-list-description">
                    Abstract: <?php echo nl2br(limit_words($contentListDescription,$word_limit));?>
                    <small id="<?php echo 'full-description-for-'.$contentListTable.'-'.$contentListId;?>" class="read-more-button">
                        Read More>>>
                    </small>
                </p>

                <div id="<?php echo 'full-description-for-'.$contentListTable.'-'.$contentListId.'-modal';?>" style="display: none;" class="modal website-modal website-modal-wrapper">
                        <div class="website-modal-content website-modal-content-for-readmore">
                              <a class="close close-without-null-redirection">&times;</a>
                                <p><?php echo nl2br($contentListDescription); ?></p>
                        </div>
                </div>
                <?php } ?>





                <p>Proponents: <?php echo $contentListProponents?></p>
                <p>Finished: <?php echo dcomplete_format($contentListDate)?></p>
                <p>Uploaded: <?php echo dcomplete_format($contentListCreatedDate)?></p>
                <p>Live: <?php echo dcomplete_format($contentListPubDate)?></p>
                <?php if ($contentListUpdateDate> $contentListPubDate) {?>
                <p>Updated: <?php echo dcomplete_format($contentListUpdateDate)?></p>
                <?php }?>
                <p>Uploader: <?php echo $contentListRegistrant?></p>
                <?php } ?>



                <?php if ($contentListType=='Article'){?>
                    <p>Topic (s): <?php echo $contentListTopic?></p>
                    <p>Writer: <?php echo $contentListRegistrant?></p>
                    <?php if ($contentListEditor) {?>
                        <p>Editor: <?php echo $contentListEditor?></p>
                    <?php } ?>
                <?php } ?>

                <?php 
                //IF THE CONTENT LIST TYPE IS NOT ARTICLE AND RESEARCH, SHOW THE DESCRIPTION
                //IF THE DESCRIPTION IS MORE THAN WORD LIMIT, SHOW THE BUTTON FOR READ MORE MODAL ?>
                <?php if ($contentListType!='Article' && $contentListType!='Research'){?>

                    <?php if (str_word_count($contentListDescription) <= $word_limit) {?>
                        <p>Description: <?php echo nl2br($contentListDescription);?></p>
                    <?php } ?>

                    <?php if (str_word_count($contentListDescription) > $word_limit) {?>
                        <p class="content-list-description">
                            Description: <?php echo nl2br(limit_words($contentListDescription,$word_limit));?>
                            <small id="<?php echo 'full-description-for-'.$contentListTable.'-'.$contentListId;?>" class="read-more-button">
                                Read More>>>
                            </small>
                        </p>


                        <?php //THIS IS THE 'READ MORE' MODAL.
                        //THE ID OF THE MODAL IS DEFINED DYNAMICALLY BASED ON THE CONTENT TYPE AND THE ID OF THE CONTENT.?>
                        <div id="<?php echo 'full-description-for-'.$contentListTable.'-'.$contentListId.'-modal';?>" style="display: none;" class="modal website-modal website-modal-wrapper">
                                <div class="website-modal-content website-modal-content-for-readmore">
                                    <a class="close close-without-null-redirection">&times;</a>
                                        <p><?php echo nl2br($contentListDescription); ?></p>
                                </div>
                        </div>
                    <?php } ?>

            
                <?php } ?>

               

                <?php if ($contentListType=='Teacher File' || $showShared){?>
                <p>Owner: <?php echo $contentListRegistrant?></p>
                <?php } ?>

                

                <?php if ($contentListType=='Tool'){?>
                <p>Developer: <?php echo $contentListRegistrant?></p>
                <?php } ?>



                <?php if ($contentListType!='Research'){?>
                    <p>Published: <?php echo dcomplete_format($contentListPubDate)?></p>
                    <?php if ($contentListUpdateDate> $contentListPubDate) {?>
                    <p>Updated: <?php echo dcomplete_format($contentListUpdateDate)?></p>
                    <?php }?>
                <?php } ?>

               


                <div class="list-buttons-container">
                <?php if ($contentListType=='Tool') {?>

                <?php if ($registrantId && $type=='Personal' && !$toolSubscribed && !$pendingToolSubscription &&$contentListRegistrantId!=$registrantId) { ?>
                    <a class="link-tag-button" href="<?php echo $website.'/account/?subscription=enabled' ?>">Subscribe to Use</a>
                <?php } ?>

                <?php if (!$registrantId) { ?>
                    <a class="link-tag-button" href="<?php echo $website.'/login/' ?>">Login to Use</a>
                <?php } ?>

                <?php if ($registrantId) { ?>

                    
                    <?php if ($toolSubscribed || $contentListRegistrantId==$registrantId) { ?>

                        <a class="link-tag-button" href="<?php echo  $contentListLink?>">Use</a>
                       
                        <?php if ($contentListRegistrantId==$registrantId)  {?>
                        <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-developer-tool-info-processing.php?unpublish='.$contentListId;?>">Unpublish</a> 
            
                        <button class="link-tag-button" id="<?php echo 'unpublish-tool-'.$contentListId;?>">AJAX Unpublish</button> 
                        <?php } ?>   

                    <?php } ?>

                    <?php if ($type=='School') { ?>
                        <p class="small-text">Use personal account to use this tool.</p>
                    <?php } ?>


                <?php } ?>

                <?php } ?>

                <?php if ($contentListType=='Teacher File' || $showShared) {?>
                    <?php if ($fileListForSale=='For Sale') {?>
                    <?php if(!$registrantPurchase && $contentListRegistrantId !=$registrantId ) {?>
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

                    <?php if($registrantPurchase && $registrantPurchaseStatus=='Approved') {?>
                    <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                    <a class="link-tag-button" href="<?php echo $pageLink.$contentListSlug;?>">View</a>
                    <a class="link-tag-button" href="">Rate</a>
                    <?php } ?>

                    <?php } ?>

                     <?php if ($fileListForSale=='Not for Sale' || $contentListRegistrantId ==$registrantId) {?>
                    <?php if($registrantPurchase) {?>
                    <small>Purchased <?php echo 'for ₱'.$registrantPurchaseAmount?></small>
                    <?php } ?>
                    <a class="link-tag-button" href="<?php echo $pageLink.$contentListSlug;?>">View</a>

                    <?php if($contentListRegistrantId ==$registrantId) {?>
                        <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-teacher-file-info-processing.php?unpublish='.$contentListId;?>">Unpublish</a>
                        
                        <button class="link-tag-button" id="<?php echo 'unpublish-teacher-file-'.$contentListId;?>">AJAX Unpublish</button> 
                    <?php } ?>

                    <?php } ?>
                <?php } ?>

                <?php if ($contentListType=='Article') {?>
                    <a class="link-tag-button" href="<?php echo $pageLink.$contentListSlug;?>">Read</a>
                    <a class="link-tag-button" href="">Share</a>

                    <?php if($contentListRegistrantId ==$registrantId) {?>
                        <a class="link-tag-button" href="<?php echo '../private/includes/processing/update-article-info-processing.php?unpublish='.$contentListId;?>">Unpublish</a>

                        <button class="link-tag-button" id="<?php echo 'unpublish-article-'.$contentListId;?>">AJAX Unpublish</button> 

                    <?php } ?>
                <?php } ?>

                <?php if ($contentListType=='Research') {?>
                    <a class="link-tag-button" href="<?php echo $pageLink.$contentListSlug;?>">View</a>

                    <?php if($contentListRegistrantId ==$registrantId) {?>
                        <a class="link-tag-button" href="<?php echo '../private/includes/processing/update-school-research-info-processing.php?unpublish='.$contentListId;?>">Unpublish</a>
                        
                        <button class="link-tag-button" id="<?php echo 'unpublish-research-'.$contentListId;?>">AJAX Unpublish</button> 
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
    </div>
    
    <?php if (!$u && !$uInfo){?>
    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>
    <?php }?>
   

</div>








 

    






















<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>

