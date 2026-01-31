




<?php if (str_contains($currentURL, '/workspace/')){ ?>

      <?php if ($pageName !=='Workspace - Site Manager' && $pageName !=='Workspace - Data Analyst' && $pageName !=='Workspace - Funder') {?>
      <img src="<?php echo $website.'/assets/images/list.svg'?>" class="icon list-icon">
      <img src="<?php echo $website.'/assets/images/edit.svg'?>" class="icon edit-icon">
      <?php } ?>

      
      <div class="workspace-search-container-mobile-tablet">
            <form method="post" action="../../private/includes/processing/search-processing.php" class="workspace-page-search-form page-search-form">

                <?php require (INCLUDESLAYOUT_PATH.'/search-conditions.php');?>

                <input type="search" name="query" id="search-input" value="<?php echo htmlspecialchars($query);?>" placeholder="<?php echo $placeholder?>">

              
                <button type="submit" class="non-header-search-button"><img src="<?php echo $website.'/assets/images/search.svg'?>" class="search-icon non-header-search-icon"></button>
            </form>
        </div>
        
  <?php } ?>















<script>

 

//CONSTANTS FOR CURRENT URL
const url = window.location;
const urlParams = new URLSearchParams(url.search);


// SHOW AND HIDE HEADER NAVIGATION FOR MOBILE/TABLET.
 function toggleMobileTabletNavigation () {
    
  var buttonforShowMobileTabletNavigation = document.getElementById("show-mobile-navigation");
  var mobileTabletNavigation = document.getElementById("page-navigation-container-mobile-tablet");
 var buttonforHideMobileTabletNavigation = document.getElementById("hide-mobile-navigation");

 if (mobileTabletNavigation.style.display==='none') {
  mobileTabletNavigation.style.display='block';
  buttonforHideMobileTabletNavigation.style.display='block';
  buttonforShowMobileTabletNavigation.style.display='none';
  // $('#live-article-title').css('margin-top','10px');
 } else {
   mobileTabletNavigation.style.display='none';
  buttonforHideMobileTabletNavigation.style.display='none';
  buttonforShowMobileTabletNavigation.style.display='block';

 }


}


 
//-------------------------------------------JQUERY SCRIPTS----------------------------------------------//

