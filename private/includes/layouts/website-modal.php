<?php 
        $nullRedirect = "";
        
        
        if (isset($_GET['add-promotion']) || isset($_GET['update-promotion'])) {
           
            $nullRedirect =$website.'/workspace/site-manager.php?recordtype=promotions';  

        }




        
?>


<?php $articleToEdit = isset($_GET['article']) ? $_GET['article'] : ""; ?>
<?php $fileToEdit = isset($_GET['file']) ? $_GET['file'] : ""; ?>
<?php $toolToEdit = isset($_GET['tool']) ? $_GET['tool'] : ""; ?>
<?php $researchToEdit = isset($_GET['research']) ? $_GET['research'] : ""; ?>

<?php 
$contentType="";
$contentId = ""; 
$subContentId = ""; 
$contentDeleteProcessingFile ="";

if ($articleToEdit) {
    $contentId =$articleToEdit;
    $contentType = 'Article';
    $contentDeleteProcessingFile ="../../private/includes/processing/delete-article-processing.php";

}

if ($fileToEdit) {
    $contentId =$fileToEdit;
    $contentType = 'Teacher File';
    $contentDeleteProcessingFile ="../../private/includes/processing/delete-file-processing.php";
}

if ($toolToEdit) {
    $contentId =$toolToEdit;
    $contentType = 'Tool';
    $contentDeleteProcessingFile ="../../private/includes/processing/delete-tool-processing.php"; 
}

if ($researchToEdit) {
    $contentId =$researchToEdit;
    $contentType = 'Research';
    $contentDeleteProcessingFile ="../../private/includes/processing/delete-research-processing.php"; 
}

?>



<?php //---------------------------FOR DELETING CONTENT-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-confirm-delete">
    <div class="website-modal-content">
        <p>Are you sure you want to delete?</p>
        <input type="text" value="<?php echo $contentType?>" id="delete-content-type">
        <input type="text" value="<?php echo $contentId?>" id="delete-content-id">
        <input type="text" id="delete-sub-content-id">
        <input type="text" value="<?php echo $contentDeleteProcessingFile?>" id="delete-content-processing-file">

        <hr>
        <div style="display: flex; flex-direction:row"> 
            <a class="link-tag-button" id="delete-confirmed-button">Yes</a>
            <a class="link-tag-button close-without-null-redirection">No</a>
    </div>
    
    </div>
</div>









<?php //---------------------------FOR UPLOADING IMAGE-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-upload-image">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a> 
                <small class='modal-replace-image-warning'>
                    Select an image with a JPEG or JPG format. 
                    <br>The existing image will be deleted after the update.
                    <?php if ($fileToEdit || $articleToEdit) {?>
                    <br>You can extract an image from your PDF document <a href="https://www.freeconvert.com/pdf-to-jpg" target="_blank"><strong>here</strong></a>.
                    <?php } ?>

                </small> 
               
                <div id="modal-upload-image-message" class="alert alert-danger"></div>
                
                <hr>
                <input type="text" id="upload-action-file" hidden>
                <input type="file" id="upload-image">
                <input type="text" id="upload-type" hidden>

                <input type="text" id="content-hidden-type" value="<?php echo $contentType;?>" >
                <input type="text" id="content-hidden-id" value="<?php echo $contentId;?>" >

                <input type="text" hidden value="<?php echo $registrantId;?>" id="profile-upload-registrant-hidden-id">
                <input type="text" hidden value="<?php echo $accountName;?>" id="profile-upload-registrant-hidden-accountName">

                <button id="upload-button"></button>
     

            </form>

    </div>
</div>





















<?php //---------------------------FOR ADDING/UPDATING PROMOTIONS-------------------------------------?>
<div class="modal website-modal website-modal-wrapper" id="modal-promotion">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a>
    
        <div id="modal-promotion-inputs-container">
            <div id="group-1">
                <input type="text" placeholder="Id" id="promotion-id" hidden>
                <input type="text" placeholder="Name/Company" id="promotion-name-company">
                <input type="text" placeholder="Title" id="promotion-title">
            
                <div>
                    <select id="promotion-type">
                        <option value="" hidden>Type</option>
                        <option value="Products">Products</option>
                        <option value="Services">Services</option>
                    </select>
                    <input type="text" placeholder="Topic (s)" id="promotion-topics">     
                </div>

                <textarea placeholder="Description" id="promotion-description"></textarea>
            </div>
    
            <div id="group-2">       
                <div id="promotion-days-amount">
                    <input type="number" placeholder="Number of Days" id="promotion-duration">
                    <input type="text" placeholder="Amount" id="promotion-amount">
                    
                </div>

                <div>
                    <input type="text" placeholder="Link" id="promotion-link"> 
                </div>

                <div id="promotion-attachments">
                    <div>
                        <label for="promotion-image">Image</label>
                        <input type="file" id="promotion-image">
                        <input type="text" id="promotion-image-link" value="<?php echo $promotionImage?>">
                    </div>
                    <div>
                        <label for="promotion-agreement">Agreement</label>
                        <input type="file" id="promotion-agreement">
                        <input type="text" id="promotion-agreement-link">
                    </div>
                </div>

                
            </div>

        </div>

        <button id="promotion-submit-button">Add</button>
       
    </div>
