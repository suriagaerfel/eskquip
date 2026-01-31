<?php 


require '../../private/initialize.php'; 

$pageName = "Workspace - Editor";

$title = "";
$slug = "";
$category = "";
$topic = "";
$editor = "";
$content = "";
$status="";
$comments="";

$isReviewed = "";
$isPinned = "";
$featuredImage="";


$articleToEdit =isset($_GET['article']) ? $_GET['article'] : "";
$myEditsOnly = isset($_GET['my-edits-only']) ? $_GET['my-edits-only'] : "";


if($articleToEdit){
   if (is_numeric($articleToEdit)){
        
    $sqlEditableArticle = "SELECT * FROM writer_articles WHERE writer_articleId = $articleToEdit";
    $sqlEditableArticleResult = mysqli_query($conn,$sqlEditableArticle);
    $editableArticle = $sqlEditableArticleResult->fetch_assoc();

    if($editableArticle) {
        $_SESSION ['edit-mode'] = "yes";
        $articleToEditId=$editableArticle ['writer_articleId'];
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

        $latestVersion = (int) $editableArticle ['writer_articleContentLatestVersionNumber'];
        $versionNumber = $latestVersion; 
        
        $content = '';

        if ($versionNumber) {
            $sqlGetVersions = "SELECT * FROM writer_article_versions WHERE writer_articleVersionForeignId = '$articleToEdit' AND writer_articleVersionNumber = $versionNumber";

            $sqlGetVersionsResult = mysqli_query ($conn, $sqlGetVersions);
            $versions= $sqlGetVersionsResult -> fetch_assoc();

            if ($versions) {
                $content = $versions ['writer_articleVersionContent'];
            }

        }

        $featuredImage = $editableArticle ['writer_articleImage'] ? $privateFolder.$editableArticle ['writer_articleImage'] : "";
        // $content = $editableArticle ['writer_articleContent'];
        $status = $editableArticle ['writer_articleStatus'];

        $comments = $editableArticle ['writer_articleComments'];

        if ($status=="Waiting for Update" || $status=="To Revise") {
            $isReviewed = "yes";
        }

        if($editableArticle['writer_articleEditors']) {
        $isPinned="yes";
      }

        
    } else {
        header('Location:'.$website.'/workspace/editor.php');
    }

         if ($myEditsOnly && $editorId != $registrantId) {
        header('Location:'.$website.'/workspace/editor.php');
        }

         if (!$myEditsOnly && $editorId == $registrantId) {
        header('Location:'.$website.'/workspace/editor.php?my-edits-only=yes&article='.$articleToEdit);
        }



    } else {
        header('Location:'.$website.'/workspace/editor.php');
    }



    
} 


require (INCLUDESLAYOUT_PATH.'/head.php');


?>




<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="workspace-page-editor" class="page workspace-page">

<?php require (INCLUDESLAYOUT_PATH.'/editor-sidebar.php');?>

<?php require (INCLUDESLAYOUT_PATH.'/articles.php');?>






<?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>




<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>
</html>