<?php


require '../../private/initialize.php'; 


$pageName = "Search";


require (INCLUDESLAYOUT_PATH.'/head.php');

$allowedQueryIns = ['articles','teacher-files','researches','tools','accounts','general-contents'];


if (!$queryIn) {
    header('Location:'.$website.'/search/?query='.$query.'&query-in=general-contents');
}

if ($queryIn && !in_array($queryIn,$allowedQueryIns)) {
    header('Location:'.$website.'/search/?query='.$query.'&query-in=general-contents');
}

if ($queryIn=='general-contents') {
    $table='contents';
    $tableColumn = 'contentTable';
    $titleColumn='contentTitle';
    $slugColumn='contentSlug';
    $descriptionColumn='contentDescription';
    $foreignIdColumn='contentForeignId';
    $imageColumn='contentImage';
    $statusColumn = 'contentStatus';
    $statusValue = 'Published';
    $sortColumn = 'contentPubDate';
    $searchedTable="";
}

 
if ($queryIn=='tools') {
    $table='developer_tools';
    $titleColumn='developer_toolTitle';
    $descriptionColumn='developer_toolDescription';
    $imageColumn='developer_toolIcon';
    $defaultImage=$website.'/assets/images/default-tool-icon.jpg';
    $linkColumn='developer_toolLink';
    $statusColumn = 'developer_toolStatus';
    $statusValue = 'Published';
    $sortColumn = 'developer_toolPubDate';
    $pageLink=$website.'/tools/';

}

if ($queryIn=='articles') {
    $table='writer_articles';
    $titleColumn='writer_articleTitle';
    $slugColumn='writer_articleSlug';
    $descriptionColumn='writer_articleContent';
    $imageColumn='writer_articleFeaturedImage';
    $defaultImage=$website.'/assets/images/default-featured-image.jpg';
    $statusColumn = 'writer_articleStatus';
    $statusValue = 'Published';
    $sortColumn = 'writer_articlePubDate';
    $pageLink=$website.'/articles/';

}


if ($queryIn=='teacher-files') {
    $table='teacher_files';
    $titleColumn='teacher_fileTitle';
    $slugColumn='teacher_fileSlug';
    $descriptionColumn='teacher_fileDescription';
    $imageColumn='teacher_fileThumbnail';
    $defaultImage=$website.'/assets/images/teacher-file.jpg';
    $statusColumn = 'teacher_fileStatus';
    $statusValue = 'Published';
    $sortColumn = 'teacher_filePubDate';
    $pageLink=$website.'/teacher-files/';
}

if ($queryIn=='researches') {
    $table='school_researches';
    $titleColumn='school_researchTitle';
    $slugColumn='school_researchSlug';
    $descriptionColumn='school_researchAbstract';
    $imageColumn='school_researchThumbnail';
    $defaultImage=$website.'/assets/images/research.jpg';
    $statusColumn = 'school_researchStatus';
    $statusValue = 'Published';
    $sortColumn = 'school_researchLiveDate';
    $pageLink=$website.'/researches/';

}


if ($queryIn=='accounts') {
    $table='registrations';
    $titleColumn='registrantAccountName';
    $usernameColumn='registrantUsername';
    $descriptionColumn='registrantDescription';
    $imageColumn='registrantProfilePictureLink';
    $statusColumn = 'registrantVerificationStatus';
    $statusValue = 'Verified';
    $sortColumn = 'registrantCreatedAt';
    $pageLink=$website.'/';
    $searchedTable="";
}







$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue' AND $titleColumn LIKE '%$query%' OR $descriptionColumn LIKE '%$query%' AND $statusColumn='$statusValue'");

$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));

$offset = ($page - 1) * $resultsPerPage;


if ($query) {

$sqlSearch = "SELECT * FROM $table WHERE $statusColumn='$statusValue' AND $titleColumn LIKE '%$query%' OR $descriptionColumn LIKE '%$query%' AND $statusColumn='$statusValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";
$sqlSearchResult = mysqli_query($conn,$sqlSearch);

} 


