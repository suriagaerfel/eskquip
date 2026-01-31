<?php

require '../../initialize.php';
require '../../database.php';





if (isset($_POST['subscription_update'])) {

$subscriptionId=htmlspecialchars($_POST['subscription_id']);
$subscriptionType=htmlspecialchars($_POST['subscription_type']);
$subscriptionDuration=htmlspecialchars($_POST['subscription_duration']);
$toDo = htmlspecialchars($_POST['to_do']);

$status='';


if($toDo=='approve') {
$status="Approved";
}

if($toDo=='reject') {
$status="Rejected";
}


$activation= date("Y-m-d H:i:s", $currentTime);

if ($subscriptionType=='Shelf') {
$expiry = date("Y-m-d H:i:s", $currentTime + 365.25 * 86400 * $subscriptionDuration);
} else {
   $expiry = date("Y-m-d H:i:s", $currentTime + 60 * 60 *24 *30*$subscriptionDuration); 
}


$sqlUpdateStatus =  "UPDATE registrant_subscriptions
                        SET registrant_subscriptionStatus = ?,
                        registrant_subscriptionDate=?,
                        registrant_subscriptionExpiry=?
                        WHERE registrant_subscriptionId =$subscriptionId";

    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateStatus);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss",$status,$activation,$expiry);
    mysqli_stmt_execute($stmt);

//     $goToURL = "";
//     if ($subsType && $recordStatus) {
//       $goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=subscriptions&substype='.$subsType.'&status='.$recordStatus;
//     }

//     if (!$subsType && $subsStatus) {
//       $goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=subscriptions&status='.$recordStatus;
//     }

//     if ($subsType && !$subsStatus) {
//       $goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=subscriptions&substype='.$subsType;
//     }

//     if (!$subsType && !$subsStatus) {
//       $goToURL = 'Location: '.$website.'/workspace/site-manager.php?recordtype=subscriptions';
//     }

// header ($goToURL);

echo 'Subscription status updated!';

}

}