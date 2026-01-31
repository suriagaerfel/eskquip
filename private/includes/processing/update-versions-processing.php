<?php
      
      $foreignId = '';
      $versionTable = '';
      $versionNumberColumn = '';
      $versionForeignIdColumn = '';
      $versionUpdatableColumn = '';
      $update = '';
      $versionSortColumn = '';

    if (isset($_POST['saveArticle'])) {
        if ($articleId) {
         $foreignId = $articleId;
        } 
      
        if ($newArticleId) {
            $foreignId = $newArticleId;
        }

        $versionTable = 'writer_article_versions';
      $versionNumberColumn = 'writer_articleVersionNumber';
      $versionForeignIdColumn = 'writer_articleVersionForeignId';
      $versionUpdatableColumn = 'writer_articleVersionContent';
      $update = $content;
      $versionSortColumn = 'writer_articleVersionId';

    }
      


      if ($foreignId) {

         $newVersion = '';

         if ($finalTitle) {
         $newVersion=$updatedVersionNumber; 
         } else {
            $newVersion=$firstVersion; 
         }

         $sqlContentVersion = "INSERT INTO $versionTable ($versionNumberColumn,$versionForeignIdColumn,$versionUpdatableColumn) VALUES (?,?,?)";

         $stmt=$conn->prepare($sqlContentVersion);
         $stmt ->bind_param("sss",$newVersion,$foreignId,$update);
         $stmt-> execute(); 



         if ($newVersion > 5) {
            $sqlDeletePreviousVersion = mysqli_query($conn,"delete from $versionTable where $versionForeignIdColumn = $foreignId ORDER BY $versionSortColumn ASC LIMIT 1");
         }

         
      }

?>