</div>









<?php //---------------------------FOR SHOWING CONTENT IMAGE-------------------------------------?>


<div class="modal website-modal website-modal-wrapper" id="modal-show-image">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a>
        <?php if (isset($_GET['edit']))  {?>
        <?php if ($image) {?>
            <img src="<?php echo $image;?>" alt="<?php echo 'Thumbnail for '.$title;?>" >
        <?php } ?>
        <?php } ?>

        <hr>

        <?php if ($pageName=='Workspace - Teacher') {?>
           <a class="link-tag-button change-file-thumbnail" >Update File Thumbnail</a> 
        <?php } ?>

        <?php if ($pageName=='Workspace - Writer') {?>
           <a class="link-tag-button change-featured-image">Update Featured Image</a> 
        <?php } ?>

        <?php if ($pageName=='School Workspace - Researches') {?>
             <a class="link-tag-button change-research-thumbnail">Update Research Thumbnail</a> 
        <?php } ?>

        <?php if ($pageName=='Workspace - Developer') {?>
             <a class="link-tag-button change-tool-icon">Update Tool Icon</a>  
        <?php } ?>

    </div>
</div>





<?php //---------------------------FOR SUBSCRIPTION-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-subscription">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a>
                            <div style="display:inline-block; gap:20px;">
                            <button class="link-tag-button button"id="show-subscription-heads-button">Subscription Notes</button>

                            <small id="subscriptions-updates">
                                    <?php if ($type=='Personal') {?>
                                        <?php if($toolSubscribed) { ?>
                                            <small>Tools (<?php echo $subscriptionRemainingDaysTool.' Days';?>)</small>
                                        <?php } ?>

                                        <?php if($pendingToolSubscription) { ?>
                                            <small>Tools (Pending)</small>
                                        <?php } ?>

                                        <?php if(!$pendingToolSubscription && !$toolSubscribed) { ?>
                                            <small>Tools (Inactive)</small>
                                        <?php } ?>
                                
                                        <?php if($sellerSubscribed) { ?>
                                            <small>Seller (<?php echo $subscriptionRemainingDaysSeller.' Days';?>)</small>
                                        <?php } ?>

                                        <?php if($pendingSellerSubscription) { ?>
                                            <small>Seller (Pending)</small>
                                        <?php } ?>

                                        <?php if($teacherRegistration && !$pendingSellerSubscription && !$sellerSubscribed) { ?>
                                            <small>Seller (Inactive)</small>
                                        <?php } ?>
                                <?php } ?>

                                <?php if ($type=='School') {?>
                                        <?php if($shelfSubscribed) { ?>
                                            <small>Shelf (<?php echo $subscriptionRemainingDaysShelf.' Days';?>)</small>
                                        <?php } ?>

                                        <?php if($pendingShelfSubscription) { ?>
                                            <small>Shelf (Pending)</small>
                                        <?php } ?>

                                        <?php if(!$pendingShelfSubscription && !$shelfSubscribed) { ?>
                                            <small>Shelf (Inactive)</small>
                                        <?php } ?>
                                <?php } ?>
                                </small>
                            </div>
                            <?php $stype = isset($_SESSION['type']) ? $_SESSION['type'] : "Tool";?>
                            <?php $duration = isset($_SESSION['duration']) ? $_SESSION['duration'] : "";?>

                             
                            <div  class="modal-subscription-head">
                                <?php if($type=='Personal') {?>
                                    <small>Price :</small>
                                    <small>Tools- ₱59/mo</small>
                                    <?php if($teacherRegistration){?>
                                    <small>Seller- ₱109/mo</small>
                                    <?php } ?>
                                <?php } ?>
                                <?php if($type=='School') {?>
                                    <small>Price :</small>
                                    <small>Shelf- ₱1490/year</small>
                                <?php } ?>

                            </div>

                            <div class="modal-subscription-head">
                                <small>Send to :</small>
                                <small>GCASH (09942762632, Erfel S.)</small>
                            </div>

                            <div class="modal-subscription-head">
                                <small>Verification :</small>
                                <small>Mon - Fri (8am-9am, 11am-12nn, 4pm-5pm)</small>
                            </div>


                            <?php $paymentOptionName = isset($_SESSION['paymentOptionName']) ? $_SESSION['paymentOptionName'] : "";?>
                            <?php $referenceNumber = isset($_SESSION['referenceNumber']) ? $_SESSION['referenceNumber'] : "";?>
                            <?php $proofOfPayment = isset($_SESSION['proofOfPayment']) ? $_SESSION['proofOfPayment'] : "";?>

                            
                            <div class='alert alert-danger' id="subscription-message">

                            </div>
            

                            <input type="text" value="<?php echo  $inSubscriptionToolList?>" hidden id="in-tool-subscription-list">
                            <input type="text" value="<?php echo  $inSubscriptionFileList?>" hidden id="in-file-subscription-list">
                            <input type="text" value="<?php echo  $inSubscriptionSellerList?>" hidden id="in-seller-subscription-list">
                            <input type="text" value="<?php echo  $inSubscriptionShelfList?>" hidden id="in-shelf-subscription-list">
                            <input type="text"  value="<?php echo  $teacherRegistration?>" hidden id="in-teacher-registration">
                            <input type="text" value="<?php echo $registrantId?>" hidden id="subscription-registrant-hidden-id">

                          <div id="subscription-type-duration-amount" class="subscription-inputs-container">
                            <select id="subscription-type" <?php if ($subscription=='disabled') {echo 'disabled';}?>>
                                <option value="" selected hidden>Subscription Type</option>
                                <?php if (!$inSubscriptionToolList && $type=='Personal') { ?>
                                <option value="Tools" <?php if ($stype=='Tools') {echo 'selected';}?>>Tools</option>
                                <?php } ?>

                                <?php if (!$inSubscriptionSellerList && $teacherRegistration) { ?>
                                <option value="Seller" <?php if ($stype=='Seller') {echo 'selected';}?>>Seller</option>
                                <?php } ?>

                                <?php if (!$inSubscriptionShelfList && $type=='School') { ?>
                                <option value="Shelf" <?php if ($stype=='Shelf') {echo 'selected';}?>>Shelf</option>
                                <?php } ?>
                                </select>
                            
                            
                            <input type="number" placeholder="<?php if ($type=='Personal') {echo 'Number of Months';} if ($type=='School') {echo 'Number of Years';}?>" value="<?php echo $duration?>" min="1" id="subscription-duration" <?php if ($subscription=='disabled') {echo 'disabled';}?>>

                            <input id="subscription-total" hidden>
                            
                            </div>
                            
                            <div id="subscription-payment-option-reference-number" class="subscription-inputs-container">
                                <select id="subscription-payment-option" <?php if ($subscription=='disabled') {echo 'disabled';}?>>
                                    <option value="" hidden>Your Payment Option</option>
                                    <option value="GCASH" <?php if ($paymentOptionName=='GCASH') {echo 'selected';}?>>GCASH</option>
                                    <option value="Other" <?php if ($paymentOptionName=='Other') {echo 'selected';}?>>Other</option>
                                </select>
                                <input type="text" placeholder="Your Reference Number" value="<?php echo $referenceNumber?>" id="subscription-reference-number" <?php if ($subscription=='disabled') {echo 'disabled';}?>>
                            </div>

                            <label for="proofOfPayment">Proof of Payment [JPEG or JPG format]</label>
                            <input type="file" value="<?php echo $proofOfPayment?>" id="subscription-proof-of-payment" <?php if ($subscription=='disabled') {echo 'disabled';}?>>

                            <?php if ($subscription!='disabled') {?>
                            <div class="cancel-submit-buttons-container">
                                <strong id="subscription-summary"></strong>
                                <button class="cancel-button  close-without-null-redirection">Cancel</button>
                                <button id="submit-subscription-button">Submit</button>
                            </div>
                            <?php } ?>
   
        
    </div>
