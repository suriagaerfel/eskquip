<?php 
        $nullRedirect = "";
            if (isset($_GET['confirm-delete'])) {

                //Fo teacher files
                if ($fileToEdit) {
                $nullRedirect = $website.'/workspace/teacher.php?edit=yes&file='.$fileToEdit;
                
                }

                if (isset($_GET['sb-file'])) {
                    $nullRedirect = $website.'/workspace/teacher.php';
                }

                //For developer tools
                if (isset($_GET['tool'])) {
                $nullRedirect = $website.'/workspace/developer.php?edit=yes&tool='.$_GET['tool'];
                
                }

                if (isset($_GET['sb-tool'])) {
                    $nullRedirect = $website.'/workspace/developer.php';
                
                }


                if(isset($_GET['edit']) && isset($_GET['tool']) && isset($_GET['tool-file'])) {
                    $toolId = $_GET['tool'];
                    
                    $nullRedirect =$website.'/workspace/developer.php?edit=yes&tool='.$toolId;

                }



                //For school researches
                if ($researchToEdit) {
                $nullRedirect = $website.'/workspace/school.php?edit=yes&research='.$researchToEdit;
                
                }

                if (isset($_GET['sb-research'])) {
                    $nullRedirect = $website.'/workspace/school.php';
                
                }


                if($articleToEdit) {               
                    $nullRedirect =$website.'/workspace/writer.php?edit=yes&article='.$articleToEdit;
                }

                if(isset($_GET['sb-article'])) {

                $nullRedirect =$website.'/workspace/writer.php';
                }

            }



            if (isset($_GET['upload'])) {

                $uploadType = $_GET['type'];

                if ($uploadType =='profile-picture' || $uploadType =='cover-photo') {

                $nullRedirect =$website.'/account/';
                }

                if ($uploadType=='tool-icon' && $toolToEdit) {

                    $nullRedirect =$website.'/workspace/developer.php?edit=yes&tool='.$toolToEdit;
                }

                if ($uploadType=='featured-image' && $articleToEdit) {
                    $nullRedirect =$website.'/workspace/writer.php?edit=yes&article='.$articleToEdit;
                }  
                
                if ($uploadType=='file-thumbnail' && $fileToEdit) {
                    $nullRedirect =$website.'/workspace/teacher.php?edit=yes&file='.$fileToEdit;
                } 

                if ($uploadType=='research-thumbnail' && $researchToEdit) {
                    $nullRedirect =$website.'/workspace/researches.php?edit=yes&research='.$researchToEdit;
                }

            }


       

        if (isset($_GET['subscription'])) {
            $nullRedirect = $website.'/account/';
        }



        if (isset($_GET['other-registration'])) {
            $nullRedirect = $website.'/account/';
        }
        
        
        if (isset($_GET['workspace'])) {
           
            $nullRedirect =$website.'/account/';  

        }
        
        if (isset($_GET['add-promotion']) || isset($_GET['update-promotion'])) {
           
            $nullRedirect =$website.'/workspace/site-manager.php?recordtype=promotions';  

        }
        
    ?>



<?php //---------------------------FOR DELETING CONTENT-------------------------------------?>
<?php if (isset($_GET['confirm-delete'])) { ?>
<div class="modal website-modal website-modal-wrapper" id="modal-confirm-delete">
    <div class="website-modal-content">
        <p>Are you sure you want to delete?</p>
        <hr>
        <tr>
            <?php //If the answer is 'Yes'...?>
            <a class="link-tag-button" href="
            <?php if (isset($_GET['file'])) {//For deleting a teacher's file in edit mode
                $fileId = $_GET['file'];
                echo '../../private/includes/processing/delete-file-processing.php?file='.$fileId;
            }

            if (isset($_GET['sb-file'])) {//For deleting a teacher's file from sidebar
                $fileId = $_GET['sb-file'];
                echo '../../private/includes/processing/delete-file-processing.php?file='.$fileId;
            }

            
            if (isset($_GET['tool']) && !isset($_GET['tool-file'])) {//For deleting a developer's tool in edit mode
                $toolId = $_GET['tool'];
                echo '../../private/includes/processing/delete-tool-processing.php?tool='.$toolId;
            }

            if (isset($_GET['sb-tool'])) {//For deleting a developer's tool from sidebar
                $toolId = $_GET['sb-tool'];
                echo '../../private/includes/processing/delete-tool-processing.php?tool='.$toolId;
            }

            if (isset($_GET['tool-file'])) {//For deleting a developer's tool in edit mode
                $toolId = $_GET['tool'];
                $toolFileId = $_GET['tool-file'];
                echo '../../private/includes/processing/delete-tool-processing.php?tool='.$toolId.'&tool-file='.$toolFileId;
            }

            if (isset($_GET['research'])) {//For deleting a school's research in edit mode
                $researchId = $_GET['research'];
                echo '../../private/includes/processing/delete-research-processing.php?research='.$researchId;
            }

            if (isset($_GET['sb-research'])) {//For deleting a school's research from sidebar
                $researchId = $_GET['sb-research'];
                echo '../../private/includes/processing/delete-research-processing.php?research='.$researchId;
            }


            if(isset($_GET['article']) && isset($_GET['edit'])) {//For deleting an article from editing mode
                $articleId = $_GET['article'];
                $editingMode = $_GET['edit'];
                echo '../../private/includes/processing/delete-article-processing.php?article='.$articleId.'&from-editing='.$editingMode;
            }

            if(isset($_GET['sb-article'])) {//For deleting an article from sidebar
                $articleId = $_GET['sb-article'];
                $editingMode = "";

                echo '../../private/includes/processing/delete-article-processing.php?article='.$articleId.'&from-editing='.$editingMode;
            }?>">
                Yes</a>

            <?php //If the answer is 'No'...?>
            <a class="link-tag-button" href="<?php echo $nullRedirect;?>">No</a>
        </tr>
    
    </div>
</div>
<?php } ?>








