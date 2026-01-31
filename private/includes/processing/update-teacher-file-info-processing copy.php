<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

if (isset($_GET['publish'])) {
    $fileId = htmlspecialchars($_GET['publish']);
    $forSale ="Not for Sale";
    $status ="Published";
}

if (isset($_GET['unpublish'])) {
    $fileId = htmlspecialchars($_GET['unpublish']);
    $forSale ="Not for Sale";
    $status ="Unpublished";
}

if (isset($_GET['sell'])) {
    $fileId = htmlspecialchars($_GET['sell']);
    $forSale ="For Sale";
    $status ="Published";
}

if (isset($_GET['unsell'])) {
    $fileId = htmlspecialchars($_GET['unsell']);
    $forSale ="Not for Sale";
    $status ="Published";
}

$successURL= 'Location: ' . $_SERVER['HTTP_REFERER'];

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

    header ($successURL);
                          
    }



}









    if (isset($_POST['upload_submit'])) {

    $fileId = htmlspecialchars($_POST['content_hidden_id']);
    
    $imageFolder = '../../uploads/thumbnails/teacher-files/';
    $imageLinkColumn = 'teacher_fileImage';

    $allowedImage = ['jpeg','jpg'];
    $maxSize = 10 * 1024 * 1024;

   

    $imageFileName = '';
    $imageFileSize = '';
    $imageFileNameExt = '';
    $imageFileNameActualExt = '';

    $imageErrors = [];

    $responses = [];

    if (isset($_FILES ['upload_image'])) {
        $image = $_FILES ['upload_image'];

        $imageFileName = $image ['name'];
        $imageFileSize = $image ['size'];
        $imageFileNameExt = explode ('.',$imageFileName);
        $imageFileNameActualExt = strtolower(end($imageFileNameExt));

        if ($imageFileNameActualExt=='jpg') {
        $imageFileNameActualExt='jpeg';
        }

         if((!in_array($imageFileNameActualExt,$allowedImage))) {
        $error='Please choose an image in JPEG or  JPG format only.';
         array_push($imageErrors,$error);
         array_push($responses,$error);
        }

        if($imageFileSize>$maxSize) {
        $error='Your image is too big in size.';
         array_push($imageErrors,$error);
         array_push($responses,$error);
        }
    } else {
        $error='You did not select an image.';
         array_push($imageErrors,$error);
         array_push($responses,$error);
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

   echo 'Upload Successful';
                             


     }

     
    }  else {
        foreach ($responses as $response) {
            echo $response."<br>";
            }
    }





    }










