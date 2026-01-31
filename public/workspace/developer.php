
<?php 


require '../../private/initialize.php'; 

$pageName = "Workspace - Developer";

$toolToEdit = isset($_GET['tool']) ? $_GET['tool'] : "";

$title = "";
$category = "";
$description = "";
$status="";
$fileLink="";
$fileId="";
$toolLink="";
$image='';



if (!$toolToEdit) {

//GET AUTOSAVED INFO

//For title
if (isset($_POST['tool_title_autosaved_nonedit'])) {
    $toolTitleAutoSavedPost = htmlspecialchars($_POST['tool_title_autosaved_nonedit']);
    $_SESSION['toolTitleAutoSavedSessionNonEdit'] = $toolTitleAutoSavedPost;
}

//For category
if (isset($_POST['tool_category_autosaved_nonedit'])) {
    $toolCategoryAutoSavedPost = htmlspecialchars($_POST['tool_category_autosaved_nonedit']);
    $_SESSION['toolCategoryAutoSavedSessionNonEdit'] = $toolCategoryAutoSavedPost;
}



//For description
if (isset($_POST['tool_description_autosaved_nonedit'])) {
    $toolDescriptionAutoSavedPost = htmlspecialchars($_POST['tool_description_autosaved_nonedit']);
    $_SESSION['toolDescriptionAutoSavedSessionNonEdit'] = $toolDescriptionAutoSavedPost;
}




//SET AUTO-SAVED INFO TO A SESSION

//For title
if (isset($_SESSION['toolTitleAutoSavedSessionNonEdit'])) {
    $title  = $_SESSION['toolTitleAutoSavedSessionNonEdit'];
}

//For category
if (isset($_SESSION['toolCategoryAutoSavedSessionNonEdit'])) {
    $category  = $_SESSION['toolCategoryAutoSavedSessionNonEdit'];
}


//For description
if (isset($_SESSION['toolDescriptionAutoSavedSessionNonEdit'])) {
    $description  = $_SESSION['toolDescriptionAutoSavedSessionNonEdit'];
}

}






if($toolToEdit){

    if (is_numeric($toolToEdit)){

    $sqlEditableTool = "SELECT * FROM developer_tools WHERE developer_toolId = '$toolToEdit' AND developer_toolOwner = $registrantId";
    $sqlEditableToolResult = mysqli_query($conn,$sqlEditableTool);
    $editableTool = $sqlEditableToolResult->fetch_assoc();

    if($editableTool) {

        $specificToolCategory = "tool_{$toolToEdit}_category";
        $specificToolTopic = "tool_{$toolToEdit}_topic";
        $specificToolDescription = "tool_{$toolToEdit}_description";

        $db_category = '';
        $db_topic = '';
        $db_description = '';


        //For category
        if (isset($_POST['tool_category_autosaved_edit'])) {
            $toolCategoryAutoSavedPostEdit = htmlspecialchars($_POST['tool_category_autosaved_edit']);
            $_SESSION [$specificToolCategory]= $toolCategoryAutoSavedPostEdit;
        }

        

        //For description
        if (isset($_POST['tool_description_autosaved_edit'])) {
            $toolDescriptionAutoSavedPostEdit = htmlspecialchars($_POST['tool_description_autosaved_edit']);
            $_SESSION [$specificToolDescription] = $toolDescriptionAutoSavedPostEdit;
        }


        unset($_SESSION['toolTitleAutoSavedSessionNonEdit']);
        unset($_SESSION['toolCategoryAutoSavedSessionNonEdit']);
        unset($_SESSION['toolDescriptionAutoSavedSessionNonEdit']);



        $title = $editableTool ['developer_toolTitle'];
        $db_category = $editableTool ['developer_toolCategory'];
        $db_description = $editableTool ['developer_toolDescription'];
        
        $status = $editableTool ['developer_toolStatus'];
        $review = $editableTool ['developer_toolForReview'];
        

        if ($review=="Under Review") {
            $isReviewed = "yes";
        }

        if ($review=="Ok") {
            $isReviewed = "";
        }


        $category = $db_category;

        // if (isset($_SESSION[$specificToolCategory])) {
        //     if ($_SESSION[$specificToolCategory] !=$db_category){
        //     $category = $_SESSION[$specificToolCategory];
        //     }
        // } else {
        //      $_SESSION[$specificToolCategory] = $category;
        // }


        $description = $db_description;

        if (isset($_SESSION[$specificToolDescription])) {
            if ($_SESSION[$specificToolDescription] !=$db_category){
            $description = $_SESSION[$specificToolDescription];
            }
        } else {
            $_SESSION[$specificToolDescription] = $description;
        }


        $image = $editableTool ['developer_toolIcon'] ? $privateFolder.$editableTool ['developer_toolIcon'] : "";
        $toolLinkEdit = $editableTool ['developer_toolLink'];


         $sqlToolFiles = "SELECT * FROM developer_uploaded_files WHERE developer_uploadedFileFolderId = '$toolToEdit'";
        $sqlToolFilesResult = mysqli_query($conn,$sqlToolFiles); 

        
    } else {
         header('Location:'.$website.'/workspace/developer.php');
    } 

    } else {

        header('Location:'.$website.'/workspace/developer.php');

    }


    if (!isset($_GET['edit'])) {
        header('Location:'.$website.'/workspace/developer.php');
    }




} 







require (INCLUDESLAYOUT_PATH.'/head.php');


?>


<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="workspace-page-developer" class="page workspace-page">

<?php require (INCLUDESLAYOUT_PATH.'/developer-sidebar.php');?>
<?php require (INCLUDESLAYOUT_PATH.'/tools.php');?>

<?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>








<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>