<?php //---------------------------FOR UPLOADING IMAGE-------------------------------------?>
<?php if (isset($_GET['upload'])) { ?>

<?php $uploadType = isset($_GET['type']) ? $_GET['type'] : ""; ?>
<?php $articleToEdit = isset($_GET['article']) ? $_GET['article'] : ""; ?>
<?php $fileToEdit = isset($_GET['file']) ? $_GET['file'] : ""; ?>
<?php $toolToEdit = isset($_GET['tool']) ? $_GET['tool'] : ""; ?>
<?php $researchToEdit = isset($_GET['research']) ? $_GET['research'] : ""; ?>

<div class="modal website-modal website-modal-wrapper" id="modal-upload-image">
    <div class="website-modal-content">
        <a class="close close-with-null-redirection" href="<?php echo $nullRedirect ?>">&times;</a> 
            <form 
                method="post" 
            
                action="<?php 
                if ($uploadType=='profile-picture' || $uploadType=='cover-photo') {
                echo '../../private/includes/processing/update-details-processing.php';
                }

                if ($uploadType=='tool-icon') {
                echo '../../private/includes/processing/update-developer-tool-info-processing.php';
                }

                if ($uploadType=='featured-image') {
                echo '../../private/includes/processing/update-article-info-processing.php';
                }

                if ($uploadType=='file-thumbnail') {
                echo '../../private/includes/processing/update-teacher-file-info-processing.php';
                }

                if ($uploadType=='research-thumbnail') {
                echo '../../private/includes/processing/update-school-research-info-processing.php';
                }
                
                ?>" 

               enctype="multipart/form-data" class="modal-image-update-form">

                <small class='modal-replace-image-warning'>
                    Select an image with a JPEG or JPG format. 
                    <br>The existing image will be deleted after the update.
                </small>

                <?php if ($uploadType=='file-thumbnail' || $uploadType=='research-thumbnail') {?>
                <small class='modal-replace-image-warning'> 
                    <br>You can extract an image from your PDF document <a href="https://www.freeconvert.com/pdf-to-jpg" target="_blank"><strong>here</strong></a>.
                </small>
                <?php } ?>
                
                <hr>

                <?php if (isset($_SESSION['image-empty'])){
                echo "<div class='alert alert-danger'>Please select an image.</div>";
                unset($_SESSION['image-empty']);  
                } ?>

                <?php if (isset($_SESSION['invalid-image-format'])){
                echo "<div class='alert alert-danger'>Only JPEG and JPG formats are accepted this time!.</div>";
                unset($_SESSION['invalid-image-format']);  
                } ?>

                <?php if (isset($_SESSION['image-too-big'])){
                echo "<div class='alert alert-danger'>Image must not exceed 5 MB.</div>";
                unset($_SESSION['image-too-big']);  
                } ?>


                    
                
                

                <?php //If profile picture or cover photo
                if($uploadType=='profile-picture' || $uploadType=='cover-photo') {
                    $buttonName = "";
                    if ($uploadType=='profile-picture') {
                        $buttonName = 'updateProfilePicture';
                        $buttonTitle ='Profile Picture';
                    } 

                    if ($uploadType=='cover-photo') {
                        $buttonName = 'updateCoverPhoto';
                        $buttonTitle ='Cover Photo';
                    }?>


                <input type="file" name="image">
                <input type="text" name="hiddenId" hidden value="<?php echo $_GET['userid'];?>">
                <input type="text" name="hiddenAccountName" hidden value="<?php echo $accountName;?>">
                <button type="submit" name="<?php echo $buttonName?>">Update <?php echo ' '.$buttonTitle ?></button>

                <?php } ?> 


                <?php //If tool icon or featured image or thumbnails
                if($uploadType=='tool-icon' || $uploadType=='featured-image' || $uploadType=='file-thumbnail' || $uploadType=='research-thumbnail') {
                    $buttonName = "";
                    if ($uploadType=='tool-icon') {
                        $buttonName = 'updateToolIcon';
                        $buttonTitle ='Icon';
                    } 

                    if ($uploadType=='featured-image') {
                        $buttonName = 'updateFeaturedImage';
                        $buttonTitle ='Featured Image';
                    }

                    if ($uploadType=='file-thumbnail') {
                        $buttonName = 'updateFileThumbnail';
                        $buttonTitle ='File Thumbnail';
                    }

                    if ($uploadType=='research-thumbnail') {
                        $buttonName = 'updateResearchThumbnail';
                        $buttonTitle ='Research Thumbnail';
                    }
                    
                    ?>


                
                <input type="file" name="image" class="attachments">
                <?php if ($articleToEdit){?>
                <input type="text" name="articleHiddenId" value="<?php echo $articleToEdit;?>" hidden>
                <?php } ?>

                <?php if ($toolToEdit){?>
                <input type="text" name="toolHiddenId"  value="<?php echo $toolToEdit;?>" hidden>
                <?php } ?>

                <?php if ($fileToEdit){?>
                <input type="text" name="fileHiddenId"  value="<?php echo $fileToEdit;?>" hidden>
                <?php } ?>

                <?php if ($researchToEdit){?>
                <input type="text" name="researchHiddenId"  value="<?php echo $researchToEdit;?>" hidden>
                <?php } ?>


                <button type="submit" name="<?php echo $buttonName?>">Update <?php echo ' '.$buttonTitle ?></button>
                <?php } ?> 

            </form>

    </div>
</div>
<?php } ?>




















