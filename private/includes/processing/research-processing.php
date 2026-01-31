<?php

  require '../../initialize.php';
require '../../database.php';




if (isset($_POST['saveResearch'])) {

   $fileErrors = [];
   $researchId = htmlspecialchars($_POST['researchIdHidden']);
   $schoolId = htmlspecialchars($_POST['schoolIdHidden']);
   $date = htmlspecialchars($_POST['date']);
   $proponents = htmlspecialchars($_POST['proponents']);
   $title = htmlspecialchars($_POST['title']);
   $slug = htmlspecialchars(generateSlug($title));
   $category = htmlspecialchars($_POST['category']);
   $abstract = htmlspecialchars($_POST['abstract']);

    $_SESSION['researchDate'] = $date; 
    $_SESSION['researchProponents'] = $proponents; 
    $_SESSION['researchTitle'] = $title;
    $_SESSION['researchSlug'] = $slug;
    $_SESSION['researchCategory'] = $category;
    $_SESSION['researchAbstract'] = $abstract;

    if ($researchId) {
    $goBackURL = 'Location:'.$website.'/workspace/researches.php?edit=yes&research='.$researchId;
   } else {
      $goBackURL = 'Location:'.$website.'/workspace/researches.php';
   }


    if (empty($title) || empty($category) || empty($abstract) || empty($date) || empty($proponents)){

    $_SESSION ['empty-details'] = "yes";
    array_push($fileErrors,'Empty fields.');
    header ($goBackURL);
    

    } else {
       $sqlTitle = "SELECT * FROM school_researches WHERE school_researchTitle = '$title'";
      $resultTitle = mysqli_query($conn, $sqlTitle);
      $finalTitle = $resultTitle->fetch_assoc();

      if (!$finalTitle) {

         $file = $_FILES ['file'];

         $fileFileName = $file ['name'];
         $fileFileNameExt = explode ('.',$fileFileName);
         $fileFileNameActualExt = strtolower(end($fileFileNameExt));

         $allowedFile = ['pdf'];
              
         $uploadDate = date("Y-m-d H:i:s", $currentTime);

         if (empty($file['name'])) {
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

            $fileFolder = '../../uploads/documents/school/';

            // Create folders if they don't exist
                  if (!is_dir($fileFolder)) {
                        mkdir($fileFolder, 0777, true);
                  }
         $name=$schoolId.'-'.bin2hex($title);
         $actualFile= $name.'.'.$fileFileNameActualExt;
         $filePath =$fileFolder.$actualFile;

            $uploadOk = 1;
            // Move uploaded files
                  if (move_uploaded_file($_FILES['file']["tmp_name"], $filePath)) {
                        $uploadOk = 1;
                  } 
            $filePathLink= substr($filePath,5);


            $sql = "INSERT INTO school_researches (school_researchTitle,school_researchSlug,school_researchCategory,school_researchAbstract,school_researchFormat,school_researchUploader,school_researchDate,school_researchProponents,school_researchUploadDate,school_researchLink) VALUES (?, ?, ?, ?,?,?,?,?,?,?)";

         $stmt =$conn->prepare($sql);

         $stmt ->bind_param("ssssssssss", $title,$slug, $category, $abstract,$fileFileNameActualExt,$schoolId,$date,$proponents,$uploadDate,$filePathLink);

         $stmt-> execute(); 

         $_SESSION ['new-research-saved']="yes";

         $newResearchId = mysqli_insert_id($conn);

          //Insert into contents table

          $contentTitle=$title;
          $contentTable = 'school_researches';
          $contentForeignId = $newResearchId;
          $contentStatus='Draft';


          $sqlInsertContent = "INSERT INTO contents (contentTitle,contentSlug,contentTable,contentForeignId,contentRegistrantId,contentStatus) VALUES (?,?,?,?,?,?)";

          $stmt=$conn->prepare($sqlInsertContent);
          $stmt ->bind_param("ssssss",$contentTitle,$slug,$contentTable,$contentForeignId,$schoolId,$contentStatus);
          $stmt-> execute(); 

            unset($_SESSION['researchTitleAutoSavedSessionNonEdit']);
            unset($_SESSION['researchCategoryAutoSavedSessionNonEdit']);
            unset($_SESSION['researchAbstractAutoSavedSessionNonEdit']);
            unset($_SESSION['researchProponentsAutoSavedSessionNonEdit']);
            unset($_SESSION['researchDateAutoSavedSessionNonEdit']);
         
          header ('Location:'.$fileFolder.'research-thumbnail-processing.php?researchid='.$newResearchId.'&name='.$name); 

         }


         } else {

 
            $sqlUpdate  = "UPDATE school_researches
            SET school_researchCategory=?,
                  school_researchAbstract=?,
                  school_researchDate=?,
                  school_researchProponents=?
                  WHERE school_researchTitle='$title'";
                                    
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdate);
            if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"ssss",$category,$abstract,$date,$proponents);
            mysqli_stmt_execute($stmt);


            unset($_SESSION["research_{$researchId}_category"]);
            unset($_SESSION["research_{$researchId}_abstract"]);
            unset($_SESSION["research_{$researchId}_proponents"]);
            unset($_SESSION["research_{$researchId}_date"]);

            $_SESSION['research-saved']="yes";
               
            header ('Location:'.$website.'/workspace/researches.php?edit=yes&research='.$researchId);
                             
    
    } 


  }


    }

    


   
   

    
}            









if (isset($_POST['newResearch'])) {
  header('Location:'.$website.'/workspace/researches.php');
}


if (isset($_POST['showResearch'])) {
   $researchId = $_POST ['researchId'];
   header('Location:'.$website.'/workspace/researches.php?edit=yes&research='.$researchId.'&show=enabled');
}


if (isset($_POST['previewResearch'])) {

   $researchId = $_POST ['researchId'];
   $researchStatus = $_POST ['researchStatus'];
   $researchTitle = $_POST ['researchTitle'];
   $researchSlug = $_POST ['researchSlug'];

   if ($researchStatus=='Published') {
      header('Location:'.$website.'/researches/'.$researchSlug);
   }

    if ($researchStatus!='Published') {
      header('Location:'.$website.'/researches/'.$researchSlug.'?preview=yes');
   }


   

}



if (isset($_POST['updateResearchThumbnail'])) {
   $researchId = htmlspecialchars($_POST['researchId']);
  
   header('Location:'.$website.'/workspace/researches.php?edit=yes&upload=enabled&type=research-thumbnail&research='.$researchId);

}
