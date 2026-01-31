<?php 


require '../../private/initialize.php'; 

$pageName = "My Account";



require (INCLUDESLAYOUT_PATH.'/head.php');


//THIS AREA IS FOR UPDATING DEATILS.
$updateDetails = isset($_GET ['update-details']) ? htmlspecialchars($_GET ['update-details']) : "";
$getUserId = isset($_GET ['userid']) ? htmlspecialchars($_GET ['userid']) : "";

?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>
<div id="account-page" class="page with-sidebars-page">
    
  
    <div id="account-details" class="page-details">    
        <?php require (INCLUDESLAYOUT_PATH.'/profile.php')?>
        
        
        <div class="account-menus">
            <?php if ($type=='Personal') {?>
           
            <button class="link-tag-button" id="show-my-subscription-button">My Subscription</button>
            <?php } ?>

            <button class="link-tag-button" id="show-other-registration-button">Other Registration</button>
            

            <?php if ($haveOtherRegistration) {?>
            <button class="link-tag-button" id="show-workspace-button">My Workspace</button>
            <?php } ?>

        </div>
    </div>                           

</div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>