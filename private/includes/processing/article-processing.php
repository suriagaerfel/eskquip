<?php 
 require '../../initialize.php';
require '../../database.php';


    if(isset($_POST['saveArticle'])) {
      $articleId= htmlspecialchars($_POST['articleIdHidden']);

      $articleToEdit=$articleId;//

      $editing = htmlspecialchars($_POST['editing']);
      $writerId = htmlspecialchars($_POST['writerIdHidden']);
      $writerName =  htmlspecialchars($_POST['writerFullNameHidden']);
      $title = preg_replace('/\s+/', ' ',htmlspecialchars($_POST['title']));
      $slug = htmlspecialchars(generateSlug($title));
      $category = htmlspecialchars($_POST['category']);
      $topic =  htmlspecialchars($_POST['topic']);
      $content = $_POST['content'];
    

      $latestVersion = isset ($_POST['latestVersion']) ? htmlspecialchars($_POST['latestVersion']) : 0;
      $updatedVersionNumber = (int) $latestVersion + 1;

      $writeDate = date("Y-m-d H:i:s", $currentTime);

      if ($articleId) {
         $goBackURL = 'Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId;
      } else {
         $goBackURL = 'Location:'.$website.'/workspace/writer.php';
      }
      
    

      if (empty($title) OR empty($category) OR empty($topic) OR empty($content)){

      $_SESSION ['empty-details'] = "yes";

      header ($goBackURL);
    

    } else {


      $sqlTitle = "SELECT * FROM writer_articles WHERE writer_articleTitle = '$title'";
      $resultTitle = mysqli_query($conn, $sqlTitle);
      $finalTitle = $resultTitle->fetch_assoc();

      if($finalTitle) {

         $recordedWriterId = $finalTitle ['writer_articleWriterId'];

         if ($writerId !=$recordedWriterId) {
            $_SESSION ['article-exists'] = "yes";
            header($goBackURL);
         }

         if ($writerId ==$recordedWriterId) {
            $sqlUpdate  = "UPDATE writer_articles 
            SET writer_articleCategory = ?,
                                       writer_articleTopic = ?,
                                       writer_articleContent = ?,
                                       writer_articleContentLatestVersionNumber = ?
                                       WHERE writer_articleTitle=?";
                                    
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdate);
            if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sssss",$category,$topic,$content,$updatedVersionNumber, $title);
            mysqli_stmt_execute($stmt);


            $_SESSION['article-saved']="yes";

            header ($goBackURL);
                                 
         }


         }
    

      } elseif (!$finalTitle) {

         $firstVersion = 1;

         $sql = "INSERT INTO writer_articles (writer_articleTitle,writer_articleSlug,writer_articleCategory,writer_articleTopic,writer_articleContent,writer_articleContentLatestVersionNumber,writer_articleWriterId,writer_articleWriterName,writer_articleWriteDate) VALUES (?, ?, ?, ?, ? , ? ,?,?,?)";

         $stmt =$conn->prepare($sql);

         $stmt ->bind_param("sssssssss", $title, $slug, $category, $topic, $content,$firstVersion, $writerId,$writerName,$writeDate);

         $stmt-> execute(); 

         $_SESSION ['new-article-saved']="yes";

         $newArticleId = mysqli_insert_id($conn);

         //Insert into contents table
         if ($category != 'Administrative') {
          $contentTitle=$title;
          $contentTable = 'writer_articles';
          $contentStatus='Draft';


          $sqlInsertContent = "INSERT INTO contents (contentTitle,contentSlug,contentTable,contentForeignId,contentRegistrantId,contentStatus) VALUES (?,?,?,?,?,?)";

          $stmt=$conn->prepare($sqlInsertContent);
          $stmt ->bind_param("ssssss",$contentTitle,$slug,$contentTable,$newArticleId,$writerId,$contentStatus);
          $stmt-> execute(); 

          }


      }

      require ('update-versions-processing.php');

       $id='';

         if ($articleId) {
            $id = $articleId;

            unset ($_SESSION["article_{$articleId}_category"]);
            unset ($_SESSION["article_{$articleId}_topic"]);
            unset ($_SESSION["article_{$articleId}_content"]);
         }

         if ($newArticleId) {
            $id = $newArticleId;

            unset($_SESSION['articleTitleAutoSavedSessionNonEdit']);
            unset($_SESSION['articleCategoryAutoSavedSessionNonEdit']);
            unset($_SESSION['articleTopicAutoSavedSessionNonEdit']);
            unset($_SESSION['articleContentAutoSavedSessionNonEdit']);
         }
  
      header ('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$id.'&version='.$newVersion);
    
     
      }

                     

} 






