<!------------------------------------------- INITIALIZAIONS-------------------------------------------->
<?php

//Initializing the paths.
require '../../private/initialize.php'; 

//Set the page name
$pageName = "Tools";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');



$table = 'developer_tools';
$statusColumn = 'developer_toolStatus';
$statusValue = 'Published';
$sortColumn = 'developer_toolPubDate';

//$resultsPerPage variable is set in the header.
$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue'");
$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));

$offset = ($page - 1) * $resultsPerPage;



$sqlToolsList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";
$sqlToolsListResult = mysqli_query($conn,$sqlToolsList);





?>




<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="tools-page" class="page with-sidebars-page with-single-sidebar-page" >

     <div class="page-details page-details-single-sidebar">

        
            <?php if ($sqlToolsListResult->num_rows > 0) {
        
            while ($toolsList = $sqlToolsListResult->fetch_assoc()) { 
            $toolListId = $toolsList ['developer_toolId'];
            $toolListTitle = $toolsList['developer_toolTitle']; 
            $toolListCategory = $toolsList ['developer_toolCategory'];
            $toolListDescription = $toolsList ['developer_toolDescription'];
            
            if (strlen($toolListDescription)>150) {
            // $toolListDescription = substr($toolListDescription,0,150).' <a class=read-more href=?page='.$page.'&readmore=yes&tool='.urlencode($toolListTitle).'>Read More >>></a>';    
            } else {
            $toolListDescription = $toolListDescription; 
            }

            $toolListDeveloperId = $toolsList ['developer_toolOwner'];

            //Get the developer's info
            $sqlToolListDeveloperInfo = "SELECT registrantAccountName FROM registrations WHERE registrantId = '$toolListDeveloperId'";
            $sqlToolListDeveloperInfoResult = mysqli_query($conn,$sqlToolListDeveloperInfo);
            $toolListDeveloperInfo =$sqlToolListDeveloperInfoResult->fetch_assoc();

            $toolListDeveloper = $toolListDeveloperInfo ? $toolListDeveloperInfo ['registrantAccountName'] : "";
            $toolListCreatedDate = $toolsList ['developer_toolCreatedDate'];
            $toolListPubDate = $toolsList ['developer_toolPubDate'];
            $toolListUpdateDate = $toolsList ['developer_toolUpdateDate'];
            $toolListIcon = $toolsList ['developer_toolIcon'] ? $privateFolder.$toolsList ['developer_toolIcon'] : $website."/assets/images/default-tool-icon.jpg";
            $toolListLink = $toolsList ['developer_toolLink'];

            ?>

        <div class="list">
            <div class="list-image">
                <img src="<?php echo $toolListIcon?>" alt="<?php echo $toolListTitle;?>">
            </div>

            <div class="list-info">
                <p>Title: <?php echo $toolListTitle?></p>
                <p>Category: <?php echo $toolListCategory?></p>
                <?php if (str_word_count($toolListDescription) <= $word_limit) {?>
                <p>Description: <?php echo nl2br(limit_words($toolListDescription,$word_limit));?></p>
                <?php } ?>

                <?php if (str_word_count($toolListDescription) > $word_limit) {?>
                <p class="content-list-description tool-list-description">
                    Description: <?php echo nl2br(limit_words($toolListDescription,$word_limit));?>
                    <small id="<?php echo 'full-description-for-developer_tools-'.$toolListId;?>" class="read-more-button">
                        Read More>>>
                    </small>
                </p>

                <div id="<?php echo 'full-description-for-developer_tools-'.$toolListId.'-modal';?>" style="display: none;" class="modal website-modal website-modal-wrapper">
                        <div class="website-modal-content website-modal-content-for-readmore">
                            <a class="close close-without-null-redirection">&times;</a>
                                <p><?php echo nl2br($toolListDescription); ?></p>
                        </div>
                </div>
                <?php } ?>



                <p>Developer: <?php echo $toolListDeveloper?></p>
                <p>Published: <?php echo dcomplete_format($toolListPubDate)?></p>
                <?php if($toolListUpdateDate>$toolListPubDate) {?>
                <p>Updated: <?php echo dcomplete_format($toolListUpdateDate)?></p>
                <?php } ?>
                <div class="list-buttons-container">
                
                <?php if (!$registrantId) { ?>
                    <a class="link-tag-button" href="<?php echo $website.'/login/' ?>">Login to Use</a>
                <?php } ?>

                <?php if ($registrantId) { ?>
                    <?php if ($toolSubscribed || $toolListDeveloperId==$registrantId) { ?>

                        <a class="link-tag-button" href="<?php echo  $toolListLink?>">Use</a>

                        <?php if ($toolListDeveloperId==$registrantId) { ?>
                        <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-developer-tool-info-processing.php?unpublish='.$toolListId;?>">Unpublish</a>

                           <button class="link-tag-button" id="<?php echo 'main-unpublish-tool-'.$toolListId;?>">AJAX Unpublish</button> 
                         <?php } ?>
                      
                    <?php } ?>

                    <?php if ($type=='School') { ?>
                        <p class="small-text">Use personal account to use this tool.</p>
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


    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>


</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>