</div>






<?php //---------------------------FOR OTHER REGISTRATION-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-other-registration">
    <div class="website-modal-content"> 
        <a class="close close-without-null-redirection">&times;</a>
                       
        <div id="modal-other-registration-navigation">
                    <?php if ($type=='Personal') {?>
                    <small>Register as:</small>
                    <?php } ?>

                    <?php if ($type=='School') {?>
                    <small>Register for:</small>
                    <?php } ?>

                  
                    <?php if ($type=='Personal') {?>

                    <button class="link-tag-button" id="regtype-teacher-button">Teacher</button>

                    <button class="link-tag-button" id="regtype-writer-button">Writer</button>
                     
                   <button class="link-tag-button" id="regtype-editor-button">Editor</button>
                  
                    <button class="link-tag-button" id="regtype-developer-button">Developer</button>
                 

                    <?php } ?>


                    <?php if ($type=='School') {?>
                        <button class="link-tag-button" id="regtype-researches-button">Researches</button>
                    <?php } ?>

        </div>
        
                        
        
        <div id="modal-other-registration-download-section">
            <a href="#" class="link-tag-button" id="download-agreement-form-link">Download Agreement Form</a>
        </div>
    
        <div class="alert alert-danger" id="modal-other-registration-message">

        </div>
        
        <div id="modal-other-registration-inputs-container">
            <input type="text" id="other-registration-hidden-regtype" hidden>
            <input type="text" value="<?php echo $registrantId?>" id="other-registration-registrant-hidden-id" hidden >
            <input type="text" value="<?php echo $firstName?>"  id="other-registration-registrant-hidden-firstName" hidden>
            <input type="text" value="<?php echo $lastName?>"  id="other-registration-registrant-hidden-lastName" hidden>
            <input type="text" value="<?php echo $accountName?>"  id="other-registration-registrant-hidden-accountName" hidden>
            
            <?php if ($type=='Personal') {?>
            <label class="other-registration-label" id="license-certification-sample-label"></label>
            <input type="file" id="license-certification" class="license-certification-sample">
            <input type="text" id="sample" class="license-certification-sample">
            <?php } ?>

            <?php if ($type=='School') {?>
            <input type="file" id="license-certification" class="license-certification-sample">
            <input type="text" id="sample" class="license-certification-sample">
            <?php } ?>

            
            <label for="agreement" class="other-registration-label" id="agreement-label">Agreement [PDF format]</label>
            <input type="file" title="Agreement Form" id="agreement" >
                
        </div>

        <div class="alert alert-success" id="modal-other-registration-status">

        </div>

        <div id="modal-other-registration-submitted-documents-container">
                <small>Your Submissions: </small>
                
                <a class="link-tag-button" id="submitted-license-certification">License or Certification</a>
                                        
                <a class="link-tag-button" id="submitted-sample">Sample (s)</a>
            
                <a class="link-tag-button" id="submitted-agreement">Agreement</a>
        </div>
        
        
        <div class="cancel-submit-buttons-container" id="other-registration-buttons">
            <button  class="cancel-button  close-without-null-redirection">Cancel</button>
            <button type="submit" name="register" id="register-submit-button">Submit</button>
        </div>
                     
   
    </div>
