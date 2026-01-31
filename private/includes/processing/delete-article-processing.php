<?php

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['delete_content_submit'])) {
    $articleToDelete = htmlspecialchars($_POST['delete_content_id']);

    $table = 'writer_articles';
    $column = 'writer_articleId';
    $imageCol = 'writer_articleImage';

    $getImageLink = "SELECT $imageCol FROM $table WHERE $column='$articleToDelete'";
    $getImageLinkResult = mysqli_query($conn,$getImageLink);
    $imageLink= $getImageLinkResult->fetch_assoc();

    if ($imageLink) {
        $imageLinkDelete = '../../'.$imageLink [$imageCol];
        $imageDeleted= unlink($imageLinkDelete);
    }

     $sqlDeleteArticle = mysqli_query($conn,"delete from writer_articles where writer_articleId =   $articleToDelete");
     $sqlDeleteFromContents = mysqli_query($conn,"delete from contents where contentTable = 'writer_articles' and contentForeignId='$articleToDelete'");

     $sqlDeleteFromVersions = mysqli_query($conn,"delete from writer_article_versions where writer_articleVersionForeignId = '$articleToDelete'");
 

}