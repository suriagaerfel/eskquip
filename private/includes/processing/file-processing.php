<?php

  require '../../initialize.php';
require '../../database.php';



if (isset($_POST['saveFile'])) {
    $fileErrors = [];
    $teacherId = htmlspecialchars($_POST['teacherIdHidden']);
    $fileId=htmlspecialchars($_POST['fileIdHidden']);
    $status = htmlspecialchars($_POST['fileStatus']);

    $title = htmlspecialchars($_POST['title']);
    $slug = htmlspecialchars(generateSlug($title));
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    $amount = htmlspecialchars($_POST['amount']);
    $sharedWith = htmlspecialchars($_POST['sharedWith']);
    $accessType = htmlspecialchars($_POST['accessType']);

   

    if ($fileId) {
    $goBackURL = 'Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$fileId;
    } else {
      $goBackURL = 'Location:'.$website.'/workspace/teacher.php';
    }
  
    
    if ($accessType =='Purchased') {
      if($status == 'Published') {
        if ($amount) {
          $forSale ='For Sale';
        } else {
          $forSale ='Not for Sale';
        }
        
      }

      if($status != 'Published') {
         if ($amount) {
          $forSale ='Not for Sale';
        } else {
          $forSale ='Not for Sale';
        }
      }

    } else {
      $forSale ='Not for Sale';
    }

    $file = $_FILES ['file'];

        $fileFileName = $file ['name'];
        $fileTempName = $file ["tmp_name"];
        $fileFileNameExt = explode ('.',$fileFileName);
        $fileFileNameActualExt = strtolower(end($fileFileNameExt));

        $allowedFile = ['pdf'];   
        $uploadDate = date("Y-m-d H:i:s", $currentTime);


    if (empty($title) || empty($category) || empty($accessType) || empty($description)){

    $_SESSION ['empty-details'] = "yes";
    array_push($fileErrors,'Empty fields.');

    header ($goBackURL);
    

    } else {

        $sqlTitle = "SELECT * FROM teacher_files WHERE teacher_fileTitle = '$title'";
        $resultTitle = mysqli_query($conn, $sqlTitle);
        $finalTitle = $resultTitle->fetch_assoc();

        if (!$finalTitle) {

        if (empty($file['name'])){
        $_SESSION ['empty-details'] = "yes";
        array_push($fileErrors,'Empty fields.');
        header ($goBackURL);

        } else {

          if (!in_array($fileFileNameActualExt,$allowedFile )) {
          $_SESSION ['invalid-file-format'] = "yes";
          array_push($fileErrors,'Not accepted format for file.');
          header ($goBackURL);
          } 

        }

        if (!$fileErrors) {

          $fileFolder = '../../uploads/documents/teacher/';

          // Create folders if they don't exist
                  if (!is_dir($fileFolder)) {
                      mkdir($fileFolder, 0777, true);
                  }
          $name=$teacherId.'-'.bin2hex($title);
          $actualFile= $name.'.'.$fileFileNameActualExt;
          $filePath =$fileFolder.$actualFile;

          $uploadOk = 1;

          // Move uploaded files
                  if (move_uploaded_file($_FILES['file']["tmp_name"], $filePath)) {
                      $uploadOk = 1;
                  } 
          $filePathLink= substr($filePath,5);



          $sql = "INSERT INTO teacher_files (teacher_fileTitle,teacher_fileSlug,teacher_fileCategory,teacher_fileAccessType,teacher_fileSharedWith,teacher_fileForSale,teacher_fileDescription,teacher_fileFormat,teacher_fileOwner,teacher_fileUploadDate,teacher_fileLink) VALUES (?, ?, ?, ?,?,?,?,?,?,?,?)";

          $stmt =$conn->prepare($sql);

          $stmt ->bind_param("sssssssssss", $title,$slug, $category,$accessType,$sharedWith, $forSale,$description,$fileFileNameActualExt,$teacherId,$uploadDate,$filePathLink);

          $stmt-> execute(); 

          $_SESSION ['new-file-saved']="yes";

          $newFileId = mysqli_insert_id($conn);
          
          
          //Insert into contents table
          $contentTitle=$title;
          $contentTable = 'teacher_files';
          $contentForeignId = $newFileId;
          $contentStatus='Draft';


          $sqlInsertContent = "INSERT INTO contents (contentTitle,contentSlug,contentTable,contentForeignId,contentRegistrantId,contentStatus) VALUES (?,?,?,?,?,?)";

          $stmt=$conn->prepare($sqlInsertContent);
          $stmt ->bind_param("ssssss",$contentTitle,$slug,$contentTable,$contentForeignId,$teacherId,$contentStatus);
          $stmt-> execute(); 

          unset($_SESSION['fileTitleAutoSavedSessionNonEdit']);
          unset($_SESSION['fileCategoryAutoSavedSessionNonEdit']);
          unset($_SESSION['fileDescriptionAutoSavedSessionNonEdit']);
          unset($_SESSION['fileAmountAutoSavedSessionNonEdit']);
          unset($_SESSION['fileAccessTypeAutoSavedSessionNonEdit']);
          unset($_SESSION['fileSharedWithAutoSavedSessionNonEdit']);

          header ('Location:'.$fileFolder.'file-thumbnail-processing.php?fileid='.$newFileId.'&name='.$name.'&iframe=true'); 
        }

      } else {

        $sqlUpdate  = "UPDATE teacher_files
                    SET teacher_fileCategory = ?,
                    teacher_fileAccessType = ?,
                    teacher_fileSharedWith = ?,
                    teacher_fileForSale = ?,
                    teacher_fileDescription = ?,
                    teacher_fileAmount = ?
                      WHERE teacher_fileTitle=?";
                                
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdate);
        if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"sssssss",$category,$accessType,$sharedWith,$forSale,$description,$amount,$title);
        mysqli_stmt_execute($stmt);

        unset($_SESSION["file_{$fileId}_category"]);
      unset($_SESSION["file_{$fileId}_description"]);
      unset($_SESSION["file_{$fileId}_amount"]);
      unset($_SESSION["file_{$fileId}_access_type"]);
      unset($_SESSION["file_{$fileId}_shared_with"]);


        $_SESSION['file_saved']="yes";

        header ($goBackURL);
                                
        
        } 


      }


      


    }


   
    
}            




if (isset($_POST['newFile'])) {
  
   header('Location:'.$website.'/workspace/teacher.php');

}




if (isset($_POST['showFile'])) {
   $fileId = htmlspecialchars($_POST ['fileId']);
   header('Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$fileId.'&show=enabled');

}



if (isset($_POST['previewFile'])) {

   $fileId = htmlspecialchars($_POST ['fileId']);
    $fileStatus = htmlspecialchars($_POST ['fileStatus']);
    $fileTitle = htmlspecialchars($_POST ['fileTitle']);
    $fileSlug = htmlspecialchars($_POST ['fileSlug']);

   if ($fileStatus=='Published') {
      header('Location:'.$website.'/teacher-files/'.$fileSlug);
   }

    if ($fileStatus!='Published') {
      header('Location:'.$website.'/teacher-files/'.$fileSlug.'?preview=yes');
   }


}



if (isset($_POST['updateFileThumbnail'])) {
   $fileId = htmlspecialchars($_POST['fileId']);
  
   header('Location:'.$website.'/workspace/teacher.php?edit=yes&upload=enabled&type=file-thumbnail&file='.$fileId);

}
