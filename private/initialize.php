<?php

  $domain = 'localhost';
  $publicFolder= '/eskquip/public'; 
  $privateFolder='/eskquip/private';

  $website = $publicFolder;

  ob_start(); // Output buffering is turned on.

  session_start(); //Start the session.

  date_default_timezone_set('Asia/Manila');//Set the default time zone.

  $currentTime = time(); //The variable for the current time is set.

  $currentTimeConverted = date("m/d/Y g:i A",  $currentTime); //The variable for the formatted current time is set.

  $currentURL = $_SERVER['REQUEST_URI']; //The variable for current url

  
  
 

  require ('database.php'); //The database is required.

  $loggedIn = isset($_SESSION['id']) ? true : false; //The log in status is set to false when an id of a user is not set in a session.
$registrantId= isset($_SESSION['id']) ? $_SESSION['id'] : ''; //This variable is used to store the id of a user that is initially set in a session.


  //DEFINING THE PATH FOR RELATIVE REFERENCE
  define("PRIVATE_PATH", dirname(__FILE__)); //The directory folder of this file is defined as PRIVATE_PATH.
  define("PROJECT_PATH", dirname(PRIVATE_PATH));//The directory folder of PRIVATE_PATH is defined as PROJECT_PATH.
  define("PUBLIC_PATH", PROJECT_PATH . '/public');//The subfolder "public" of PROJECT_PATH is defined as PUBLIC_PATH.
  define ("INCLUDESLAYOUT_PATH", PRIVATE_PATH.'/includes/layouts'); //The subfolder "includes/layouts" of PRIVATE_PATH is defined as INCLUDESLAYOUT_PATH.
  define ("INCLUDESPROCESSING_PATH", PRIVATE_PATH.'/includes/processing');//The subfolder "includes/processing" of PRIVATE_PATH is defined as INCLUDESPROCESSING_PATH.



//INITIALIZATION FUNCTIONS

function dcomplete_format($string="") {
  return date("M j, Y g:i a",strtotime($string));
}

function image_crop ($file,$maxResolution) {
  if (file_exists($file)) {

    $imageFileNameActualExt="";

    if ($imageFileNameActualExt=='jpeg') {
    $originalImage = imagecreatefromjpeg($file);
    }

    if ($imageFileNameActualExt=='png') {
    $originalImage = imagecreatefrompng($file);
    }
    
    $originalWidth = imagesx($originalImage);
    $originalHeight = imagesy($originalImage);

    if ($originalHeight > $originalWidth) {
    $ratio = $maxResolution / $originalWidth;
    $newWidth = $maxResolution;
    $newHeight = $originalHeight * $ratio;

    $difference= $newHeight - $newWidth;

    $x=0;
    $y = round($difference/2);

    } else {

      $ratio = $maxResolution / $originalHeight;
      $newHeight = $maxResolution;
      $newWidth = $originalWidth * $ratio;

      $difference= $newWidth - $newHeight;

      $x = round($difference/2);
      $y=0;
    }   

   
    

    if ($originalImage) {
      $newImage = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresampled($newImage,$originalImage,0,0,0,0,$newWidth,$newHeight,$originalWidth,$originalHeight); 

    $newCropImage = imagecreatetruecolor($maxResolution,$maxResolution);
    imagecopyresampled($newCropImage,$newImage,0,0,$x,$y,$maxResolution,$maxResolution,$maxResolution,$maxResolution); 

    imagejpeg($newCropImage,$file,90);
    }


  }
}



function generateSlug($string) {
    // Convert to lowercase
    $slug = mb_strtolower($string, 'UTF-8');

    // Replace non-alphanumeric characters (except hyphens and spaces) with a space
    $slug = preg_replace('/[^a-z0-9\s-]/', ' ', $slug);

    // Replace spaces with a single plus
    $slug = preg_replace('/\s+/', '+', $slug);

    // Remove multiple hyphens
    $slug = preg_replace('/-+/', '+', $slug);

    // Trim leading/trailing hyphens
    $slug = trim($slug, '+');

    return $slug;

}



$word_limit = 50;

function limit_words($string, $word_limit) {
    // Split the string into an array of words using a space delimiter
    $words = explode(' ', $string);
    
    // Check if the total number of words exceeds the limit
    if (count($words) > $word_limit) {
        // Slice the array to keep only the desired number of words (e.g., 50)
        $limited_words_array = array_slice($words, 0, $word_limit);
        
        // Join the limited word array back into a string
        $limited_string = implode(' ', $limited_words_array);
        
        // Optional: append an ellipsis or other indicator if the text was truncated
        // $limited_string .= '...'; 
    } else {
        // If the string is 50 words or less, return the original string
        $limited_string = $string;
    }

    return $limited_string;
}




$word_limit_title = 15;

function limit_words_title ($string, $word_limit_title) {
    // Split the string into an array of words using a space delimiter
    $words = explode(' ', $string);
    
    // Check if the total number of words exceeds the limit
    if (count($words) > $word_limit_title) {
        // Slice the array to keep only the desired number of words (e.g., 50)
        $limited_words_array = array_slice($words, 0, $word_limit_title);
        
        // Join the limited word array back into a string
        $limited_string = implode(' ', $limited_words_array);
        
        // Optional: append an ellipsis or other indicator if the text was truncated
        // $limited_string .= '...'; 
    } else {
        // If the string is 50 words or less, return the original string
        $limited_string = $string;
    }

    return $limited_string;
}