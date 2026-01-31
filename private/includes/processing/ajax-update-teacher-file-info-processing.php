<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// if (isset($_GET['publish'])) {
//     $fileId = htmlspecialchars($_GET['publish']);
//     $forSale ="Not for Sale";
//     $status ="Published";
// }

if (isset($_POST['unpublish'])) {
    $fileId = htmlspecialchars($_POST['unpublish']);
    $forSale ="Not for Sale";
    $status ="Unpublished";
}

// if (isset($_GET['sell'])) {
//     $fileId = htmlspecialchars($_GET['sell']);
//     $forSale ="For Sale";
//     $status ="Published";
// }

// if (isset($_GET['unsell'])) {
//     $fileId = htmlspecialchars($_GET['unsell']);
//     $forSale ="Not for Sale";
//     $status ="Published";
// }

// $successURL= 'Location: ' . $_SERVER['HTTP_REFERER'];

$sqlFileInfo = "SELECT * FROM teacher_files WHERE teacher_fileId = '$fileId'";

$sqlFileInfoResult = mysqli_query($conn,$sqlFileInfo);
$fileInfo = $sqlFileInfoResult->fetch_assoc();

$filePubDate = $fileInfo ['teacher_filePubDate'] !='0000-00-00 00:00:00'? $fileInfo ['teacher_filePubDate'] : date("Y-m-d H:i:s", $currentTime);


 $sqlUpdateFileInfo = "UPDATE teacher_files 
                        SET teacher_fileStatus = ?,
                        teacher_fileForSale = ?,
                        teacher_filePubDate=?
                        WHERE teacher_fileId = '$fileId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateFileInfo);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss", $status,$forSale,$filePubDate);
    mysqli_stmt_execute($stmt);

    $sqlUpdateContent = "UPDATE contents 
                        SET contentStatus = ?,
                        contentPubDate = ?
                        WHERE contentTable = 'teacher_files' AND
                        contentForeignId = '$fileId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateContent );
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$filePubDate);
    mysqli_stmt_execute($stmt);
 
                             
    }

    // header ($successURL);
                          
    }



}







if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['updateFileThumbnail'])) {
    $fileId = htmlspecialchars($_POST['fileHiddenId']);
    
    $imageFolder = '../../uploads/thumbnails/teacher-files/';
    $imageLinkColumn = 'teacher_fileImage';

    $allowedImage = ['jpeg','jpg'];
    $maxSize = 10 * 1024 * 1024;

    $image = $_FILES ['image'];
    $imageFileName = $image ['name'];
    $imageFileSize = $image ['size'];
    $imageFileNameExt = explode ('.',$imageFileName);
    $imageFileNameActualExt = strtolower(end($imageFileNameExt));

    if ($imageFileNameActualExt=='jpg') {
        $imageFileNameActualExt='jpeg';
    }

    $goBackURL = 'Location:'.$website.'/workspace/teacher.php?edit=yes&upload=enabled&type=file-thumbnail&file='.$fileId;

    $successURL = 'Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$fileId;

    $imageErrors = [];

    if (empty($imageFileName)) {
        array_push($imageErrors,'Empty Image');
        $_SESSION ['image-empty'] = "yes";
        header ($goBackURL);
    } else {

        if((!in_array($imageFileNameActualExt,$allowedImage))) {
         array_push($imageErrors,'Invalid Image Format');
        $_SESSION ['invalid-image-format'] = "yes";
        header ($goBackURL);
        }

        if($imageFileSize>$maxSize) {
         array_push($imageErrors,'Image is too big.');
        $_SESSION ['image-too-big'] = "yes";
        header ($goBackURL);
        }

    }


    

    if (!$imageErrors) {

    $sqlFileData = "SELECT * FROM teacher_files WHERE teacher_fileId = '$fileId'";
    $sqlFileDataResult = mysqli_query($conn,$sqlFileData);
    $fileData= $sqlFileDataResult->fetch_assoc();

    $fileImageLink = $fileData [$imageLinkColumn];
    

    if ($fileImageLink) {
        $fileImageLinkDelete = '../..'.$fileImageLink;
        $fileImageLinkDeleted = unlink($fileImageLinkDelete);
    } 

    
        // Create folders if they don't exist
    if (!is_dir($imageFolder)) {
        mkdir($imageFolder, 0777, true);
    }

    $imageFile = $imageFolder .$fileId."-".date("YmdHis",time()).".".$imageFileNameActualExt;

    $uploadOk = 1;

    if (move_uploaded_file($image["tmp_name"], $imageFile)) {
        $uploadOk = 1;
    } 


    $uploadedImageFile= substr($imageFile,5);
    $imageStatus = 0;

    $sqlUpdateImage = "UPDATE teacher_files
                        SET 
                        $imageLinkColumn=?
                        WHERE teacher_fileId = $fileId";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateImage);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $uploadedImageFile);

    mysqli_stmt_execute($stmt);

    $_SESSION ['image-updated-successfully']="yes";

    header($successURL);
                             


     }

     
    }  





    }







}


