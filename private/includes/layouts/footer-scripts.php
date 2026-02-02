




<script>

//THIS IS THE FUNCTION TO SET VARIABLES FOR THE CURRENT URL.
const url = window.location;
const urlParams = new URLSearchParams(url.search);
var website_name = $('#website-name-hidden').val();

//THIS IS THE FUNCTION TO SHOW/HIDE HEADER NAVIGATION FOR MOBILE/TABLET.
//NOT CREATED WITH JQUERY SO THAT IT WILL STILL EXECUTE EVEN THE DOCUMENT IS NOT READY OR COMPLETELY LOADED.
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


 
//THIS FUNCTION CONTAINS FUNCTIONS THAN WILL BE EXECUTED WHEN THE DOCUMENT STATE CHANGES.
document.onreadystatechange = function () {

//ON LOADING STATE, SHOW THE LOADING SECTION WHILE THE PAGE/WORKSPACE PAGE IS STILL HIDDEN.
  if (document.readyState === "loading") {
    $('.loading-section').show();
    $('.page').hide();
    $('.modal').hide();

  }

//ON IN INTERACTIVE STATE, SHOW THE LOADING SECTION WHILE THE PAGE/WORKSPACE PAGE IS STILL HIDDEN.
  if (document.readyState === "interactive") {
    $('.loading-section').show();
    $('.modal').hide();
  }


//ON COMPLETE STATE, HIDE THE LOADING SECTION AND SHOW THE PAGE/WORKSPACE PAGE AND THE WORKSPACE PAGE SEARCH FORM AND EDIT ICON (MOBILE AND TABLET).
//ON COMPLETE STATE, SHOW/HIDE CERTAIN PAGES AND ELEMENTS ON ONLINE AND OFFLINE STATUS.

if (document.readyState === "complete") {

    //hide the loading sections
    $('.loading-section-for-workspace').hide();
    $('.loading-section-for-non-workspace').hide();

    //show the pages, search form and edit icon
    $('.page').css('visibility','visible');
    $('.workspace-page-search-form').css('visibility','visible');
    $('.edit-icon').css('visibility','visible');


    //check the connection status
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
          
          $('.modal').hide();
        

        }
      }

  
      //Call the function to check connection and the assigned sub function.
      checkConnectionStatus();
      $(window).on("online", checkConnectionStatus);
      $(window).on("offline", checkConnectionStatus);

}


};


//WHEN DOCUMENT IS READY, HIDE THE ELEMENTS WITH 'alert' CLASS AFTER 8 SECONDS.

function hideAlerts() {
  setTimeout(function() {
        $('.alert').hide(); 
    }, 8000); 
}

//WHEN DOCUMENT IS READY, HIDE THE ELEMENTS WITH 'alert' CLASS ON IMMEDIATELY.
function resetAlerts() {
        $('.alert').hide(); 
   
}



//THIS FUNCTION CONTAINS FUNCTIONS THAN WILL BE EXECUTED WHEN THE DOCUMENT IS READY.

