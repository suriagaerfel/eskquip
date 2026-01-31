<?php

  require '../../initialize.php';
require '../../database.php';



//Sanitized already
$purchaseId= isset($_GET['purchase-id'])? htmlspecialchars($_GET['purchase-id']) : "";
$purchaseAction= isset($_GET['action'])? htmlspecialchars($_GET['action']) : "";

$purchaseStatus = "";

if ($purchaseAction=='approve') {
  $purchaseStatus = "Approved";
}

if ($purchaseAction=='reject') {
  $purchaseStatus = "Rejected";
}

$successURL = 'Location: ' . $_SERVER['HTTP_REFERER'];

$sqlUpdatePurchaseStatus =  "UPDATE file_purchase
                        SET file_purchaseStatus = ?
                        WHERE file_purchaseId =$purchaseId";



    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdatePurchaseStatus);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s",$purchaseStatus);
    mysqli_stmt_execute($stmt);

header ($successURL);

}