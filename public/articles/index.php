<?php

require '../../private/initialize.php';

$articleToRead = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : "";
$articlePreview = isset($_GET['preview']) ? true : false;
$articleTitle="";
$unpublishedNotice=false;
$articleInfo = '';


if ($articleToRead) {
   
    $sqlArticleInfo = "SELECT * FROM writer_articles WHERE writer_articleSlug = '$articleToRead'";
    $sqlArticleInfoResult = mysqli_query($conn,$sqlArticleInfo);
    $articleInfo = $sqlArticleInfoResult->fetch_assoc();

    //If the article exists, assign values to the variables.
    $articleWriterId="";
    $articleTitle="";
    $articleImage="";
    $articleCategory="";
    $articleTopic="";
    $articleContent="";
    $articleWriter="";
    $articleUpdateDate="";

    if ($articleInfo) {
        $articleId = $articleInfo ['writer_articleId'];
        $articleWriterId = $articleInfo ['writer_articleWriterId'];

        $sqlWriterInfo = "SELECT * FROM registrations WHERE registrantId = $articleWriterId";
        $sqlWriterInfoResult = mysqli_query($conn,$sqlWriterInfo);
        $writerInfo = $sqlWriterInfoResult->fetch_assoc();
        if($writerInfo) {
            $articleWriter = $writerInfo ['registrantAccountName'];
        } else {
            $articleWriter = "";
        }

        $articleTitle = $articleInfo ['writer_articleTitle'];
        $articleImage = $articleInfo ['writer_articleImage'] ? $privateFolder.$articleInfo ['writer_articleImage'] : "";
        $articleCategory = $articleInfo ['writer_articleCategory'];
        $articleTopic = $articleInfo ['writer_articleTopic'];
        $articleContent = $articleInfo ['writer_articleContent'];
        $articleEditorId = $articleInfo ['writer_articleEditors'];
        $articleEditor = "";

        if ($articleEditorId) {
            $sqlEditorInfo = "SELECT * FROM registrations WHERE registrantId = '$articleEditorId'";
            $sqlEditorInfoResult = mysqli_query($conn,$sqlEditorInfo);
            $editorInfo = $sqlEditorInfoResult->fetch_assoc();
            if($editorInfo) {
                $articleEditor = $editorInfo ['registrantAccountName'];
            }
        }
        
        $articlePubDate = $articleInfo ['writer_articlePubDate'];
        $articleUpdateDate = $articleInfo ['writer_articleUpdateDate'];
        $articleStatus = $articleInfo ['writer_articleStatus'];

        
        if ($articleStatus!="Published") {

            $unpublishedNotice = true;
        }





        if ($articlePreview) {

            if ($articleStatus=='Published') {

                if ($registrantId) {
                
                    if ($articleWriterId ==$registrantId) {
                    header('Location:'.$website.'/articles/'.$articleToRead);
                    } 

                    if ($articleEditorId ==$registrantId) {
                    header('Location:'.$website.'/articles/'.$articleToRead);
                    } 

                }
            
                if (!$registrantId) {
                header('Location:'.$website.'/articles/'.$articleToRead);
                }


            }

            if ($articleStatus !='Published') {

                if (!$registrantId) {
                    header('Location:'.$website.'/articles/'.$articleToRead);
                }

            }
        }

        if (!$articlePreview) {

            if ($articleStatus!='Published') {
        
                if ($registrantId) {

                    if ($articleWriterId ==$registrantId || $articleEditorId ==$registrantId) {
                        
                    header('Location:'.$website.'/articles/'.$articleToRead.'?preview=yes');

                    }  
                }   

            } 
    
        }   


    }



} 

    

    $pageName =$articleTitle ? $articleTitle :  "Articles";

    if ($articlePreview) {
        $pageName = '[Preview] '.$pageName;
    }

    if ($pageName == 'Terms of Use') {
        header ('Location:'.$website.'/terms-of-use/');
    }

    if ($pageName == 'About Us') {
        header ('Location:'.$website.'/about-us/');
    }

    if ($pageName == 'Data Privacy') {
        header ('Location:'.$website.'/data-privacy/');
    }

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');