$(document).ready(function(){
  //WHEN DOCUMENT IS READY, REMOVE AN EMPTY PARAMETER IN THE URL.
  function removeUrlParameter(key) {
    const url = new URL(window.location.href);
    url.searchParams.delete(key);
    window.history.pushState({}, document.title, url);
  }

//WHEN THE DOCUMENT IS READY, SHOW THE CREATE ACCOUNT INPUTS FOR PERSONAL WHEN A BUTTON IS CLICKED.
$('#create-account-personal-button').click (function(){
  // $(this).hide();
  resetAlerts();
  $(this).addClass('active');
  $('#create-account-school-button').show();
  $('#create-account-school-button').removeClass('active');
  $('.inputs-group-personal').show();
  $('.inputs-group-personal').css('display', 'flex');
  $('.inputs-group-school').hide();
  $('.inputs-group-general').show();
  $('#create-type').val('Personal');
})

//WHEN THE DOCUMENT IS READY, SHOW THE CREATE ACCOUNT INPUTS FOR SCHOOL WHEN A BUTTON IS CLICKED.
$('#create-account-school-button').click (function(){
  // $(this).hide();
  resetAlerts();
  $(this).addClass('active');
  $('#create-account-personal-button').show();
  $('#create-account-personal-button').removeClass('active');
  $('.inputs-group-school').show();
  $('.inputs-group-personal').hide();
  $('.inputs-group-general').show();
  $('#create-type').val('School');
})


$('#create-submit-button').click(function(){
  var processing_file = '../../private/includes/processing/create-account-processing.php';
  var create_type = $('#create-type').val();
  var create_school_name = $('#create-school-name').val();
  var create_school_basic_account = $('#create-school-basic-account').val();
  var create_personal_first_name = $('#create-personal-first-name').val();
  var create_personal_last_name = $('#create-personal-last-name').val();
  var create_personal_birthdate = $('#create-personal-birthdate').val();
  var create_personal_gender = $('#create-personal-gender').val();
  var create_email_address = $('#create-email-address').val();
  var create_username = $('#create-username').val();
  var create_password = $('#create-password').val();
  var create_password_retype = $('#create-password-retype').val();

  $.ajax({
    url: processing_file,
    type: 'POST',
    async: true,
    data: {
        create_type:create_type,
        create_school_name:create_school_name,
        create_school_basic_account:create_school_basic_account,
        create_personal_first_name:create_personal_first_name,
        create_personal_last_name:create_personal_last_name,
        create_personal_birthdate:create_personal_birthdate,
        create_personal_gender:create_personal_gender,
        create_email_address:create_email_address,
        create_username:create_username,
        create_password:create_password,
        create_password_retype:create_password_retype,
        create_submit: true

    },success:function(response){
      
      $('#create-account-message').show();
      $('#create-account-message').html(response);

      if (response ==='Account Created Successfully!') {  
      $('#create-account-message').addClass('alert-success'); 
      $('#create-account-message').removeClass('alert-danger');
      $('#create-school-name').val('');
      $('#create-school-basic-account').val('');
      $('#create-personal-first-name').val('');
      $('#create-personal-last-name').val('');
      $('#create-personal-birthdate').val('');
      $('#create-personal-gender').val('');
      $('#create-email-address').val('');
      $('#create-username').val('');
      $('#create-password').val('');
      $('#create-password-retype').val('');

      } 
      
      if (response !=='Account Created Successfully!') {
        $('#create-account-message').addClass('alert-danger'); 
        $('#create-account-message').removeClass('alert-success');
      }


       
      
    }
});


hideAlerts();

})




$('#login-submit-button').click(function(){
  var processing_file = '../../private/includes/processing/login-processing.php';
  var login_email_username = $('#login-email-username').val();
  var login_password = $('#login-password').val();

  $.ajax({
    url: processing_file,
    type: 'POST',
    async: true,
    data: {
        login_email_username:login_email_username,
        login_password:login_password,
        login_submit: true

    },success:function(response){
      
    console.log (response);

      if (response ['login-status']=='Successful') {
        url.reload();
      }

      if (response ['login-status'] =='Unsuccessful') {
         $('#login-message').show();
        $('#login-message').html(response['error']);
        $('#login-message').addClass('alert-danger');
      }

    }
});

hideAlerts();

})




  
//WHEN THE DOCUMENT IS READY, SHOW THE UPLOAD IMAGE MODAL WHEN A CAMERA ICON IS CLICKED.
    //for cover photo
  $('#cover-photo-camera-icon').click (function(){
    resetAlerts();
    $('#modal-upload-image').show();
    $('#upload-type').val('Cover Photo');
    $('#upload-button').text('Update Cover Photo');
    $('#upload-action-file').val('../../private/includes/processing/update-details-processing.php');
  });

  //for profile picture
  $('#profile-camera-icon').click (function(){
    resetAlerts();
    $('#modal-upload-image').show();
    $('#upload-type').val('Profile Picture');
    $('#upload-button').text('Update Profile Picture');
    $('#upload-action-file').val('../../private/includes/processing/update-details-processing.php');
  });


  //for featured image
  $('.update-featured-image').click (function(){
    showFeaturedImageModal();
  });

  $('.change-featured-image').click (function(){
     $('#modal-show-image').hide();
    showFeaturedImageModal();
  });

  function showFeaturedImageModal(){
  resetAlerts();
  $('#modal-upload-image').show();
  $('#upload-type').val('Featured Image');
  $('#upload-button').text('Update Featured Image');
  $('#upload-action-file').val('../../private/includes/processing/update-article-info-processing.php');
  }


  //for file thumbnail
  $('.update-file-thumbnail').click (function(){
    showFileThumbnailModal()
  });

   $('.change-file-thumbnail').click (function(){
    $('#modal-show-image').hide();
    showFileThumbnailModal();
  });

  function showFileThumbnailModal() {
    resetAlerts();
    $('#modal-upload-image').show();
  $('#upload-type').val('File Thumbnail');
  $('#upload-button').text('Update File Thumbnail');
  $('#upload-action-file').val('../../private/includes/processing/update-teacher-file-info-processing.php');
  }



  //for research thumbnail
  $('.update-research-thumbnail').click (function(){
    showResearchThumbnailModal()
  });

   $('.change-research-thumbnail').click (function(){
    $('#modal-show-image').hide();
    showResearchThumbnailModal();
  });

  function showResearchThumbnailModal() {
  resetAlerts();
  $('#modal-upload-image').show();
  $('#upload-type').val('Research Thumbnail');
  $('#upload-button').text('Update Research Thumbnail');
  $('#upload-action-file').val('../../private/includes/processing/update-school-research-info-processing.php');

  }


  //for tool icon
  $('.update-tool-icon').click (function(){
    showToolIconModal()
  });

   $('.change-tool-icon').click (function(){
    $('#modal-show-image').hide();
    showToolIconModal();
  });

  function showToolIconModal() {
    reseatAlerts();
    $('#modal-upload-image').show();
  $('#upload-type').val('Tool Icon');
  $('#upload-button').text('Update Tool Icon');
  $('#upload-action-file').val('../../private/includes/processing/update-developer-tool-info-processing.php');
  }







  //WHEN THE DOCUMENT IS READY, SEND THE IMAGE TO WHEN THE SUBMIT BUTTON IS CLICKED.
$('#upload-button').click (function(){
      uploadSubmit ();
  });


  //WHEN THE DOCUMENT IS READY, PREPARE THE FUNCTION TO SUBMIT UPLOAD.
  function uploadSubmit () {

  var upload_type = $('#upload-type').val();
  const upload_image= document.getElementById('upload-image').files[0];
  var profile_upload_registrant_hidden_id = $('#profile-upload-registrant-hidden-id').val();
  var profile_upload_registrant_hidden_accountName = $('#profile-upload-registrant-hidden-accountName').val();

  var content_hidden_type = $('#content-hidden-type').val();
  var content_hidden_id = $('#content-hidden-id').val();

  var upload_action_file = $('#upload-action-file').val();

  const formData = new FormData();
  formData.append('upload_type', upload_type);
  formData.append('upload_image', upload_image);

  formData.append('content_hidden_type', content_hidden_type );
  formData.append('content_hidden_id', content_hidden_id);

  formData.append('profile_upload_registrant_hidden_id', profile_upload_registrant_hidden_id);
  formData.append('profile_upload_registrant_hidden_accountName', profile_upload_registrant_hidden_accountName);

  formData.append('upload_submit', 'true');
      

      fetch(upload_action_file, {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        if (result!='Upload Successful') {
          $('#modal-upload-image-message').show();
          $('#modal-upload-image-message').html(result);
          hideAlerts();
         }

          if (result=='Upload Successful') {
            $('#modal-upload-image').hide();
            url.reload();
          }
          
      })
      .catch(error => console.error('Error:', error));


}


//WHEN THE DOCUMENT IS READY, SHOW THE EDITABLE PROFILE DETAILS WHEN A BUTTON IS CLICKED.

$('#edit-profile-details-button').click (function(){
  
  $('.profile-details-edit').show();
  $('.profile-details-view').hide();
  $(this).hide();
  
  });



$('#update-profile-details-submit-button').click(function(){
var profile_hidden_userid = $('#profile-hidden-userid').val();
var profile_hidden_account_type = $('#profile-hidden-account-type').val();
var profile_description = $('#profile-description').val();
var profile_first_name = $('#profile-first-name').val();
var profile_middle_name = $('#profile-middle-name').val();
var profile_last_name = $('#profile-last-name').val();
var profile_account_name = $('#profile-account-name').val();
var profile_school_type = $('#profile-school-type').val();
var profile_username = $('#profile-username').val();
var profile_email_address = $('#profile-email-address').val();
var profile_mobile_number = $('#profile-mobile-number').val();
var profile_birthdate = $('#profile-birthdate').val();
var profile_gender = $('#profile-gender').val();
var profile_civil_status = $('#profile-civil-status').val();
var profile_educational_attainment = $('#profile-educational-attainment').val();
var profile_school = $('#profile-school').val();
var profile_occupation = $('#profile-occupation').val();
var profile_country = $('#profile-country').val();
var profile_region = $('#profile-region').val();
var profile_province_state = $('#profile-province-state').val();
var profile_city_municipality= $('#profile-city-municipality').val();
var profile_barangay= $('#profile-barangay').val();
var profile_street_subd_village= $('#profile-street-subd-village').val();
var processing_file = '../../private/includes/processing/update-details-processing.php';

 $.ajax({
        url:processing_file,
        type: "POST",
        data: {
        profile_hidden_userid:profile_hidden_userid,
        profile_hidden_account_type: profile_hidden_account_type,
        profile_description:profile_description,
        profile_first_name:profile_first_name,
        profile_middle_name:profile_middle_name,
        profile_last_name:profile_last_name,
        profile_account_name:profile_account_name,
        profile_school_type:profile_school_type,
        profile_username:profile_username,
        profile_email_address:profile_email_address,
        profile_mobile_number:profile_mobile_number,
        profile_birthdate:profile_birthdate,
        profile_gender: profile_gender,
        profile_civil_status:profile_civil_status,
        profile_educational_attainment:profile_educational_attainment,
        profile_school:profile_school,
        profile_occupation:profile_occupation,
        profile_country:profile_country,
        profile_region:profile_region,
        profile_province_state:profile_province_state,
        profile_city_municipality:profile_city_municipality,
        profile_barangay:profile_barangay,
        profile_street_subd_village:profile_street_subd_village,
        update_profile_details_submit:true
        },
        success:function(response){
          if (response=='Updated successfully!') {
           url.reload();
          } else {
            $('.profile-details-edit').show();
            $('.profile-details-view').hide();
            $('#profile-update-message').show();
            $('#profile-update-message').html(response);
            hideAlerts();
          }
        }
    });


});

//WHEN THE DOCUMENT IS READY, HIDE THE EDITABLE PROFILE DETAILS WHEN A BUTTON IS CLICKED.
$('#update-profile-details-cancel-button').click (function(){
  $('.profile-details-edit').hide();
  $('.profile-details-view').show();
  $('#edit-profile-details-button').show();
  url.reload();
  });


  //WHEN THE DOCUMENT IS READY, SHOW THE SUBSCRIPTION MODAL WHEN A BUTTON IS CLICKED.
  $('#show-my-subscription-button').click (function(){
  $('#modal-subscription').show();
  });

  //WHEN THE DOCUMENT IS READY, SUBMIT THE DETAILS ENTERED IN THE SUBSCRIPTION MODAL WHEN A BUTTON IS CLICKED.
  $('#submit-subscription-button').click (function(){ 
    var in_tool_subscription_list = $('#in-tool-subscription-list').val();
    var in_file_subscription_list = $('#in-file-subscription-list').val();
    var in_seller_subscription_list = $('#in-seller-subscription-list').val();
    var in_shelf_subscription_list = $('#in-shelf-subscription-list').val();
    var in_teacher_registration = $('#in-teacher-registration').val();
    var subscription_registrant_hidden_id = $('#subscription-registrant-hidden-id').val();

    var subscription_type = $('#subscription-type').val();
    var subscription_duration= $('#subscription-duration').val();
    var subscription_total= $('#subscription-total').val();
    var subscription_payment_option= $('#subscription-payment-option').val();
    var subscription_reference_number= $('#subscription-reference-number').val();
    
    const subscription_proof_of_payment= document.getElementById('subscription-proof-of-payment').files[0];
    

    const formData = new FormData();
      formData.append('in_tool_subscription_list', in_tool_subscription_list);
      formData.append('in_file_subscription_list', in_file_subscription_list);
      formData.append('in_seller_subscription_list', in_seller_subscription_list);
      formData.append('in_shelf_subscription_list', in_shelf_subscription_list);
      formData.append('in_teacher_registration', in_teacher_registration);
      formData.append('subscription_registrant_hidden_id', subscription_registrant_hidden_id);
      formData.append('subscription_type', subscription_type);
      formData.append('subscription_duration', subscription_duration);
      formData.append('subscription_total', subscription_total);
      formData.append('subscription_payment_option', subscription_payment_option);
      formData.append('subscription_reference_number', subscription_reference_number);
      formData.append('subscription_proof_of_payment', subscription_proof_of_payment);
      formData.append('subscription_submit', 'true');
      

      fetch('../../private/includes/processing/subscription-processing.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        if (result!=='Subscription Sent') {
           $('#subscription-message').show();
            $('#subscription-message').html(result);
            hideAlerts();
         }

          if (result=='Subscription Sent') {
            $('#modal-subscription').hide();
            $('#subscription-message').hide();
            url.reload();
          }
          
      })
      .catch(error => console.error('Error:', error));


  });


