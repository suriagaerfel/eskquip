<?php

require '../../initialize.php';
require '../../database.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

if (isset($_GET['publish'])) {
    $toolId = htmlspecialchars($_GET['publish']);
    $status ="Published";
}



if (isset($_GET['unpublish'])) {
    $toolId = htmlspecialchars($_GET['unpublish']);
    $status ="Unpublished";
}

$goBackURL = 'Location: ' . $_SERVER['HTTP_REFERER'];
$successURL = 'Location: ' . $_SERVER['HTTP_REFERER'];

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

    header ($successURL);

    
                             
    }


}
































    if (isset($_POST['upload_submit'])) {

    $toolId = $_POST['content_hidden_id'];
    
    $imageFolder = '../../uploads/tool-icons/';
    $imageLinkColumn = 'developer_toolIcon';

    $allowedImage = ['jpeg','jpg'];
    $maxSize = 10 * 1024 * 1024;

    $imageErrors = [];

    $responses = [];

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

     $sqlToolData = "SELECT * FROM developer_tools WHERE developer_toolId = '$toolId'";
    $sqlToolDataResult = mysqli_query($conn,$sqlToolData);
    $toolData= $sqlToolDataResult->fetch_assoc();

    $toolImageLink = $toolData [$imageLinkColumn];
    

    if ($toolImageLink) {
        $toolImageLinkDelete = '../..'.$toolImageLink;
        $toolImageLinkDeleted = unlink($toolImageLinkDelete);
    } 
    

        // Create folders if they don't exist
    if (!is_dir($imageFolder)) {
        mkdir($imageFolder, 0777, true);
    }

    $imageFile = $imageFolder .$toolId."-".date("YmdHis",time()).".".$imageFileNameActualExt;

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

   
    $newCropImage = imagecreatetruecolor($maxResolution,$maxResolution);
    imagecopyresampled($newCropImage,$newImage,0,0,$x,$y,$maxResolution,$maxResolution,$maxResolution,$maxResolution); 
   

    imagejpeg($newCropImage,$imageFile,90);
    }




    $uploadedImageFile= substr($imageFile,5);
    $imageStatus = 0;

    $sqlUpdateImage = "UPDATE developer_tools
                        SET 
                        $imageLinkColumn=?
                        WHERE developer_toolId = $toolId";


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










