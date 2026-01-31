<?php

require '../../private/initialize.php';

$pageName = "Create Account";

$accountType = isset($_GET['type']) ? $_GET['type'] :""; 

$allowedAccounTypes = ['school','personal'];

if ($accountType && !in_array($accountType,$allowedAccounTypes)) {
    header('Location:'.$website.'/create-account/');
}


require (INCLUDESLAYOUT_PATH.'/head.php');


$firstName = isset($_SESSION['firstName'])  ? $_SESSION['firstName'] :""; 
$lastName = isset($_SESSION['lastName'])  ? $_SESSION['lastName'] :""; 
$accountName = isset($_SESSION['accountName']) ? $_SESSION['accountName'] : "";
$basicAccount = isset($_SESSION['basicAccount']) ? $_SESSION['basicAccount'] : ""; 
$birthdate = isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] :"";
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] :"";
$emailAddress = isset($_SESSION['emailAddress']) ? $_SESSION['emailAddress'] :"";
$username = isset($_SESSION['username']) ? $_SESSION['username'] :"";
$pwd = isset($_SESSION['pwd']) ? $_SESSION['pwd'] :"";
$pwdRetype = isset($_SESSION['pwdRetype']) ? $_SESSION['pwdRetype'] :"";



?>






<?php require (INCLUDESLAYOUT_PATH.'/header.php');//This is the file to the header.?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="create-account-page" class="page form-page">

    <div class="form-page-content-container">

    <?php require (INCLUDESLAYOUT_PATH.'/home-sidebar.php'); //This is the file to the home sidebar.?>

    <div class="form-section">

        <?php if ($currentTimeZone =='Asia/Manila') {?>
        <form id="create-account-form" class="form" method="post" action="../../private/includes/processing/create-account-processing.php">
         
         <?php //This appears when someone tries to change the password of a non-existing account.
        
            if (isset($_SESSION ['account-not-found'])) {
            echo "<div class='alert alert-danger'>You have an invalid account details.</div>";
            unset ($_SESSION ['account-not-found']);
            } ?>

        <?php //This appears when not all fields are filled -in.
            if (isset($_SESSION ['empty-fields'])) {
            echo "<div class='alert alert-danger'>All fields are required.</div>";
            unset ($_SESSION ['empty-fields']);
            } ?>

        <?php //This appears when the first name is invalid.
            if (isset($_SESSION ['invalid-first-name'])) {
            echo "<div class='alert alert-danger'>First name must include letters only.</div>";
            unset ($_SESSION ['invalid-first-name']);
            } ?>

            <?php //This appears when the last name is invalid.
        
            if (isset($_SESSION ['invalid-last-name'])) {

            echo "<div class='alert alert-danger'>Last name must include letters only.</div>";
            unset ($_SESSION ['invalid-last-name']);

            } ?>

             <?php //This appears when the last name is invalid.
        
            if (isset($_SESSION ['invalid-school-name'])) {

            echo "<div class='alert alert-danger'>School name must include letters only.</div>";
            unset ($_SESSION ['invalid-school-name']);

            } ?>
        
        
        <?php //This appears when the birthdate is invalid.
        
            if (isset($_SESSION ['invalid-birthdate'])) {

            echo "<div class='alert alert-danger'>You entered an invalid birthdate.</div>";
            unset ($_SESSION ['invalid-birthdate']);

            } ?>

        <?php //This appears when the email is invalid.
        
            if (isset($_SESSION ['invalid-email'])) {

            echo "<div class='alert alert-danger'>You entered an invalid email.</div>";
            unset ($_SESSION ['invalid-email']);

            } ?>

        <?php //This appears when the email is already used.
        
            if (isset($_SESSION ['email-exists'])) {

            echo "<div class='alert alert-danger'>The email is already used.</div>";
            unset ($_SESSION ['email-exists']);

            } ?>

        <?php //This appears when the username is already used.
        
            if (isset($_SESSION ['username-exists'])) {

            echo "<div class='alert alert-danger'>The username is already used.</div>";
            unset ($_SESSION ['username-exists']);

            } ?>

        <?php //This appears when the password is less than the required number of characters.
        
            if (isset($_SESSION ['less-characters'])) {

            echo "<div class='alert alert-danger'>Your password must have at least 8 characters.</div>";
            unset ($_SESSION ['less-characters']);

            } ?>


        <?php //This appears when the passwords don't match.
        
            if (isset($_SESSION ['passwords-dont-match'])) {

            echo "<div class='alert alert-danger'>Passwords don't match.</div>";
            unset ($_SESSION ['passwords-dont-match']);

            } ?>

        <br>
        <?php if ($accountType) { ?>
        <h5 class="form-title">Create Account <?php if ($accountType){ echo '- '.ucfirst($accountType);}?></h5>
        <nav class="create-account-type-navigation navigation">
          <small>Switch to: </small>
            <tr class="nav-list">

                <?php if ($accountType=='school'){?>
              <a class="link-tag-button" href="personal">Personal</a>
              <?php } ?>
                <?php if ($accountType=='personal'){?>
              <a class="link-tag-button" href="school">School</a>
              <?php } ?>

            </tr>
        </nav>
        <?php } ?>

        <?php if(!$accountType){?>

        <nav class="create-account-type-navigation navigation">
          <small>Account Type: </small>
            <tr class="nav-list">
              <a class="link-tag-button" href="personal">Personal</a>
              <a class="link-tag-button" href="school">School</a>
            </tr>
        </nav>

        <?php } ?>
        <?php if($accountType=='school') {?>

        <div class="inputs-group">  

                <input class="registrantInputs" type="text" name="schoolName" value="<?php if ($accountName==' ') {echo str_replace(' ','',$accountName);} else {echo $accountName;}?>" placeholder="School Name" autocomplete="off" id="school-name">
                <select name="basicAccount" id="selectBasicAccount">">
                    <option value="" hidden>Category</option>
                    <option  value="Elementary School" <?php if ($basicAccount=='Elementary School') {echo 'selected';}?>>Elementary School</option>
                    <option  value="Junior High School" <?php if ($basicAccount=='Junior High School') {echo 'selected';}?>>Junior High School</option>
                    <option  value="Senior High School" <?php if ($basicAccount=='Senior High School') {echo 'selected';}?>>Senior High School</option>
                    <option  value="College or University" <?php if ($basicAccount=='College or University') {echo 'selected';}?>>College or University</option>
                    <option  value="Integrated School" <?php if ($basicAccount=='Integrated School') {echo 'selected';}?>>Integrated School</option>
                </select>
                
           
            
        </div>

        <?php } ?>

        <?php if($accountType=='personal') {?>

        <div class="inputs-group">
            <div >
                <input class="registrantInputs" type="text" name="firstName" value="<?php if ($firstName=='na') {echo '';} else {echo $firstName;}?>" placeholder="First Name" autocomplete="off">
            </div>

            <div>
                <input type="text" name="lastName" value="<?php if ($lastName=='na'){echo '';} else {echo $lastName;}?>" placeholder="Last Name" autocomplete="off">
            </div> 
        </div>

    

        <div class="inputs-group">

            <div >
                <input type="date" name="birthdate" value="<?php echo $birthdate?>"  autocomplete="off">
            </div>
          
            <div>
                <select name="gender" id="selectGender">">
                    <option value="" hidden>Gender</option>
                    <option  value="Male" <?php if ($gender=='Male') {echo 'selected';}?>>Male</option>
                    <option value="Female" <?php if ($gender=='Female') {echo 'selected';}?>>Female</option>
                    <option value="Other Gender" <?php if ($gender=='Other Gender') {echo 'selected';}?>>Other Gender</option>
                    <option value="No Gender" <?php if ($gender=='No Gender') {echo 'selected';}?>>No Gender</option>
                    <option value="Hide Gender" <?php if ($gender=='Hide Gender') {echo 'selected';}?>>Hide Gender</option>

                </select>
              
            </div>
            
        </div>

        <?php } ?>

      
        
        <?php if ($accountType) {?>
        <div class="inputs-group">
            <div>
                <input class="registrantInputs" type="text" name="emailAddress" value="<?php echo $emailAddress?>" placeholder="Email Address" autocomplete="off">
            </div>
        
            <div>
                <input class="registrantInputs" type="text" name="username" value="<?php echo $username?>" placeholder="Username" autocomplete="off">
            </div>    
        </div>

      
        

        <div class="inputs-group">

            <div>
                <input class="registrantInputs" type="password" name="pwd" value="<?php echo $pwd?>"placeholder="Password"autocomplete="off">
            </div>

            <div>
                <input class="registrantInputs" type="password" name="pwdRetype"  value="<?php echo $pwdRetype?>"placeholder="Retype Password" autocomplete="off">
            </div>
        </div>


        <div>
            <input type="text" name="type" value="<?php echo $accountType?>" hidden>
        </div>
        
        <div>
            <button class="userSubmitButtons" type="submit" name="createAccountBtn">
                Submit
            </button>
        </div>
        <br>
        <?php } ?>
        <span class="form-links"> Have an account already? <a href="<?php echo $website.'/login/';?>">Login</a></span>

       

        </form>
        <?php } ?>

         <?php if ($currentTimeZone !='Asia/Manila') {?>

        <p>This web app is currently not available in your country.</p>

        <?php } ?>

    </div>

    </div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-links.php');?>

</div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>

</html>
