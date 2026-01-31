<?php

require '../../initialize.php';
require '../../database.php';


//Sanitized already

if (isset($_GET['approve'])) {  
   $editorId=  $_GET['editor-userid'];
    $articleToReview =  $_GET['approve'];
    header ('Location:update-article-info-processing.php?approve='.$articleToReview.'&editor-userid='.$editorId);


}




  
    

    