if (isseT($_POST['previewArticle'])) {
   $articleId = htmlspecialchars($_POST ['articleId']);
    $articleStatus = htmlspecialchars($_POST ['articleStatus']);
    $articleTitle = htmlspecialchars($_POST ['articleTitle']);
    $articleSlug = htmlspecialchars($_POST ['articleSlug']);
      
if ($articleStatus=='Published') {
   header('Location:'.$website.'/articles/'.$articleSlug);
}

if ($articleStatus!='Published') {
   header('Location:'.$website.'/articles/'.$articleSlug.'?preview=yes');
}
 

}




if (isseT($_POST['newArticleWriter'])) {

header('Location:'.$website.'/workspace/writer.php');

}


if (isseT($_POST['newArticleEditor'])) {
header('Location:'.$website.'/workspace/editor.php');

}



if (isset($_POST['saveComment'])) {
   $editingArticle = htmlspecialchars($_POST['articleIdHidden']);
   $comments = htmlspecialchars($_POST['comments']);
   $status = "To Revise";
   $editorId = htmlspecialchars($_POST['editorIdHidden']);

   $goBackURL = 'Location:'.$website.'/workspace/editor.php?my-edits-only=yes&editor-userid='.$editorId.'&article='.$editingArticle;

   if (empty($comments)) {
      $_SESSION ['empty-comments'] = "yes";
      header($goBackURL);
   } else {
      $sqlUpdateArticleComments = "UPDATE writer_articles 
                        SET writer_articleComments = ?,
                        writer_articleStatus = ?
                        WHERE writer_articleId =  $editingArticle";

    
   $stmt = mysqli_stmt_init($conn);
   $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateArticleComments);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $comments,$status);
    mysqli_stmt_execute($stmt);

   unset ($_SESSION['empty-comments']);
    header ($goBackURL);
                           
    }
      
   }

  
}



if (isset($_POST['updateFeaturedImage'])) {
   $articleId = htmlspecialchars($_POST['articleId']);
  
   header('Location:'.$website.'/workspace/writer.php?edit=yes&upload=enabled&type=featured-image&article='.$articleId);

}


if (isset($_POST['showImage'])) {
   $articleId = htmlspecialchars($_POST['articleId']);
  
   header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId.'&show-image=enabled');

}


if (isset($_POST['undoChanges'])) {
   $articleId = htmlspecialchars($_POST['articleId']);
   $versionNumber = htmlspecialchars($_POST['versionNumber']);

   

   unset ($_SESSION["article_{$articleId}_category"]);
   unset ($_SESSION["article_{$articleId}_topic"]);
   unset ($_SESSION["article_{$articleId}_content"]);

  
   header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId.'&version='.$versionNumber-1);

}


if (isset($_POST['redoChanges'])) {
   $articleId = htmlspecialchars($_POST['articleId']);
   $versionNumber = htmlspecialchars($_POST['versionNumber']);

   unset ($_SESSION["article_{$articleId}_category"]);
   unset ($_SESSION["article_{$articleId}_topic"]);
   unset ($_SESSION["article_{$articleId}_content"]);
 
  
   header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId.'&version='.$versionNumber+1);

}


 

                 