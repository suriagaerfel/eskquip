<?php


require '../../private/initialize.php'; 


$pageName = "Change Password";


require (INCLUDESLAYOUT_PATH.'/head.php');

$newPwd = isset($_SESSION ['newPassword'] ) ? $_SESSION ['newPassword'] : "";
$newPwdRetype = isset($_SESSION ['newPasswordRetype'] ) ? $_SESSION ['newPasswordRetype'] : "";
$token=isset($_GET['token']) ? $_GET['token'] : "";
$userIdReset=isset($_GET['userid']) ? $_GET['userid'] : "";

?>




<?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="change-password-page" class="page form-page">
    
    <div class="form-page-content-container">

        <?php require (INCLUDESLAYOUT_PATH.'/home-sidebar.php');?>


        <div class="form-section">

            <?php if (isset ($_SESSION['reset-now'])) { ?>

            <form id="change-password-form" class="form" method="post" action="../../private/includes/processing/change-password-processing.php">
            
            <?php  //Notify if new passwords don't match.
            if (isset($_SESSION['passwords-dont-match'])) {
                echo "<div class='alert alert-danger'>New passwords don't match.</div>";
                unset ($_SESSION ['passwords-dont-match']);
            } ?>

            <?php  //Notify if new passwords don't match.
            if (isset($_SESSION['empty-passwords'])) {
                echo "<div class='alert alert-danger'>Please provide new passwords.</div>";
                unset ($_SESSION ['empty-passwords']);
            } ?>
                <br>
                <h5 class="form-title">Change Password</h5>
                <input type="text" name="hiddenRegistrantId" value="<?php echo $userIdReset;?>" hidden>
                <input type="text" name="hiddenToken" value="<?php echo $token; ?>" hidden>
                <input class="registrantInputs" type="password" name="newPassword" placeholder="New Password" value="<?php echo $newPwd?>">
                <input class="registrantInputs" type="password" name="newPasswordRetype" placeholder="Retype New Password" value="<?php echo $newPwdRetype?>">
            
                <button class="registrantSubmitButtons" type="submit" name="changePasswordBtn">Change Password</button> 

            </form>

            <?php } ?>

        </div>

    </div>

    <?php require (INCLUDESLAYOUT_PATH.'/footer-links.php');?>


</div>

<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>

</html>