<?php //---------------------------FOR ADDING/UPDATING PROMOTIONS-------------------------------------?>
<?php if (isset($_GET['add-promotion']) || isset($_GET['update-promotion'])) { ?>
<div class="modal website-modal website-modal-wrapper" id="modal-promotion">
    <div class="website-modal-content">
    
    <a class="close close-with-null-redirection" href="<?php echo $nullRedirect ?>">&times;</a>
    
    <?php 
        
        $m_promotionNameCompany = "";
        
        if (isset($_SESSION['promotionNameCompany'])) {
            $m_promotionNameCompany = htmlspecialchars($_SESSION['promotionNameCompany']);
        }

        $m_promotionTitle = "";

        if (isset($_SESSION['promotionTitle'])) {
            $m_promotionTitle = htmlspecialchars($_SESSION['promotionTitle']);
        }

        $m_promotionType = "";
        if (isset($_SESSION['promotionType'])) {
            $m_promotionType = htmlspecialchars($_SESSION['promotionType']);
        }
        $m_promotionTopics = "";
        if (isset($_SESSION['promotionTopics'])) {
            $m_promotionTopics = htmlspecialchars($_SESSION['promotionTopics']);
        }
        $m_promotionDescription = "";
        if (isset($_SESSION['promotionDescription'])) {
            $m_promotionDescription = htmlspecialchars($_SESSION['promotionDescription']);
        }
       
        $m_promotionLink = "";

        if (isset($_SESSION['promotionLink'])) {
            $m_promotionLink = htmlspecialchars($_SESSION['promotionLink']);
        }
        $m_promotionDuration = "";
        if (isset($_SESSION['promotionDuration'])) {
            $m_promotionDuration = htmlspecialchars($_SESSION['promotionDuration']);
        }
        $m_promotionNameAmount = "";
        if (isset($_SESSION['promotionAmount'])) {
            $m_promotionAmount = htmlspecialchars($_SESSION['promotionAmount']);
        }

        $promotionToUpdate = '';
        if (isset($_GET ['promotion-id'])) {
            $promotionToUpdate = $_GET ['promotion-id'];

            unset ($_SESSION ['promotionNameCompany']);
            unset($_SESSION ['promotionTitle']);
            unset($_SESSION ['promotionType']);
            unset($_SESSION ['promotionTopics']);
            unset($_SESSION ['promotionDescription']);
            unset($_SESSION ['promotionLink']);
            unset($_SESSION ['promotionDuration']);
            unset($_SESSION ['promotionAmount']);

            $sqlPromotionDetails = "SELECT * FROM promotions WHERE promotionId = $promotionToUpdate";
            $sqlPromotionDetailsResult = mysqli_query($conn,$sqlPromotionDetails);
            $promotionDetails = $sqlPromotionDetailsResult->fetch_assoc();

            if ($promotionDetails) {
                $m_promotionNameCompany = $promotionDetails ['promotionNameCompany'];
                $m_promotionTitle = $promotionDetails ['promotionTitle'];
                $m_promotionType = $promotionDetails ['promotionType'];
                $m_promotionTopics = $promotionDetails ['promotionTopics'];
                $m_promotionDescription = $promotionDetails ['promotionDescription'];
                 $m_promotionImage = $promotionDetails ['promotionImage'];
                $m_promotionLink = $promotionDetails ['promotionLink'];
                $m_promotionDuration = $promotionDetails ['promotionDuration'];
                $m_promotionAmount = $promotionDetails ['promotionAmount'];
                $m_promotionAgreement = $promotionDetails ['promotionAgreement'];
                $m_promotionStatus = $promotionDetails ['promotionStatus'];
            }
        }

        $action = '';

        if (isset($_GET['add-promotion'])) {
            $action = '../../private/includes/processing/promotion-processing.php';
        }

        if (isset($_GET['update-promotion'])) {
            $action = '../../private/includes/processing/update-promotion-info-processing.php';
        }
        
        
        
        ?>

    
        <form action="<?php echo $action;?>" method="post" enctype="multipart/form-data" class="modal-promotion-form">

            <?php if(isset($_SESSION['empty-fields'])) {
                echo "<div class='alert alert-danger'>All fields are required.</div>";
                unset ($_SESSION['empty-fields']);
            }?>

            <?php if(isset($_SESSION['invalid-promotion-image-format'])) {
                echo "<div class='alert alert-danger'>Only JPEG and JPG formats are accepted for promotion image.</div>";
                unset ($_SESSION['invalid-promotion-image-format']);
            }?>

            <?php if(isset($_SESSION['invalid-promotion-agreement-format'])) {
                echo "<div class='alert alert-danger'>Only PDF format is accepted for promotion agreement.</div>";
                unset ($_SESSION['invalid-promotion-agreement-format']);
            }?>

            <?php if(isset($_SESSION['duration-not-a-number'])) {
                echo "<div class='alert alert-danger'>Duration must be a number.</div>";
                unset ($_SESSION['duration-not-a-number']);
            }?>

             <?php if(isset($_SESSION['duration-must-be-greater-than-zero'])) {
                echo "<div class='alert alert-danger'>Duration must be greater than zero.</div>";
                unset ($_SESSION['duration-must-be-greater-than-zero']);
            }?>

            <?php if(isset($_SESSION['amount-not-a-number'])) {
                echo "<div class='alert alert-danger'>Amount must be a number.</div>";
                unset ($_SESSION['amount-not-a-number']);
            }?>



            <div class="modal-promotion-form-content">
                <?php if ($promotionToUpdate) {?>
                <input type="text" name="promotionId" value="<?php echo $promotionToUpdate?>" hidden>
                <input type="text" name="promotionImageLink" value="<?php echo $m_promotionImage?>" hidden>
                <input type="text" name="promotionAgreementLink" value="<?php echo $m_promotionAgreement?>" hidden>
                <?php } ?>

                <input type="text" placeholder="Name/Company" name="promotionNameCompany" value="<?php echo $m_promotionNameCompany;?>">
                <input type="text" placeholder="Title" name="promotionTitle" value="<?php echo $m_promotionTitle;?>">
                <div>
                    <select name="promotionType">
                        <option value="" hidden>Type</option>
                        <option value="Products" <?php if ($m_promotionType=='Product') {echo 'selected';}?>>Products</option>
                        <option value="Services" <?php if ($m_promotionType=='Service') {echo 'selected';}?>>Services</option>
                    </select>
                    <input type="text" placeholder="Topic (s)" name="promotionTopics" value="<?php echo $m_promotionTopics;?>">     
                </div>
                <textarea placeholder="Description" class="promotion-description" name="promotionDescription"><?php echo $m_promotionDescription;?></textarea>
        
                <div>
                    <div>
                        <label for="promotionImage">Image</label>
                        <input type="file" name="promotionImage" id="promotion-image">
                    </div>
                    <div>
                        <label for="promotionImage">Link</label> 
                        <input type="text" placeholder="Link" name="promotionLink" value="<?php echo $m_promotionLink;?>"> 
                    </div>
                    
                </div>
                

                <div>
                    <input type="number" placeholder="Number of Days" name="promotionDuration" value="<?php echo $m_promotionDuration;?>">
                    <input type="text" placeholder="Amount" name="promotionAmount" value="<?php echo $m_promotionAmount;?>">
                    
                </div>

                <label for="promotionAgreement">Agreement</label>
                <input type="file" name="promotionAgreement" id="promotion-agreement">
                

                

            </div>

            <?php if (isset($_GET['add-promotion'])){?>
            <input type="submit" value="Add" name="addPromotion" class="button">
            <?php } ?>

            <?php if (isset($_GET['update-promotion']) && $m_promotionStatus !='Published'){?>
            <input type="submit" value="Update" name="updatePromotion" class="button">
            <?php } ?>

        </form>

    </div>
</div>
<?php } ?>








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
           <a class="link-tag-button" href="<?php echo $website.'/workspace/teacher.php?edit=yes&upload=enabled&type=file-thumbnail&file='.$fileToEdit;?>">Update Thumbnail</a> 
        <?php } ?>

        <?php if ($pageName=='Workspace - Writer') {?>
           <a class="link-tag-button" href="<?php echo $website.'/workspace/writer.php?edit=yes&upload=enabled&type=featured-image&article='.$articleToEdit;?>">Update Featured Image</a>
        <?php } ?>

        <?php if ($pageName=='School Workspace - Researches') {?>
             <a class="link-tag-button" href="<?php echo $website.'/workspace/researches.php?edit=yes&upload=enabled&type=research-thumbnail&research='.$researchToEdit;?>">Update Thumbnail</a> 
        <?php } ?>

        <?php if ($pageName=='Workspace - Developer') {?>
             <a class="link-tag-button" href="<?php echo $website.'/workspace/developer.php?edit=yes&upload=enabled&type=tool-icon&tool='.$toolToEdit;?>">Update Icon</a> 
        <?php } ?>

    </div>
