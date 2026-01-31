  <?php 
    if (!$query) {

        $getDeveloperTools = "SELECT * FROM developer_tools WHERE developer_toolOwner = $registrantId ORDER BY developer_toolUpdateDate DESC";
    }

    if ($query) {

        $getDeveloperTools = "SELECT * FROM developer_tools WHERE developer_toolTitle LIKE '%$query%' AND developer_toolOwner = $registrantId ORDER BY developer_toolUpdateDate DESC";
    }

    $getDeveloperToolsResult = mysqli_query($conn,$getDeveloperTools);
    
    ?>



<div id="tools-developer" class="workspace-sidebar workspace-sidebar-content-list-container">
    <h5>Developer Workspace</h5>
    <hr>

    <?php if($getDeveloperToolsResult->num_rows > 0) { 
        while($developerTool=$getDeveloperToolsResult->fetch_assoc()) {
        $toolId = $developerTool ['developer_toolId'];
        $toolTitle = $developerTool ['developer_toolTitle'];
        $toolCategory = $developerTool ['developer_toolCategory'];
        $toolDescription = $developerTool ['developer_toolDescription'];
            if (strlen($toolDescription)>150) {
            $toolDescription = substr($toolDescription,0,150).'...';    
        } else {
        $toolDescription = $toolDescription; 
        }  
        
        $toolIcon = $developerTool ['developer_toolIcon'];
        $toolLink= $developerTool ['developer_toolLink'];
        $toolCreatedDate= $developerTool ['developer_toolCreatedDate'];
        $toolPubDate= $developerTool ['developer_toolPubDate'];
        $toolUpdateDate= $developerTool ['developer_toolUpdateDate'];
        $toolStatus = $developerTool ['developer_toolStatus'];

        $sqlToolFiles = "SELECT * FROM developer_uploaded_files WHERE developer_uploadedFileFolderId = '$toolId'";
        $sqlToolFilesResult = mysqli_query($conn,$sqlToolFiles);
        $toolFiles =$sqlToolFilesResult->fetch_assoc() ;

        ?>



    <p><?php echo 'Title: '.$toolTitle?></p>
    <p><?php echo 'Category: '. $toolCategory?></p>
    <p><?php echo 'Description: '.nl2br($toolDescription)?></p>
    <p><?php echo 'Status: '.$toolStatus?></p>
    <p><?php echo 'Created: '.dcomplete_format($toolCreatedDate)?></p>
    <?php if ($toolPubDate!='0000-00-00 00:00:00'){?>
    <p><?php echo 'Published: '.dcomplete_format($toolPubDate)?></p>
    <?php } ?>
    <p><?php echo 'Updated: '.dcomplete_format($toolUpdateDate)?></p>

    
    <?php if ($toolId!=$toolToEdit) {?>
        <div class="workspace-sidebar-content-list-buttons">         
            
            <a class="link-tag-button"href="<?php echo $website.'/workspace/developer.php?edit=yes&tool='.$toolId;?>" title="Edit">Edit</a>
            
            <?php if ($toolStatus=='Published') {?>
            <a class="link-tag-button" href="<?php echo $toolLink?>" title="View">View</a>
            <?php } ?>

            <?php if ($toolStatus!='Published') {?>
            <a class="link-tag-button" href="<?php echo $toolLink?>" title="Preview">Preview</a>
            <?php } ?>



            <?php if($toolStatus!="Published") {?>
                <?php if ($toolFiles && $toolIcon) {?>
                    <a class="link-tag-button" href="../../private/includes/processing/update-developer-tool-info-processing.php?publish=<?php echo $toolId?>" title="Publish">Publish</a>
            <?php }?>
            <?php } ?>

            <?php if($toolStatus=="Published") {?>
                <a class="link-tag-button" href="../../private/includes/processing/update-developer-tool-info-processing.php?unpublish=<?php echo $toolId?>"  title="Unpublish">Unpublish</a>
            <?php }?>
        </div>
        <?php if(!$toolFiles) {?>
        <small class="small-text">No file uploaded</small>
        <?php }?>

        <?php if(!$toolIcon) {?>
        <small class="small-text">No icon</small>
        <?php }?>
   
    <?php } ?>

    <?php if($toolToEdit ==$toolId ) {?>
    <small class="small-text">On edit mode</small>
    <?php }?>

    <hr>
        <?php } }?>
   

</div>