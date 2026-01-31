

<form  class="actual-workspace" id="actual-workspace-writer-editor" method="post"  action="../../private/includes/processing/article-processing.php">  
    

    <div id="article-info-and-buttons" class="workspace-info-and-buttons" style="margin-top:50px;">
            <div id="article-show-elements-buttons-container">
                <small class="link-tag-button" id="show-article-details-button">Show Details</small>
                <small class="link-tag-button" id="hide-article-details-button">Hide Details</small>
                <div class="notes-mobile-tablet article-notes-mobile-tablet">
                
                    <?php if ($articleToEdit) {?>
                        
                    <?php if ($pageName=='Workspace - Writer') {?>
                     
                        <small id="article-changes-status-mobile-tablet" class="small-text actual-workspace-small-text ">Changes on content not saved</small>
                     

                        <?php if (!$image) { ?>
                        <small class='small-text actual-workspace-small-text article-notes-mobile-tablet no-featured-image-mobile-tablet'>No featured image</small>
                        <?php }?>

                    <?php } ?>

                    <?php } ?>
                </div>
            </div>
            <br>
            <div id="article-info" class="workspace-info">
                <?php if ($pageName=="Workspace - Writer"){?>
               
                <input type="text" name="writerIdHidden" value="<?php echo $registrantId;?>" hidden id="writer-id-hidden">  
                <input type="text" name="writerFullNameHidden" value="<?php echo $accountName;?>" hidden id="writer-fullname-hidden"> 

                <input type="text" name="articleIdHidden" value="<?php echo $articleToEdit;?>" hidden id="article-id-hidden" class="autosave-detail">
                
                <input type="text" name="latestVersion" value="<?php echo $latestVersion;?>" hidden id="latest-version-hidden">
                <input type="text" name="setVersion" value="<?php echo $setVersion;?>" hidden id="set-version-hidden">
                <input type="text" name="versionNumber" value="<?php echo $versionNumber;?>" hidden id="version-number-hidden">
            
                
                <input type="text" name="title" placeholder="Title" autocomplete="off" spellcheck="false" value="<?php echo $title;?>" hidden class="autosave-detail">  

                <input type="text" name="title" placeholder="Title" autocomplete="off" spellcheck="false" value="<?php echo $title;?>" id="article-title" <?php if ($articleToEdit) {echo 'disabled';}?> class="autosave-detail">  
                
                
                
                <div class="article-category-topic-container">
                <select name="category" id="article-category" class="autosave-detail">
                            <option value="" selected hidden>Select Category</option>
                            <option value="News" <?php if ($category=='News') {echo 'selected';}?>>News</option>
                            <option value="Tutorial" <?php if ($category=='Tutorial') {echo 'selected';}?>>Tutorial</option>
                            <option value="Trivia" <?php if ($category=='Trivia') {echo 'selected';}?>>Trivia</option>
                            <option value="Opinion" <?php if ($category=='Opinion') {echo 'selected';}?>>Opinion</option>
                            <option value="Administrative" <?php if ($category=='Administrative') {echo 'selected';}?>>Administrative</option>
                </select>
                        
                <input type="text"  name="topic" placeholder="Topic (s)" autocomplete="off" spellcheck="false" value="<?php echo $topic;?>"id="article-topic" class="autosave-detail">
                </div>
            <?php }?>

            <?php if ($pageName=="Workspace - Editor"){?>
                <input type="text" value="<?php echo $title;?>" disabled>
            <?php }?>

        </div>

        <div  class="workspace-buttons" id="article-buttons">
                <?php if($pageName == "Workspace - Writer" && !$isReviewed && $status !='Published'){?>
        
                    <input type="text" name="editing" value="<?php echo $editing?>" hidden id="editing-mode-hidden">

                    <button type="submit" name="saveArticle" class="fileButtons"><img src="<?php echo $website.'/assets/images/save.svg'?>" class="icons" title="Save Article"></button> 

                <?php } ?>

                
                
                <?php if($articleToEdit){?>
                
                    <input type="text" value="<?php echo $articleToEdit?>" name="articleId" hidden>
                    <input type="text" value="<?php echo $status?>" name="articleStatus" hidden>
                    <input type="text" value="<?php echo $title?>" name="articleTitle" hidden>
                    <input type="text" value="<?php echo $slug?>" name="articleSlug" hidden>
                
                    <?php if ($pageName=="Workspace - Writer"){?>

                    <input type="text" name="articleId" value="<?php echo $articleToEdit?>" hidden>

                    <?php if (!$image) {?>
                    <a class="fileButtons <?php if (!$image) {echo 'to-update';}?>"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="update-featured-image"></a>
                    <?php } ?>

                    <?php if ($image) {?>
                    <a class="link-tag-button buttons"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="icons " title="Featured Image" id='show-image-button'></a>
                    <?php } ?>

                    <button type="submit" name="previewArticle" class="fileButtons"><img src="<?php echo $website.'/assets/images/preview.svg'?>" class="icons" title="Preview"></button>

                    <button type="submit" name="newArticleWriter" class="fileButtons"><img src="<?php echo $website.'/assets/images/new.svg'?>" class="icons" title="New Article"></button>

                    <?php } ?>

                    <?php if ($pageName=="Workspace - Editor"){?>
                    <button type="submit" name="previewArticle" class="fileButtons"><img src="<?php echo $website.'/assets/images/preview.svg'?>" class="icons" title="Preview"></button>

                    <button type="submit" name="newArticleEditor" class="fileButtons"><img src="<?php echo $website.'/assets/images/new.svg'?>" class="icons" title="New Edit"></button>
                    <?php } ?>

                <?php } ?>
                
          
        </div>


    

    </div>

       
    <div id="article-content-container" class="workspace-content-container">
                <?php if (isset($_SESSION['empty-details'])){
                    echo "<div class='alert alert-danger'>Title, Category and Topic are required.</div>";
                    unset ($_SESSION['empty-details']);
                }?>

                 <?php if (isset($_SESSION['editing-existing-article-not-allowed'])){   
                    echo "<div class='alert alert-danger'>Open the existing article to edit.</div>";
                    unset ($_SESSION['editing-existing-article-not-allowed']);
                }?>

                <?php if (isset($_SESSION['article-exists'])){   
                    echo "<div class='alert alert-danger'>An articlewith the same title already exists.</div>";
                    unset ($_SESSION['article-exists']);
                }?>

                <?php if (isset($_SESSION['no-edits'])){
                    echo "<div class='alert alert-danger'>You did not make any changes.</div>";
                    unset ($_SESSION['no-edits']);
                }?>

                <?php if (isset( $_SESSION['article-saved'])) {
                     echo "<div class='alert alert-success'>Your changes haved been saved!</div>";
                     unset ( $_SESSION['article-saved']);
                }?>

                <?php if (isset($_SESSION ['new-article-saved'])) {
                     echo "<div class='alert alert-success'>Your new article has been saved!</div>";
                     unset ($_SESSION ['new-article-saved']);
                }?>

                <?php if (isset($_SESSION ['empty-comments'])) {
                    echo "<div class='alert alert-danger'>Please enter a comment.</div>";
                    unset($_SESSION ['empty-comments']);
                }?> 


     
        <textarea id="summernote" class="article-content autosave-detail"  autocomplete="off" spellcheck="false" name="content">
            <?php echo $content;?>
        </textarea>
        
        <?php if ($articleToEdit) {?>
            <textarea type="text" id="article-content-actual"><?php echo $db_content?></textarea>
            <textarea type="text" id="article-content-session"><?php echo $_SESSION[$specificArticleContent]?></textarea>
        <?php } ?>

        <input type="text" id="sample-input">


        <div class="comment-section">
            <?php if($pageName == "Workspace - Writer") {?>
            <?php if ($comments) {?>
                <small>Comment (s) :</small>
                <small id="comment"><?php echo nl2br($comments)?></small>
            <?php } ?>
            <?php }?>

            <?php if ($pageName=="Workspace - Editor"){?>
            <?php if ($editorId==$registrantId) {?>
            <?php if ($status=='Waiting for Update') { ?>
                <input type="text" name="articleIdHidden" value="<?php echo $articleToEdit;?>"hidden> 
                <input type="text" name="editorIdHidden" value="<?php echo $registrantId;?>"hidden> 
                <input type="text" name="comments" id="comment-input" placeholder="Comment(s)" value="<?php echo $comments;?>">
                <button type="submit" name="saveComment" class="fileButtons">
                    Submit Comment
                </button> 
             <?php } ?>
             <?php } ?>
            <?php }?>

        </div>

    </div> 




    <?php if ($articleToEdit) {?>
    <div id="article-actions-container" class="workspace-actions-container">
            
                <div class="workspace-action-versions">
                    <?php if ($pageName == 'Workspace - Writer') {?>
                    <small>Version:</small>
                    
                    <?php if ($versionNumber > 1 && $versionNumber > $latestVersion - (5-1)) { ?>

                    <button type="submit" name="undoChanges" class="fileButtons link-tag-button">
                        <?php echo $versionNumber-1?>
                    </button> 
                    <?php } ?>

                    <strong>
                        <?php echo $versionNumber; ?>
                    </strong>
                    
                    <?php if ($setVersion && $setVersion < $latestVersion) {?>
                    <button type="submit" name="redoChanges" class="fileButtons link-tag-button">
                        <?php echo $versionNumber+1?>
                    </button> 
                    <?php } ?>

                    <?php } ?>

                </div>
           
                <div class="workspace-action-notes article-notes-desktop-laptop">
                    <?php if ($pageName == 'Workspace - Writer') {?>
                        <?php if ($_SESSION[$specificArticleContent] !== $db_content) {?>
                            <small id="article-changes-status-desktop-laptop" class="small-text actual-workspace-small-text article-notes">Changes on content not saved</small>
                        <?php } ?>

                        <?php if ($isReviewed) {?>
                        <small id="article-changes-status-desktop-laptop" class="small-text actual-workspace-small-text article-notes">Under editorial review</small>
                        <?php } ?>
                            
                        <?php if (!$image) { ?>
                                <small class='small-text actual-workspace-small-text no-featured-image-desktop-laptop article-notes'>No featured image</small>
                        <?php }?>
                    <?php } ?>

                </div>
                
                <div class="workspace-action-buttons">
                    <?php if ($pageName == 'Workspace - Writer') {?>
                
                        <?php if ($status!="Published") {?>
        
                            <?php if (!$isReviewed) {?>
                            <a class="link-tag-button" href="../../private/includes/processing/update-article-info-processing.php?for-review=<?php echo $articleToEdit;?>" title="Get Review">Get Review</a>
                        
                           

                            <a class="link-tag-button" id="confirm-delete-button">Delete</a> 

                            
                            <?php if ($status == 'Draft' || $status == 'Ok' || $status == 'Unpublished') {?>
                                <a class="link-tag-button" href="../../private/includes/processing/update-article-info-processing.php?publish=<?php echo $articleToEdit;?>" title="Publish">Publish</a>
                            <?php } ?>
                            
                            
                            <?php } ?>
            

                        <?php }?>

                        <?php if ($status=="Published") {?>
                            <a class="link-tag-button" href="../../private/includes/processing/update-article-info-processing.php?unpublish=<?php echo $articleToEdit;?>" title="Unpublish">Unpublish</a>
                        <?php }?>  
                    
                    <?php }?>
            
                    <?php if ($pageName=="Workspace - Editor") {?>
                        <?php if (!$isPinned) {?>
                            <a class="link-tag-button" href="../../private/includes/processing/pin-article-processing.php?pin=<?php echo $articleToEdit;?>&editor-userid=<?php echo $registrantId;?>&status=<?php echo $status;?>" title="Pin this article">Pin</a>
                        <?php }?>

                        <?php if ($isPinned) { ?>
                            <?php if( $status=="Waiting for Update" ) {?>
                                <a class="link-tag-button" href="../../private/includes/processing/reviewing-article-processing.php?approve=<?php echo $articleToEdit;?>&editor-userid=<?php echo $registrantId;?>" title="Approve">
                                    Approve
                                </a>
                            <?php } ?>
    
                            <a class="link-tag-button" href="../../private/includes/processing/pin-article-processing.php?unpin=<?php echo $articleToEdit;?>&status=<?php echo $status;?>" title="Unpin">Unpin</a>
                        <?php }?>
                    <?php } ?>
                </div>
    </div>
    <?php } ?>



<?php if ($pageName == 'Workspace - Editor' && !$articleToEdit) { ?>
<div class="workspace-page">
    Please select an article to edit.
</div>
<?php } ?>

</form>






