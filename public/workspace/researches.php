
<?php 

require '../../private/initialize.php'; 

$pageName = "School Workspace - Researches";
$researchToEdit = isset($_GET['research']) ? $_GET['research'] : "";


$title="";
$category="";
$abstract="";
$proponents="";
$date="";

$status="";
$image="";
$slug="";

if (!$researchToEdit) {
//GET AUTOSAVED INFO
//For title
if (isset($_POST['research_title_autosaved_nonedit'])) {
    $researchTitleAutoSavedPost = htmlspecialchars($_POST['research_title_autosaved_nonedit']);
    $_SESSION['researchTitleAutoSavedSessionNonEdit'] = $researchTitleAutoSavedPost;
}

//For category
if (isset($_POST['research_category_autosaved_nonedit'])) {
    $researchCategoryAutoSavedPost = htmlspecialchars($_POST['research_category_autosaved_nonedit']);
    $_SESSION['researchCategoryAutoSavedSessionNonEdit'] = $researchCategoryAutoSavedPost;
}


//For abstract
if (isset($_POST['research_abstract_autosaved_nonedit'])) {
    $researchAbstractAutoSavedPost = htmlspecialchars($_POST['research_abstract_autosaved_nonedit']);
    $_SESSION['researchAbstractAutoSavedSessionNonEdit'] = $researchAbstractAutoSavedPost;
}

//For proponents
if (isset($_POST['research_proponents_autosaved_nonedit'])) {
    $researchProponentsAutoSavedPost = htmlspecialchars($_POST['research_proponents_autosaved_nonedit']);
    $_SESSION['researchProponentsAutoSavedSessionNonEdit'] = $researchProponentsAutoSavedPost;
}

//For date
if (isset($_POST['research_date_autosaved_nonedit'])) {
    $researchDateAutoSavedPost = htmlspecialchars($_POST['research_date_autosaved_nonedit']);
    $_SESSION['researchDateAutoSavedSessionNonEdit'] = $researchDateAutoSavedPost;
}





//SET AUTO-SAVED INFO TO A SESSION

//For title
if (isset($_SESSION['researchTitleAutoSavedSessionNonEdit'])) {
    $title  = $_SESSION['researchTitleAutoSavedSessionNonEdit'];
}

//For category
if (isset($_SESSION['researchCategoryAutoSavedSessionNonEdit'])) {
    $category  = $_SESSION['researchCategoryAutoSavedSessionNonEdit'];
}


//For abstract
if (isset($_SESSION['researchAbstractAutoSavedSessionNonEdit'])) {
    $abstract  = $_SESSION['researchAbstractAutoSavedSessionNonEdit'];
}

//For proponents
if (isset($_SESSION['researchProponentsAutoSavedSessionNonEdit'])) {
    $proponents  = $_SESSION['researchProponentsAutoSavedSessionNonEdit'];
}

//For date
if (isset($_SESSION['researchDateAutoSavedSessionNonEdit'])) {
    $date  = $_SESSION['researchDateAutoSavedSessionNonEdit'];
}


}


















require (INCLUDESLAYOUT_PATH.'/head.php');