//WHEN THE DOCUMENT IS READY, TOGGLE THE SUBSCRIPTION NOTES WHEN A BUTTON IS CLICKED.

$('#show-subscription-heads-button').click (function () {
  var originalText = $(this).val();
  $('.modal-subscription-head').toggle();
});
    
       
//WHEN THE DOCUMENT IS READY, SHOW THE SUBSCRIPTION SUMMARY WHEN THERE IS A CHANGE IN DURATION.
$("#subscription-duration").change(function(){

  var subscriptionDuration = $("#subscription-duration").val().toString();
  var subscriptionType= $("#subscription-type").val();

  if (subscriptionType == 'Tools') {
    subscriptionAmount = 69;
    }

    if (subscriptionType == 'Seller') {
    subscriptionAmount = 100;
    }

    var subscriptionTotal = subscriptionDuration*subscriptionAmount;
    $("#subscription-summary").show();
    $("#subscription-summary").text('Total: '+ '₱'+subscriptionTotal+' (₱'+subscriptionAmount+' x '+subscriptionDuration+' month)');

    $('#subscription-total').val(subscriptionTotal);

});


$("#subscription-type").change(function(){

  $("#subscription-duration").val('');
  $("#subscription-summary").hide();

});










//WHEN THE DOCUMENT IS READY, SHOW THE OTHER REGISTRATION MODAL WHEN A BUTTON IS CLICKED.
  $('#show-other-registration-button').click (function(){
    $('#modal-other-registration').show();
   
  });



  function withoutRecordedOtherRegistration () {
  $('#modal-other-registration-download-section').show();
  $('#download-agreement-form-link').text('Download Agreement Form ['+regtype+']');

  if (regtype!='Researches') {
    var downloadLink = '/public/downloadables/agreement-'+regtype.toLowerCase()+'.docx';
  } else {
    var downloadLink = '/public/downloadables/agreement-school-'+regtype.toLowerCase()+'.docx';
  }
  

  $('#download-agreement-form-link').attr('href',downloadLink);
    

    if (regtype == 'Teacher') {
      $('#license-certification').show();
      $('#sample').hide();
      $('#license-certification-sample-label').text('License or Certification');
    } else {
      $('#license-certification').hide();

      if (regtype !='Researches') {
      $('#sample').show();
      $('#sample').attr("placeholder", "Provide a url to your sample (s)...");
      $('#license-certification-sample-label').text('Sample (s)');
      }

    }



    $('#license-certification-sample-label').show();
    $('#agreement').show();
    $('#agreement-label').show();
    $('#modal-other-registration-submitted-documents-container').hide();
    $('#other-registration-buttons').show();

  }

  function withRecordedOtherRegistration () {
      $('#modal-other-registration-download-section').hide();
      $('.license-certification-sample').hide();

      if (regtype == 'Teacher') {
        $('#submitted-license-certification').show();
        $('#submitted-sample').hide();
      } else {
        $('#submitted-license-certification').hide();
        $('#submitted-sample').show();
      }

      // $('#modal-other-registration-status').show();
      // $('#modal-other-registration-status').html(response);

      $('#license-certification-sample-label').hide();
      $('#agreement').hide();
      $('#agreement-label').hide();
      $('#modal-other-registration-submitted-documents-container').show();
      $('#other-registration-buttons').hide(); 
  }

  





  $('#regtype-teacher-button').click (function(){
    regtype = 'Teacher';
    $(this).addClass('active');
    $('#regtype-writer-button').removeClass('active');
    $('#regtype-editor-button').removeClass('active');
    $('#regtype-developer-button').removeClass('active');
    checkRegistration ();
     $('#modal-other-registration-message').hide();

  });

  $('#regtype-writer-button').click (function(){
    regtype = 'Writer';
    $('#regtype-teacher-button').removeClass('active');
    $(this).addClass('active');
    $('#regtype-editor-button').removeClass('active');
    $('#regtype-developer-button').removeClass('active');
    checkRegistration ();
    $('#modal-other-registration-message').hide();

    
  });

  $('#regtype-editor-button').click (function(){
    regtype = 'Editor';
    $('#regtype-teacher-button').removeClass('active');
    $('#regtype-writer-button').removeClass('active');
    $(this).addClass('active');
    $('#regtype-developer-button').removeClass('active');
    checkRegistration ();
    $('#modal-other-registration-message').hide();

  });

   $('#regtype-developer-button').click (function(){
    regtype = 'Developer';
    $('#regtype-teacher-button').removeClass('active');
    $('#regtype-writer-button').removeClass('active');
    $('#regtype-editor-button').removeClass('active');
    $(this).addClass('active');
    checkRegistration ();
    $('#modal-other-registration-message').hide();

  });

  $('#regtype-researches-button').click (function(){
    regtype = 'Researches';
    $(this).addClass('active');
    checkRegistration ();
     $('#modal-other-registration-message').hide();

  });


  function checkRegistration () {
     $.ajax({
        url:'../../private/includes/processing/check-other-registration-processing.php',
        type: "POST",
        data: {
          check_registration: true, 
          regtype:regtype
        },success:function (response) {
          $('#modal-other-registration').show();
          $('#modal-other-registration-navigation').show();
          $('#modal-other-registration-inputs-container').show();
          $('#other-registration-hidden-regtype').val(regtype);
           if (response == 'No recorded registration') {
           withoutRecordedOtherRegistration ();
           $('#modal-other-registration-status').hide();    
          } else {
            withRecordedOtherRegistration ();
            $('#modal-other-registration-status').show();
            $('#modal-other-registration-status').html('Status: '+response);
              $.ajax({
              url:'../../private/includes/processing/get-submissions-processing.php',
              type: "POST",
              data: {
                get_submissions: true, 
                regtype:regtype
              },success:function (response2) {
                console.log(response2);
              }
          });


          }
        }
    });
  }


  //WHEN THE DOCUMENT IS READY, REGISTER WHEN THE BUTTON IS CLICKED.
  $('#register-submit-button').click(function(){
   
    var other_registration_hidden_regtype = $('#other-registration-hidden-regtype').val();
    var other_registration_registrant_hidden_id = $('#other-registration-registrant-hidden-id').val();
    var other_registration_registrant_hidden_firstName = $('#other-registration-registrant-hidden-firstName').val();
    var other_registration_registrant_hidden_lastName = $('#other-registration-registrant-hidden-lastName').val();
    var other_registration_registrant_hidden_accountName = $('#other-registration-registrant-hidden-accountName').val();
    var other_registration_sample = $('#sample').val();
    const other_registration_license_certification= document.getElementById('license-certification').files[0];
    const other_registration_agreement = document.getElementById('agreement').files[0];

    
    

    
    const formData = new FormData();

    formData.append('other_registration_hidden_regtype', other_registration_hidden_regtype);
    formData.append('other_registration_registrant_hidden_id', other_registration_registrant_hidden_id);
    formData.append('other_registration_registrant_hidden_accountName', other_registration_registrant_hidden_accountName);
    if (regtype!='Researches') {
    formData.append('other_registration_license_certification', other_registration_license_certification);
    formData.append('other_registration_sample', other_registration_sample);
    }
    formData.append('other_registration_agreement', other_registration_agreement);
    formData.append('other_registration_submit', 'true');
     
    


    
      
   
      fetch('../../private/includes/processing/other-registration-processing.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        if (result!='Registration Sent') { 
          console.log(result);
          $('#modal-other-registration-message').show();
          $('#modal-other-registration-message').html(result);
          hideAlerts();
         }

        if (result=='Registration Sent') {
          url.reload();
        }
          
      })
      .catch(error => console.error('Error:', error));

  })




  //WHEN THE DOCUMENT IS READY, SHOW THE WORKSPACE LIST MODAL WHEN A BUTTON IS CLICKED.
  $('#show-workspace-button').click (function(){
   $('#modal-workspace-list').show();
  });

  
  // WHEN THE DOCUMENT IS READY, CLOSE MODAL WHENWITH NO NULL REDIRECTION WHEN THE BUTTON IS CLICKED.
