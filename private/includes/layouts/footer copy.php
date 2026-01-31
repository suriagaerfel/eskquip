




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

$('.loading-section-for-workspace').hide();
$('.loading-section-for-non-workspace').hide();

// IF THE URL CONTAINS A PARAMETER, SHOW THE WEBSITE MODAL. 
if (urlParams.has('confirm-delete') || urlParams.has('upload')  || urlParams.has('show') || urlParams.has('readmore') || urlParams.has('subscription') || urlParams.has('other-registration') || urlParams.has('workspace') || urlParams.has('file-purchase') || urlParams.has('add-promotion') || urlParams.has('update-promotion') || urlParams.has('show-image')) {
const modal = document.getElementById('website-modal-wrapper');
modal.style.display = 'block';  
}

// FUNCTION FOR REMOVING A PARAMETER 
function removeUrlParameter(key) {
  const url = new URL(window.location.href);
  url.searchParams.delete(key);
  window.history.pushState({}, document.title, url);
}

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
    

    }
  }

  checkConnectionStatus();
  $(window).on("online", checkConnectionStatus);
  $(window).on("offline", checkConnectionStatus);



 // CLOSE MODAL SHOWING FEATURED IMAGE FOR MOBILE/TABLET.
$('.close-image').click (function(){
  removeUrlParameter('show-image');
  $('#website-modal-wrapper').hide();
});



// SHOW AND HIDE ACTUAL WORKSPACE AND WORKSPACE SIDEBAR FOR MOBILE/TABLET.
$('.edit-icon').click (function() {
    $('.actual-workspace').css('visibility','visible');
    $('.list-icon ').show();
    $('.edit-icon').hide();
    $('.workspace-sidebar').css('visibility','hidden');
    $('.workspace-search-container-mobile-tablet').css('visibility','hidden');
    
  });



  $('.list-icon').click (function(){
    $('.workspace-sidebar').css('visibility','visible');
    $('.edit-icon ').show();
    $('.list-icon').hide();
    $('.actual-workspace').css('visibility','hidden');
    $('.workspace-search-container-mobile-tablet').css('visibility','visible');
  });



  if ($(window).width() < 1024) {
    if (urlParams.has('edit')) {
    $('.workspace-search-container-mobile-tablet').css('visibility','hidden'); 
    $('.actual-workspace').css('visibility','visible');
    $('.workspace-sidebar').css('visibility','hidden');
    $('.list-icon').show();
    $('.edit-icon ').hide();
    }


    if (urlParams.has('query')) {
    $('.workspace-search-container-mobile-tablet').css('visibility','visible'); 
    $('.actual-workspace').css('visibility','hidden');
    $('.workspace-sidebar').css('visibility','visible');
    $('.list-icon').hide();
    $('.edit-icon ').show();
    }

  }


  // FUNCTION FOR SHOWING AND HIDING BANK DETAILS OF THE TEACHER (to revise)
function showBankDetails () {
  var bankDetails = document.getElementById("bank-details");
  var bankDetailsButton = document.getElementById("update-bank-details-button");

  if (bankDetails.style.display === "none") {
    bankDetails.style.display = "block";
    bankDetailsButton.textContent = "Hide Bank Details";

  } else {
    bankDetails.style.display = "none"; 
    bankDetailsButton.textContent = "Show Bank Details";
  }
}

// FUNCTION FOR SHOWING AND HIDING REVIEW SCHEDULES OF THE TEACHER (to revise)
function showReviewPurchaseSchedules () {
  var reviewSchedules = document.getElementById("review-schedules");
  var reviewSchedulesButton = document.getElementById("review-schedules-button");
  if (reviewSchedules.style.display === "none") {
    reviewSchedules.style.display = "block";
    reviewSchedulesButton.textContent = "Hide Review Schedules";

  } else {
    reviewSchedules.style.display = "none"; 
    reviewSchedulesButton.textContent = "Show Review Schedules";
  }
}




 

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

//HIDE THE ELEMENTS WITH 'alert' CLASS NAME AFTER 2 SECONDS.
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


  
//HIDE THE ELEMENTS WITH 'alert' CLASS NAME AFTER 2 SECONDS.
  setTimeout(function() {
      $('.alert').hide(); 
  }, 2000); 

   

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

 
  
  }




  


};




//AUTO-SAVE ARTICLE LOCALLY ON WRITER WORKSPACE AFTER HALF A SECOND

  $(document).ready(function(){

  
  if (url.href.includes('writer.php')) {

    //shown details of the article
      var article_title = $("#article-title").val();
      var article_category = $("#article-category").val();
      var article_topic = $("#article-topic").val();
      var article_content = $("#summernote").val();
      
       //hidden details of the article
      var writer_id_hidden = $("#writer-id-hidden").val();
      var writer_fullname_hidden = $("#writer-fullname-hidden").val();
      var article_id_hidden = $("#article-id-hidden").val();
      var latest_version_hidden = $("#latest-version-hidden").val();
      var set_version_hidden = $("#set-version-hidden").val();
      var version_number_hidden = $("#version-number-hidden").val();

      //for edit mode ('article' parameter exists)
      if (urlParams.has('article')) {
      var article_title = $("#article-title").val();
      var article_category = $("#article-category").val();
      var article_topic = $("#article-topic").val();
      var article_content = $("#summernote").val();
        setInterval(function() {
                $.ajax({
                    url:window.location.href,
                    type: "POST",
                    data: {
                      // article_title_autosaved_edit: article_title, 
                      // article_category_autosaved_edit: article_category, 
                      // article_topic_autosaved_edit: article_topic,
                      article_content_autosaved_edit: article_content
                      
                    }
                });
            }, 500);
      }


      //for non-edit mode (no 'article' parameter)
      if (!urlParams.has('article')) {
        setInterval(function() {
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
            }, 500);

      }


    //SAVE CHANGES TO THE DATABASE USING KEYBOARD SHORTCUTS (crt + s)
    document.addEventListener('keydown', function(e) { 
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {

        //shown details of the article
      var article_title = $("#article-title").val();
      var article_category = $("#article-category").val();
      var article_topic = $("#article-topic").val();
      var article_content = $("#summernote").val();
      
       //hidden details of the article
      var writer_id_hidden = $("#writer-id-hidden").val();
      var writer_fullname_hidden = $("#writer-fullname-hidden").val();
      var article_id_hidden = $("#article-id-hidden").val();
      var latest_version_hidden = $("#latest-version-hidden").val();
      var set_version_hidden = $("#set-version-hidden").val();
      var version_number_hidden = $("#version-number-hidden").val();

        e.preventDefault();      
        fetch('../../private/includes/processing/article-processing.php', {
        method: 'POST',
        body: new URLSearchParams({
            'writerIdHidden': writer_id_hidden,
            'writerFullNameHidden': writer_fullname_hidden,
            'articleIdHidden': article_id_hidden,
            'latestVersion': latest_version_hidden,
            'setVersion': set_version_hidden,
            'versionNumber': version_number_hidden,
            
            'saveArticle': '1',
            'title' : article_title,
            'category':article_category,
            'topic':article_topic,
            'content':article_content
        })
        })
    }
  });

  
    }
 


    

 });

       
 

</script>




<?php ob_end_flush();?>