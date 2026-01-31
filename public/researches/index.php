
<?php


require '../../private/initialize.php'; 

$researchPreview = isset($_GET['preview']) ? true : false;
$researchToView = isset($_GET['slug']) ? $_GET['slug'] : "";
$researchTitle="";
$unpublishedNotice=false;
$researchInfo='';



if ($researchToView) {
    $sqlResearchInfo = "SELECT * FROM school_researches WHERE school_researchSlug = '$researchToView'";
    $sqlResearchInfoResult = mysqli_query($conn,$sqlResearchInfo);
    $researchInfo = $sqlResearchInfoResult->fetch_assoc();

    if ($researchInfo) {
        $researchId = $researchInfo ['school_researchId'];
        $researchUploaderId = $researchInfo ['school_researchUploader'];
            $sqlUploaderInfo = "SELECT * FROM registrations WHERE registrantId = $researchUploaderId";
            $sqlUploaderInfoResult = mysqli_query($conn,$sqlUploaderInfo);
            $uploaderInfo = $sqlUploaderInfoResult->fetch_assoc();
            if($uploaderInfo) {
                $researchUploader = $uploaderInfo ['registrantAccountName'];
            } else {
                $researchUploader = "";
            }

        $researchTitle = $researchInfo ['school_researchTitle'];
        $researchCategory = $researchInfo ['school_researchCategory'];
        $researchAbstract = $researchInfo ['school_researchAbstract'];
        $researchImage = $researchInfo ['school_researchImage'];
        $researchProponents = $researchInfo ['school_researchProponents'];
        $researchFormat = $researchInfo ['school_researchFormat'];
        $researchDate = dcomplete_format($researchInfo ['school_researchDate']);
        $researchUploadDate = $researchInfo ['school_researchUploadDate'];
        $researchLiveDate = dcomplete_format($researchInfo ['school_researchLiveDate']);
        $researchStatus = $researchInfo ['school_researchStatus'];
        $researchLink = $privateFolder.$researchInfo ['school_researchLink'];

        if ($researchStatus!="Published") {
            $unpublishedNotice = "yes";
        }

        

        if ($researchPreview) {

            if ($researchStatus=='Published') {
                
                if ($registrantId && $researchUploaderId ==$registrantId) {
                header('Location:'.$website.'/researches/'.$researchToView);
                }
                
                if (!$registrantId) {
                header('Location:'.$website.'/researches/'.$researchToView);
                } 
            }

                if ($researchStatus !='Published') {
                    if (!$registrantId || $researchUploaderId !=$registrantId) {
                    header('Location:'.$website.'/researches/'.$researchToView);
                    }
            }
        }

        if (!$researchPreview) {
                if ($researchStatus!='Published' && $researchUploaderId ==$registrantId) {
                    header('Location:'.$website.'/researches/'.$researchToView.'?preview=yes');
                }
        }

    } 

}


$pageName =$researchTitle ? $researchTitle :  "Researches";

if ($researchPreview) {
    $pageName = '[Preview] '.$pageName;
}

require (INCLUDESLAYOUT_PATH.'/head.php');


if (!$researchToView) {
$table = 'school_researches';
$statusColumn = 'school_researchStatus';
$statusValue = 'Published';
$sortColumn = 'school_researchLiveDate';


$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue'");
$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));

$offset = ($page - 1) * $resultsPerPage;


$sqlResearchesList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";
$sqlResearchesListResult = mysqli_query($conn,$sqlResearchesList);

}