$('.close-without-null-redirection').click (function(){
  $('.website-modal-wrapper').hide();
});


  // WHEN THE DOCUMENT IS READY, SHOW/HIDE CONTENT DETAILS FOR FILES AND RESEARCHES WHEN A BUTTON IS CLICKED.
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




  












  //WHEN THE DOCUMENT IS READY, SHOW THE CONTENT DESCRIPTION WHEN AN ELEMENT IS CLICKED.
  $('.content-list-description small').click (function(){
    var content_list_id = $(this).attr('id'); 
    var content_list_id_modal = '#' + content_list_id + '-modal';
    $(content_list_id_modal).show();
  });


  //WHEN THE DOCUMENT IS READY, SHOW/HIDE SIDEBAR FOR MOBILE/TABLET WHEN A BUTTON IS CLICKED.
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
  
 //WHEN DOCUMENT IS READY, SAVE THE CURRENT PAGE POSITION.
  window.addEventListener('DOMContentLoaded', () => {
    const savedPosition = sessionStorage.getItem(url.origin);
    if (savedPosition !== null) {
        window.scrollTo(0, parseInt(savedPosition, 10));
    }
  });

//WHEN THE DOCUMENT IS READY, UPDATE THE CONTENT STATUS WHEN THE BUTTON IS CLICKED. 
$('.list-buttons-container button').click (function(){
    var processing_file = '';
    var content_list_id = $(this).attr('id');
    const number = content_list_id.match(/\d+/)[0];

  if (content_list_id.includes('article')) {
    if (content_list_id.includes('main')) {
    processing_file = '../../private/includes/processing/ajax-update-article-info-processing.php';
    } else {
      processing_file = '../private/includes/processing/ajax-update-article-info-processing.php';
    }
  }

  if (content_list_id.includes('tool')) {
    if (content_list_id.includes('main')) {
    processing_file = '../../private/includes/processing/ajax-update-developer-tool-info-processing.php';
    } else {
      processing_file = '../private/includes/processing/ajax-update-developer-tool-info-processing.php';
    }
  }

  if (content_list_id.includes('teacher-file')) {

    if (content_list_id.includes('main')) {
      processing_file = '../../private/includes/processing/ajax-update-teacher-file-info-processing.php';
    } else {
       processing_file = '../private/includes/processing/ajax-update-teacher-file-info-processing.php';
    }
    
  }

  if (content_list_id.includes('research')) {
    if (content_list_id.includes('main')) {
    processing_file = '../../private/includes/processing/ajax-update-school-research-info-processing.php';
    } else{
      processing_file = '../private/includes/processing/ajax-update-school-research-info-processing.php';
    }
  }

$.ajax({
    url: processing_file,
    type: 'POST',
     async: true,
    data: {
        unpublish: number
    }
});

url.reload();


});



    

