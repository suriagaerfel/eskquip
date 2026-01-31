<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// if (isset($_GET['publish'])) {
//     $toolId = htmlspecialchars($_GET['publish']);
//     $status ="Published";
// }



if (isset($_POST['unpublish'])) {
    $toolId = htmlspecialchars($_POST['unpublish']);
    $status ="Unpublished";
}

// $goBackURL = 'Location: ' . $_SERVER['HTTP_REFERER'];
// $successURL = 'Location: ' . $_SERVER['HTTP_REFERER'];

$sqlToolInfo = "SELECT * FROM developer_tools WHERE developer_toolId = '$toolId'";
$sqlToolInfoResult = mysqli_query($conn,$sqlToolInfo);
$toolInfo = $sqlToolInfoResult->fetch_assoc();

$toolPubDate = $toolInfo ['developer_toolPubDate'] !='0000-00-00 00:00:00' ? $toolInfo ['developer_toolPubDate'] : date("Y-m-d H:i:s", $currentTime);
   


 $sqlUpdateToolInfo = "UPDATE developer_tools 
                        SET developer_toolStatus = ?,
                        developer_toolPubDate = ?
                        WHERE developer_toolId =  '$toolId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateToolInfo);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$toolPubDate);
    mysqli_stmt_execute($stmt);


     $sqlUpdateContent = "UPDATE contents 
                        SET contentStatus = ?,
                        contentPubDate = ?
                        WHERE contentTable = 'developer_tools' AND
                        contentForeignId = '$toolId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateContent );
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$toolPubDate);
    mysqli_stmt_execute($stmt);

    }

    // header ($successURL);

    
                             
    }


}

























