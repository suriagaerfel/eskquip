<form  class="actual-workspace" method="post"  enctype="multipart/form-data" action="../../private/includes/processing/tool-processing.php"> 
         <?php if (isset($_SESSION['empty-details'])){  
                    echo "<div class='alert alert-danger'>Please provide the required fields.</div>";
                    unset ($_SESSION['empty-details']);
                } ?>


                
                <?php if (isset($_SESSION ['new-tool-saved'])) {
                     echo "<div class='alert alert-success'>Your new file has been saved!</div>";
                     unset ($_SESSION ['new-tool-saved']);
                }?>

                <?php if (isset( $_SESSION['tool-saved'])) {
                     echo "<div class='alert alert-success'>Your changes haved been saved!</div>";
                     unset ( $_SESSION['tool-saved']);
                }?>

                 
                <?php if (isset( $_SESSION['empty-details'])) {
                     echo "<div class='alert alert-danger'>All fields are required.</div>";
                     unset ( $_SESSION['empty-details']);
                } ?>


                <?php if (isset( $_SESSION['tool-exists'])) {
                     echo "<div class='alert alert-danger'>A tool with the same name exists.</div>";
                     unset ( $_SESSION['tool-exists']);
                }?>

                <?php if (isset( $_SESSION['empty-file'])) {
                     echo "<div class=' alert alert-danger'>Please attach a file to upload.</div>";
                     unset ( $_SESSION['empty-file']);
                }?>

                <?php if (isset( $_SESSION['file-exists'])) {
                     echo "<div class=' alert alert-danger'>The file the with the same name already exists.</div>";
                     unset ( $_SESSION['file-exists']);
                }?>


                <?php if (isset( $_SESSION['invalid-tool-file-format'])) {
                     echo "<div class='pop-up-message alert alert-danger'>Only programming file formats are accepted!</div>";
                     unset ( $_SESSION['invalid-tool-file-format']);
                }?>

                <?php if (isset( $_SESSION['tool-doesnt-exist'])) {
                     echo "<div class='pop-up-message alert alert-danger'>It seems that the tool has been deleted backend!</div>";
                     unset ( $_SESSION['tool-doesnt-exist']);
                }?>


                <?php if (isset( $_SESSION['upload-successful'])) {
                     echo "<div class='pop-up-message alert alert-success'>File uploaded successfully!</div>";
                     unset ( $_SESSION['upload-successful']);
                }?>

           
    <?php if ($toolToEdit) {?>
    <div class="workspace-info-and-buttons">
            <div  class="workspace-info">
                <?php if ($toolToEdit) {?>
                    <a href="<?php echo $toolLinkEdit?>">
                        <?php echo 'URL: '.$toolLinkEdit?>
                    </a>
                
                <?php } ?>

            </div>


            <div  class="workspace-buttons">               

                    <?php if ($toolToEdit) { ?>
                    <input type="text" name="filePathHidden" value="<?php echo $fileLink?>" hidden>
                    <input type="text" name="fileIdHidden" value="<?php echo  $fileId?>" hidden>
                    
                    <?php if (!$image) {?>
                    <a class="fileButtons <?php if (!$image) {echo 'to-update';}?>"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="update-tool-icon"></a>
                    <?php } ?>

                    <?php if ($image) {?>
                        <a class="link-tag-button buttons"><img src="<?php echo $website.'/assets/images/image.svg'?>" class="icons " title="Featured Image" id='show-image-button'></a>
                    <?php } ?>

            
                    <input type="text" hidden value="<?php echo $toolLink?>" name="toolLinkHidden">

                    <button type="submit" name="previewTool" class="fileButtons">
                        <img src="<?php echo $website.'/assets/images/preview.svg'?>" class="icons" title="Preview">
                    </button>

                    <button type="submit" name="newTool" class="fileButtons">
                        <img src="<?php echo $website.'/assets/images/new.svg'?>" class="icons" title="New Tool">
                    </button> 
                    
                    <?php } ?>
            
        
            </div>


    </div>
    <?php } ?>


            
    <div class="tool-content-container">
            <?php $sqlToolFiles = "SELECT * FROM developer_uploaded_files WHERE developer_uploadedFileFolderId = '$toolToEdit'";
            $sqlToolFilesResult = mysqli_query($conn,$sqlToolFiles);    ?>

            <?php if($toolToEdit) {?>
                <?php if ($sqlToolFilesResult->num_rows > 0) {?>
                <table class="list-table">
                    <thead>
                        <tr>
                            <th>Timestamp</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if($sqlToolFilesResult->num_rows >0) {
                    while ($toolFiles = $sqlToolFilesResult->fetch_assoc()) { 
                    $toolFileId = $toolFiles ['developer_uploadedFileId'];
                    $toolFileTimestamp = $toolFiles ['developer_uploadedFileTimestamp'];
                    $toolFileLink = $toolFiles ['developer_uploadedFileLink']; ?>
                        <tr>
                            <td><?php echo $toolFileTimestamp?></td>
                            <td><?php echo basename($toolFileLink) ?></td>
                            <td id="tool-file-actions">
                                <?php if($status!="Published") {?>
                                <a class="link-tag-button" href="<?php echo $website.'/tools/tool-editor.php?tool='.$toolToEdit.'&tool-file='.$toolFileId;?>">Edit</a>
                               
                                <a class="link-tag-button" href="?<?php echo 'edit=yes&tool='.$toolToEdit.'&tool-file='.$toolFileId.'&confirm-delete=enabled';?>">Delete</a>

                                <a class="link-tag-button" id="<?php echo 'tool-file-'.$toolFileId;?>">AJAX Delete</a>

                                <?php } ?>

                                <?php if($status=="Published") {?>
                                <small>Please unpublish to enable buttons.</small>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php }}?>
                    
                    </tbody>
    
                </table>

                <?php } ?>
           
                <div id="dev-file-upload-container">
                    <input id="file-upload-dev" type="file" name="file" title="Select">
                    <input type="text" name='toolLinkHidden' value="<?php echo $toolLinkEdit?>"hidden>
                    <input type="text" name='toolIdHidden' value="<?php echo $toolToEdit?>"hidden>
                    <button type="submit" name="uploadToolFile" class="fileButtons"><img src="<?php echo $website.'/assets/images/upload.svg'?>" class="icons" title="Upload File"></button>
                </div>

            <?php } ?>

            
  
                
                <div id="tool-title-category-container">
                    <input  type="text" name="developerIdHidden" value="<?php echo $registrantId?>" hidden>
                    <input  type="text" name="toolIdHidden" value="<?php echo $toolToEdit?>" hidden>

                    <?php if (!$toolToEdit) {?>
                    <input id="tool-title" type="text" name="title" id="" placeholder="Title" value="<?php echo $title?>">
                    <?php } ?>

                    <?php if ($toolToEdit) {?>
                    <input id="tool-title" type="text" name="title" id="" placeholder="Title" value="<?php echo $title?>" hidden>
                    <input id="tool-title" type="text" name="title" id="" placeholder="Title" value="<?php echo $title?>" disabled>
                    <?php } ?>
   
                    <select name="category" id="tool-category">
                        <option value="" selected hidden>Select Category</option>
                        <option value="Mathematics" <?php if ($category=='Mathematics') {echo 'selected';}?>>Mathematics</option>
                        <option value="Science" <?php if ($category=='Science') {echo 'selected';}?>>Science</option>
                        <option value="Language" <?php if ($category=='Language') {echo 'selected';}?>>Language</option>
                        <option value="Arts" <?php if ($category=='Arts') {echo 'selected';}?>>Arts</option>
                    </select>

                </div>
                
               <textarea id="tool-description" type="text" name="description" placeholder="Description" ><?php echo $description;?></textarea>
               <?php if ($status!='Published') {?>
               <?php if (!$toolToEdit){?>
                    <button type="submit"  name="createTool">Create Tool</button>
                <?php } ?>
                <?php if ($toolToEdit){?>
               <button name="saveTool">Update</button>
               <?php } ?>
               <?php } ?>
     
    </div>
    
    <?php if ($toolToEdit) {?>
    <div  class="workspace-actions-container">
        <div class="workspace-action-versions">

        </div>
        <div class="workspace-action-notes">
            <?php if ($_SESSION[$specificToolDescription] != $db_description) {?>
                <small class="small-text actual-workspace-small-text article-notes">Changes on description not saved</small>
            <?php } ?>

            <?php if (!$image) {?>
                <small class="small-text actual-workspace-small-text article-notes">No icon</small>
            <?php } ?>

            <?php if ($sqlToolFilesResult->num_rows ==0) {?>
                <small class="small-text actual-workspace-small-text article-notes">No file uploaded</small>
            <?php } ?>

        </div>
        <div class="workspace-action-buttons">
                <?php if($status=="Published") {?>
                <a class="link-tag-button" href="../../private/includes/processing/update-developer-tool-info-processing.php?unpublish=<?php echo $toolToEdit?>"  title="Unpublish">Unpublish</a>
                <?php }?>


                <?php if ($status !='Published') {?>
                <?php if ($sqlToolFilesResult->num_rows >0 && $image) {?> 
                <a class="link-tag-button" href="../../private/includes/processing/update-developer-tool-info-processing.php?publish=<?php echo $toolToEdit?>" title="Publish">Publish</a>
                <?php } ?>

                <a class="link-tag-button" href="?edit=yes&tool=<?php echo $toolToEdit?>&confirm-delete=enabled" title="Delete">Delete</a>

                <a class="link-tag-button" id="confirm-delete-button">AJAX Delete</a>
                <?php } ?>
        </div>

              

           
    </div>
    <?php } ?>

      



</form>
