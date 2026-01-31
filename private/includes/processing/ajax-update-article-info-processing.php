<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// if (isset($_GET['publish'])) {
//     $articleId = htmlspecialchars($_GET['publish']);
//     $status ="Published";
// }

if (isset($_POST['unpublish'])) {
    $articleId = htmlspecialchars($_POST['unpublish']);
    $status ="Unpublished";
}

// if (isset($_GET['for-review'])) {
//     $articleId = htmlspecialchars($_GET['for-review']);
//     $status ="Waiting for Update";
// }



// if (isset($_GET['approve'])) {
//     $editorId=  $_GET['editor-userid'];
//     $articleId = htmlspecialchars($_GET['approve']);
//     $status ="Ok";
// }




// $goBackURL = 'Location: ' . $_SERVER['HTTP_REFERER'];
// $successURL = 'Location: ' . $_SERVER['HTTP_REFERER'];

 $sqlArticleInfo = "SELECT * FROM writer_articles WHERE writer_articleId = '$articleId'";

    $sqlArticleInfoResult = mysqli_query($conn,$sqlArticleInfo);
    $articleInfo = $sqlArticleInfoResult->fetch_assoc();

    $articlePubDate = $articleInfo ['writer_articlePubDate'] !='0000-00-00 00:00:00' ? $articleInfo ['writer_articlePubDate'] : date("Y-m-d H:i:s", $currentTime);


    $sqlUpdateArticleStatus = "UPDATE writer_articles 
                        SET writer_articleStatus = ?,
                        writer_articlePubDate = ?
                        WHERE writer_articleId =  $articleId";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateArticleStatus);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$articlePubDate);
    mysqli_stmt_execute($stmt);

    
    $sqlUpdateContent = "UPDATE contents 
                        SET contentStatus = ?,
                        contentPubDate = ?
                        WHERE contentTable = 'writer_articles' AND
                        contentForeignId = '$articleId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateContent );
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$articlePubDate);
    mysqli_stmt_execute($stmt);

    }



    // header ($successURL);

    
                             
    }



}




