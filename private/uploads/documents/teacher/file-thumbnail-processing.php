<?php 

 require '../../../initialize.php';
require '../../../database.php';


$newFileId = isset($_GET['fileid']) ? $_GET['fileid'] : ""; 
$pdfPath = isset($_GET['name']) ? $_GET['name'].'.pdf' : ""; 
$outputPath = isset($_GET['name']) ? $_GET['name'].'.jpeg' : "";


// $imagick = new Imagick (PRIVATE_PATH.'/uploads/documents/teacher/'.$pdfPath.'[0]');
// // $imagick->readImage($pdfPath.'[0]'); 
// $imagick->setImageFormat('jpeg');
// $imagick->writeImage(PRIVATE_PATH.'/uploads/documents/teacher/'.$outputPath);
// $imagick->clear();
// $imagick->destroy();



$_SESSION ['new-file-saved']="yes";

header('Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$newFileId);