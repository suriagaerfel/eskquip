<?php

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['delete_content_submit'])) {
    $researchToDelete = htmlspecialchars($_POST['delete_content_id']);

    $table = 'school_researches';
    $column = 'school_researchId';
    $linkCol = 'school_researchLink';
    $imageCol = 'school_researchImage';


    $getResearchLink = "SELECT $linkCol FROM $table WHERE $column='$researchToDelete'";
    $getResearchLinkResult = mysqli_query($conn,$getResearchLink);
    $researchLink= $getResearchLinkResult->fetch_assoc();

    if ($researchLink) {
        $researchLinkDelete = '../../'.$researchLink [$linkCol];
        $researchDeleted= unlink($researchLinkDelete);
    }



    $getImageLink = "SELECT $imageCol FROM $table WHERE $column='$researchToDelete'";
    $getImageLinkResult = mysqli_query($conn,$getImageLink);
    $imageLink= $getImageLinkResult->fetch_assoc();

    if ($imageLink) {
        $imageLinkDelete = '../../'.$imageLink [$imageCol];
        $imageDeleted= unlink($imageLinkDelete);
    }



    if ($researchDeleted) {
        $sqlDeleteResearch = mysqli_query($conn,"delete from $table where $column ='$researchToDelete'");
        $sqlDeleteFromContents = mysqli_query($conn,"delete from contents where contentTable = 'school_researches' and contentForeignId='$researchToDelete'");

        echo 'Deleted Successfully';
    } 
  

    

    

}