document.onreadystatechange = function () {


// //HIDE THE PAGE ON INCOMPLETE STATE
  if (document.readyState === "loading") {
    $('.loading-section').show();
   
   
   
  }

// //HIDE THE PAGE ON INCOMPLETE STATE
  if (document.readyState === "interactive") {
    $('.loading-section').show();
 
  
  }


//SHOW THE PAGE ON COMPLETE STATE
if (document.readyState === "complete") {

  //HIDE THE LOADING SECTION
$('.loading-section-for-workspace').hide();
$('.loading-section-for-non-workspace').hide();

//SHOW THE ENTIRE PAGE
$('.page').css('visibility','visible');
$('.workspace-page-search-form').css('visibility','visible');
$('.edit-icon').css('visibility','visible');

//HIDE AND SHOW CERTAIN PAGES AND ELEMENTS ON ONLINE AND OFFLINE STATUS
function checkConnectionStatus() {
   if (navigator.onLine) {
    $('.search-results-counter').show();
    $('.search-list').show();
      $('.workspace-page').show();
      $('.workspace-page-search-form').show();
  

      $('.loading-section').hide();
       $('.offline-note').hide();
       $('.internet-based').show();
       
    
    } else {
       $('.search-results-counter').hide();
      $('.search-list').hide();
      $('.workspace-page').hide();
      $('.list-icon').hide();
      $('.edit-icon').hide();
      $('.workspace-page-search-form').hide();
     

      $('.loading-section-for-workspace').show();
      $('.incomplete-loading').hide();
      $('.offline-note-page-for-workspace').show();
      $('.offline-note-header').show();

      $('#website-modal-wrapper').hide();
      $('.internet-based').hide();
      
    

    }
  }

  checkConnectionStatus();
  $(window).on("online", checkConnectionStatus);
  $(window).on("offline", checkConnectionStatus);


//SAVE THE CURRENT PAGE POSITION
window.addEventListener('DOMContentLoaded', () => {
    const savedPosition = sessionStorage.getItem(url.origin);
    if (savedPosition !== null) {
        window.scrollTo(0, parseInt(savedPosition, 10));
        // Optional: clear the position if you only want it to work for a single return
        // sessionStorage.removeItem('scrollPosition'); 
    }
});

// FUNCTION FOR REMOVING A PARAMETER 
function removeUrlParameter(key) {
  const url = new URL(window.location.href);
  url.searchParams.delete(key);
  window.history.pushState({}, document.title, url);
}

// IF THE URL CONTAINS A PARAMETER, SHOW THE WEBSITE MODAL. 
if (urlParams.has('confirm-delete') || urlParams.has('upload')  || urlParams.has('show') || urlParams.has('readmore') || urlParams.has('subscription') || urlParams.has('other-registration') || urlParams.has('workspace') || urlParams.has('file-purchase') || urlParams.has('add-promotion') || urlParams.has('update-promotion') || urlParams.has('show-image')) {
$('#main-website-modal').show();
$('#modal-subscription').show();
$('#modal-other-registration').show();
$('#modal-workspace-list').show();
$('#modal-upload-image').show();
$('#modal-promotion').show();
$('#modal-confirm-delete').show();
}








//SHOW THE CONTENT DESCRIPTION WHEN AN ELEMENT IS CLICKED
$('.content-list-description small').click (function(){
   var content_list_id = $(this).attr('id'); 
   var content_list_id_modal = '#' + content_list_id + '-modal';
   $(content_list_id_modal).show();
});



// CLOSE MODAL WITH NO NULL REDIRECTION
$('.close-without-null-redirection').click (function(){
  $('.website-modal-wrapper').hide();
});





// SHOW AND HIDE ACTUAL WORKSPACE AND WORKSPACE SIDEBAR FOR MOBILE/TABLET CLICKING ON EDIT AND LIST ICON.
$('.edit-icon').click (function() {
    $('.actual-workspace').css('visibility','visible');
    $('.list-icon ').show();
    $('.edit-icon').hide();
    $('.workspace-sidebar').css('visibility','hidden');
    $('.workspace-search-container-mobile-tablet').hide();
    
});

$('.list-icon').click (function(){
    $('.workspace-sidebar').css('visibility','visible');
    $('.edit-icon ').show();
    $('.list-icon').hide();
    $('.actual-workspace').css('visibility','hidden');
    $('.workspace-search-container-mobile-tablet').show();
});


//IF THE SCREEN SIZE IS SMALLER THAN A DESKTOP OR LAPTOP, HIDE/SHOW WORKSPACE SIDEBAR OR ACTUAL WORKSPACE DPENEDING ON THE PRESENCE OF THE PARAMETERS
if ($(window).width() < 1024) {
      if (!urlParams.has('query')) {
        if (urlParams.has('edit') || urlParams.has('my-edits-only')) {
        $('.workspace-search-container-mobile-tablet').hide(); 
        $('.actual-workspace').css('visibility','visible');
        $('.workspace-sidebar').css('visibility','hidden');
        $('.list-icon').show();
        $('.edit-icon ').hide();
      }
    }

    if (urlParams.has('query')) {
      if (!urlParams.has('edit') && urlParams.has('my-edits-only')) {
        $('.workspace-search-container-mobile-tablet').show(); 
        $('.actual-workspace').css('visibility','hidden');
        $('.workspace-sidebar').css('visibility','visible');
        $('.list-icon').hide();
        $('.edit-icon ').show();
      }
    }

  }

//SHOW BANK DETAILS
  $('#show-bank-details-button').click (function(){
    $('#bank-details').toggle();
    $(this).text('Hide Bank Details');
    $('#review-schedules').hide();
    $('#show-review-schedules-button').text('Show Review Schedules');

  });

//SHOW REVIEW SCHEDULES
  $('#show-review-schedules-button').click (function(){
  $('#review-schedules').toggle();
  $(this).text('Hide Review Schedules');

  $('#bank-details').hide();
  $('#show-bank-details-button').text('Show Bank Details');
  

});


// SHOW AND HIDE SIDEBAR FOR MOBILE/TABLET.
$('.hide-mobile-sidebar').click (function() {
  $('#promotional-sidebar').css("visibility", "hidden");
  $('.show-mobile-sidebar').show();
  $(this).hide();
});

$('.show-mobile-sidebar').click (function() {
  $('#promotional-sidebar').css("visibility", "visible");
  $('.hide-mobile-sidebar ').show();
  $(this).hide();
});


// SHOW AND HIDE CONTENT DETAILS FOR FILES AND RESEARCHES.
  $('.show-details').click (function() {
    $('.live-content-details-container').show();
     $('.hide-details').show();
     $(this).hide();
  });

  $('.hide-details').click (function() {
    $('.live-content-details-container').hide();
     $('.show-details').show();
      $(this).hide();
  });


// SHOW MODAL FOR CONTENT IMAGE
  $('#show-image-button').click (function() {
  $('#modal-show-image').show();
});


//HIDE THE ELEMENTS WITH 'alert' CLASS NAME AFTER 8 SECONDS.
    setTimeout(function() {
        $('.alert').hide(); 
    }, 8000); 


//SUMMERNOTE TEXT EDITOR
 $('#summernote').summernote();

$('#summernote').summernote({
}).on('summernote.enter', function(we, e) {
$(this).summernote('pasteHTML', '<br><br>');
e.preventDefault(); 
});

if (window.location.href.includes ("editor.php")) {
    $('#summernote').summernote('disable');
}

const summernote = document.getElementById('summenote');
summernote.p.style.fontSize = "1 rem";


 
  
}



};