//WHEN DOCUMENT IS READY, SHOW MODAL FOR CONTENT IMAGE WHEN A BUTON IS CLICKED.
  $('#show-image-button').click (function() {
  $('#modal-show-image').show();
});



//WHEN THE DOCUMENT IS READY, SHOW BANK DETAILS WHEN A BUTTON IS CLICKED.
  $('#show-bank-details-button').click (function(){
    $('#bank-details').toggle();
    $(this).text('Hide Bank Details');
    $('#review-schedules').hide();
    $('#show-review-schedules-button').text('Show Review Schedules');

  });

//WHEN THE DOCUMENT IS READY, SHOW REVIEW SCHEDULES WHEN A BUTTON IS CLICKED.
  $('#show-review-schedules-button').click (function(){
  $('#review-schedules').toggle();
  $(this).text('Hide Review Schedules');

  $('#bank-details').hide();
  $('#show-bank-details-button').text('Show Bank Details');
  
});

  //WHEN THE DOCUMENT IS READY, LOAD THE SUMMERNOTE TEXT EDITOR.
      $('#summernote').summernote();

      $('#summernote').summernote({
      }).on('summernote.enter', function(we, e) {
      $(this).summernote('pasteHTML', '<br><br>');
      e.preventDefault(); 
      });

      if (window.location.href.includes ("editor.php")) {
          $('#summernote').summernote('disable');
      }

// WHEN THE DOCUMENT IS READY, SHOW/HIDE ACTUAL WORKSPACE AND WORKSPACE SIDEBAR FOR MOBILE/TABLET BY CLICKING ON EDIT OR LIST ICON
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



