<!------------------------------------------- INITIALIZAIONS-------------------------------------------->
<?php

//Initializing the paths.
require '../../private/initialize.php'; 

//Set the page name
$pageName = "Get Password Link";

//The file for the header will be included in the page.
require (INCLUDESLAYOUT_PATH.'/head.php');

$credential = isset($_SESSION['email_username']) ? $_SESSION['email_username'] :"";


?>




<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="get-reset-link-page" class="page form-page">

    <div class="form-page-content-container">

        <?php require (INCLUDESLAYOUT_PATH.'/home-sidebar.php');?>

        <div class="form-section">

            <form id="get-link-form" method="post"  action="../../private/includes/processing/get-password-link-processing.php">

            <?php
                if (isset($_SESSION ['credentials-not-registered'])) {

                echo "<div class='alert alert-danger'>The email address or username is not registered.</div>";
                unset($_SESSION ['credentials-not-registered']);

                }

                if (isset($_SESSION ['empty-credentials'])) {

                    echo "<div class='alert alert-danger'>Please provide your email address or username.</div>";
                    unset ($_SESSION ['empty-credentials']);
                }

                if (isset($_SESSION ['link-expired'])) {

                    echo "<div class='alert alert-danger'>The link was expired. Please provide your email address or username to get another link.</div>";
                    unset ($_SESSION ['link-expired']);
                }

                if (isset($_SESSION ['its-not-you'])) {
                    echo "<div class='alert alert-danger'>You are not authorized to change the password.</div>";
                    unset ($_SESSION ['its-not-you']);

                }


                ?>
                    <br>
                <div>
                    <h5 class="form-title">Provide Details</h5>
                    <input type="text" name="email_username" value="<?php echo $credential ?>"placeholder="Email address o username">
                    <button type="submit" name="getPasswordLinkBtn">Get Password Reset Link</button>
                </div>
            </form>
        </div>

    </div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-links.php');?>


</div>









<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>

</html>