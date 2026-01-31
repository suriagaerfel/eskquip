<?php


require '../../private/initialize.php'; 


$pageName = "Login";


require (INCLUDESLAYOUT_PATH.'/head.php');


$credential = isset($_SESSION ['login_email_username']) ? $_SESSION ['login_email_username'] : "";
$pwd = isset($_SESSION ['pwd']) ? $_SESSION ['pwd'] : "";




?>





<?php require (INCLUDESLAYOUT_PATH.'/header.php');?>
<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="login-page" class="page form-page">
    <div class="form-page-content-container">

      <?php require (INCLUDESLAYOUT_PATH.'/home-sidebar.php');?>

      <div  class="form-section">

        <div id="login-form">

            
            <h5 class="form-title">Login</h5>

            <div id="login-message" class="alert"></div>
            
            <div class="input-containers">
              <input type="text" placeholder="Email Address/Username" id="login-email-username">
            </div>


            <div class="inputContainers">
              <input type="password" placeholder="Password" id="login-password">
            </div>

            <div>
              <button id="login-submit-button">Submit</button>
            </div>
            <br>
            <span class="form-links"><a href="<?php echo $website.'/get-password-reset-link/';?>">Forgot Password?</a></span>
            <br>
              <span class="form-links">No account yet? <a href="<?php echo $website.'/create-account/';?>">Create Account</a></span>
            <br>

          </div>

      </div>

    </div>

    <?php require (INCLUDESLAYOUT_PATH.'/footer-links.php');?>

</div>









<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>

</html>
