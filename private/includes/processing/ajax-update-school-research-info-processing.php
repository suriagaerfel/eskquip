<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// if (isset($_GET['publish'])) {
//     $researchId = htmlspecialchars($_GET['publish']);
//     $status ="Published";
// }

if (isset($_POST['unpublish'])) {
    $researchId = htmlspecialchars($_POST['unpublish']);
    $status ="Unpublished";
}


// $successURL= 'Location: ' . $_SERVER['HTTP_REFERER'];
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




    // header ($successURL);

    
                             
    }



}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['updateResearchThumbnail'])) {
    $researchId = htmlspecialchars($_POST['researchHiddenId']);
    
    $imageFolder = '../../uploads/thumbnails/researches/';
    $imageLinkColumn = 'school_researchImage';

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

    $goBackURL = 'Location:'.$website.'/workspace/researches.php?edit=yes&upload=enabled&type=research-thumbnail&research='.$researchId;

    $successURL = 'Location:'.$website.'/workspace/researches.php?edit=yes&research='.$researchId;

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

    $_SESSION ['image-updated-successfully']="yes";

    header($successURL);
                             


     }

     
    }  





    }







}

