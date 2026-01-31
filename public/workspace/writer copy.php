<?php 

require '../../private/initialize.php'; 

$pageName = "Workspace - Writer";

$articleToEdit = isset($_GET['article']) ? $_GET['article']  : '';
$editing = isset($_GET['edit']) ? $_GET['edit'] : "";


//FOR NON EDIT MODE LOCAL SAVING

//For title
if (isset($_POST['article_title_autosaved_nonedit'])) {
    $titleAutoSavedPost = htmlspecialchars($_POST['article_title_autosaved_nonedit']);
    $_SESSION['titleAutoSavedSessionNonEdit'] = $titleAutoSavedPost;
}


//For category
if (isset($_POST['article_category_autosaved_nonedit'])) {
    $categoryAutoSavedPost = htmlspecialchars($_POST['article_category_autosaved_nonedit']);
    $_SESSION['categoryAutoSavedSessionNonEdit'] = $categoryAutoSavedPost;
}

//For topic
if (isset($_POST['article_topic_autosaved_nonedit'])) {
    $topicAutoSavedPost = htmlspecialchars($_POST['article_topic_autosaved_nonedit']);
    $_SESSION['topicAutoSavedSessionNonEdit'] = $categoryAutoSavedPost;
}

//For content
if (isset($_POST['article_content_autosaved_nonedit'])) {
    $contentAutoSavedPost = htmlspecialchars($_POST['article_content_autosaved_nonedit']);
    $_SESSION['contentAutoSavedSessionNonEdit'] = $contentAutoSavedPost;
}


//FOR NON EDIT MODE

//For title
if (isset($_POST['article_title_autosaved_edit'])) {
    $titleAutoSavedPostEdit = htmlspecialchars($_POST['article_title_autosaved_edit']);
    $_SESSION['titleAutoSavedSessionEdit'] = $titleAutoSavedPostEdit;
}

//For category
if (isset($_POST['article_category_autosaved_edit'])) {
    $categoryAutoSavedPostEdit = htmlspecialchars($_POST['article_category_autosaved_edit']);
    $_SESSION['categoryAutoSavedSessionEdit'] = $categoryAutoSavedPostEdit;
}

//For topic
if (isset($_POST['article_topic_autosaved_edit'])) {
    $topicAutoSavedPostEdit = htmlspecialchars($_POST['article_topic_autosaved_edit']);
    $_SESSION['topicAutoSavedSessionEdit'] = $categoryAutoSavedPostEdit;
}

//For content
if (isset($_POST['article_content_autosaved_edit'])) {
    $contentAutoSavedPostEdit = htmlspecialchars($_POST['article_content_autosaved_edit']);
    $_SESSION['contentAutoSavedSessionEdit'] = $contentAutoSavedPostEdit;
}

  

require (INCLUDESLAYOUT_PATH.'/head.php');

if(!$writerRegistration) {
  header('Location:'.$website.'/account/');
}



//New article details
$title = "";
$category = "";
$topic = "";
$editor = "";
$content = "";



//FOR NON-EDIT MODE
if (isset($_SESSION['titleAutoSavedSessionNonEdit'])) {
    $title  = $_SESSION['titleAutoSavedSessionNonEdit'];
}



if (isset($_SESSION['categoryAutoSavedSessionNonEdit'])) {
    $category  = $_SESSION['categoryAutoSavedSessionNonEdit'];
}



if (isset($_SESSION['topicAutoSavedSessionNonEdit'])) {
    $topic = $_SESSION['topicAutoSavedSessionNonEdit'];
}




if (isset($_SESSION['contentAutoSavedSessionNonEdit'])) {
    $content  = $_SESSION['contentAutoSavedSessionNonEdit'];
}



//FOR EDIT MODE

if (isset($_SESSION['titleAutoSavedSessionEdit'])) {
    $title  = $_SESSION['titleAutoSavedSessionEdit'];
}



if (isset($_SESSION['categoryAutoSavedSessionEdit'])) {
    $category  = $_SESSION['categoryAutoSavedSessionEdit'];
}



if (isset($_SESSION['topicAutoSavedSessionEdit'])) {
    $topic = $_SESSION['topicAutoSavedSessionEdit'];
}



if (isset($_SESSION['contentAutoSavedSessionEdit'])) {
    $content  = $_SESSION['contentAutoSavedSessionEdit'];
}






















$status="";
if (isset($_SESSION['articleStatus'])) {
    $status  = $_SESSION['articleStatus'];
}



$comments="";

$isReviewed = "";

$featuredImage="";






if($articleToEdit){
   
    if (is_numeric($articleToEdit)){
  
    $sqlEditableArticle = "SELECT * FROM writer_articles WHERE writer_articleId = $articleToEdit";
    $sqlEditableArticleResult = mysqli_query($conn,$sqlEditableArticle);
    $editableArticle = $sqlEditableArticleResult->fetch_assoc();

    if($editableArticle) {
        $_SESSION ['edit-mode'] = "yes";
        $title = $editableArticle ['writer_articleTitle'];
        $slug = $editableArticle ['writer_articleSlug'];
        $category = $editableArticle ['writer_articleCategory'];
        $topic = $editableArticle ['writer_articleTopic'];
        $editorId = $editableArticle ['writer_articleEditors'];

        $sqlEditor = "SELECT * FROM registrations WHERE registrantId= '$editorId'";
        $sqlEditorResult = mysqli_query($conn,$sqlEditor);
        $editorInfo = $sqlEditorResult->fetch_assoc();

        if ($editorInfo) {
          $editor = $editorInfo ['registrantFirstName']." ".$editorInfo ['registrantMiddleName']." ".$editorInfo ['registrantLastName'];
        }
        $featuredImage = $editableArticle ['writer_articleImage'] ? $privateFolder.$editableArticle ['writer_articleImage'] : "";
       
        $latestVersion = (int) $editableArticle ['writer_articleContentLatestVersionNumber'];
        
        $versionNumber = $latestVersion;  


        $setVersion = (int) $_GET['version'];

        if ($setVersion) {
             if ($setVersion > $latestVersion) {
            $versionNumber =  $latestVersion;
            }

            if ($setVersion < 1) {
                $versionNumber = 1;
            }

            $versionNumber = $setVersion;
        }

     
        $content = '';

        if ($versionNumber) {
            $sqlGetVersions = "SELECT * FROM writer_article_versions WHERE writer_articleVersionForeignId = '$articleToEdit' AND writer_articleVersionNumber = $versionNumber";

            $sqlGetVersionsResult = mysqli_query ($conn, $sqlGetVersions);
            $versions= $sqlGetVersionsResult -> fetch_assoc();

            if ($versions) {
                $db_content = $versions ['writer_articleVersionContent'];
                $content = $db_content;
            }

        }

        $comments = $editableArticle ['writer_articleComments'];
        $status = $editableArticle ['writer_articleStatus'];


        if ($status=="Waiting for Update") {
            $isReviewed = "yes";
        }

        if (isset($_SESSION['contentAutoSavedSessionEdit']) && !empty($_SESSION['contentAutoSavedSessionEdit']) && $_SESSION['contentAutoSavedSessionEdit'] !=$db_content){
            $content = $_SESSION['contentAutoSavedSessionEdit'];
        }
        
    } 

    } else {
        header('Location:'.$website.'/workspace/writer.php');
    }


} 







?>




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