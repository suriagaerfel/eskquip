
<?php 

$adQuery= isset($_GET['adQuery']) ? htmlspecialchars($_GET['adQuery']) : '';


if (!$adQuery) {
$sqlPromotions = "SELECT * FROM promotions WHERE promotionStatus='Published' ORDER BY promotionId DESC LIMIT 1";
$sqlPromotionsResult = mysqli_query($conn,$sqlPromotions);
}

if ($adQuery) {
$sqlPromotions = "SELECT * FROM promotions WHERE promotionStatus='Published' AND promotionTitle LIKE '%$adQuery%' ORDER BY promotionId DESC LIMIT 1";
$sqlPromotionsResult = mysqli_query($conn,$sqlPromotions);
}


?>



<img src="<?php echo $website.'/assets/images/caret-up.svg'?>" class="icon header-icon show-mobile-sidebar">

<div id="promotional-sidebar">
    

<?php if($pageName !='Search') {?>

<form method="get" id="ad-search-form">
    <input type="search" name="adQuery" placeholder="Search an ad..." value="<?php if ($adQuery) {echo $adQuery;}else {echo '';}?>">
</form>

<?php } ?>


<?php if ($sqlPromotionsResult->num_rows > 0) { 
while ($promotionList = $sqlPromotionsResult->fetch_assoc()) { 
$promotionListImage = $privateFolder.$promotionList ['promotionImage'];
$promotionListLink = $promotionList ['promotionLink'];
$promotionListTitle = $promotionList ['promotionTitle'];
?>

<a href="<?php echo $promotionListLink;?>"><img src="<?php echo $promotionListImage;?>" class="sidebar-display-image"></a>
<?php } }?>




<?php if ($sqlPromotionsResult->num_rows == 0) {  ?>
<div style="display: flex; justify-content:center;">
    <p>No ad found!</p>
</div>
<?php } ?>


