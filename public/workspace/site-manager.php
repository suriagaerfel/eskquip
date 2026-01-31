<?php 

require '../../private/initialize.php'; 

$pageName = "Workspace - Site Manager";

$recordType = isset($_GET['recordtype']) ? $_GET['recordtype'] : "";

$regType= isset($_GET['regtype']) ? $_GET['regtype'] : "";
$regTypeCap=ucfirst($regType);

$subsType= isset($_GET['substype']) ? $_GET['substype'] : "";
$subsTypeCap=ucfirst($subsType);

$promoType= isset($_GET['promotype']) ? $_GET['promotype'] : "";
$promoTypeCap=ucfirst($promoType);

$recordStatus = isset($_GET['status']) ? $_GET['status'] : "";
$addNote = isset($_GET['addnote']) ? true : false;
$registrantToNote = isset($_GET['regid']) ? $_GET['regid'] : "";

?>

<?php require (INCLUDESLAYOUT_PATH.'/head.php'); ?>

 <?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
 
<div id="workspace-page-site-manager" class="page workspace-page">

    <?php require (INCLUDESLAYOUT_PATH.'/summary.php'); ?>
    <?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>