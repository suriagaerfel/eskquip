<form  class="actual-workspace" method="post"  enctype="multipart/form-data" action="../../private/includes/processing/research-processing.php"> 
     
    <div class="research-content-container">
      
                <?php if (isset($_SESSION['empty-details'])){  
                    echo "<div class='alert alert-danger'>Please provide the required fields.</div>";
                    unset ($_SESSION['empty-details']);
                } ?>
      
                <?php if (isset($_SESSION ['new-research-saved'])) {
                     echo "<div class='alert alert-success'>Your new research has been saved!</div>";
                     unset ($_SESSION ['new-research-saved']);
                }?>

                <?php if (isset( $_SESSION['research-saved'])) {
                     echo "<div class='alert alert-success'>Your changes haved been saved!</div>";
                     unset ( $_SESSION['research-saved']);
                }?>

                 <?php if (isset( $_SESSION['invalid-file-format'])) {
                     echo "<div class='alert alert-danger'>Only PDF format is accepted this time!</div>";
                     unset ( $_SESSION['invalid-file-format']);
                }?>

                <?php if (isset( $_SESSION['image-updated-successfully'])) {
                     echo "<div class='pop-up-message alert alert-success'>Research thumbnail has been updated successfully!</div>";
                     unset ( $_SESSION['image-updated-successfully']);
                }?>
            
                <div class="title-attachment-buttons-container">
                    <input id="school-id"type="text" name="schoolIdHidden" value="<?php echo $registrantId?>" hidden>

                    <input id="school-id"type="text" name="researchIdHidden" value="<?php echo $researchToEdit?>" hidden>

                    <?php if(!$researchToEdit) {?>
                    <input id="research-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>">
                    <?php }?>

                    <?php if($researchToEdit) {?>
                    <input id="research-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>" hidden>
                    
                    <input id="research-title"type="text" name="title" placeholder="Title" value="<?php echo $title?>" disabled>
                    <?php }?>
                    <?php if (!$researchToEdit) { ?>
                    <input type="file" id="research-file" class="attachment" name="file">
                    <?php } ?>

                    <div class="workspace-buttons">
                    <?php if ($researchToEdit) { ?>
                    <input type="text" value="<?php echo $researchToEdit?>" name="researchId" hidden>
                    <input type="text" value="<?php echo $status?>" name="researchStatus" hidden>
                    <input type="text" value="<?php echo $title?>" name="researchTitle" hidden>
                    <input type="text" value="<?php echo $slug?>" name="researchSlug" hidden>

                   <?php if (!$image) {?>
                    <a class="fileButtons <?php if (!$image) {echo 'to-update';}?>"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="update-research-thumbnail"></a>
                    <?php } ?>
                  

                    <?php if ($image) {?>
                    <a class="link-tag-button buttons"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="icons " title="Featured Image" id='show-image-button'></a>
                    <?php } ?>

                    <button type="submit" name="previewResearch" class="fileButtons"><img src="<?php echo $website.'/assets/images/preview.svg'?>" class="icons" title="Preview"></button>

                    <button type="submit" name="newResearch" class="fileButtons"><img src="<?php echo $website.'/assets/images/new.svg'?>" class="icons" title="New"></button> 
                    <?php } ?>
                    </div>


                </div>

                <div class="date-category-proponents-container" >
                    <div class="date-categorycontainer">
                    <input type="date" name="date" id="research-date" value="<?php echo $date?>">
                    <select name="category" id="research-category">
                            <option value="" selected hidden>Select Category</option>
                            <option value="Descriptive" <?php if ($category=='Descriptive') {echo 'selected';}?>>Descriptive</option>
                            <option value="Correlational" <?php if ($category=='Correlational') {echo 'selected';}?>>Correlational</option>
                            <option value="Experimental" <?php if ($category=='Experimental') {echo 'selected';}?>>Experimental</option>
                            <option value="Causal-comparative" <?php if ($category=="Causal-comparative") {echo 'selected';}?>>Causal-comparative </option>
                            <option value="Case Study" <?php if ($category=='Case Study') {echo 'selected';}?>>Case Study</option>
                    </select>
                    </div>
                    <div class="proponents-container">
                    <input type="text" name="proponents" id="research-proponents" value="<?php echo $proponents?>" placeholder="Proponents">
                    </div>

            </div>
              
            <textarea id="research-abstract" type="text" name="abstract" placeholder="Abstract"><?php echo $abstract?></textarea>

            <?php 
            $buttonLable = $researchToEdit ? "Update": "Save";
            $buttonName = $researchToEdit ? "saveResearch" : "saveResearch";
            ?>

            <?php if($status != 'Published') {?>
            <button type="submit" name="<?php echo $buttonName?>"><?php echo $buttonLable?></button>
            <?php } ?>

    </div> 

    <?php if ($researchToEdit) { ?>
    <div id="research-actions-container" class="workspace-actions-container">

            <div class="workspace-action-versions">

            </div>

            <div class="workspace-action-notes">
                <?php if ($_SESSION[$specificResearchAbstract] != $db_abstract) {?>
                        <small class="small-text actual-workspace-small-text">Changes on abstract not saved</small>
                    <?php } ?>
                <?php if($status!="Published") {?>
                    <?php if (!$image) {?>
                        <small class="small-text actual-workspace-small-text">No thumbnail</small>
                    <?php } ?>
                <?php }?>
            </div>

            <div class="workspace-action-buttons">
                <?php if($status!="Published") {?>
                <?php if ($image) {?>
                <a class="link-tag-button" href="../../private/includes/processing/update-school-research-info-processing.php?publish=<?php echo $researchToEdit?>" title="Publish">Publish</a>
                <?php } ?>


                <?php }?>

                <?php if($status=="Published") {?>
                <a class="link-tag-button" href="../../private/includes/processing/update-school-research-info-processing.php?unpublish=<?php echo $researchToEdit?>"  title="Unpublish">Unpublish</a>
                <?php }?>
                
                <?php if ($status !='Published') {?>
                <a class="link-tag-button" href="?edit=yes&research=<?php echo $researchToEdit?>&confirm-delete=enabled" title="Delete">Delete</a> 

                 <a class="link-tag-button" id="confirm-delete-button">AJAX Delete</a> 
                <?php } ?>
            
            </div> 
    </div>
                <?php }?>
            
        
    
   

      



</form>
