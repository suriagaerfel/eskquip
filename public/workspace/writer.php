<?php 

require '../../private/initialize.php'; 

$pageName = "Workspace - Writer";

$articleToEdit = isset($_GET['article']) ? $_GET['article'] : "";
$editing = isset($_GET['edit']) ? $_GET['edit'] : "";

$title = "";
$category = "";
$topic = "";
$editor = "";

$content = "";
$comments="";
$isReviewed = "";
$image="";
$status="";

$setVersion='';
$latestVersion='';
$versionNumber='';




if (!$articleToEdit) {

//GET AUTO-SAVED INFO

//For title
if (isset($_POST['article_title_autosaved_nonedit'])) {
    $articleTitleAutoSavedPost = htmlspecialchars($_POST['article_title_autosaved_nonedit']);
    $_SESSION['articleTitleAutoSavedSessionNonEdit'] = $articleTitleAutoSavedPost;
}

//For category
if (isset($_POST['article_category_autosaved_nonedit'])) {
    $articleCategoryAutoSavedPost = htmlspecialchars($_POST['article_category_autosaved_nonedit']);
    $_SESSION['articleCategoryAutoSavedSessionNonEdit'] = $articleCategoryAutoSavedPost;
}

//For topic
if (isset($_POST['article_topic_autosaved_nonedit'])) {
    $articleTopicAutoSavedPost = htmlspecialchars($_POST['article_topic_autosaved_nonedit']);
    $_SESSION['articleTopicAutoSavedSessionNonEdit'] = $articleTopicAutoSavedPost;
}

//For content
if (isset($_POST['article_content_autosaved_nonedit'])) {
    $articleContentAutoSavedPost = htmlspecialchars($_POST['article_content_autosaved_nonedit']);
    $_SESSION['articleContentAutoSavedSessionNonEdit'] = $articleContentAutoSavedPost;
}




//SET AUTO-SAVED INFO TO A SESSION

//For title
if (isset($_SESSION['articleTitleAutoSavedSessionNonEdit'])) {
    $title  = $_SESSION['articleTitleAutoSavedSessionNonEdit'];
}

//For category
if (isset($_SESSION['articleCategoryAutoSavedSessionNonEdit'])) {
    $category  = $_SESSION['articleCategoryAutoSavedSessionNonEdit'];
}


//For topic
if (isset($_SESSION['articleTopicAutoSavedSessionNonEdit'])) {
    $topic = $_SESSION['articleTopicAutoSavedSessionNonEdit'];
}


//For content
if (isset($_SESSION['articleContentAutoSavedSessionNonEdit'])) {
    $content  = $_SESSION['articleContentAutoSavedSessionNonEdit'];
}


}

if($registrantId && $articleToEdit){
        if (is_numeric($articleToEdit)){
      
        $sqlEditableArticle = "SELECT * FROM writer_articles WHERE writer_articleId = $articleToEdit AND writer_articleWriterId = $registrantId";
        $sqlEditableArticleResult = mysqli_query($conn,$sqlEditableArticle);
        $editableArticle = $sqlEditableArticleResult->fetch_assoc();

        if($editableArticle) {

            $specificArticleCategory = "article_{$articleToEdit}_category";
            $specificArticleTopic = "article_{$articleToEdit}_topic";
            $specificArticleContent = "article_{$articleToEdit}_content";
            $db_category = '';
            $db_topic = '';
            $db_content = '';

            //For category
            if (isset($_POST['article_category_autosaved_edit'])) {
                $categoryAutoSavedPostEdit = htmlspecialchars($_POST['article_category_autosaved_edit']);
                $_SESSION [$specificArticleCategory]= $categoryAutoSavedPostEdit;
            }

            //For topic
            if (isset($_POST['article_topic_autosaved_edit'])) {
                $topicAutoSavedPostEdit = htmlspecialchars($_POST['article_topic_autosaved_edit']);
                $_SESSION[$specificArticleTopic]= $topicAutoSavedPostEdit;
            }

            //For content
            if (isset($_POST['article_content_autosaved_edit'])) {
                $contentAutoSavedPostEdit = $_POST['article_content_autosaved_edit'];
                $_SESSION [$specificArticleContent] = trim($contentAutoSavedPostEdit);
            }

            unset($_SESSION['articleTitleAutoSavedSessionNonEdit']);
            unset($_SESSION['articleCategoryAutoSavedSessioNonEdit']);
            unset($_SESSION['articleTopicAutoSavedSessionNonEdit']);
            unset($_SESSION['articleContentAutoSavedSessionNonEdit']);

            $title = $editableArticle ['writer_articleTitle'];
            $slug = $editableArticle ['writer_articleSlug'];
            $db_category = $editableArticle ['writer_articleCategory'];
            $db_topic = $editableArticle ['writer_articleTopic'];
            $editorId = $editableArticle ['writer_articleEditors'];

            $sqlEditor = "SELECT * FROM registrations WHERE registrantId= '$editorId'";
            $sqlEditorResult = mysqli_query($conn,$sqlEditor);
            $editorInfo = $sqlEditorResult->fetch_assoc();

            if ($editorInfo) {
            $editor = $editorInfo ['registrantFirstName']." ".$editorInfo ['registrantMiddleName']." ".$editorInfo ['registrantLastName'];
            }
            $image = $editableArticle ['writer_articleImage'] ? $privateFolder.$editableArticle ['writer_articleImage'] : "";
        
            $latestVersion = (int) $editableArticle ['writer_articleContentLatestVersionNumber'];
            
            $versionNumber = $latestVersion;
            
            require (INCLUDESPROCESSING_PATH.'/editable-content-version-number.php');
            

            $comments = $editableArticle ['writer_articleComments'];
            $status = $editableArticle ['writer_articleStatus'];


            if ($status=="Waiting for Update") {
            $isReviewed = "yes";
        }

            
        $category = $db_category;

            // if (isset($_SESSION[$specificArticleCategory])) {
            //     if ($_SESSION[$specificArticleCategory] !=$db_category){
            //     $category = $_SESSION[$specificArticleCategory];
            //     }
            // } else {
            //         $_SESSION[$specificArticleCategory] = $category;
            // }

            $topic = $db_topic;

            // if (isset($_SESSION[$specificArticleTopic])) {
            // if ($_SESSION[$specificArticleTopic] !=$db_topic){
            //     $topic = $_SESSION[$specificArticleTopic];
            //     }

            // } else {
            //         $_SESSION[$specificArticleTopic]=$topic;
            // }

            $content = $db_content;

            if (isset($_SESSION[$specificArticleContent])) {
                    if ($_SESSION[$specificArticleContent] !==$db_topic){
                    $content = $_SESSION [$specificArticleContent];
                    }
            } else {
                $_SESSION [$specificArticleContent]=$content;
            }
            


        } else {
            header('Location:'.$website.'/workspace/writer.php');
        }

    } else {
        header('Location:'.$website.'/workspace/writer.php');
    }



    if (!isset($_GET['edit'])) {
        header('Location:'.$website.'/workspace/writer.php');
    }

}

?>






  

    <?php require (INCLUDESLAYOUT_PATH.'/head.php'); ?>
    <?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
    <?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

    <div id="workspace-page-writer" class="page workspace-page">
        <?php require (INCLUDESLAYOUT_PATH.'/writer-sidebar.php');?>
        <?php require (INCLUDESLAYOUT_PATH.'/articles.php');?>
        <?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
    </div>





    <?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>







</html>