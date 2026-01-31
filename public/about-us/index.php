<?php

//Initializing the paths.
require '../../private/initialize.php';

$pageName ="About Us";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');






?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="about-page" class="page with-sidebars-page with-single-sidebar-page" >
    
    <?php require (INCLUDESLAYOUT_PATH.'/page-articles.php'); ?>

    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>

</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>


