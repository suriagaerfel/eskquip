<?php 
require '../../initialize.php';
require '../../database.php';


//Sanitized already
$registrantId="";
$goToURL="";

if (isset($_POST['logout'])) {
//This is the value when the user clicked the logout button in the header.
$registrantId = $_SESSION ['id'];
$goToURL='Location:'.$_POST['fromURL'];
}



if (isset($_GET['userid'])) {//This is the value when the user logged out through force logout via email.
$registrantId = htmlspecialchars($_GET['userid']);
$goToURL='Location:'.$website.'/login/';
}


$activityContent='Logged out';

$sqlInsertActivity = "INSERT INTO registrant_activities (registrant_activityUserId,registrant_activityContent) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sqlInsertActivity);

    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"ss", $registrantId,$activityContent);
        mysqli_stmt_execute($stmt);
    }

session_destroy();
session_start();

$_SESSION ['logout-successfully'] = "yes";

header($goToURL);

