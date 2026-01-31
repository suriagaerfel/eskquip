<?php

require '../../initialize.php';
require '../../database.php';





   //Sanitized already
   if (isset($_GET['pin'])) {
        $articleId = htmlspecialchars($_GET['pin']);
        $editorUserId = htmlspecialchars($_GET ['editor-userid']);
        $status = htmlspecialchars($_GET['status']);
    }

    if (isset($_GET['unpin'])) {
        $articleId = htmlspecialchars($_GET['unpin']);
        $editorUserId = "";
        $status = htmlspecialchars($_GET['status']);; 
    }
    
    
    
    $sqlUpdateArticleEditorandStatus = "UPDATE writer_articles 
                        SET writer_articleStatus = ?,
                        writer_articleEditors = ?
                        WHERE writer_articleId =  $articleId";

    
   $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateArticleEditorandStatus);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"ss", $status,$editorUserId);
    mysqli_stmt_execute($stmt);

    header ('Location: ' .$website.'/workspace/editor.php?edit=yes&article='.$articleId);

}




