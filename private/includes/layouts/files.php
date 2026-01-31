<form  class="actual-workspace" method="post"  enctype="multipart/form-data" action="../../private/includes/processing/file-processing.php"> 
         
                <?php if (isset($_SESSION['empty-details'])){ 
                    echo "<div class=' pop-up-message alert alert-danger'>Please provide the required fields.</div>";
                    unset ($_SESSION['empty-details']);
                }?>

                
                <?php if (isset($_SESSION ['new-file-saved'])) {
                     echo "<div class='pop-up-message alert alert-success'>Your new file has been saved!</div>";
                     unset ($_SESSION ['new-file-saved']);
                }?>

                <?php if (isset( $_SESSION['file_saved'])) {
                     echo "<div class=' pop-up-message alert alert-success'>Your changes haved been saved!</div>";
                     unset ( $_SESSION['file_saved']);
                }?>

                 <?php if (isset( $_SESSION['invalid-file-format'])) {
                     echo "<div class='pop-up-message alert alert-danger'>Only PDF format is accepted this time!</div>";
                     unset ( $_SESSION['invalid-file-format']);
                }?>


                <?php if (isset( $_SESSION['image-updated-successfully'])) {
                     echo "<div class='pop-up-message alert alert-success'>File thumbnail has been updated successfully!</div>";
                     unset ( $_SESSION['image-updated-successfully']);
                }?>

                


    
    <div class="file-content-container">
        <div id="file-title-buttons-container">
                <input type="text" name="teacherIdHidden" value="<?php echo $registrantId?>" hidden>
                <input type="text" name="fileIdHidden" value="<?php echo $fileToEdit?>" id="file-hidden-id" hidden>
                <input type="text" name="fileStatus" value="<?php echo $status?>" hidden>

                <?php if(!$fileToEdit) {?>
                <input id="file-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>">
                <?php }?>

                <?php if($fileToEdit) {?>
                <input id="file-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>" hidden>
                
                <input id="file-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>" disabled>
                <?php }?>
                <?php if (!$fileToEdit) { ?>
                <input type="file" id="teacher-file" class="file-attachment" name="file">
                <?php } ?>
   

                <div class="workspace-buttons">
                <?php if ($fileToEdit) { ?>
                <input type="text" value="<?php echo $fileToEdit?>" name="fileId" hidden>
                <input type="text" value="<?php echo $status?>" name="fileStatus" hidden>
                <input type="text" value="<?php echo $title?>" name="fileTitle" hidden>
                <input type="text" value="<?php echo $slug?>" name="fileSlug" hidden>
            
                <?php if (!$image) {?>
                <a class="fileButtons <?php if (!$image) {echo 'to-update';}?>"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="update-file-thumbnail"></a>
                <?php } ?>

                 <?php if ($image) {?>
                    <a class="link-tag-button buttons"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="icons " title="Featured Image" id='show-image-button'></a>
                <?php } ?>

                <button type="submit" name="previewFile" class="fileButtons"><img src="<?php echo $website.'/assets/images/preview.svg'?>" class="icons" title="Preview"></button>

                <button type="submit" name="newFile" class="fileButtons"><img src="<?php echo $website.'/assets/images/new.svg'?>" class="icons" title="New"></button> 
                <?php } ?>
                </div>


        </div>

        <div id="file-category-access-type-amount-shared-with-container">
            <select name="category" id="file-category">
                    <option value="" selected hidden>Select Category</option>
                    <option value="Lesson Plan" <?php if ($category=='Lesson Plan') {echo 'selected';}?>>Lesson Plan</option>
                    <option value="Syllabus" <?php if ($category=='Syllabus') {echo 'selected';}?>>Syllabus</option>
                    <option value="Rubrics" <?php if ($category=='Rubrics') {echo 'selected';}?>>Rubrics</option>
                    <option value="Test" <?php if ($category=='Test') {echo 'selected';}?>>Test</option>
                    <option value="Presentation" <?php if ($category=='Presentation') {echo 'selected';}?>>Presentation</option>
            </select>

            <select name="accessType" id="file-access-type">
                    <option value="" selected hidden>Access Type</option>
                    <option value="Free" <?php if ($accessType=='Free') {echo 'selected';}?>>Free</option>

                   <?php if ($sellerSubscribed) {?>
                    <option value="Purchased" <?php if ($accessType=='Purchased') {echo 'selected';}?>>Purchased</option>
                    <?php } ?>
            </select>
            
            <input type="text" placeholder="Amount" name="amount" value="<?php echo $amount?>" hidden>

            <?php if ($accessType=='Purchased') {?>
            <input type="text" placeholder="Amount" name="amount" id="file-amount" value="<?php echo $amount?>" id="file-amount">
            <?php } ?>

            <input type="text" id="file-shared-with" placeholder="Share this file with..." name="sharedWith" value="<?php echo $sharedWith?>">


        </div>

             
            <textarea id="file-description" type="text" name="description" placeholder="Description"><?php echo $description;?></textarea>

            <?php 
            $buttonLable = $fileToEdit ? "Update": "Save";
            $buttonName = $fileToEdit ? "saveFile" : "saveFile";
            ?>

            <?php if($status !='Published') {?>
            <button type="submit" name="<?php echo $buttonName?>"><?php echo $buttonLable?></button>
            <?php } ?>


    </div> 



    <?php if ($fileToEdit) {?>
    <div id="file-actions-container" class="workspace-actions-container">
   
                <?php if ($fileToEdit) { ?>
                <div class="workspace-action-versions">
                </div>
                
                <div class="workspace-action-notes">

                    <?php if ($_SESSION [$specificFileDescription] != $db_description) {?>
                        <small class="small-text actual-workspace-small-text">Changes on description not saved</small>
                    <?php } ?>

                    <?php if (!$image) { ?>
                        <small class='small-text actual-workspace-small-text'>No thumbnail</small>
                    <?php }?>
                    
                    <?php if ($sellerSubscribed){?>
                        <?php if (!$paymentChannel || !$bankAccountName ||!$bankAccountNumber || !$reviewSchedules || !$amount) {?>

                            <?php 

                            $toUpdate = [];

                            if (!$paymentChannel) {
                                array_push( $toUpdate,'Payment Channel');
                            }

                            if (!$bankAccountName) {
                                array_push( $toUpdate,'Bank Account Name');
                            }

                            if (!$bankAccountNumber) {
                                array_push( $toUpdate,'Bank Account Number');
                            }

                            if (!$reviewSchedules) {
                                array_push( $toUpdate,'Review Schedules');
                            }

                            if (!$amount) {
                                array_push( $toUpdate,'Amount');
                            }
                                
                            ?>
                            <small class="small-text actual-workspace-small-text">Not updated: <?php echo implode(',', $toUpdate);?></small>
                        <?php } ?>

                    <?php } ?>

                </div>

                <div class="workspace-action-buttons">
                    
                    <?php if($status!="Published" && $image) {?>
                    <a class="link-tag-button" id="file-publish-button">Publish</a>
                    <?php }?>

                    <?php if($status=="Published") {?>
                    <a class="link-tag-button" id="file-unpublish-button">AJAX Unpublish</a>
                    <?php }?>

                    <?php if ($sellerSubscribed ) {?>
                    <?php if($forSale=="Not for Sale" && $status=="Published" && $accessType=='Purchased' && $filledOutSellingDetails && $amount) {?>
                    <a class="link-tag-button" id="file-sell-button">AJAX Sell</a>
                    <?php }?>
                    <?php if($forSale=="For Sale") {?>
                    <a class="link-tag-button" id="file-unsell-button">AJAX Unsell</a>
                    <?php }?>

                    <?php } ?>
                    
                    <?php if ($status != 'Published') {?>
                    <a class="link-tag-button" id="confirm-delete-button">Delete</a> 
                    <?php } ?>

                </div>

                <?php }?>

        
    </div>
    <?php } ?>

</form>