if($researchToEdit){

   
    if (is_numeric($researchToEdit)){

    $sqlEditableResearches = "SELECT * FROM school_researches WHERE school_researchId = '$researchToEdit' AND school_researchUploader='$registrantId'";
    $sqlEditableResearchesResult = mysqli_query($conn,$sqlEditableResearches);
    $editableResearch = $sqlEditableResearchesResult->fetch_assoc();

    if($editableResearch) {

         $specificResearchCategory = "research_{$researchToEdit}_category";
        $specificResearchAbstract = "research_{$researchToEdit}_abstract";
        $specificResearchProponents = "research_{$researchToEdit}_proponents";
        $specificResearchDate = "research_{$researchToEdit}_date";

        $db_category = '';
        $db_abstract = '';
        $db_proponents = '';
        $db_date = '';

        //For category
        if (isset($_POST['research_category_autosaved_edit'])) {
            $researchCategoryAutoSavedPostEdit = htmlspecialchars($_POST['research_category_autosaved_edit']);
            $_SESSION [$specificResearchCategory]= $researchCategoryAutoSavedPostEdit;
        }

        //For description
        if (isset($_POST['research_abstract_autosaved_edit'])) {
            $researchAbstractAutoSavedPostEdit = htmlspecialchars($_POST['research_abstract_autosaved_edit']);
            $_SESSION [$specificResearchAbstract]= $researchAbstractAutoSavedPostEdit;
        }

        //For proponents
        if (isset($_POST['research_proponents_autosaved_edit'])) {
            $researchProponentsAutoSavedPostEdit = htmlspecialchars($_POST['research_proponents_autosaved_edit']);
            $_SESSION [$specificResearchProponents]= $researchProponentsAutoSavedPostEdit;
        }


        //For date
        if (isset($_POST['research_date_autosaved_edit'])) {
            $researchDateAutoSavedPostEdit = htmlspecialchars($_POST['research_date_autosaved_edit']);
            $_SESSION [$specificResearchDate]= $researchDateAutoSavedPostEdit;
        }


        unset($_SESSION['researchTitleAutoSavedSessionNonEdit']);
        unset($_SESSION['researchCategoryAutoSavedSessionNonEdit']);
        unset($_SESSION['researchAbstractAutoSavedSessionNonEdit']);
        unset($_SESSION['researchProponentsAutoSavedSessionNonEdit']);
         unset($_SESSION['researchDateAutoSavedSessionNonEdit']);
      
        $title = $editableResearch ['school_researchTitle'];
        $slug = $editableResearch ['school_researchSlug'];
        $db_category = $editableResearch ['school_researchCategory'];
        $db_abstract = $editableResearch ['school_researchAbstract'];
        $image = $editableResearch ['school_researchImage'] ?  $privateFolder.$editableResearch ['school_researchImage'] : "";
        $db_date = $editableResearch ['school_researchDate'];
        $db_proponents = $editableResearch ['school_researchProponents'];
        $status = $editableResearch ['school_researchStatus'];
       
        
        $category = $db_category;

        // if (isset($_SESSION[$specificResearchCategory])) {
        //     if ($_SESSION[$specificResearchCategory] !=$db_category){
        //     $category = $_SESSION[$specificResearchCategory];
        //     }
        // } else {
        //     $_SESSION[$specificResearchCategory] = $category;
        // }


        $abstract = $db_abstract;

        if (isset($_SESSION[$specificResearchAbstract])) {
            if ($_SESSION[$specificResearchAbstract] !=$db_category){
            $abstract = $_SESSION[$specificResearchAbstract];
            }
        } else {
            $_SESSION[$specificResearchAbstract] =  $abstract;
        }


        // $proponents = $db_proponents;

        // if (isset($_SESSION[$specificResearchProponents])) {
        //     if ($_SESSION[$specificResearchProponents] !=$db_category){
        //     $proponents = $_SESSION[$specificResearchProponents];
        //     }
        // } else {
        //     $_SESSION[$specificResearchProponents] = $proponents;
        // }


        $date = $db_date;

        // if (isset($_SESSION[$specificResearchDate])) {
        //     if ($_SESSION[$specificResearchDate] !=$db_category){
        //     $date = $_SESSION[$specificResearchDate];
        //     }
        // } else {
        //     $_SESSION[$specificResearchDate] = $date;
        // }


         $proponents = $db_proponents;

        // if (isset($_SESSION[$specificResearchProponents])) {
        //     if ($_SESSION[$specificResearchProponents] !=$db_proponents){
        //     $proponents = $_SESSION[$specificResearchProponents];
        //     }
        // } else {
        //     $_SESSION[$specificResearchProponents] = $proponents;
        // }


        $researchLink = $privateFolder.$editableResearch ['school_researchLink'];
        $researchFormat = $editableResearch ['school_researchFormat'];
        
    } else {
        header('Location:'.$website.'/workspace/researches.php');
    }

    } else {
        header('Location:'.$website.'/workspace/researches.php');
    }

    if (!isset($_GET['edit'])) {
        header('Location:'.$website.'/workspace/researches.php');
    }

} 







?>


<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="workspace-page-school" class="page workspace-page">

<?php require (INCLUDESLAYOUT_PATH.'/researches-sidebar.php');?>
<?php require (INCLUDESLAYOUT_PATH.'/researches.php');?>







<?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>








<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>