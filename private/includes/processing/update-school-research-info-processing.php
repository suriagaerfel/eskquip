<?php

require '../../initialize.php';
require '../../database.php';


//Sanitized already
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

if (isset($_GET['publish'])) {
    $researchId = htmlspecialchars($_GET['publish']);
    $status ="Published";
}

if (isset($_GET['unpublish'])) {
    $researchId = htmlspecialchars($_GET['unpublish']);
    $status ="Unpublished";
}


$successURL= 'Location: ' . $_SERVER['HTTP_REFERER'];
$sqlResearchInfo = "SELECT * FROM school_researches WHERE school_researchId = '$researchId'";

$sqlResearchInfoResult = mysqli_query($conn,$sqlResearchInfo);
$researchInfo = $sqlResearchInfoResult->fetch_assoc();

$researchLiveDate = $researchInfo ['school_researchLiveDate'] !='0000-00-00 00:00:00'? $researchInfo ['school_researchLiveDate'] : date("Y-m-d H:i:s", $currentTime);


 $sqlUpdateResearchInfo = "UPDATE school_researches 
                        SET school_researchStatus = ?,
                        school_researchLiveDate = ?
                        WHERE school_researchId =  '$researchId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateResearchInfo);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$researchLiveDate);
    mysqli_stmt_execute($stmt);


     $sqlUpdateContent = "UPDATE contents 
                        SET contentStatus = ?,
                        contentPubDate = ?
                        WHERE contentTable = 'school_researches' AND
                        contentForeignId = '$researchId'";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateContent );
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$researchLiveDate);
    mysqli_stmt_execute($stmt);

    }




    header ($successURL);

    
                             
    }



}





    if (isset($_POST['upload_submit'])) {
    $researchId = htmlspecialchars($_POST['content_hidden_id']);
    
    $imageFolder = '../../uploads/thumbnails/researches/';
    $imageLinkColumn = 'school_researchImage';

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

    $sqlResearchData = "SELECT * FROM school_researches WHERE school_researchId = '$researchId'";
    $sqlResearchDataResult = mysqli_query($conn,$sqlResearchData);
    $researchData= $sqlResearchDataResult->fetch_assoc();

    $researchImageLink = $researchData [$imageLinkColumn];
    

    if ($researchImageLink) {
        $researchImageLinkDelete = '../..'.$researchImageLink;
        $researchImageLinkDeleted = unlink($researchImageLinkDelete);
    } 

    
        // Create folders if they don't exist
    if (!is_dir($imageFolder)) {
        mkdir($imageFolder, 0777, true);
    }

    $imageFile = $imageFolder .$researchId."-".date("YmdHis",time()).".".$imageFileNameActualExt;

    $uploadOk = 1;

    if (move_uploaded_file($image["tmp_name"], $imageFile)) {
        $uploadOk = 1;
    } 


    $uploadedImageFile= substr($imageFile,5);
    $imageStatus = 0;

    $sqlUpdateImage = "UPDATE school_researches
                        SET 
                        $imageLinkColumn=?
                        WHERE school_researchId = $researchId";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateImage);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $uploadedImageFile);

    mysqli_stmt_execute($stmt);

    echo 'Upload Successful';

     }

     
    } else {
         foreach ($responses as $response) {
            echo $response."<br>";
            }
    }  





    }