//WHEN THE DOCUMENT IS READY AND IF THE SCREEN SIZE IS SMALLER THAN A DESKTOP OR LAPTOP, HIDE/SHOW WORKSPACE SIDEBAR OR ACTUAL WORKSPACE DPENEDING ON THE PRESENCE OF THE PARAMETERS
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
  


 //WHEN THE DOCUMENT IS READY, AUTOSAVE THE ARTICLE DETAILS DURING INPUT.
  $(".note-editable,#article-title,#article-category,#article-topic").on('input',function(){
   
    var article_title = $("#article-title").val();
    var article_category = $("#article-category").val();
    var article_content = $('#summernote').val();
    var article_topic = $("#article-topic").val();
    var article_id_hidden = $("#article-id-hidden").val();
    
     if (urlParams.has('article')) {
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
  }


  if (!urlParams.has('article')) {
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
                    
               

    }


  });

//WHEN THE DOCUMENT IS READY, OPEN/CLOSE THE ARTICLE INFO/TOOLBAR WHEN A BUTTON IS CLICKED.
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
 



//WHEN THE DOCUMENT IS READY, AUTOSAVE THE TOOL DETAILS DURING INPUT.
  $("#tool-title,#tool-category,#tool-description").on('input',function(){
   var tool_title = $("#tool-title").val();
    var tool_category = $("#tool-category").val();
    var tool_description = $("#tool-description").val();
    
     if (urlParams.has('tool')) {
    $.ajax({
        url:window.location.href,
        type: "POST",
        data: { 
          tool_category_autosaved_edit: tool_category, 
          tool_description_autosaved_edit: tool_description
        }
    });
  }


  if (!urlParams.has('tool')) {
  
      $.ajax({
          url:window.location.href,
          type: "POST",
          data: {
            tool_title_autosaved_nonedit: tool_title, 
          tool_category_autosaved_nonedit: tool_category, 
            tool_description_autosaved_nonedit: tool_description
          }
      });
                    
               

    }


  });

 

//WHEN THE DOCUMENT IS READY, AUTOSAVE THE FILE DETAILS DURING INPUT.
  $("#file-title,#file-category,#file-description,#file-amount,#file-access-type,#file-shared-with").on('input',function(){
   var file_title = $("#file-title").val();
    var file_category = $("#file-category").val();
    var file_description = $("#file-description").val();
    var file_amount = $("#file-amount").val();
    var file_access_type = $("#file-access-type").val();
    var file_shared_with = $("#file-shared-with").val();
    
     if (urlParams.has('file')) {
       $.ajax({
          url:window.location.href,
          type: "POST",
          data: { 
            file_category_autosaved_edit: file_category, 
            file_description_autosaved_edit: file_description,
            file_amount_autosaved_edit: file_amount,
            file_access_type_autosaved_edit: file_access_type,
            file_shared_with_autosaved_edit: file_shared_with
          }, success: function(){
            
          }
      });
    
    }


  if (!urlParams.has('file')) {
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

    }

   

    


  });




//WHEN THE DOCUMENT IS READY,UPDATE THE FILE DETAILS WHEN AN ACTION BUTTON IS CLICKED.
  $('#file-publish-button').click(function(){  
    var status = 'Published';
    var for_sale = 'Not for Sale';
    updateFileInfo (status,for_sale);
     
  });

  $('#file-unpublish-button').click(function(){  
    var status = 'Unpublished';
    var for_sale = 'Not for Sale';
    updateFileInfo (status,for_sale);
  });

   $('#file-sell-button').click(function(){  
    var status = 'Published';
    var for_sale = 'For Sale';
    updateFileInfo (status,for_sale);
  });

  $('#file-unsell-button').click(function(){  
    var status = 'Published';
    var for_sale = 'Not for Sale';
    updateFileInfo (status,for_sale);
  });


  
    function updateFileInfo(status,for_sale){
    var content_hidden_id = $('#content-hidden-id').val();
    var processing_file = '../../private/includes/processing/update-teacher-file-info-processing.php';
    $.ajax({
            url:processing_file,
            type: "POST",
            data: { 
            status : status,
            content_hidden_id:content_hidden_id,
            for_sale:for_sale,
            update_submit:true
            },success: function (response){
              url.reload();
            }
        });
  }




//WHEN THE DOCUMENT IS READY, AUTOSAVE THE RESEARCH DETAILS DURING INPUT.
  $("#research-title,#research-category,#research-abstract,#research-proponents,#research-date").on('input',function(){
   var research_title = $("#research-title").val();
  var research_category = $("#research-category").val();
  var research_abstract = $("#research-abstract").val();
  var research_proponents = $("#research-proponents").val();
  var research_date = $("#research-date").val();
     if (urlParams.has('research')) {
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
    
    }


  if (!urlParams.has('research')) {
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

    }


  });


//WHEN THE DOCUMENT IS READY, SHOW THE CONFIRM DELETE MODAL WHEN A BUTTON IS CLICKED.
//for main content
$('#confirm-delete-button').click(function(){
  $('#modal-confirm-delete').show();
});
//for sub content
$('#tool-file-actions .link-tag-button').click(function(){
  var tool_file_id = $(this).attr('id');
  const number = tool_file_id.match(/\d+/)[0];
  $('#delete-sub-content-id').val(number);
  $('#modal-confirm-delete').show();
});

//WHEN THE DOCUMENT IS READY, DELETE THE CONTENT OR SUB CONTENT WHEN A CONFIRMATION BUTTON IN THE CONFIRM DELETE MODAL IS CLICKED.

$('#delete-confirmed-button').click(function(){
  var delete_content_type = $('#delete-content-type').val();
  var delete_content_id = $('#delete-content-id').val();
  var delete_sub_content_id = $('#delete-sub-content-id').val();
  var delete_content_processing_file = $('#delete-content-processing-file').val();

  //for main content
  if(!delete_sub_content_id) {
      $.ajax({
          url:delete_content_processing_file,
          type: "POST",
          data: {
            delete_content_type: delete_content_type,
            delete_content_id: delete_content_id,
            delete_content_submit: true
          },success:function(response){
            console.log(response);
            url.reload();
          }
      });
  }

  //for sub content
   if(delete_sub_content_id) {
      $.ajax({
          url:delete_content_processing_file,
          type: "POST",
          data: {
            delete_content_type: delete_content_type,
            delete_content_id: delete_content_id,
            delete_sub_content_id: delete_sub_content_id,
            delete_sub_content_submit: true
          },success:function(response){
            console.log(response);
            url.reload();
          }
      });
  }
   


});






