<?php

require '../../initialize.php';
require '../../database.php';


//Sanitized already

$mainReg= isset($_GET['main']) ? true: false;


$userId = isset($_GET['userid']) ? htmlspecialchars($_GET['userid']) : "";
$regType =isset($_GET['regtype']) ? htmlspecialchars($_GET['regtype']): "";
$toDo = isset($_GET['to-do']) ? htmlspecialchars($_GET['to-do']) : "";
$regStatus= isset($_GET['status']) ? htmlspecialchars($_GET['status']): "";



$profileStatus="";

if ($toDo=="approve") {
    $profileStatus="Approved";
}

if ($toDo=="reject") {
    $profileStatus="Rejected";
}


if ($toDo=="revoke") {
    $profileStatus="Revoked";
}

if ($toDo=="keep") {
    $profileStatus="Kept";
}



if (!$mainReg) {

$regTypeCap = ucfirst($regType);

$regRoleStatus="";

if ($profileStatus=="Approved" || $profileStatus=="Kept" ) {
$regRoleStatus=$regTypeCap;
}

$regRoleAccountCol = 'registrant'.$regTypeCap.'Account';
$approvalDate = date("Y-m-d H:i:s", $currentTime);

$sqlUpdateStatus =  "UPDATE other_registrations
                        SET otherStatus = ?,
                        otherApprovalDate = ?
                        WHERE otherUserId = $userId AND otherType = '$regTypeCap'";



    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateStatus);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss",$profileStatus,$approvalDate);
    mysqli_stmt_execute($stmt);

    

   
    $sqlUpdateRegistrantRoleAccount = "UPDATE registrations SET $regRoleAccountCol = ?
                        WHERE registrantId = $userId";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateRegistrantRoleAccount);

                        if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt,"s",$regRoleStatus);
                        mysqli_stmt_execute($stmt);  

}

}
}

if ($mainReg) {

    $sqlUpdateRegistrantStatus = "UPDATE registrations SET registrantStatus = ?
                            WHERE registrantId = '$userId'";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateRegistrantStatus);

    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s",$profileStatus);
    mysqli_stmt_execute($stmt); 
    }


}



                        
$goToURL = "";
if (!$regType && $regStatus) {
$goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=registrations&status='.$regStatus;
}

if (!$regType && !$regStatus) {
$goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=registrations';
}

if ($regType && $regStatus) {
$goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=registrations&regtype='.$regType.'&status='.$regStatus;
}

if ($regType && !$regStatus) {
$goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=registrations&regtype='.$regType;
}

    

header ($goToURL);
                             


    