</div>





<?php //---------------------------FOR SUBSCRIPTION-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-subscription">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a>
        <form  method="post" action="../../private/includes/processing/subscription-processing.php" enctype="multipart/form-data" class="modal-subscription-form" id="modal-subscription-form">
                            <?php $stype = isset($_SESSION['type']) ? $_SESSION['type'] : "Tool";?>
                            <?php $duration = isset($_SESSION['duration']) ? $_SESSION['duration'] : "";?>

                             <div class="modal-subscription-head">
                                <small>Status: </small>
                                <?php if ($type=='Personal') {?>
                                    <?php if($toolSubscribed) { ?>
                                    <small>Tools- Active (<?php echo $subscriptionRemainingDaysTool.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingToolSubscription) { ?>
                                    <small>Tools- Pending</small>
                                    <?php } ?>

                                    <?php if(!$pendingToolSubscription && !$toolSubscribed) { ?>
                                    <small>Tools- Inactive</small>
                                    <?php } ?>
                                
                                    <?php if($sellerSubscribed) { ?>
                                    <small>Seller- Active (<?php echo $subscriptionRemainingDaysSeller.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingSellerSubscription) { ?>
                                    <small>Seller- Pending </small>
                                    <?php } ?>

                                    <?php if($teacherRegistration && !$pendingSellerSubscription && !$sellerSubscribed) { ?>
                                    <small>Seller- Inactive</small>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($type=='School') {?>
                                    <?php if($shelfSubscribed) { ?>
                                    <small>Shelf- Active (<?php echo $subscriptionRemainingDaysShelf.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingShelfSubscription) { ?>
                                    <small>Shelf- Pending</small>
                                    <?php } ?>

                                    <?php if(!$pendingShelfSubscription && !$shelfSubscribed) { ?>
                                    <small>Shelf- Inactive</small>
                                    <?php } ?>
                                <?php } ?>
                            </div>
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

                            <?php if(isset($_SESSION['empty-fields'])) {
                                echo "<div class='alert alert-danger' id='empty-fields'>All fields are required.</div>";
                                unset ($_SESSION['empty-fields']);
                            }?>
                            <?php if(isset($_SESSION['invalid-format'])) {
                                echo "<div class='alert alert-danger'>Only JPEG and JPG fomats are accepted.</div>";
                                unset ($_SESSION['invalid-format']);
                            }?>

                            <?php if(isset($_SESSION['tool-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for tools is not allowed this time.</div>";
                                unset ($_SESSION['tool-subscription-not-yet-allowed']);
                            }?>

                            <?php if(isset($_SESSION['file-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for files is not allowed this time.</div>";
                                unset ($_SESSION['file-subscription-not-yet-allowed']);
                            }?>


                            <?php if(isset($_SESSION['seller-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for seller is not allowed this time.</div>";
                                unset ($_SESSION['seller-subscription-not-yet-allowed']);
                            }?>

                            <?php if(isset($_SESSION['seller-registration-not-allowed'])) {
                                echo "<div class='alert alert-danger'>You are not allowed to subscribe as seller.</div>";
                                unset ($_SESSION['seller-registration-not-allowed']);
                            }?>

                            <?php if(isset($_SESSION['invalid-duration'])) {
                                echo "<div class='alert alert-danger'>Please enter a number only for the number of months.</div>";
                                unset ($_SESSION['invalid-duration']);
                            }?>

                            <?php if(isset($_SESSION['duration-not-in-range'])) {
                                echo "<div class='alert alert-danger'>Duration must be greater than or equal to 1.</div>";
                                unset ($_SESSION['duration-not-in-range']);
                            }?>

            

                            <input type="text" name="tool-subscription-list" value="<?php echo  $inSubscriptionToolList?>" hidden>
                            <input type="text" name="file-subscription-list" value="<?php echo  $inSubscriptionFileList?>" hidden>
                            <input type="text" name="seller-subscription-list" value="<?php echo  $inSubscriptionSellerList?>" hidden>
                            <input type="text" name="seller-subscription-list" value="<?php echo  $inSubscriptionShelfList?>" hidden>
                            <input type="text" name="teacher-registration" value="<?php echo  $teacherRegistration?>" hidden>
                            <input type="text" name="registrantIdHidden" value="<?php echo $registrantId?>" hidden>

                          
                            <select name="type">
                                <option value="" hidden selected>Subscription Type</option>
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
                            
                            
                            <input type="number" name="duration" placeholder="<?php if ($type=='Personal') {echo 'Number of Months';} if ($type=='School') {echo 'Number of Years';}?>" value="<?php echo $duration?>" min="1">
                            

                            <select name="paymentOptionName">
                                <option value="" hidden>Your Payment Option</option>
                                <option value="GCASH" <?php if ($paymentOptionName=='GCASH') {echo 'selected';}?>>GCASH</option>
                                <option value="Other" <?php if ($paymentOptionName=='Other') {echo 'selected';}?>>Other</option>
                            </select>
                            
                       
                            <input type="text" name="referenceNumber" placeholder="Your Reference Number" value="<?php echo $referenceNumber?>">
                            
                            <label for="proofOfPayment">Proof of Payment [JPEG or JPG format]</label>
                            <input type="file" name="proofOfPayment" value="<?php echo $proofOfPayment?>" id="payment-proof">

                            <?php if ($subscription!='disabled') {?>
                            <div class="cancel-submit-buttons-container">
                                <a href="<?php echo $website.'/account/';?>" class="cancel-button">Cancel</a>
                                <button type="submit" name="subscribeBtn" id="submit-subscription-button">Submit</button>
                            </div>
                            <?php } ?>
   
        </form> 
    </div>
</div>



<?php //---------------------------FOR SUBSCRIPTION-------------------------------------?>

<div class="modal website-modal website-modal-wrapper" id="modal-subscription-2">
    <div class="website-modal-content">
        <a class="close close-without-null-redirection">&times;</a>
        <form  method="post" action="../../private/includes/processing/subscription-processing.php" enctype="multipart/form-data" class="modal-subscription-form" id="modal-subscription-form-2">
                            <?php $stype = isset($_SESSION['type']) ? $_SESSION['type'] : "Tool";?>
                            <?php $duration = isset($_SESSION['duration']) ? $_SESSION['duration'] : "";?>

                             <div class="modal-subscription-head">
                                <small>Status: </small>
                                <?php if ($type=='Personal') {?>
                                    <?php if($toolSubscribed) { ?>
                                    <small>Tools- Active (<?php echo $subscriptionRemainingDaysTool.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingToolSubscription) { ?>
                                    <small>Tools- Pending</small>
                                    <?php } ?>

                                    <?php if(!$pendingToolSubscription && !$toolSubscribed) { ?>
                                    <small>Tools- Inactive</small>
                                    <?php } ?>
                                
                                    <?php if($sellerSubscribed) { ?>
                                    <small>Seller- Active (<?php echo $subscriptionRemainingDaysSeller.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingSellerSubscription) { ?>
                                    <small>Seller- Pending </small>
                                    <?php } ?>

                                    <?php if($teacherRegistration && !$pendingSellerSubscription && !$sellerSubscribed) { ?>
                                    <small>Seller- Inactive</small>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($type=='School') {?>
                                    <?php if($shelfSubscribed) { ?>
                                    <small>Shelf- Active (<?php echo $subscriptionRemainingDaysShelf.' Days';?>)</small>
                                    <?php } ?>

                                    <?php if($pendingShelfSubscription) { ?>
                                    <small>Shelf- Pending</small>
                                    <?php } ?>

                                    <?php if(!$pendingShelfSubscription && !$shelfSubscribed) { ?>
                                    <small>Shelf- Inactive</small>
                                    <?php } ?>
                                <?php } ?>
                            </div>
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

                            <?php if(isset($_SESSION['empty-fields'])) {
                                echo "<div class='alert alert-danger' id='empty-fields'>All fields are required.</div>";
                                unset ($_SESSION['empty-fields']);
                            }?>
                            <?php if(isset($_SESSION['invalid-format'])) {
                                echo "<div class='alert alert-danger'>Only JPEG and JPG fomats are accepted.</div>";
                                unset ($_SESSION['invalid-format']);
                            }?>

                            <?php if(isset($_SESSION['tool-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for tools is not allowed this time.</div>";
                                unset ($_SESSION['tool-subscription-not-yet-allowed']);
                            }?>

                            <?php if(isset($_SESSION['file-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for files is not allowed this time.</div>";
                                unset ($_SESSION['file-subscription-not-yet-allowed']);
                            }?>


                            <?php if(isset($_SESSION['seller-subscription-not-yet-allowed'])) {
                                echo "<div class='alert alert-danger'>Subscription for seller is not allowed this time.</div>";
                                unset ($_SESSION['seller-subscription-not-yet-allowed']);
                            }?>

                            <?php if(isset($_SESSION['seller-registration-not-allowed'])) {
                                echo "<div class='alert alert-danger'>You are not allowed to subscribe as seller.</div>";
                                unset ($_SESSION['seller-registration-not-allowed']);
                            }?>

                            <?php if(isset($_SESSION['invalid-duration'])) {
                                echo "<div class='alert alert-danger'>Please enter a number only for the number of months.</div>";
                                unset ($_SESSION['invalid-duration']);
                            }?>

                            <?php if(isset($_SESSION['duration-not-in-range'])) {
                                echo "<div class='alert alert-danger'>Duration must be greater than or equal to 1.</div>";
                                unset ($_SESSION['duration-not-in-range']);
                            }?>

            

                            <input type="text" name="tool-subscription-list" value="<?php echo  $inSubscriptionToolList?>" hidden>
                            <input type="text" name="file-subscription-list" value="<?php echo  $inSubscriptionFileList?>" hidden>
                            <input type="text" name="seller-subscription-list" value="<?php echo  $inSubscriptionSellerList?>" hidden>
                            <input type="text" name="seller-subscription-list" value="<?php echo  $inSubscriptionShelfList?>" hidden>
                            <input type="text" name="teacher-registration" value="<?php echo  $teacherRegistration?>" hidden>
                            <input type="text" name="registrantIdHidden" value="<?php echo $registrantId?>" hidden>

                          
                            <select name="type">
                                <option value="" hidden selected>Subscription Type</option>
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
                            
                            
                            <input type="number" name="duration" placeholder="<?php if ($type=='Personal') {echo 'Number of Months';} if ($type=='School') {echo 'Number of Years';}?>" value="<?php echo $duration?>" min="1">
                            

                            <select name="paymentOptionName">
                                <option value="" hidden>Your Payment Option</option>
                                <option value="GCASH" <?php if ($paymentOptionName=='GCASH') {echo 'selected';}?>>GCASH</option>
                                <option value="Other" <?php if ($paymentOptionName=='Other') {echo 'selected';}?>>Other</option>
                            </select>
                            
                       
                            <input type="text" name="referenceNumber" placeholder="Your Reference Number" value="<?php echo $referenceNumber?>">
                            
                            <label for="proofOfPayment">Proof of Payment [JPEG or JPG format]</label>
                            <input type="file" name="proofOfPayment" value="<?php echo $proofOfPayment?>" id="payment-proof">

                            <?php if ($subscription!='disabled') {?>
                            <div class="cancel-submit-buttons-container">
                                <a href="<?php echo $website.'/account/';?>" class="cancel-button">Cancel</a>
                                <button type="submit" name="subscribeBtn" id="submit-subscription-button-2">Submit</button>
                            </div>
                            <?php } ?>
   
        </form> 
    </div>
</div>









<?php //---------------------------FOR OTHER REGISTRATION-------------------------------------?>
<?php if (isset($_GET['other-registration'])){?>
<div class="modal website-modal website-modal-wrapper" id="modal-other-registration">
    <div class="website-modal-content"> 
        <a class="close close-with-null-redirection" href="<?php echo $nullRedirect ?>">&times;</a>
            <?php 
          
            $regType = isset($_GET['regtype']) ? $_GET['regtype'] : ""; 
            $allowedRegType = ['teacher','writer','editor','developer','researches'];
            $regTypeCap = ucfirst($regType); 
            $recordedRegistrationStatus='';
            $recordedRegistration='';

            if ($regType) {  
                if ($regType && !in_array($regType,$allowedRegType)) {
                    header ('Location:'.$website.'/account/?other-registration=enabled');
                }

                $checkRegistrant = "SELECT * FROM other_registrations WHERE otherUserId = $registrantId AND otherType='$regTypeCap'";
                $checkRegistrantResult = mysqli_query($conn,$checkRegistrant);
                $recordedRegistration = $checkRegistrantResult->fetch_assoc();

            
                if($recordedRegistration) {
                    $recordedRegistrationStatus= $recordedRegistration['otherStatus'];
                } 

            } ?>

            

            <form class="modal-other-registration-form" action="../../private/includes/processing/other-registration-processing.php" method="post" enctype="multipart/form-data" >
                <div class="modal-other-registration-navigation">
                    <?php if ($type=='Personal') {?>
                    <small>Register as:</small>
                    <?php } ?>

                    <?php if ($type=='School') {?>
                    <small>Register for:</small>
                    <?php } ?>

                    <?php //Show the registration button for a specific registration type if not chosen and if the registrant has no successful registration of the specific registration type.?>
                    <?php if ($type=='Personal') {?>

                    <?php if ($regType!='teacher' && !$teacherRegistration){?>
                    <a href="?other-registration=enabled&regtype=teacher" class="link-tag-button">Teacher</a>
                    <?php } ?>

                    <?php if ($regType=='teacher'){?>
                    <small >Teacher</small>
                    <?php } ?>

                    <?php if ($regType!='writer' && !$writerRegistration){?>
                    <a href="?other-registration=enabled&regtype=writer" class="link-tag-button">Writer</a>
                    <?php } ?>

                    <?php if ($regType=='writer'){?>
                    <small >Writer</small>
                    <?php } ?>
                    
                    <?php if ($regType!='editor' && !$editorRegistration){?>
                    <a href="?other-registration=enabled&regtype=editor" class="link-tag-button">Editor</a>
                    <?php } ?>

                    <?php if ($regType=='editor'){?>
                    <small >Editor</small>
                    <?php } ?>

                    <?php if ($regType!='developer' && !$developerRegistration){?>
                    <a href="?other-registration=enabled&regtype=developer" class="link-tag-button">Developer</a>
                    <?php } ?>

                    <?php if ($regType=='developer'){?>
                    <small>Developer</small>
                    <?php } ?>

                    <?php } ?>


                    <?php if ($type=='School') {?>
                        <?php if ($regType!='researches' && !$researchRepositoryRegistration){?>
                        <a href="?other-registration=enabled&regtype=researches" class="link-tag-button">Researches</a>
                        <?php } ?>

                        <?php if ($regType=='researches'){?>
                        <small >Researches</small>
                        <?php } ?>
                    <?php } ?>


                    <?php //If the registrant has all the other registrations, show the notification that no other registration is available.?>
                    <?php if ($haveAllRegistrations){?>
                    <small>[No other registration available]</small>
                    <?php } ?>


                </div>
                
                <?php 
                
                $dowloadLink = '';
                if ($regType == 'teacher') {
                    $dowloadLink =$website.'/downloadables/agreement-teacher.docx';
                }

                if ($regType == 'writer') {
                    $dowloadLink =$website.'/downloadables/agreement-writer.docx';
                }

                if ($regType == 'editor') {
                    $dowloadLink =$website.'/downloadables/agreement-editor.docx';
                }

                if ($regType == 'developer') {
                    $dowloadLink =$website.'/downloadables/agreement-developer.docx';
                }
                if ($regType == 'researches') {
                    $dowloadLink =$website.'/downloadables/agreement-school-researches.docx';
                }

                ?>
                <?php if ($regType && !$recordedRegistration) {?>
                <div class="modal-other-registration-navigation">
                    <a href="<?php echo $dowloadLink;?>" class="link-tag-button">Download Agreement Form <?php echo '['.ucfirst($regType).']';?></a>
                </div>
                <?php } ?>
                
                
                <?php 
                //If the registrant has a pending registration for a specific registration type, show the notification that the verification is ongoing.
                if($recordedRegistrationStatus=="Pending") {
                    echo "<div class='alert alert-danger'>It seems that you have a pending ".$regTypeCap." registration. Please wait for our update. Thanks!</div>";
                }
                //If the registrant has a successful registration for a specific registration type, show the notification that the registration is already approved.
                if($recordedRegistrationStatus=="Approved") {
                    if ($regType !='researches') {
                    echo "<div class='alert alert-danger'>It seems that you are registered as ".$regTypeCap." already.</div>";
                    }

                    if ($regType =='researches') {
                    echo "<div class='alert alert-danger'>It seems that you are registered for ".$regTypeCap." already.</div>";
                    }
                }?>

                <?php 
                if (isset($_SESSION ['license-certification-empty'])) {
                    echo "<div class='alert alert-danger'>Please provide a license or certification as ".$regTypeCap.".</div>";
                    unset ($_SESSION ['license-certification-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['license-certification-invalid-format'])) {
                    echo "<div class='alert alert-danger'>Only PDF format is accepted for a license or certification.</div>";
                    unset ($_SESSION ['license-certification-invalid-format']);
                }?>

                <?php 
                if (isset($_SESSION ['sample-empty'])) {
                    echo "<div class='alert alert-danger'>Please provide a url to your samples as ".$regTypeCap.".</div>";
                    unset ($_SESSION ['sample-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['agreement-empty'])) {
                    echo "<div class='alert alert-danger'>Please attach the agreement form for ".$regTypeCap.".</div>";
                    unset ($_SESSION ['agreement-empty']);
                }?>

                <?php 
                if (isset($_SESSION ['agreement-invalid-format'])) {
                    echo "<div class='alert alert-danger'>Only PDF format is accepted for the agreement.</div>";
                    unset ($_SESSION ['agreement-invalid-format']);
                }?>

           
                
                <div id="modal-other-registration-inputs-container">
                    <?php 
                    //If a registration type is chosen an there is no record of registration, show the required inputs.
                    if ($regType && !$recordedRegistration) { 
                        $inputType="";
                        $inputLabel = "";
                        $inputLabelFor="";
                        $fileName="";
                        $inputTitle="";
                        $inputId="";
                        $inputPlaceholder="";

                        if ($regType=='teacher') {
                        $inputType ="file";
                        $inputLabel = "License or Certification [PDF format]";
                        $inputLabelFor="licenseCertification";
                        $inputName="licenseCertification";
                        $inputTitle="License or Certification";
                        $inputId="license-certification";
                        $inputPlaceholder="License or Certification";
                        }

                        if ($regType=='writer' || $regType=='editor' || $regType=='developer' || $regType=='researches') {
                        $inputType ="text";
                        $inputLabel = "Sample (s)";
                        $inputLabelFor="sample";
                        $inputName="sample";
                        $inputTitle="Sample";
                        $inputId="sample";
                        $inputPlaceholder="URL to your sample/s...";
                        }


                    
                    ?>
                    <input type="text" name="regTypeHidden" value="<?php echo $regType?>" hidden>
                    <input type="text" name="regIdHidden" value="<?php echo $registrantId?>" hidden>
                    <input type="text" name="firstNameHidden" value="<?php echo $firstName?>" hidden>
                    <input type="text" name="lastNameHidden" value="<?php echo $lastName?>" hidden>
                     <input type="text" name="accountNameHidden" value="<?php echo $accountName?>" hidden>
                    
                     <?php if ($type=='Personal') {?>
                    <label for="<?php echo $inputLabelFor;?>"><?php echo $inputLabel;?></label>
                    <input type="<?php echo $inputType;?>" name="<?php echo $inputName;?>" title="<?php $inputTitle;?>" id="<?php echo $inputId;?>" placeholder="<?php echo $inputPlaceholder?>">
                    <?php } ?>
                    
                    <label for="agreement">Agreement [PDF format]</label>
                    <input type="file" name="agreement" title="Agreement Form" id="agreement" >
                    <?php }?>

                    
                    <?php //If a registration type is chosen an there is a record of registration, show the buttons redirecting to the registrant's uploaded files.
                    if ($recordedRegistration) { ?>
                    <div class="modal-other-registration-submitted-documents-container">
                       <small>Your Submissions: </small>
                        <?php if ($regType == 'teacher') {?>
                        <a href="<?php echo $privateFolder.$recordedRegistration['otherLicenseCertification']?>"class="link-tag-button">License or Certification</a>
                        <?php } ?>

                        <?php if ($regType == 'writer' || $regType == 'editor' || $regType == 'developer') {?>
                        <a href="<?php echo $recordedRegistration['otherSample']?>"class="link-tag-button">Sample (s)</a>
                        <?php } ?>
                     
                        <a href="<?php echo $privateFolder.$recordedRegistration['otherAgreement']?>"class="link-tag-button">Agreement</a>
                      </div>
                    <?php }?>  
                </div>
                
                <?php 
                //If a valid registration type is chosen and there is no record of registration, show the buttons.
                if ($regType && !$recordedRegistration) { ?>
                    <div class="cancel-submit-buttons-container" >
                        <a href="<?php echo $website.'/account/';?>" class="cancel-button">Cancel</a>
                        <button type="submit" name="register">Submit</button>
                    </div>
                <?php } ?>

            </form> 
   
    </div>
</div>
<?php } ?>





<?php //-----------------FOR SHOWING WORKSPACE LIST----------------------------- ?>
<?php if(isset($_GET['workspace'])) {?>
<div class="modal website-modal website-modal-wrapper" id="modal-workspace-list">
   <div class="website-modal-content"> 
        <a class="close close-without-null-redirection" href="<?php echo $nullRedirect ?>">&times;</a>
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
<?php } ?> 








 
        
    










