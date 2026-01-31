<?php 
if (!$query) {
    $getSchoolResearches = "SELECT * FROM school_researches WHERE school_researchUploader = $registrantId ORDER BY school_researchUpdateDate DESC";
}
if ($query) {
    $getSchoolResearches = "SELECT * FROM school_researches WHERE school_researchTitle LIKE '%$query%' AND school_researchUploader = $registrantId ORDER BY school_researchUpdateDate DESC";
} 
$getSchoolResearchesResult = mysqli_query($conn,$getSchoolResearches);
?>

<div class="workspace-sidebar workspace-sidebar-content-list-container">
    <h5>School Workspace - Researches</h5>
    <hr>
    <?php if($getSchoolResearchesResult->num_rows > 0) { 
        while($schoolResearch=$getSchoolResearchesResult->fetch_assoc()) {
        $researchId = $schoolResearch ['school_researchId'];
        $researchTitle = $schoolResearch ['school_researchTitle'];
        $researchSlug = $schoolResearch ['school_researchSlug'];
        $researchCategory = $schoolResearch['school_researchCategory'];
        $researchAbstract = $schoolResearch['school_researchAbstract'];
        $researchThumbnail = $schoolResearch['school_researchImage'];
        
        if (str_word_count($researchAbstract)>$word_limit) {
            $researchAbstract = limit_words($researchAbstract,$word_limit).'...';    
        } else {
        $researchAbstract = $researchAbstract; 
        }
        $researchDate = $schoolResearch ['school_researchDate'];
        $researchUploadDate = $schoolResearch ['school_researchUploadDate'];
        $researchLiveDate = $schoolResearch ['school_researchLiveDate'];
        $researchUpdateDate = $schoolResearch ['school_researchUpdateDate'];
        $researchStatus = $schoolResearch ['school_researchStatus'];

        ?>

    <p><?php echo 'Title: '.$researchTitle;?></p>
    <p><?php echo 'Category: '. $researchCategory?></p>
    <p><?php echo 'Abstract: '.nl2br($researchAbstract)?></p>
    <p><?php echo 'Finished: '.dcomplete_format($researchDate)?></p>
    <p><?php echo 'Uploaded: '.dcomplete_format($researchUploadDate)?></p>
    <?php if ($researchLiveDate !='0000-00-00 00:00:00'){?>
    <p><?php echo 'Live: '.dcomplete_format($researchLiveDate)?></p>
    <?php } ?>
     <p><?php echo 'Updated: '.dcomplete_format($researchUpdateDate)?></p>
    <p><?php echo 'Status: '.$researchStatus?></p>

    
    <?php if ($researchId!=$researchToEdit) {?>
        <div class="workspace-sidebar-content-list-buttons">         
                <?php if ($researchStatus !='Published') {?>
                <a class="link-tag-button"href="<?php echo $website.'/workspace/researches.php?edit=yes&research='.$researchId?>" title="Edit">Edit</a>
                <?php } ?>

                <?php if($researchStatus=='Published') { ?>
                <a class="link-tag-button" href="<?php echo $website.'/researches/'.$researchSlug;?>" title="View">View</a>
                <?php } ?>

                <?php if($researchStatus!='Published') { ?>
                    <a class="link-tag-button" href="<?php echo $website.'/researches/'.$researchSlug.'?preview=yes';?>" title="Preview">Preview</a>
                <?php } ?>

                <?php if($researchStatus!="Published") {?>
                    <?php if ($researchThumbnail) {?>
                        <a class="link-tag-button" href="../../private/includes/processing/update-school-research-info-processing.php?publish=<?php echo $researchId?>" title="Publish">Publish</a>
                    <?php } ?>
                <?php }?>

                <?php if($researchStatus=="Published") {?>
                    <a class="link-tag-button" href="../../private/includes/processing/update-school-research-info-processing.php?unpublish=<?php echo $researchId?>" title="Unpublish">Unpublish</a>
                <?php }?>
        </div>
        <?php if (!$researchThumbnail) {?>
            <small class="small-text">No thumbnail</small>
        <?php } ?> 

    <?php } ?>

    <?php if($researchToEdit ==$researchId ) {?>
        <small class="small-text">On edit mode</small>
    <?php }?>

    <hr>
        <?php } }?>
   

</div>