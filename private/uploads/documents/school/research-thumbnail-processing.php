<?php 

 require '../../../initialize.php';
require '../../../database.php';


$newResearchId = isset($_GET['researchid']) ? $_GET['researchid'] : ""; 
$pdfPath = isset($_GET['name']) ? $_GET['name'].'.pdf' : ""; 
$outputPath = isset($_GET['name']) ? $_GET['name'].'.jpeg' : "";



// $imagick = new Imagick (PRIVATE_PATH.'/uploads/documents/school/'.$pdfPath.'[0]');
// $imagick->readImage($pdfPath.'[0]'); 
// $imagick->setImageFormat('jpeg');
// $imagick->writeImage(PRIVATE_PATH.'/uploads/documents/school/'.$outputPath);
// $imagick->clear();
// $imagick->destroy();



$_SESSION ['new-research-saved']="yes";

header ('Location:'.$website.'/workspace/researches.php?edit=yes&research='.$newResearchId);