<!------------------------------------------- INITIALIZAIONS-------------------------------------------->
<?php

//Initializing the paths.
require '../private/initialize.php'; 

//Set the page name
$pageName = "404 - Page Not Found";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');

?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>
<div id="error-page"class="page with-sidebars-page with-single-sidebar-page" >
  
    <div class="page-details page-details-single-sidebar">

    <h5>404 - Page Not Found</h5>

    </div>


    <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>


</div>







<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>


</body>
</html>
