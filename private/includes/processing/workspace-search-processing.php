<?php

require '../../initialize.php';
require '../../database.php';



$page=isset($_POST['page']) ? (int) ($_POST ['page']) : '';
$query= isset($_POST['query']) ? htmlspecialchars($_POST ['query']) : '';
$pageName = isset($_POST['pageName']) ? htmlspecialchars($_POST ['pageName']) : '';


$queryIn = isset($_POST['queryIn']) ? htmlspecialchars($_POST ['queryIn']) : '';

$recordType = isset($_POST['recordtype']) ? htmlspecialchars($_POST ['recordtype']) : '';
$subsType = isset($_POST['substype']) ? htmlspecialchars($_POST ['substype']) : '';
$regType = isset($_POST['regtype']) ? htmlspecialchars($_POST ['regtype']) : '';
$promoType = isset($_POST['promotype']) ? htmlspecialchars($_POST ['promotype']) : '';

$recordStatus = isset($_POST['recordStatus']) ? htmlspecialchars($_POST ['recordStatus']) : '';

$articleId = isset($_POST['articleId']) ? htmlspecialchars($_POST ['articleId']) : '';
$editorId = isset($_POST['editorId']) ? htmlspecialchars($_POST ['editorId']) : '';
$setVersion = isset($_POST['setVersion']) ? htmlspecialchars($_POST ['setVersion']) : '';

$fileId = isset($_POST['fileId']) ? htmlspecialchars($_POST ['fileId']) : '';

$toolId = isset($_POST['toolId']) ? htmlspecialchars($_POST ['toolId']) : '';

$researchId = isset($_POST['researchId']) ? htmlspecialchars($_POST ['researchId']) : '';


if ($pageName !='Workspace - Site Manager' && $pageName !='Workspace - Writer' && $pageName !='Workspace - Editor' && $pageName !='Workspace - Teacher' && $pageName !='Workspace - Developer' && $pageName !='School Workspace - Researches') {

   if ($queryIn) {
   header('Location:'.$website.'/search/?query='.urlencode($query).'&query-in='.urlencode($queryIn));
   } else {

      if ($pageName=='Home') {
      $queryIn = 'general-contents';
   }

      if ($pageName=='Teacher Files') {
      $queryIn = 'teacher-files';
   }

      

   if ($pageName=='Articles') {
      $queryIn = 'articles';
   }


     
      if ($pageName=='Tools') {
      $queryIn = 'tools';
   }



   if ($pageName=='Researches') {
      $queryIn = 'researches';
   }


   if ($pageName=='Login') {
      $queryIn = 'accounts';
   }

   if ($pageName=='Create Account') {
      $queryIn = 'accounts';
   }

   if ($pageName=='Get Password Link') {
      $queryIn = 'accounts';
   }

   if ($pageName=='Change Password') {
      $queryIn = 'accounts';
   }

   if ($pageName=='My Account') {
      $queryIn = 'general-contents';
   }

   if ($pageName=='Terms of Use') {
      $queryIn = 'articles';
   }

   if ($pageName=='Data Privacy') {
      $queryIn = 'articles';
   }

   if ($pageName=='About Us') {
      $queryIn = 'articles';
   }
      
      
      
      header('Location:'.$website.'/search/?query='.urlencode($query).'&query-in='.urlencode($queryIn).'&page='.$page);
   } 

}




if ($pageName=='Workspace - Teacher') { 
            if (!$fileId) {
            header('Location:'.$website.'/workspace/teacher.php?query='.urlencode($query)); 
            }

            if ($fileId) {
            header('Location:'.$website.'/workspace/teacher.php?edit=yes&file='.$fileId.'&query='.urlencode($query)); 
            }
   }


if ($pageName=='Workspace - Writer') { 

            if (!$articleId) {
            header('Location:'.$website.'/workspace/writer.php?query='.urlencode($query)); 
            
            }

            if ($articleId) {
               if (!$setVersion) {
                  header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId.'&query='.urlencode($query)); 
               }

               if ($setVersion) {
                  header('Location:'.$website.'/workspace/writer.php?edit=yes&article='.$articleId.'&version='.$setVersion.'&query='.urlencode($query)); 
               }
           
            }
   }


