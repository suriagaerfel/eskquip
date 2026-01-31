<?php

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['delete_content_submit'])) {
    $fileToDelete = htmlspecialchars($_POST['delete_content_id']);

    $table = 'teacher_files';
    $column = 'teacher_fileId';
    $linkCol = 'teacher_fileLink';
    $imageCol = 'teacher_fileImage';

    $getFileLink = "SELECT $linkCol FROM $table WHERE $column='$fileToDelete'";
    $getFileLinkResult = mysqli_query($conn,$getFileLink);
    $fileLink= $getFileLinkResult->fetch_assoc();

    if ($fileLink) {
        $fileLinkDelete = '../../'.$fileLink [$linkCol];
        $fileDeleted= unlink($fileLinkDelete);
    }


    $getImageLink = "SELECT $imageCol FROM $table WHERE $column='$fileToDelete'";
    $getImageLinkResult = mysqli_query($conn,$getImageLink);
    $imageLink= $getImageLinkResult->fetch_assoc();

    if ($imageLink) {
        $imageLinkDelete = '../../'.$imageLink [$imageCol];
        $imageDeleted= unlink($imageLinkDelete);
    }





    if ($fileDeleted) {
        $_SESSION['file-deleted']="yes";
        $sqlDeleteFile = mysqli_query($conn,"delete from $table where $column =   '$fileToDelete'");
        $sqlDeleteFromContents = mysqli_query($conn,"delete from contents where contentTable = 'teacher_files' and contentForeignId='$fileToDelete'");

        echo 'Deleted Successfully';

    } 
    
    
   

    
    

}

