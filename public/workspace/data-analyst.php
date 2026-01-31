<!------------------------------------------- INITIALIZAIONS-------------------------------------------->
<?php 

//Initializing the paths.
require '../../private/initialize.php'; 


$pageName = "Workspace - Data Analyst";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');

?>




<!------------------------------------ CONTINUATION OF BODY---------------------------------------------->
<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="workspace-page-funder" class="page workspace-page">


<?php require (INCLUDESLAYOUT_PATH.'/footer-workspace-elements.php');?>
</div>








<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>