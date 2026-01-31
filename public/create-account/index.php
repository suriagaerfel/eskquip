<?php

require '../../private/initialize.php';

$pageName = "Create Account";

$accountType = isset($_GET['type']) ? $_GET['type'] :""; 

$allowedAccounTypes = ['school','personal'];

if ($accountType && !in_array($accountType,$allowedAccounTypes)) {
    header('Location:'.$website.'/create-account/');
}

require (INCLUDESLAYOUT_PATH.'/head.php');

?>






<?php require (INCLUDESLAYOUT_PATH.'/header.php');//This is the file to the header.?>

<?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

<div id="create-account-page" class="page form-page">

    <div class="form-page-content-container">

        <?php require (INCLUDESLAYOUT_PATH.'/home-sidebar.php'); //This is the file to the home sidebar.?>

        <div class="form-section">
            <?php if ($currentTimeZone =='Asia/Manila') {?>
                <div id="create-account-form">
                    
                    <h5 class="form-title">Create Account </h5>
                    <div id="create-account-message" class="alert"></div>
                
                    <nav class="create-account-type-navigation navigation">
                        <small>Account Type: </small>
                        <tr class="nav-list">
                            <a class="link-tag-button" id="create-account-personal-button">Personal</a>
                            <a class="link-tag-button" id="create-account-school-button">School</a>
                        </tr>
                    </nav>
                  

                  

                    <div class="inputs-group inputs-group-school">  

                        <input id="create-school-name" placeholder="Name">
                        <select id="create-school-basic-account">">
                            <option value="" hidden>Category</option>
                            <option  value="Elementary School">Elementary School</option>
                            <option  value="Junior High School">Junior High School</option>
                            <option  value="Senior High School" >Senior High School</option>
                            <option  value="College or University" >College or University</option>
                            <option  value="Integrated School" >Integrated School</option>
                        </select>
                    </div>

                    

                   

                    <div class="inputs-group inputs-group-personal">
                       
                        <input type="text" placeholder="First Name" id="create-personal-first-name">
        
                        <input type="text" placeholder="Last Name" id="create-personal-last-name">
                       
                    </div>

                    <div class="inputs-group inputs-group-personal">

                        <input type="date" id="create-personal-birthdate"  autocomplete="off">
                        <select name="gender" id="create-personal-gender">
                            <option value="" hidden>Gender</option>
                            <option  value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other Gender">Other Gender</option>
                            <option value="No Gender" >No Gender</option>
                            <option value="Hide Gender">Hide Gender</option>
                        </select>
                         
                    </div>

                 

                    <div class="inputs-group inputs-group-general">
                            <input type="text" placeholder="Email Address"id="create-email-address">
                            <input type="text"  placeholder="Username" id="create-username">   
                    </div>

                
                    <div class="inputs-group inputs-group-general">
                            <input type="password" name="pwd" placeholder="Password" id="create-password">
                            <input type="password" placeholder="Retype Password" id="create-password-retype">
                    
                    </div>
                    
                    <div class="inputs-group inputs-group-general">
                        <input type="text" id="create-type" hidden>
                        <button id="create-submit-button">
                            Submit
                        </button>
                    </div>
                    <br>
            

                    <span class="form-links"> Have an account already? 
                        <a href="<?php echo $website.'/login/';?>">
                        Login
                        </a>
                    </span>
                </div>

            <?php } ?>

            <?php if ($currentTimeZone !='Asia/Manila') {?>
                <p>Sorry, but we only accept registrants residing in the Philippines.</p>
            <?php } ?>

        </div>

    </div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-links.php');?>

</div>


<?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>
</body>

</html>