$(document).ready(function(){


  //FOR AUTOSAVE
  
  //For writer workspace
  if (url.href.includes('writer.php')) {
 
      if (urlParams.has('article')) {
        setInterval(function() {
                var article_id_hidden = $("#article-id-hidden").val();
                var article_title = $("#article-title").val();
                var article_category = $("#article-category").val();
                var article_content = $("#summernote").val();
                var article_topic = $("#article-topic").val();

                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      article_id_autosaved_edit: article_id_hidden, 
                      article_title_autosaved_edit: article_title, 
                      article_category_autosaved_edit: article_category, 
                      article_content_autosaved_edit: article_content, 
                      article_topic_autosaved_edit: article_topic
                    }
                });
           

            }, 250);


      }



      if (!urlParams.has('article')) {
        setInterval(function() {
                var article_title = $("#article-title").val();
                var article_category = $("#article-category").val();
                var article_content = $("#summernote").val();
                var article_topic = $("#article-topic").val();
                
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      article_title_autosaved_nonedit: article_title, 
                      article_category_autosaved_nonedit: article_category, 
                      article_content_autosaved_nonedit: article_content, 
                      article_topic_autosaved_nonedit: article_topic
                    }
                });
                
            }, 250);

      }
  
    }



    //For developer workspace
    if (url.href.includes('developer.php')) {
 
      if (urlParams.has('tool')) {
        setInterval(function() {
                var tool_category = $("#tool-category").val();
                var tool_description = $("#tool-description").val();
             
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: { 
                      tool_category_autosaved_edit: tool_category, 
                      tool_description_autosaved_edit: tool_description
                    }
                });
            }, 250);
      }



      if (!urlParams.has('tool')) {
        setInterval(function() {
          var tool_title = $("#tool-title").val();
               var tool_category = $("#tool-category").val();
                var tool_description = $("#tool-description").val();
                
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      tool_title_autosaved_nonedit: tool_title, 
                     tool_category_autosaved_nonedit: tool_category, 
                      tool_description_autosaved_nonedit: tool_description
                    }
                });
            }, 250);

      }
  
    }




    //For teacher workspace
    if (url.href.includes('teacher.php')) {
 
      if (urlParams.has('file')) {
        setInterval(function() {
                var file_category = $("#file-category").val();
                var file_description = $("#file-description").val();
                var file_amount = $("#file-amount").val();
                var file_access_type = $("#file-access-type").val();
                var file_shared_with = $("#file-shared-with").val();
             
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: { 
                      file_category_autosaved_edit: file_category, 
                      file_description_autosaved_edit: file_description,
                      file_amount_autosaved_edit: file_amount,
                      file_access_type_autosaved_edit: file_access_type,
                      file_shared_with_autosaved_edit: file_shared_with
                    }
                });
            }, 250);
      }



      if (!urlParams.has('file')) {
        setInterval(function() {
          var file_title = $("#file-title").val();
              var file_category = $("#file-category").val();
                var file_description = $("#file-description").val();
                var file_amount = $("#file-amount").val();
                var file_access_type = $("#file-access-type").val();
                var file_shared_with = $("#file-shared-with").val();
                
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      file_title_autosaved_nonedit: file_title,
                     file_category_autosaved_nonedit: file_category, 
                      file_description_autosaved_nonedit: file_description,
                      file_amount_autosaved_nonedit: file_amount,
                      file_access_type_autosaved_nonedit: file_access_type,
                      file_shared_with_autosaved_nonedit: file_shared_with
                    }
                });
            }, 250);

      }
  
    }






    //For researches workspace
    if (url.href.includes('researches.php')) {
 
      if (urlParams.has('research')) {
        setInterval(function() {
                var research_category = $("#research-category").val();
                var research_abstract = $("#research-abstract").val();
               var research_proponents = $("#research-proponents").val();
               var research_date = $("#research-date").val();
             
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: { 
                      research_category_autosaved_edit: research_category, 
                     research_abstract_autosaved_edit: research_abstract, 
                     research_proponents_autosaved_edit: research_proponents,
                     research_date_autosaved_edit: research_date  
                    }
                });
            }, 250);
      }



      if (!urlParams.has('research')) {
        setInterval(function() {
              var research_title = $("#research-title").val();
              var research_category = $("#research-category").val();
              var research_abstract = $("#research-abstract").val();
               var research_proponents = $("#research-proponents").val();
               var research_date = $("#research-date").val();
                
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      research_title_autosaved_nonedit: research_title,
                      research_category_autosaved_nonedit: research_category, 
                     research_abstract_autosaved_nonedit: research_abstract, 
                     research_proponents_autosaved_nonedit: research_proponents,
                     research_date_autosaved_nonedit: research_date  
                    }
                });
            }, 250);

      }
  
    }


    $('#show-article-details-button').click (function() {
    $('#hide-article-details-button').show();
    $('.panel-heading').hide();
    $('#article-info').show();
    $('#article-content-container').css('margin-top','200px;')
    $(this).hide();
    });

    $('#hide-article-details-button').click (function() {
    $('#show-article-details-button').show();
    $('.panel-heading').show();
    $('#article-info').hide();
    $(this).hide();
    });
 

//AUTO REFRESH PAGES.
    let timeSpentSeconds = 0;
    let scrollTimeout;
    let isScrolling = false;
    
  
    function isPageVisible() {
      return document.visibilityState === 'visible';
    }

    
    window.addEventListener('scroll', () => {
      isScrolling = true;
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(() => {
        isScrolling = false;
      }, 10000);
    });

    function trackTime() {
      if (isPageVisible() && isScrolling) {
        timeSpentSeconds ++;
        navigator.sendBeacon(url.href, new URLSearchParams({
          time_spent: Math.ceil(timeSpentSeconds / 60)
        }));
      }
    }

    // Initialize scrolling state and timer
    isScrolling = true;
    scrollTimeout = setTimeout(() => { isScrolling = false; }, 10000);

    setInterval(trackTime, 1000);

    window.addEventListener('beforeunload', function() {
      if (timeSpentSeconds > 0) {
          navigator.sendBeacon(url.href, new URLSearchParams({
          time_spent: Math.ceil(timeSpentSeconds / 60)
        }));
      }
    });


    

 });








</script>




<?php ob_end_flush();?>