//WHEN THE DOCUMENT IS READY, UPDATE THE CONTENT STATUS WHEN THE BUTTON IS CLICKED. 
$('.actions a').click (function(){

    var processing_file = '';
    var action_id = $(this).attr('id');
    var number = '';
    

    if (action_id.includes('reg')) {
      processing_file = '../../private/includes/processing/update-account-status-processing.php';
      var main = '';
      var to_do = '';
      var regtype = '';

      number = action_id.match(/\d+/)[0];


      if (action_id.includes('main')) {
        main = 'yes';
      }

      if (action_id.includes('revoke')) {
        to_do = 'revoke';
      }

      if (action_id.includes('keep')) {
        to_do = 'keep';
      }

      if (action_id.includes('approve')) {
        to_do = 'approve';
      }

      if (action_id.includes('reject')) {
        to_do = 'reject';
      }


      if (action_id.includes('teacher')) {
        regtype = 'teacher';
      }

      if (action_id.includes('writer')) {
        regtype = 'writer';
      }

      if (action_id.includes('editor')) {
        regtype = 'editor';
      }

      if (action_id.includes('developer')) {
        regtype = 'developer';
      }

      if (action_id.includes('researches')) {
        regtype = 'researches';
      }



    $.ajax({
        url: processing_file,
        type: 'POST',
        async: true,
        data: {
            main: main,
            to_do: to_do,
            userid: number,
            regtype: regtype,
            reg_update: true
        },success: function() {
          url.reload();
        }
    });

  }
    
  if (action_id.includes('note')) {

    if (action_id.includes('show')) {
      number = action_id.match(/\d+/)[0];
      $('#modal-notes-container-'+number).show(); 
      toggleClearNoteButton (number); 
    }

  }

  if (action_id.includes('subscription')) {
    processing_file = '../../private/includes/processing/update-subscription-status-processing.php';
    var subscription_type = '';
    var subscription_duration = $('#subscription-duration-'+number).val();
    var to_do = '';

    number = action_id.match(/\d+/)[0];


    if (action_id.includes('Tools')) {
      subscription_type='Tools';
    }

    if (action_id.includes('Seller')) {
      subscription_type='Seller';
    }

    if (action_id.includes('Shelf')) {
      subscription_type='Shelf';
    }

    if (action_id.includes('Files')) {
      subscription_type='Files';
    }


    if (action_id.includes('approve')) {
      to_do='approve';
    }

    if (action_id.includes('reject')) {
      to_do='reject';
    }

     $.ajax({
        url: processing_file,
        type: 'POST',
        async: true,
        data: {
            to_do: to_do,
            subscription_id: number,
            subscription_type: subscription_type,
            subscription_duration: subscription_duration,
            subscription_update: true
        },success: function() {
          url.reload();
        }
    });


  }

  if (action_id.includes('promotion')) {
    
    if (action_id.includes('show')) {
      $('#modal-promotion').show();

      number = action_id.match(/\d+/)[0];

      var update_promotion_id = number;
      var update_promotion_name_company = $('#update-promotion-name-company-'+number).val();
      var update_promotion_title = $('#update-promotion-title-'+number).val();
      var update_promotion_type = $('#update-promotion-type-'+number).val();
      var update_promotion_topics = $('#update-promotion-topics-'+number).val();
      var update_promotion_description = $('#update-promotion-description-'+number).val();
      var update_promotion_link = $('#update-promotion-link-'+number).val();
      var update_promotion_duration = $('#update-promotion-duration-'+number).val();
      var update_promotion_amount = $('#update-promotion-amount-'+number).val();
      var update_promotion_image_link = $('#update-promotion-image-link-'+number).val();
      var update_promotion_agreement_link = $('#update-promotion-agreement-link-'+number).val();

      $('#promotion-id').val(update_promotion_id);
      $('#promotion-name-company').val(update_promotion_name_company);
      $('#promotion-title').val(update_promotion_title);
      $('#promotion-type').val(update_promotion_type);
      $('#promotion-topics').val(update_promotion_topics);
      $('#promotion-description').val(update_promotion_description);
      $('#promotion-link').val(update_promotion_link);
      $('#promotion-duration').val(update_promotion_duration);
      $('#promotion-amount').val(update_promotion_amount);
      $('#promotion-image-link').val(update_promotion_image_link);
      $('#promotion-agreement-link').val(update_promotion_agreement_link);

      $('#promotion-submit-button').text('Update');
    }

    if (action_id.includes('new')) {
    $('#modal-promotion').show();

    $('#promotion-id').val('');
    $('#promotion-name-company').val('');
    $('#promotion-title').val('');
    $('#promotion-type').val('');
    $('#promotion-topics').val('');
    $('#promotion-description').val('');
    $('#promotion-link').val('');
    $('#promotion-duration').val('');
    $('#promotion-amount').val('');
    $('#promotion-image-link').val('');
    $('#promotion-agreement-link').val('');
    $('#promotion-submit-button').text('Add');
    }


    if (action_id.includes('status')) {
      processing_file = '../../private/includes/processing/update-promotion-status-processing.php';
      var to_do = '';
      number = action_id.match(/\d+/)[0];
      var promotion_duration = $('#promotion-duration').val();

      if (action_id.includes('publish')) {
        to_do = 'publish';
      }

      if (action_id.includes('unpublish')) {
        to_do = 'unpublish';
      }

       $.ajax({
        url: processing_file,
        type: 'POST',
        async: true,
        data: {
            to_do: to_do,
            promotion_id: number,
            promotion_duration: promotion_duration,
            status_promotion_submit: true
        },success: function(response) {

          if (response=='Promotion Status Updated') {
            url.reload();
          } else {
            console.log(response);
          }
          
        }
    });
   
    }

  }




  console.log(action_id);

});


