<?php

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['delete_content_submit'])) {
    $toolToDelete = htmlspecialchars($_POST['delete_content_id']);

    $table = 'developer_tools';
    $column = 'developer_toolId';
    $linkCol = 'developer_toolLink';
    $imageCol = 'developer_toolIcon';

     $getToolLink = "SELECT $linkCol FROM $table WHERE $column='$toolToDelete'";
    $getToolLinkResult = mysqli_query($conn,$getToolLink);
    $toolLink= $getToolLinkResult->fetch_assoc();

   

    if ($toolLink) {
        $toolLinkDelete = PROJECT_PATH.$toolLink [$linkCol];
        $toolDeleted = rmdir($toolLinkDelete );

    }

   
    
    if ($toolDeleted) {
       
        $getImageLink = "SELECT $imageCol FROM $table WHERE $column='$toolToDelete'";
        $getImageLinkResult = mysqli_query($conn,$getImageLink);
        $imageLink= $getImageLinkResult->fetch_assoc();

        if ($imageLink) {
            $imageLinkDelete = '../../'.$imageLink [$imageCol];
            $imageDeleted= unlink($imageLinkDelete);
        }

       
        $sqlDeleteTool = mysqli_query($conn,"delete from $table where $column =   '$toolToDelete'");
        $sqlDeleteFromContents = mysqli_query($conn,"delete from contents where contentTable = 'developer_tools' and contentForeignId='$toolToDelete'");
        
       echo 'Deleted Successfully';


    } 
   

}




if (isset($_POST['delete_sub_content_submit'])) {
    
    $toolId= htmlspecialchars($_POST['delete_content_id']);
    $toolFileToDelete = htmlspecialchars($_POST['delete_sub_content_id']);


    $getToolFileLink = "SELECT * FROM developer_uploaded_files WHERE developer_uploadedFileId='$toolFileToDelete'";
    $getToolFileLinkResult = mysqli_query($conn,$getToolFileLink);
    $toolFileLink= $getToolFileLinkResult->fetch_assoc();

    if ($toolFileLink) {
        $toolFileLinkDelete = PROJECT_PATH.$toolFileLink ['developer_uploadedFileLink'];
        $toolFileDeleted= unlink($toolFileLinkDelete);
    }

   

    if ($toolFileDeleted) {   
    $sqlDeleteToolFile = mysqli_query($conn,"delete from developer_uploaded_files where developer_uploadedFileId =   '$toolFileToDelete'");

    } 



}