?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="researches-page"class="page with-sidebars-page with-single-sidebar-page" >
     
    <div class="page-details page-details-single-sidebar">

        <?php if (!$researchToView) {//This will show if no research is viewed.?>
       
            <?php if ($sqlResearchesListResult->num_rows > 0) {
        
            while ($researchesList = $sqlResearchesListResult->fetch_assoc()) { 
            $researchListId = $researchesList ['school_researchId'];
            $researchListTitle = $researchesList['school_researchTitle']; 
            $researchListSlug = $researchesList['school_researchSlug']; 
            $researchListCategory = $researchesList ['school_researchCategory'];
            $researchListAbstract = $researchesList ['school_researchAbstract'];

            $researchListImage = $researchesList ['school_researchImage'] ? $privateFolder.$researchesList ['school_researchImage']: $website.'/assets/images/research.jpg';
                if (strlen($researchListAbstract)>150) {
                // $researchListAbstract = substr($researchListAbstract,0,150).' <a class=read-more href=?page='.$page.'&readmore=yes&research='.urlencode($researchListTitle).'>Read More >>></a>';    
                } else {
                $researchListAbstract = $researchListAbstract; 
                }

            
            $researchListProponents = $researchesList ['school_researchProponents'];
            $researchListUploaderId = $researchesList ['school_researchUploader'];
                //Get the research's uploader info
                $sqlResearchListUploaderInfo = "SELECT * FROM registrations WHERE registrantId = '$researchListUploaderId'";
                $sqlResearchListUploaderInfoResult = mysqli_query($conn,$sqlResearchListUploaderInfo);
                $researchListUploaderInfo = $sqlResearchListUploaderInfoResult->fetch_assoc();

                $researchListUploader = $researchListUploaderInfo ? $researchListUploaderInfo ['registrantAccountName'] : "";
                $researchListUploadDate = $researchesList ['school_researchUploadDate'];
                $reseachListLink = $researchesList ['school_researchLink'] ?  $privateFolder.$researchesList ['school_researchLink'] : "";
            
            $researchListDate = $researchesList ['school_researchDate'];  
             $researchListUploadDate = $researchesList ['school_researchUploadDate'];
             $researchListLiveDate = $researchesList ['school_researchLiveDate'];
            

            ?>

        <div class="list">
            <div class="list-image">
                <img src="<?php echo $researchListImage?>" alt="<?php echo $researchListTitle;?>">
            </div>

            <div class="list-info">
                <p>Title: <?php echo $researchListTitle;?></p>
                <p>Category: <?php echo $researchListCategory;?></p>

                <?php if (str_word_count($researchListAbstract) <= $word_limit) {?>
                <p>Abstract: <?php echo nl2br(limit_words($researchListAbstract,$word_limit));?></p>
                <?php } ?>

                <?php if (str_word_count($researchListAbstract) > $word_limit) {?>
                <p class="content-list-description research-list-description">
                    Abstract: <?php echo nl2br(limit_words($researchListAbstract,$word_limit));?>
                    <small id="<?php echo 'full-description-for-school_researches-'.$researchListId;?>" class="read-more-button">
                        Read More>>>
                    </small>
                </p>

                <div id="<?php echo 'full-description-for-school_researches-'.$researchListId.'-modal';?>" style="display: none;" class="modal website-modal website-modal-wrapper">
                        <div class="website-modal-content website-modal-content-for-readmore">
                            <a class="close close-without-null-redirection">&times;</a>
                                <p><?php echo nl2br($researchListAbstract); ?></p>
                        </div>
                </div>
                <?php } ?>








                <p>Proponents: <?php echo $researchListProponents;?></p>
                 <p>Finished: <?php echo dcomplete_format($researchListDate);?></p>
                 <p>Uploaded: <?php echo dcomplete_format($researchListUploadDate);?></p>
                 <p>Live: <?php echo $researchListLiveDate;?></p>
                <p>Uploader: <?php echo $researchListUploader;?></p>
                <div class="list-buttons-container">  
                    <a class="link-tag-button" href="<?php echo $website.'/researches/'.$researchListSlug;?>">View</a>

                    <?php if($researchListUploaderId ==$registrantId) {?>
                    <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-school-research-info-processing.php?unpublish='.$researchListId;?>">Unpublish</a>

                     <button class="link-tag-button" id="<?php echo 'main-unpublish-research-'.$researchListId;?>">AJAX Unpublish</button> 
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

    <?php if ($researchToView) {?>
        <?php if ($researchInfo && !$unpublishedNotice || $researchUploaderId==$registrantId) {?>
           
        <?php if ($researchFormat=="pdf"){?>

        <button class="show-details link-tag-button">Show Details</button>
        <button class="hide-details link-tag-button">Hide Details</button>
        <br>
        <div class="live-content-details-container">
            <h1 class="live-content-title"><?php echo $researchTitle;?></h1>
            <hr>
            <div class="details-container">
                <p><strong>Category:</strong> <?php echo $researchCategory;?></p>
                <p><strong>Uploader:</strong> <?php echo $researchUploader;?></p>
                <p><strong>Proponents:</strong> <?php echo $researchProponents;?></p>
            </div>
            <hr>s
            <div class="details-container">
                <p><strong>Finished:</strong> <?php echo $researchDate;?></p>
                <p><strong>Uploaded:</strong> <?php echo $researchUploadDate;?></p>
                <p><strong>Live:</strong> <?php echo $researchLiveDate;?></p>
                <?php if ($researchUpdateDate > $researchPubDate) {?>
                <p><strong>Updated:</strong> <?php echo $researchUpdateDate;?></p>
                <?php } ?>
            </div>
            <hr>
            <small><strong>Abstract:</strong> <?php echo $researchAbstract;?></small>
        </div>

        <iframe src="<?php echo $researchLink.'?iframe=true'?>" class="pdf-reader"></iframe>
        <?php }?>

        <?php if($researchFormat=="docx") {?>
        <div class="content-notice">
            <p>Docx file cannot be loaded.</p>    
        </div>
        <?php } ?>
        <?php } ?>

        <?php if ($researchInfo && $unpublishedNotice && $researchUploaderId!=$registrantId) {?>    
                <div class="content-notice">
                <p>It seems that the research is currently not published.</p>       
                </div>        
        <?php } ?>

        <?php if (!$researchInfo) {?>  
            <div class="content-notice">       
            <p>Opps! We cannot find the research.</p>
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