<div  class="account-notes">
   
    <?php if ($pageName=='Tools' || str_contains($currentURL,'/tools/')) { ?> 
        <?php if ($loggedIn && $type=='Personal'){ ?>
        <?php if ($toolSubscribed) {?>
            <small class="small-text">Your tool subscription is active until <?php echo $subscriptionExpiryTool;?>
            <?php echo ' ['.$subscriptionRemainingDaysTool.' days left]';?>.</small><br>
        <?php } ?>

        <?php if ($pendingToolSubscription) {?>
            <small class="small-text">Your tool subscription is currently pending.</small><br>
        <?php } ?>

         <?php if (!$toolSubscribed && !$pendingToolSubscription) {?>
            <a href="<?php echo $website.'/account/?subscription=enabled'?>" class="link-tag-button">Subscribe For Tools</a>
        <?php } ?>
      

        <?php if (!$developerRegistration) {?>
        <a href="<?php echo $website.'/account/?other-registration=enabled&regtype=developer';?>" class="link-tag-button">Register As Developer</a>
        <?php } ?>

        <?php if ($developerRegistration) {?>
        <a href="<?php echo $website.'/workspace/developer.php';?>" class="link-tag-button">Upload A Tool</a>
        <?php } ?>
        <?php } ?>

        <?php if ($loggedIn && $type=='School') {?>
            <small class="small-text">Use personal account to use tools.</small><br>
        <?php } ?>

        <?php if (!$loggedIn) {?>
        <small class="small-text">Tools are disabled when logged out.</small><br>
        <div style="display: inline;">
            <a href="<?php echo $website.'/login/';?>" class="link-tag-button sidebar-link">Login</a>
            <small>/</small>
            <a href="<?php echo $website.'/create-account/';?>" class="link-tag-button sidebar-link">Create Account</a>
        </div>
        <?php } ?>
      

    <?php } ?>

    <?php if ($pageName=='Teacher Files' || str_contains($currentURL,'/teacher-files/')) { ?>
        <?php if ($loggedIn) {?>

        <?php if($type=='Personal') {?>
        <?php if ($teacherRegistration) {?>
        <?php if ($sellerSubscribed) {?>
            <small class="small-text">Your seller subscription is active until <?php echo $subscriptionExpirySeller;?>
            <?php echo ' ['.$subscriptionRemainingDaysSeller.' days left]';?>.</small><br>
        <?php } ?>

        <?php if ($pendingSellerSubscription) {?>
            <small class="small-text">Your seller subscription is currently pending.</small><br>
        <?php } ?>

        <?php if (!$sellerSubscribed && !$pendingSellerSubscription) {?>
            <a href="<?php echo $website.'/account/?subscription=enabled'?>" class="link-tag-button">Subscribe For Seller</a>
        <?php } ?>

            <a href="<?php echo $website.'/workspace/teacher.php'?>" class="link-tag-button">Upload A File</a>

            <?php if ($fileInfo && $fileOwnerId == $registrantId) {?>
            <?php if ($fileStatus=='Published') {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-teacher-file-info-processing.php?unpublish='.$fileId;?>" class="link-tag-button internet-based">Unpublish This File</a>
            <?php } ?>
            <?php if ($fileStatus!='Published') {?>
            <?php if ($fileImage) {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-teacher-file-info-processing.php?publish='.$fileId;?>" class="link-tag-button internet-based">Publish This File</a>
            <?php } ?>

            <?php if (!$fileImage) {?>
                <a href="<?php echo $website.'/workspace/teacher.php?edit=yes&upload=enabled&type=file-thumbnail&file='.$fileId;?>" class="link-tag-button">Update Thumbnail</a>
            <?php } ?>

             <a href="<?php echo $website.'/workspace/teacher.php?edit=yes&file='.$fileId;?>" class="link-tag-button">Edit This File</a>



            <?php } ?>
        <?php } ?>

        <?php } ?>

        <?php if (!$teacherRegistration) {?>
            <a href="<?php echo $website.'/account/?other-registration=enabled&regtype=teacher';?>" class="link-tag-button">Register As Teacher</a>
        <?php } ?>
        
        


        <?php } ?>

    <?php } ?>
    
    <?php } ?>





    <?php if ($pageName=='Articles' || str_contains($currentURL,'/articles/')) { ?>
        <?php if ($loggedIn) {?>

        <?php if ($type=='Personal') {?>
        <?php if ($writerRegistration) {?>
             <a href="<?php echo $website.'/workspace/writer.php'?>" class="link-tag-button">Write An Article</a>
        <?php } ?>

        <?php if ($articleInfo && $articleWriterId == $registrantId) {?>
            <?php if ($articleStatus=='Published') {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-article-info-processing.php?unpublish='.$articleId;?>" class="link-tag-button internet-based">Unpublish This Article</a>
            <?php } ?>
            <?php if ($articleStatus!='Published') {?>
            <?php if ($articleImage) {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-article-info-processing.php?publish='.$articleId;?>" class="link-tag-button internet-based">Publish This Article</a>
            <?php } ?>

            <?php if (!$articleImage) {?>
            <a href="<?php echo $website.'/workspace/writer.php?edit=yes&upload=enabled&type=featured-image&article='.$articleId;?>" class="link-tag-button">Update Featured Image</a>
            <?php } ?>

            <a href="<?php echo $website.'/workspace/writer.php?edit=yes&article='.$articleId;?>" class="link-tag-button">Edit This Article</a>

            <?php } ?>

        <?php } ?>

        <?php if (!$writerRegistration) {?>
            <a href="<?php echo $website.'/account/?other-registration=enabled&regtype=writer';?>" class="link-tag-button">Register As Writer</a>
        <?php } ?>

        <?php if ($editorRegistration) {?>
             <a href="<?php echo $website.'/workspace/editor.php'?>" class="link-tag-button">Edit An Article</a>
        <?php } ?>

        <?php if (!$editorRegistration) {?>
            <a href="<?php echo $website.'/account/?other-registration=enabled&regtype=editor';?>" class="link-tag-button">Register As Editor</a>
        <?php } ?>
        <?php } ?>

    <?php } ?>
    
    <?php } ?>



    <?php if ($pageName=='Researches' || str_contains($currentURL,'/researches/')) { ?>
        <?php if ($loggedIn) {?>

        <?php if ($type=='School') {?>

        <?php if ($researchesRegistration) {?>
             <a href="<?php echo $website.'/workspace/researches.php'?>" class="link-tag-button">Upload A Research</a>
        <?php } ?>

        <?php if (!$researchesRegistration) {?>
            <a href="<?php echo $website.'/account/?other-registration=enabled&regtype=researches';?>" class="link-tag-button">Register For Researches</a>
        <?php } ?>

        <?php if ($researchInfo && $researchUploaderId == $registrantId) {?>
            <?php if ($researchStatus=='Published') {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-school-research-info-processing.php?unpublish='.$researchId;?>" class="link-tag-button internet-based">Unpublish This Research</a>
            <?php } ?>
            <?php if ($researchStatus!='Published') {?>
            
            <?php if ($researchImage) {?>
            <a href="<?php echo $website.'../../private/includes/processing/update-school-research-info-processing.php?publish='.$researchId;?>" class="link-tag-button internet-based">Publish This Research</a>
            <?php } ?>

            <?php if (!$researchImage) {?>
            <a href="<?php echo $website.'/workspace/researches.php?edit=yes&upload=enabled&type=research-thumbnail&research='.$researchId;?>" class="link-tag-button">Update Thumbnail</a>
            <?php } ?>

    
            <a href="<?php echo $website.'/workspace/researches.php?edit=yes&research='.$researchId;?>" class="link-tag-button">Edit This Research</a>
     

            <?php } ?>
        <?php } ?>

        <?php } ?>

        

    <?php } ?>
    
    <?php } ?>


    
    <?php if (!$loggedIn && $pageName!='Tools') {?>
        <div style="display: flex;">
        <a href="<?php echo $website.'/login/';?>" class="link-tag-button">Login</a>
        <small>/</small>
        <a href="<?php echo $website.'/create-account/';?>" class="link-tag-button">Create Account</a>
        </div>
    <?php } ?>




 </div>

   
<img src="<?php echo $website.'/assets/images/caret-down.svg'?>" class="icon sidebar-icon hide-mobile-sidebar">
    

    



</div>

