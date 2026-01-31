<?php 


require '../../private/initialize.php'; 

$pageName = "Workspace - Teacher";

//File to edit
$fileToEdit = isset($_GET['file']) ? $_GET['file'] : '';


$title = "";
$category = "";
$description = "";
$amount= "";
$accessType= "";
$sharedWith= "";

$status="";


if (!$fileToEdit) {
//GET AUTOSAVED INFO
//For title
if (isset($_POST['file_title_autosaved_nonedit'])) {
    $fileTitleAutoSavedPost = htmlspecialchars($_POST['file_title_autosaved_nonedit']);
    $_SESSION['fileTitleAutoSavedSessionNonEdit'] = $fileTitleAutoSavedPost;
}

//For category
if (isset($_POST['file_category_autosaved_nonedit'])) {
    $fileCategoryAutoSavedPost = htmlspecialchars($_POST['file_category_autosaved_nonedit']);
    $_SESSION['fileCategoryAutoSavedSessionNonEdit'] = $fileCategoryAutoSavedPost;
}



//For description
if (isset($_POST['file_description_autosaved_nonedit'])) {
    $fileDescriptionAutoSavedPost = htmlspecialchars($_POST['file_description_autosaved_nonedit']);
    $_SESSION['fileDescriptionAutoSavedSessionNonEdit'] = $fileDescriptionAutoSavedPost;
}

//For amount
if (isset($_POST['file_amount_autosaved_nonedit'])) {
    $fileAmountAutoSavedPost = htmlspecialchars($_POST['file_amount_autosaved_nonedit']);
    $_SESSION['fileAmountAutoSavedSessionNonEdit'] = $fileAmountAutoSavedPost;
}

//For access type
if (isset($_POST['file_access_type_autosaved_nonedit'])) {
    $fileAccessTypeAutoSavedPost = htmlspecialchars($_POST['file_access_type_autosaved_nonedit']);
    $_SESSION['fileAccessTypeAutoSavedSessionNonEdit'] = $fileAccessTypeAutoSavedPost;
}



//For shared with
if (isset($_POST['file_shared_with_autosaved_nonedit'])) {
    $fileSharedWithAutoSavedPost = htmlspecialchars($_POST['file_shared_with_autosaved_nonedit']);
    $_SESSION['fileSharedWithAutoSavedSessionNonEdit'] = $fileSharedWithAutoSavedPost;
}





//SET AUTO-SAVED INFO TO A SESSION

//For title
if (isset($_SESSION['fileTitleAutoSavedSessionNonEdit'])) {
    $title  = $_SESSION['fileTitleAutoSavedSessionNonEdit'];
}

//For category
if (isset($_SESSION['fileCategoryAutoSavedSessionNonEdit'])) {
    $category  = $_SESSION['fileCategoryAutoSavedSessionNonEdit'];
}


//For description
if (isset($_SESSION['fileDescriptionAutoSavedSessionNonEdit'])) {
    $description  = $_SESSION['fileDescriptionAutoSavedSessionNonEdit'];
}

//For description
if (isset($_SESSION['fileAmountAutoSavedSessionNonEdit'])) {
    $amount  = $_SESSION['fileAmountAutoSavedSessionNonEdit'];
}

//For access type
if (isset($_SESSION['fileAccessTypeAutoSavedSessionNonEdit'])) {
    $accessType  = $_SESSION['fileAccessTypeAutoSavedSessionNonEdit'];
}


//For access type
if (isset($_SESSION['fileSharedWithAutoSavedSessionNonEdit'])) {
    $sharedWith  = $_SESSION['fileSharedWithAutoSavedSessionNonEdit'];
}

}







require (INCLUDESLAYOUT_PATH.'/head.php');



