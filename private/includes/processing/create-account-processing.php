<?php


require '../../initialize.php';
require '../../database.php';



if (isset($_POST["create_submit"])) {

$type = htmlspecialchars($_POST["create_type"]);

if ($type=="Personal") {
$firstName = htmlentities($_POST["create_personal_first_name"]);
$lastName = htmlspecialchars($_POST["create_personal_last_name"]);
$accountName = $firstName." ".$lastName;
$birthdate = htmlspecialchars($_POST["create_personal_birthdate"]);
$gender = htmlspecialchars($_POST["create_personal_gender"]);
$basicAccount = 'Basic User';
}

if ($type=="School") {
$firstName = "na";
$lastName = "na";
$accountName = htmlspecialchars($_POST ['create_school_name']);
$birthdate = $currentTime;
$gender = "na";
$basicAccount = htmlspecialchars($_POST["create_school_basic_account"]);
}





$emailAddress = htmlspecialchars($_POST["create_email_address"]);
$username = htmlspecialchars($_POST["create_username"]);
$pwd = htmlspecialchars($_POST["create_password"]);
$pwdRetype = htmlspecialchars($_POST["create_password_retype"]);



$userCreatedAt = date("Y-m-d H:i:s", $currentTime);
$pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
$letterOnlyPattern ='/^[a-zA-Z ]+$/';

$createErrors = [];
$responses = [];

if ($type =='Personal') {
    if (!$firstName) {
        $error= 'First name must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    } else {
        if (!preg_match($letterOnlyPattern,$firstName)) {
        $error= 'First name is not valid.';
        array_push($createErrors,$error);
        array_push($responses,$error);
        }
    }

    if (!$lastName) {
        $error= 'Last name must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    } else {
         if (!preg_match($letterOnlyPattern,$lastName)) {
        $error= 'Last name is not valid.';
        array_push($createErrors,$error);
        array_push($responses,$error);
        }
    }

     if (!$birthdate) {
        $error= 'Birthdate must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    }

    if (!$gender) {
        $error= 'Gender must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    }
}




if ($type=='School') {
    if (!$accountName) {
        $error= 'Name must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    } else {
        if (!preg_match($letterOnlyPattern,$accountName)) {
        $error= 'Name is not valid.';
        array_push($createErrors,$error);
        array_push($responses,$error);
        }
    }

    if (!$basicAccount) {
        $error= 'School type must not be empty.';
        array_push($createErrors,$error);
        array_push($responses,$error);
    } 
}


if (!$emailAddress) {
    $error= 'Email address must not be empty.';
    array_push($createErrors,$error);
    array_push($responses,$error);
} else {
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) { 
    $error= 'Email address is not valid.';
    array_push($createErrors,$error);
    array_push($responses,$error);
    } else {
        $sqlEmail = "SELECT * FROM registrations WHERE registrantEmailAddress = '$emailAddress'";
        $resultEmail = mysqli_query($conn, $sqlEmail);
        $rowCountEmail = mysqli_num_rows($resultEmail);

         if ($rowCountEmail>0) { 
         $error= 'Email address is already used.';
        array_push($createErrors,$error);
        array_push($responses,$error);
        }
    }

}



if (!$username) {
    $error= 'Username must not be empty.';
    array_push($createErrors,$error);
    array_push($responses,$error);
} else {
   
    $sqlUsername = "SELECT * FROM registrations WHERE registrantUsername = '$username'";
    $resultUsername = mysqli_query($conn, $sqlUsername);
    $rowCountUsername = mysqli_num_rows($resultUsername);

    if ($rowCountUsername>0) {
    $error= 'Username is already used.';
    array_push($createErrors,$error);
    array_push($responses,$error);
    }
   

}



if (!$pwd) {
    $error= 'Password must not be empty.';
    array_push($createErrors,$error);
    array_push($responses,$error);
} else {
    if (strlen($pwd)<8) { 
    $error= 'Password must be at least 8 characters long.';
    array_push($createErrors,$error);
    array_push($responses,$error);
    }  
}

if (!$pwdRetype) {
    $error= 'Password retype must not be empty.';
    array_push($createErrors,$error);
    array_push($responses,$error);
} 


if ($pwd != $pwdRetype) {
    $error= 'Passwords do not match.';
    array_push($createErrors,$error);
    array_push($responses,$error);
}


if (!$createErrors) {
        $sql = "INSERT INTO registrations (registrantFirstName,registrantLastName,registrantAccountName,registrantAccountType,registrantBirthdate,registrantGender,registrantEmailAddress,registrantUsername,registrantPassword,registrantBasicAccount,registrantCreatedAt) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);

        if ($prepareStmt) {

            mysqli_stmt_bind_param($stmt,"sssssssssss",$firstName,$lastName,$accountName,$type,$birthdate,$gender,$emailAddress,$username,$pwdHash,$basicAccount,$userCreatedAt);
            mysqli_stmt_execute($stmt);

            echo 'Account Created Successfully!';

            // //After the account is registered, send verification link to the email.
            // $verifyingId=mysqli_insert_id($conn);
            // $verifyingEmail = $emailAddress;
            
            // require('send-verification-link-for-new-account-processing.php');

            

        }

        
    } else  {
        foreach ($responses as $response) {
                echo $response ."<br>";         
    }  
    }
    

}