</div>






<?php //-----------------FOR SHOWING WORKSPACE LIST----------------------------- ?>

<div class="modal website-modal website-modal-wrapper" id="modal-workspace-list">
   <div class="website-modal-content"> 
        <a class="close close-without-null-redirection">&times;</a>
            <div  class="workspace-list">

            <?php if ($type=='Personal') {?>
       
                <?php if($teacherRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/teacher.php'?>" class="link-tag-button" target='_blank'>Teacher</a>
                <?php }?>

                <?php if($writerRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/writer.php'?>" class="link-tag-button" target='_blank'>Writer</a>
                <?php }?>

                <?php if($editorRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/editor.php'?>" class="link-tag-button" target='_blank'>Editor</a>
                <?php }?>

                <?php if($developerRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/developer.php'?>" class="link-tag-button" target='_blank'>Developer</a>
                <?php }?>

                <?php if($siteManagerRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/site-manager.php'?>" class="link-tag-button" target='_blank'>Site Manager</a>
                <?php }?>

               

                <?php if($dataAnalystRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/data-analyst.php'?>" class="link-tag-button" target='_blank'>Data Analyst</a>
                <?php }?>

                <?php if($funderRegistration) { ?>
                     <a href="<?php echo $website.'/workspace/funder.php'?>" class="link-tag-button" target='_blank'>Funder</a>
                <?php }?>

                <?php } ?>

                
                <?php if ($type=='School') {?>
                <a href="<?php echo $website.'/workspace/researches.php'?>" class="link-tag-button" target='_blank'>Researches</a>
                <?php } ?>
        </div>
    </div>
</div>









 
        
    