if ($pageName=='Workspace - Editor') { 

            if (!$articleId) {
            header('Location:'.$website.'/workspace/editor.php?query='.urlencode($query)); 

               if ($editorId) {
                  header('Location:'.$website.'/workspace/editor.php?my-edits-only=yes&editor-userid='.$editorId.'&query='.urlencode($query)); 
               }
            }

            if ($articleId) {
            header('Location:'.$website.'/workspace/editor.php?my-edits-only=yes&article='.$articleId.'&query='.urlencode($query)); 

               if ($editorId) {
                  if ($query) {
                     header('Location:'.$website.'/workspace/editor.php?my-edits-only=yes&editor-userid='.$editorId.'&article='.$articleId.'&query='.urlencode($query)); 
                  }

                  if (!$query) {
                     header('Location:'.$website.'/workspace/editor.php?my-edits-only=yes&editor-userid='.$editorId.'&article='.$articleId); 
                  }
                  
               }
            }
   }

if ($pageName=='Workspace - Developer') { 

            if (!$toolId) {
            header('Location:'.$website.'/workspace/developer.php?query='.urlencode($query)); 
            }

            if ($toolId) {
            header('Location:'.$website.'/workspace/developer.php?edit=yes&tool='.$toolId.'&query='.urlencode($query)); 
            }
   }


if ($pageName=='School Workspace - Researches') { 

            if (!$researchId) {
            header('Location:'.$website.'/workspace/researches.php?query='.urlencode($query)); 
            }

            if ($researchId) {
            header('Location:'.$website.'/workspace/researches.php?edit=yes&research='.$researchId.'&query='.urlencode($query)); 
            }
   }


if ($pageName =='Workspace - Site Manager') {
   if ($recordType == 'registrations') {
      if (!$regType) {

         if (!$recordStatus) { 
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=registrations&query='.urlencode($query));  
         }

         if ($recordStatus) { 
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=registrations&status='.$recordStatus.'&query'.urlencode($query));  
         }

      }

      if ($regType) {
         if (!$recordStatus) {
            header('Location:'.$website.'/workspace/site-manager.php?recordtype=registrations&regtype='.$regType.'&query='.urlencode($query));
         }

         if ($recordStatus) {
            header('Location:'.$website.'/workspace/site-manager.php?recordtype=registrations&regtype='.$regType.'&status='.$recordStatus.'&query='.urlencode($query));
         }
           
      }
       
   }

   if ($recordType == 'subscriptions') {
      if (!$subsType) {

         if (!$recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=subscriptions&query='.urlencode($query));  
         }

         if ($recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=subscriptions&status='.$recordStatus.'&query='.urlencode($query));  
         }

      }
   

      if ($subsType) {

         if (!$recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=subscriptions&substype='.$subsType.'&query='.urlencode($query));
         }

         if ($recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=subscriptions&substype='.$subsType.'&status='.$recordStatus.'&query='.urlencode($query));
         }

      }
       
   }


   if ($recordType == 'promotions') {
      if (!$promoType) {

         if (!$recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=promotions&query='.urlencode($query));  
         }

         if ($recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=promotions&status='.$recordStatus.'&query='.urlencode($query));  
         }

      }
   

      if ($promoType) {

         if (!$recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=promotions&promotype='.$promoType.'&query='.urlencode($query));
         }

         if ($recordStatus) {
         header('Location:'.$website.'/workspace/site-manager.php?recordtype=promotions&promotype='.$promoType.'&status='.$recordStatus.'&query='.urlencode($query));
         }

      }
       
   }


   if (!$recordType) {
       header('Location:'.$website.'/workspace/site-manager.php?query='.urlencode($query));
   }

   
   
}






