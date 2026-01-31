<?php

  require '../../initialize.php';
require '../../database.php';



if (isset($_POST['createTool'])) {

   $developerId = htmlspecialchars($_POST['developerIdHidden']);
  $title = htmlspecialchars($_POST['title']);
  $category = htmlspecialchars($_POST['category']);
  $description = htmlspecialchars($_POST['description']);

   
      $goBackURL = 'Location:'.$website.'/workspace/developer.php';
  

    if (empty($title) || empty($category) || empty($description)) {
      $_SESSION ['empty-details'] = "yes";
      header ($goBackURL);

    } else {

    $toolName = str_replace(" ","-",$title);
    $toolFolder = strtolower($toolName);

    $createdDate = date("Y-m-d H:i:s", $currentTime);

    $folderPath = '../../../public/tools/'.$toolFolder.'/';

       // Create folders if they don't exist
              if (!is_dir($folderPath)) {
                  mkdir($folderPath, 0777, true);
              }
     
       $folderPathLink= substr($folderPath,8);
       

       $sqlCheckFolder = "SELECT * FROM developer_tools WHERE developer_toolLink = '$folderPathLink'";
       $sqlCheckFolderResult = mysqli_query($conn,$sqlCheckFolder);
       $folder=$sqlCheckFolderResult->fetch_assoc();

       if ($folder) {

        $_SESSION ['tool-exists'] = "yes";
        header ($goBackURL);


       } else {


        $sql = "INSERT INTO developer_tools (developer_toolTitle,developer_toolCategory,developer_toolDescription,developer_toolOwner,developer_toolCreatedDate,developer_toolLink) VALUES (?, ?, ?, ?,?,?)";

        $stmt =$conn->prepare($sql);

        $stmt ->bind_param("ssssss", $title, $category, $description,$developerId,$createdDate,$folderPathLink);

        $stmt-> execute(); 

        unset ($_SESSION['tool-title']);
        unset ($_SESSION['tool-category']);
        unset ($_SESSION['tool-description']);


      $newToolId = mysqli_insert_id($conn);
   

       //Insert into contents table

          $contentTitle=$title;
          $contentTable = 'developer_tools';
          $contentForeignId = $newToolId;
          $contentStatus='Draft';


          $sqlInsertContent = "INSERT INTO contents (contentTitle,contentTable,contentForeignId,contentRegistrantId,contentStatus) VALUES (?,?,?,?,?)";

          $stmt=$conn->prepare($sqlInsertContent);
          $stmt ->bind_param("sssss",$contentTitle,$contentTable,$contentForeignId,$developerId,$contentStatus);
          $stmt-> execute(); 

           unset($_SESSION['toolTitleAutoSavedSessionNonEdit']);
        unset($_SESSION['toolCategoryAutoSavedSessionNonEdit']);
        unset($_SESSION['toolDescriptionAutoSavedSessionNonEdit']);


    header ('Location:'.$website.'/workspace/developer.php?edit=yes&tool='.$newToolId);


       }

    }

}







if (isset($_POST['saveTool'])) {

    $developerId = htmlspecialchars($_POST['developerIdHidden']);
    $toolId = htmlspecialchars($_POST['toolIdHidden']);
    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);

    $sqlUpdate  = "UPDATE developer_tools
    SET developer_toolCategory = ?,
                               developer_toolDescription = ?
                                WHERE developer_toolTitle=?";
                            
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdate);
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss",$category,$description,$title);
    mysqli_stmt_execute($stmt);


     unset ($_SESSION["tool_{$toolId}_category"]);
    unset ($_SESSION["tool_{$toolId}_description"]);


    $_SESSION['tool-saved']="yes";

    header ('Location: ' . $website.'/workspace/developer.php?edit=yes&tool='.$toolId);

    
}          
}






if (isset($_POST['uploadToolFile'])) {

    $toolLink= htmlspecialchars($_POST ['toolLinkHidden']);
    $toolId= htmlspecialchars($_POST ['toolIdHidden']);

    $file = $_FILES ['file'];

    $fileFileName = $file ['name'];
    $fileFileNameExt = explode ('.',$fileFileName);
    $fileFileNameActualExt = strtolower(end($fileFileNameExt));

    $allowedFile = ['php','htm','html','css','js','java','jsx','cpp','py',];      
    $uploadDate = date("Y-m-d H:i:s", $currentTime);

    $goBackURL='Location:'.$website.'/workspace/developer.php?edit=yes&tool='.$toolId;


    $fileErrors = [];

    if (empty($file['name'])){

    $_SESSION ['empty-file'] = "yes";

    array_push($fileErrors,'No file attached.');

    header ($goBackURL);

  } else {
    if(!in_array( $fileFileNameActualExt,$allowedFile)) {
    $_SESSION ['invalid-tool-file-format'] = "yes";
      array_push($fileErrors,'Not accepted format for file.');
       header ($goBackURL);

  }

  if (!$fileErrors) {

      $filePath = '../../..'.$toolLink.$fileFileName;

      $fileLink = substr($filePath,8);

      $sqlCheckIfFileExists = "SELECT * FROM developer_uploaded_files WHERE developer_uploadedFileLink='$fileLink'";
      $sqlCheckIfFileExistsResult = mysqli_query($conn,$sqlCheckIfFileExists);
      $fileExists = $sqlCheckIfFileExistsResult->fetch_assoc();

      if ($fileExists) {
        array_push($fileErrors,'File with same name exists.');
        $_SESSION['file-exists'] ="yes";
        header ($goBackURL);
      } else {

        $uploadOk = 1;

      // Move uploaded files
      if (move_uploaded_file($_FILES['file']["tmp_name"],  $filePath)) {
                  $uploadOk = 1;
          $_SESSION ['upload-successful']="yes";
          header ($goBackURL);
      } else {
        $_SESSION ['tool-doesnt-exist']="yes";
        header ($goBackURL);
      }


      $sqlInsertToFiles = "INSERT INTO developer_uploaded_files (developer_uploadedFileFolderId,developer_uploadedFileLink) VALUES (? ,?)";
        

       $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sqlInsertToFiles);

            if ($prepareStmt) {

                mysqli_stmt_bind_param($stmt,"ss",$toolId,$fileLink);
                mysqli_stmt_execute($stmt);
      
      header ('Location:'.$website.'/workspace/developer.php?edit=yes&tool='.$toolId);


  }


      }

      


  }

  



} }



if (isset($_POST['previewTool'])) {

  $toolLink = htmlspecialchars($_POST ['toolLinkHidden']);

   header('Location:'.$toolLink);


}





if (isset($_POST['newTool'])) {

  $toolId= htmlspecialchars($_POST['toolIdHidden']);

   header('Location:'.$website.'/workspace/developer.php');

}






if (isset($_POST['updateToolIcon'])) {
  $toolId= $_POST['toolIdHidden'];

  header('Location:'.$website.'/workspace/developer.php?edit=yes&upload=enabled&type=tool-icon&tool='.$toolId);

}






