if($registrantId && $fileToEdit){

    if (is_numeric($fileToEdit)){
    $sqlEditableFile = "SELECT * FROM teacher_files WHERE teacher_fileId = '$fileToEdit' AND teacher_fileOwner='$registrantId'";
    $sqlEditableFileResult = mysqli_query($conn,$sqlEditableFile);
    $editableFile = $sqlEditableFileResult->fetch_assoc();

    if($editableFile) {

    $specificFileCategory = "file_{$fileToEdit}_category";
    $specificFileDescription= "file_{$fileToEdit}_description";
    $specificFileAmount= "file_{$fileToEdit}_amount";
    $specificFileAccessType= "file_{$fileToEdit}_access_type";
    $specificFileSharedWith= "file_{$fileToEdit}_shared_with";

    $db_category = '';
    $db_description = '';
    $db_amount = '';
    $db_accessType = '';
    $db_sharedWith = '';

    //For category
    if (isset($_POST['file_category_autosaved_edit'])) {
        $fileCategoryAutoSavedPostEdit = htmlspecialchars($_POST['file_category_autosaved_edit']);
        $_SESSION [$specificFileCategory]= $fileCategoryAutoSavedPostEdit;
    }

    //For description
    if (isset($_POST['file_description_autosaved_edit'])) {
        $fileDescriptionAutoSavedPostEdit = htmlspecialchars($_POST['file_description_autosaved_edit']);
        $_SESSION [$specificFileDescription]= $fileDescriptionAutoSavedPostEdit;
    }

    //For amount
    if (isset($_POST['file_amount_autosaved_edit'])) {
        $fileAmountAutoSavedPostEdit = htmlspecialchars($_POST['file_amount_autosaved_edit']);
        $_SESSION [$specificFileAmount]= $fileAmountAutoSavedPostEdit;
    }

    //For access type
    if (isset($_POST['file_access_type_autosaved_edit'])) {
        $fileAccessTypeAutoSavedPostEdit = htmlspecialchars($_POST['file_access_type_autosaved_edit']);
        $_SESSION [$specificFileAccessType]= $fileAccessTypeAutoSavedPostEdit;
    }

    //For shared with
    if (isset($_POST['file_shared_with_autosaved_edit'])) {
        $fileSharedWithAutoSavedPostEdit = htmlspecialchars($_POST['file_shared_with_autosaved_edit']);
        $_SESSION [$specificFileSharedWith]= $fileSharedWithAutoSavedPostEdit;
    }


         unset($_SESSION['fileTitleAutoSavedSessionNonEdit']);
        unset($_SESSION['fileCategoryAutoSavedSessionNonEdit']);
        unset($_SESSION['fileDescriptionAutoSavedSessionNonEdit']);
        unset($_SESSION['fileAmountAutoSavedSessionNonEdit']);
        unset($_SESSION['fileAccessTypeAutoSavedSessionNonEdit']);
        unset($_SESSION['fileSharedWithAutoSavedSessionNonEdit']);




        $title = $editableFile ['teacher_fileTitle'];
        $slug = $editableFile ['teacher_fileSlug'];
        $db_category = $editableFile ['teacher_fileCategory'];
        $db_description = $editableFile ['teacher_fileDescription'];
        $db_accessType = $editableFile ['teacher_fileAccessType'];
        $db_sharedWith = $editableFile ['teacher_fileSharedWith'];
        $db_amount = $editableFile ['teacher_fileAmount'];

        $image = $editableFile ['teacher_fileImage'] ? $privateFolder.$editableFile ['teacher_fileImage'] : "";

        $latestVersion = (int) $editableFile ['teacher_fileLatestVersionNumber'];
            
        require (INCLUDESPROCESSING_PATH.'/editable-content-version-number.php');
        
        $status = $editableFile ['teacher_fileStatus'];
        $forSale = $editableFile ['teacher_fileForSale'];

        if ($forSale=="For Sale") {
            $isForSale = "yes";
        }


        $category = $db_category;

        // if (isset($_SESSION[$specificFileCategory])) {
        //     if ($_SESSION[$specificFileCategory] !=$db_category){
        //     $category = $_SESSION[$specificFileCategory];
        //     }
        // } else {
        //     $_SESSION[$specificFileCategory] = $category;
        // }


        $description = $db_description;

        if (isset($_SESSION[$specificFileDescription])) {
            if ($_SESSION[$specificFileDescription] !=$db_description){
            $description = $_SESSION[$specificFileDescription];
            }
        } else {
             $_SESSION[$specificFileDescription] = $description;
        }


        // $amount = $db_amount;

        // if (isset($_SESSION[$specificFileAmount])) {
        //     if ($_SESSION[$specificFileAmount] !=$db_category){
        //     $amount = $_SESSION[$specificFileAmount];
        // } 
        // }else {
        //    $_SESSION[$specificFileAmount] = $amount; 
        // }


        $accessType = $db_accessType;

        // if (isset($_SESSION[$specificFileAccessType])) {
       
        //     if ($_SESSION[$specificFileAccessType] !=$db_category){
        //     $accessType = $_SESSION[$specificFileAccessType];
        //     }
   
        // } else {
        //     $_SESSION[$specificFileAccessType] = $accessType;
        // }


        $amount = $db_amount;
         $sharedWith = $db_sharedWith;

        // if (isset($_SESSION[$specificFileSharedWith])) {
        //     if ($_SESSION[$specificFileSharedWith] !=$db_category){
        //     $sharedWith = $_SESSION[$specificFileSharedWith];
        //     }
        // } else {
        //     $_SESSION[$specificFileSharedWith] = $sharedWith;
        // }




        $fileLink = $privateFolder.$editableFile ['teacher_fileLink'];
        $fileFormat = $editableFile ['teacher_fileFormat'];
        
    } else {
        header('Location:'.$website.'/workspace/teacher.php');
    }

    } else {

        header('Location:'.$website.'/workspace/teacher.php');

    }



    if (!isset($_GET['edit'])) {
        header('Location:'.$website.'/workspace/teacher.php');
    }

} 

$showPurchases = isset($_GET['show-purchases']) ? $_GET['show-purchases'] : "";
$showFileOptions = isset($_GET['show-file-options']) ? $_GET['show-file-options'] : "";
$purchaseStatus = isset($_GET['purchase-status']) ? $_GET['purchase-status'] : "";

if (!$purchaseStatus) {
$sqlFilePurchases = "SELECT * FROM file_purchase WHERE file_purchaseFileOwnerId = '$registrantId' ORDER BY file_purchaseId DESC";
}

if ($purchaseStatus) {
    $sqlFilePurchases = "SELECT * FROM file_purchase WHERE file_purchaseFileOwnerId = '$registrantId' AND file_purchaseStatus = '$purchaseStatus' ORDER BY file_purchaseId DESC";
}


$sqlFilePurchasesResult = mysqli_query($conn,$sqlFilePurchases);


?>


<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="workspace-page-teacher" class="page workspace-page">

    <?php require (INCLUDESLAYOUT_PATH.'/teacher-sidebar.php');?>
    <?php require (INCLUDESLAYOUT_PATH.'/files.php');?>
    <?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>

<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>