if (!$articleToRead) {

$table = 'writer_articles';
$statusColumn = 'writer_articleStatus';
$statusValue = 'Published';
$categoryColumn = 'writer_articleCategory';
$categoryValue = 'Administrative';
$sortColumn = 'writer_articlePubDate';


//$resultsPerPage variable is set in the header.

$result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE $statusColumn='$statusValue' AND $categoryColumn !='$categoryValue'");
$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));

$offset = ($page - 1) * $resultsPerPage;

$sqlArticlesList = "SELECT * FROM $table WHERE $statusColumn='$statusValue' AND $categoryColumn !='$categoryValue' ORDER BY $sortColumn DESC LIMIT $offset , $resultsPerPage";

$sqlArticlesListResult = mysqli_query($conn,$sqlArticlesList);


}


?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="articles-page" class="page with-sidebars-page with-single-sidebar-page" >
    
    <div class="page-details page-details-single-sidebar">

        <?php if (!$articleToRead) {//This will show if no article is read.?>
        
            <?php if ($sqlArticlesListResult->num_rows > 0)  {
        
            while ($articlesList = $sqlArticlesListResult->fetch_assoc()) { 
            $articleListId = $articlesList ['writer_articleId'];
            $articleListTitle = $articlesList ['writer_articleTitle']; 
            $articleListSlug = $articlesList ['writer_articleSlug']; 
            $articleListCategory = $articlesList ['writer_articleCategory'];
            $articleListTopic = $articlesList ['writer_articleTopic'];
            $articleListWriterId = $articlesList ['writer_articleWriterId'];
            $articleListEditorId = $articlesList ['writer_articleEditors'];

            //Get the writer's info
            $sqlToolListWriterInfo = "SELECT registrantAccountName FROM registrations WHERE registrantId = '$articleListWriterId'";
            $sqlArticleListWriterInfoResult = mysqli_query($conn,$sqlToolListWriterInfo);
            $articleListWriterInfo =$sqlArticleListWriterInfoResult->fetch_assoc();

            //Get the editor's info
            $sqlToolListEditorInfo = "SELECT registrantAccountName FROM registrations WHERE registrantId = '$articleListEditorId'";
            $sqlArticleListEditorInfoResult = mysqli_query($conn,$sqlToolListEditorInfo);
            $articleListEditorInfo =$sqlArticleListEditorInfoResult->fetch_assoc();
            
            $articleListWriter = $articleListWriterInfo ? $articleListWriterInfo ['registrantAccountName'] : "";
            $articleListEditor = $articleListEditorInfo ? $articleListEditorInfo ['registrantAccountName'] : "";
            $articleListWriteDate = $articlesList ['writer_articleWriteDate'];
            $articleListPubDate = $articlesList ['writer_articlePubDate'];
            $articleListUpdateDate =$articlesList ['writer_articleUpdateDate'];
            $articleListImage = $articlesList ['writer_articleImage'] ? $privateFolder.$articlesList ['writer_articleImage'] : $website.'/assets/images/default-featured-image.jpg';

            ?>

        <div class="list">
            <div class="list-image">
                <img src="<?php echo $articleListImage?>">
            </div>

            <div class="list-info">
                <p>Title: <?php echo $articleListTitle?></p>
                <p>Category: <?php echo $articleListCategory?></p>
                <p>Topic (s): <?php echo $articleListTopic?></p>
                <p>Writer: <?php echo $articleListWriter?></p>
                <?php if ($articleListEditor) {?>
                    <p>Editor: <?php echo $articleListEditor?></p>
                <?php }?>
                <p>Published: <?php echo dcomplete_format($articleListPubDate)?></p>
                <?php if ($articleListUpdateDate>$articleListPubDate) {?>
                    <p>Updated: <?php echo dcomplete_format($articleListUpdateDate)?></p>
                <?php } ?>
                <div class="list-buttons-container">
                    <a class="link-tag-button" href="<?php echo $website.'/articles/'.$articleListSlug;?>">Read</a>
                    <a class="link-tag-button" href="">Share</a>
                    <?php if($articleListWriterId ==$registrantId) {?>
                    <a class="link-tag-button" href="<?php echo '../../private/includes/processing/update-article-info-processing.php?unpublish='.$articleListId;?>">Unpublish</a>

                     <button class="link-tag-button" id="<?php echo 'main-unpublish-article-'.$articleListId;?>">AJAX Unpublish</button> 
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


    


    <?php //This will show if an article is read.
    if ($articleToRead) {?>

            <?php 
            $articleAccess =false;
            if (!$unpublishedNotice && !$registrantId) {
                $articleAccess = true;
            }

            if ($unpublishedNotice && $registrantId && $articleWriterId == $registrantId) {
                $articleAccess = true;
            }

            if ($unpublishedNotice && $registrantId && $articleEditorId == $registrantId) {
                $articleAccess = true;
            }

            ?>
            <div class="live-article-container">
            <?php if ($articleAccess)  { ?>
                
                <h1 id="live-article-title"><?php echo $articleTitle?></h1>
                <div id="live-article-details-container">
                        <div>
                            <em>by </em><em><?php echo $articleWriter;?></em>
                        </div>
                        <div>
                            <em>Category: </em><em><?php echo $articleCategory;?></em>
                        </div>
                        <div>
                            <em>Published: </em><em><?php echo dcomplete_format($articlePubDate);?></em>
                        </div>

                        <?php if ($articleUpdateDate > $articlePubDate) {?>
                        <div>
                            <em>Updated: </em><em><?php echo dcomplete_format($articleUpdateDate);?></em>
                        </div>
                        <?php } ?>

                        <?php if ($articleEditor){?>
                        <div>
                            <em>Editor: </em><em><?php echo $articleEditor;?></em>
                        </div>
                        <?php } ?>
                </div>

                <?php if ($articleImage) {?>
                    <img src="<?php echo $articleImage?>" alt="<?php echo 'Featured image:'.$articleTitle;?>" ><br><br>
                <?php }?>

                <div class="article-content">
                    <?php echo $articleContent?>
                </div>

                

                
            <?php }?>


            <?php if ($articleInfo) { ?>
                <?php if ($unpublishedNotice) { ?>
                    <?php if ($registrantId) { ?>
                        <?php if ($articleWriterId != $registrantId && $articleEditorId != $registrantId) { ?>
                            <div class="content-notice">
                                <p>It seems that the article is currently not published.</p>
                            </div>
                        <?php }?>
                    <?php } ?>
                    <?php if (!$registrantId) { ?>
                            <div class="content-notice">
                                <p>It seems that the article is currently not published.</p>
                            </div>
                    <?php }?>
                <?php } ?>
            <?php } ?>

            <?php if (!$articleInfo) {?>
            <div class="content-notice">
                <p >Opps! We cannot find the article.</p>
            </div>
            <?php }  ?>

            <?PHP require (INCLUDESLAYOUT_PATH.'/native-ad.php'); ?>


            <?php if ($articleInfo) { ?>
          
                <?php //Get the list of articles with the same category.

                $sqlCategoryArticlesList = "SELECT * FROM writer_articles WHERE writer_articleCategory = '$articleCategory' AND writer_articleSlug != '$articleToRead' AND writer_articleStatus='Published' ORDER BY writer_articleId DESC LIMIT 3";
                $sqlCategoryArticlesListResult = mysqli_query($conn,$sqlCategoryArticlesList); ?>

                <?php if ($sqlCategoryArticlesListResult->num_rows>0) { ?>
                <div class="category-articles-container" >
                
                <h5>More for <?php echo $articleCategory?></h5>
                <hr>
                <div class="category-article">

                <?php while ($categoryArticles = $sqlCategoryArticlesListResult->fetch_assoc()) { 
                $categoryArticleId = $categoryArticles ['writer_articleId']; 
                $categoryArticleTitle = $categoryArticles ['writer_articleTitle'];
                $categoryArticleSlug = $categoryArticles ['writer_articleSlug']; ?>   
               
                    <?php if ($categoryArticleId!=$articleId) {?>
                        <a href="<?php echo $website.'/articles/'.$categoryArticleSlug;?>">
                            <em>
                            <?php if(str_word_count($categoryArticleTitle)>$word_limit_title) {
                                echo limit_words_title($categoryArticleTitle,$word_limit_title);
                            } else {
                                echo $categoryArticleTitle;
                            } ?>
                            </em>
                        </a>
                    <?php }?>
              
                <?php } ?>

                </div>
                <hr>
                 
                
                <?php  } ?> 


            </div>

           

            <?php } ?>


            

        </div>
        
        <?php require (INCLUDESPROCESSING_PATH.'/content-performance-tracking-processing.php');?>

    <?php }  ?>

    

    </div>

    


    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>


</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>