function toggleClearNoteButton (number) {
var note_notes = $('#note-notes-'+number).val(); 
  
  if (note_notes) {
    $('#note-clear-button-'+number).show();
  } else {
    $('#note-clear-button-'+number).hide();
  }
}




$('.note-buttons-container button').click(function(){
var processing_file = '../../private/includes/processing/update-notes-processing.php';
var button_id = $(this).attr('id');
const number = button_id.match(/\d+/)[0];

var note_userid = $('#note-userid-'+number).val();
var note_regtype = $('#note-regtype-'+number).val();
var note_regtype_cap = $('#note-regtype-cap-'+number).val();
var note_notes = $('#note-notes-'+number).val();

if (button_id.includes('clear')) {
note_notes ='';
$('#note-notes-'+number).val('');
}

$.ajax({
        url: processing_file,
        type: 'POST',
        async: true,
        data: {
            note_userid: note_userid,
            note_regtype: note_regtype,
            note_regtype_cap: note_regtype_cap,
            note_notes: note_notes,
            note_submit: true
        },success: function(response) {
          console.log(response);
           $('#modal-notes-container-'+number).show();
           $('#modal-note-message-'+number).show();
           $('#modal-note-message-'+number).html(response);
           toggleClearNoteButton (number);
           hideAlerts();
        }
  });

})



$('#promotion-submit-button').click(function(){
    var promotion_id = $('#promotion-id').val();
    var promotion_name_company = $('#promotion-name-company').val();
    var promotion_title= $('#promotion-title').val();
    var promotion_type= $('#promotion-type').val();
    var promotion_topics= $('#promotion-topics').val();
    var promotion_description= $('#promotion-description').val();
    var promotion_link = $('#promotion-link').val();
    var promotion_duration= $('#promotion-duration').val();
    var promotion_amount= $('#promotion-amount').val();
    var promotion_image_link= $('#promotion-image-link').val();
    var promotion_agreement_link= $('#promotion-agreement-link').val();
  
    const promotion_image= document.getElementById('promotion-image').files[0];
    const promotion_agreement = document.getElementById('promotion-agreement').files[0];

    const formData = new FormData();

    formData.append('promotion_id', promotion_id);
    formData.append('promotion_name_company', promotion_name_company);
    formData.append('promotion_title', promotion_title);
    formData.append('promotion_type', promotion_type);
    formData.append('promotion_topics', promotion_topics);
    formData.append('promotion_description', promotion_description);
    formData.append('promotion_link', promotion_link);
    formData.append('promotion_duration', promotion_duration);
    formData.append('promotion_amount', promotion_amount);
    formData.append('promotion_image_link', promotion_image_link);
    formData.append('promotion_agreement_link', promotion_agreement_link);
    formData.append('promotion_image', promotion_image);
    formData.append('promotion_agreement', promotion_agreement);
    formData.append('promotion_submit', 'true');
       
      fetch('../../private/includes/processing/promotion-processing.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        if (result!='Promotion Sent') { 
          console.log(result);
          $('#modal-promotion').show();
          hideAlerts();
         }

        if (result=='Promotion Sent') {
          url.reload();
        }
          
      })
      .catch(error => console.error('Error:', error));










})







//WHEN THE DOCUMENT IS READY, RECORD THE CONTENT VIEW ON SCROLL AND OPEN TAB.
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



<?php if ($pageName == 'My Account') {?>
<script>
  // Pass the PHP data to JavaScript
  const data = <?php echo json_encode($data) ?>

  const regionSelect = document.getElementById('profile-region');
  const provinceSelect = document.getElementById('profile-province-state');
  const municipalitySelect = document.getElementById('profile-city-municipality');
  const barangaySelect = document.getElementById('profile-barangay');
 
  regionSelect.addEventListener('change', function() {
      const regionCode = this.value;
      provinceSelect.innerHTML = '<option value=""> Select Province/State </option>';
      municipalitySelect.innerHTML = '<option value=""> Select City/Municipality </option>';
      barangaySelect.innerHTML = '<option value=""> Select Barangay</option>';
      municipalitySelect.disabled = true;
      barangaySelect.disabled = true;

      if(regionCode && data[regionCode]) {
          const provinces = data[regionCode]['province_list'];
          for(let p in provinces) {
              let option = document.createElement('option');
              option.value = p;
              option.textContent = p;
              provinceSelect.appendChild(option);
          }
          provinceSelect.disabled = false;
      } else {
          provinceSelect.disabled = true;
      }
  });

  provinceSelect.addEventListener('change', function() {
      const regionCode = regionSelect.value;
      const province = this.value;
      municipalitySelect.innerHTML = '<option value="">Select City/Municipality</option>';
      barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
      barangaySelect.disabled = true;

      if(regionCode && province && data[regionCode]['province_list'][province]) {
          const municipalities = data[regionCode]['province_list'][province]['municipality_list'];
          for(let m in municipalities) {
              let option = document.createElement('option');
              option.value = m;
              option.textContent = m;
              municipalitySelect.appendChild(option);
          }
          municipalitySelect.disabled = false;
      } else {
          municipalitySelect.disabled = true;
      }
  });

  municipalitySelect.addEventListener('change', function() {
      const regionCode = regionSelect.value;
      const province = provinceSelect.value;
      const municipality = this.value;
      barangaySelect.innerHTML = '<option value="">Select Barangay</option>';

      if(regionCode && province && municipality && data[regionCode]['province_list'][province]['municipality_list'][municipality]) {
          const barangays = data[regionCode]['province_list'][province]['municipality_list'][municipality]['barangay_list'];
          for(let i=0; i < barangays.length; i++) {
              let option = document.createElement('option');
              option.value = barangays[i];
              option.textContent = barangays[i];
              barangaySelect.appendChild(option);
          }
          barangaySelect.disabled = false;
      } else {
          barangaySelect.disabled = true;
      }
  });

</script>

<?php } ?>


<?php ob_end_flush();?>