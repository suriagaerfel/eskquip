<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
if (isset($_GET['publish'])) {

    $articleId = htmlspecialchars($_GET['publish']);
    $status ="Published";
}

if (isset($_GET['unpublish'])) {
    $articleId = htmlspecialchars($_GET['unpublish']);
    $status ="Unpublished";
}

if (isset($_GET['for-review'])) {
    $articleId = htmlspecialchars($_GET['for-review']);
    $status ="Waiting for Update";
}



if (isset($_GET['approve'])) {
    $editorId=  $_GET['editor-userid'];
    $articleId = htmlspecialchars($_GET['approve']);
    $status ="Ok";
}




$goBackURL = 'Location: ' . $_SERVER['HTTP_REFERER'];
$successURL = 'Location: ' . $_SERVER['HTTP_REFERER'];

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



    header ($successURL);

    
                             
    }



}






    if (isset($_POST['upload_submit'])) {
    
    $articleId = htmlspecialchars($_POST['content_hidden_id']);

    $imageFolder = '../../uploads/featured-images/';
    $imageLinkColumn = 'writer_articleImage';

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

        $sqlArticleData = "SELECT * FROM writer_articles WHERE writer_articleId = '$articleId'";
        $sqlArticleDataResult = mysqli_query($conn,$sqlArticleData);
        $articleData= $sqlArticleDataResult->fetch_assoc();

        $articleImageLink = $articleData [$imageLinkColumn];
    

        if ($articleImageLink) {
            $articleImageLinkDelete = '../..'.$articleImageLink;
            $articleImageLinkDeleted = unlink($articleImageLinkDelete);
        } 

    
        // Create folders if they don't exist
        if (!is_dir($imageFolder)) {
            mkdir($imageFolder, 0777, true);
        }

        $imageFile = $imageFolder .$articleId."-".date("YmdHis",time()).".".$imageFileNameActualExt;

        $uploadOk = 1;

        if (move_uploaded_file($image["tmp_name"], $imageFile)) {
            $uploadOk = 1;
        } 


        //Resize and crop image

        $maxResolution = 500;
        
        if ($imageFileNameActualExt=='jpeg') {
        $originalImage = imagecreatefromjpeg($imageFile);
        }

        if ($imageFileNameActualExt=='png') {
        $originalImage = imagecreatefrompng($imageFile);
        }


    
        $originalWidth = imagesx($originalImage);
        $originalHeight = imagesy($originalImage);

        if ($originalHeight > $originalWidth) {
        $ratio = $maxResolution / $originalWidth;
        $newWidth = $maxResolution;
        $newHeight = $originalHeight * $ratio;

        $difference= $newHeight - $newWidth;

        $x=0;
        $y = round($difference/2);

        } 
    
        elseif($originalHeight < $originalWidth) {

        $ratio = $maxResolution / $originalHeight;
        $newHeight = $maxResolution;
        $newWidth = $originalWidth * $ratio;

        $difference= $newWidth - $newHeight;

        $x = round($difference/2);
        $y=0;
        } 
    
        elseif ($originalHeight == $originalWidth) {

        
        $newWidth = $maxResolution;
        $newHeight = $maxResolution;

            $x=0;
            $y=0;

        }


        if ($originalImage) {
        $newImage = imagecreatetruecolor($newWidth,$newHeight);
        imagecopyresampled($newImage,$originalImage,0,0,0,0,$newWidth,$newHeight,$originalWidth,$originalHeight); 

    
        $newCropImage = imagecreatetruecolor($maxResolution,$maxResolution/1.5);
        imagecopyresampled($newCropImage,$newImage,0,0,$x,$y,$maxResolution,$maxResolution,$maxResolution,$maxResolution); 
    

        imagejpeg($newCropImage,$imageFile,90);
        }





        $uploadedImageFile= substr($imageFile,5);
        $imageStatus = 0;

        $sqlUpdateImage = "UPDATE writer_articles
                            SET 
                            $imageLinkColumn=?
                            WHERE writer_articleId = '$articleId'";


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