?>




    <?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
    <?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

    <div id="search-page" class="page with-sidebars-page with-single-sidebar-page">
        

        <div class="page-details page-details-single-sidebar">

            <div class="search-page-search-container">
                <?php if ($query){?>
                    <span class="search-results-counter"><?php echo $totalRows." Results for '".$query."' in '".ucwords(str_replace("-"," ",$queryIn))."'";?></span>
                <?php } ?>

                <form method="post" action="../../private/includes/processing/search-processing.php" class="search-page-search-form page-search-form">
                    <input type="search" name="page" id="search-input" value="<?php echo htmlspecialchars($page);?>" hidden>
                    <input type="search" name="query" id="search-input" value="<?php echo htmlspecialchars($query);?>" placeholder="Type to search...">
                    <input type="search" name="queryIn" id="search-input" value="<?php echo htmlspecialchars($queryIn);?>" hidden>
                    <button type="submit" class="non-header-search-button"><img src="<?php echo $website.'/assets/images/search.svg'?>" class="search-icon non-header-search-icon"></button>
                </form>
            </div>
            <div id="results-filter">
                <nav class="search-page-navigation-container">
                    <small>Filtered by: </small>
                    <?php if($queryIn !='general-contents') {?>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=general-contents'?>" class="link-tag-button">GENERAL CONTENTS</a>
                    <?php } ?>

                    <?php if($queryIn =='general-contents') {?>
                    <small><strong>GENERAL CONTENTS</strong></small>
                    <?php } ?>
                    
                    <?php if($queryIn !='tools') {?>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=tools'?>" class="link-tag-button">TOOLS</a>
                    <?php } ?>

                    <?php if($queryIn =='tools') {?>
                    <small><strong>TOOLS</strong></small>
                    <?php } ?>

                    <?php if($queryIn !='teacher-files') {?>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=teacher-files'?>" class="link-tag-button">TEACHER FILES</a>
                    <?php } ?>

                    <?php if($queryIn =='teacher-files') {?>
                    <small><strong>TEACHER FILES</strong></small>
                    <?php } ?>

                    <?php if($queryIn !='articles') {?>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=articles'?>" class="link-tag-button">ARTICLES</a>
                    <?php } ?>

                    <?php if($queryIn =='articles') {?>
                    <small><strong>ARTICLES</strong></small>
                    <?php } ?>

                    <?php if($queryIn !='researches') {?>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=researches'?>" class="link-tag-button">RESEARCHES</a>
                    <?php } ?>

                    <?php if($queryIn =='researches') {?>
                    <small><strong>RESEARCHES</strong></small>
                    <?php } ?>

                    <?php if($queryIn !='accounts') {?>
                    <small>|</small>
                    <a href="<?php echo '?query='.urlencode($query).'&query-in=accounts'?>" class="link-tag-button">ACCOUNTS</a>
                    <?php } ?>

                    <?php if($queryIn =='accounts') {?>
                    <small>|</small>
                    <small><strong>ACCOUNTS</strong></small>
                    <?php } ?>
                </nav>
                <hr>


            </div>

            <?php if ($query && $sqlSearchResult->num_rows>0) {
            while ($searched=$sqlSearchResult->fetch_assoc()) { 
                $searchedTitle = $searched[$titleColumn];
                $searchedSlug = $searched[$slugColumn];

            if ($queryIn !='general-contents') {
            $searchedDescription = $searched[$descriptionColumn];
            }

            if ($queryIn=='tools') {
            $searchedLink = $searched[$linkColumn];
            }

            if ($queryIn=='accounts') {
            $searchedUsername = $searched[$usernameColumn];
            }

            $searchedTable='';

            if ($queryIn=='general-contents') {
                $searchedTable=$searched[$tableColumn];
                $foreignId = $searched[$foreignIdColumn];

                if($searchedTable=='school_researches') {
                    $searchedType ='Research';
                    $pageLink=$website.'/researches/';
                    $originalIdColumn= 'school_researchId';
                    $descriptionColumn='school_researchAbstract';
                }

                if($searchedTable=='teacher_files') {
                    $searchedType ='Teacher File';
                    $pageLink=$website.'/teacher-files/';
                    $originalIdColumn= 'teacher_fileId';
                    $descriptionColumn='teacher_fileDescription';
                }

                if($searchedTable =='writer_articles') {
                    $searchedType ='Article';
                    $pageLink=$website.'/articles/';
                    $originalIdColumn= 'writer_articleId';
                    $descriptionColumn='writer_articleContent';
                }

                if($searchedTable =='developer_tools') {
                    $searchedType ='Tool';
                    $originalIdColumn= 'developer_toolId';
                    $descriptionColumn='developer_toolDescription';

                    $sqlSearchedToolInfo = "SELECT * FROM $searchedTable WHERE developer_toolId = $foreignId";
                    $sqlSearchedToolInfoResult = mysqli_query ($conn,$sqlSearchedToolInfo);
                    $searchedToolInfo=$sqlSearchedToolInfoResult->fetch_assoc();

                if($searchedToolInfo) {
                    $searchedToolLink = $searchedToolInfo ['developer_toolLink'];
                }
                }
                
                $sqlGenContentInfo = "SELECT * FROM $searchedTable WHERE $originalIdColumn='$foreignId'";
                $sqlGenContentInfoResult = mysqli_query($conn,$sqlGenContentInfo);
                $genContentInfo = $sqlGenContentInfoResult->fetch_assoc();

                if ($genContentInfo) {
                    $searchedDescription = $genContentInfo [$descriptionColumn];
                }

            } ?>

        

            <div class="search-list">
            <?php if($queryIn=='tools'){?>
            <strong><a href="<?php echo $searchedLink?>"><?php echo $searchedTitle?></a></strong>
            <?php } ?>

            <?php if($queryIn=='general-contents' && $searchedTable=='developer_tools'){?>
            <strong><a href="<?php echo $searchedToolLink?>"><?php echo $searchedTitle?></a></strong>
            <?php } ?>

            
            <?php if($queryIn!='tools' && $searchedTable !='developer_tools'){?>
            
                <?php if ($queryIn!='accounts') {?>
                <strong><a href="<?php echo $pageLink.$searchedSlug;?>"><?php echo $searchedTitle?></a></strong>
                <?php } ?>

                <?php if ($queryIn=='accounts') {?>
                <strong><a href="<?php echo $pageLink.$searchedUsername?>"><?php echo $searchedTitle?></a></strong>
                <?php } ?>

            <?php } ?>

            <?php if($queryIn=='general-contents') {?>
                <small>[<?php echo $searchedType;?>]</small>
            <?php } ?>

            <?php if ($searchedDescription && $queryIn!='articles' && $searchedTable !='writer_articles') {?>
                <br><br><p><?php echo substr($searchedDescription,0,500);?></p>
                <?php } ?>

        
            <hr>
            </div>

            

            <?php } }?>

            <?php if($query && $sqlSearchResult->num_rows>0 && $totalPages > 1) {?>
                <?php require (INCLUDESLAYOUT_PATH.'/pagination.php');?>  
            <?php } ?> 

        </div>
    
        <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>

        


    </div>


    <?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>
