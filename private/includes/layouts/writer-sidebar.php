<?php  //Get the articles for the writer.

$writerId = $registrantId;

if (!$query) {
$sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleWriterId = $writerId ORDER BY writer_articleUpdateDate DESC";
}


if ($query) {
$sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleTitle LIKE '%$query%' AND writer_articleWriterId = $writerId ORDER BY writer_articleUpdateDate DESC";
}



$resultArticles = $conn->query($sqlArticles);

?>

<div id="articles-writer" class="workspace-sidebar workspace-sidebar-content-list-container">
    <h5>Writer Workspace</h5>
    <hr>
    <?php if($resultArticles->num_rows > 0) { 
        while($article=$resultArticles->fetch_assoc()) {
            $articleId = $article ['writer_articleId'];
            $articleTitle = $article ['writer_articleTitle'];
            $articleFeaturedImage = $article ['writer_articleImage'];
            $articleSlug = $article ['writer_articleSlug'];
            $articleCategory = $article ['writer_articleCategory'];
            $articleTopic = $article ['writer_articleTopic'];
            $articleEditor = $article ['writer_articleEditors'];
            $articleWriteDate = $article ['writer_articleWriteDate'];
            $articlePubDate = $article ['writer_articlePubDate'];
            $articleUpdateDate = $article ['writer_articleUpdateDate'];
            $articleStatus = $article ['writer_articleStatus'];




            $articleVersion = $article ['writer_articleContentLatestVersionNumber'];

            $sqlarticleVersions = "SELECT * FROM writer_article_versions WHERE writer_articleVersionForeignId = $articleId AND writer_articleVersionNumber = $articleVersion";
            $sqlarticleVersionsResult = mysqli_query($conn,$sqlarticleVersions);
            $articleVersions = $sqlarticleVersionsResult -> fetch_assoc();

            if ($articleVersions) {
                $articleContent = trim($articleVersions ['writer_articleVersionContent']);
            }

            $contentChangesNotSaved = false;
            $articleContentSession = "article_{$articleId}_content";
          

            if (isset($_SESSION [$articleContentSession])) {
                if ($_SESSION [$articleContentSession] != $articleContent) {
                    $contentChangesNotSaved = true;
                } 
            }

                


            
            $review='';

            if ($articleStatus=="Waiting for Update") {
                $review = "yes";
            }
           
            if ($articleEditor) {
            $sqlEditorInfo = "SELECT * FROM registrations WHERE registrantId='$articleEditor'";
            $sqlEditorInfoResult= mysqli_query($conn,$sqlEditorInfo);
            $editorInfo = $sqlEditorInfoResult->fetch_assoc(); 
                if ($editorInfo) {
                    $editorName = $editorInfo['registrantAccountName'];
                } 
            }
            ?>
    
    <p><?php echo 'Title: '. $articleTitle;?></p>
    <p><?php echo 'Category: '.$articleCategory;?></p>
    <p><?php echo 'Topic: '.$articleTopic;?></p>

    <?php if($articleEditor){?>
    <p><?php echo 'Editor: '.$editorName?></p>
    <?php }?>
    <p><?php echo 'Written: '.dcomplete_format($articleWriteDate);?></p>
    <?php if ($articlePubDate!='0000-00-00 00:00:00'){?>
    <p><?php echo 'Published: '.dcomplete_format($articlePubDate);?></p>
    <?php } ?>
    <p><?php echo 'Updated: '.dcomplete_format($articleUpdateDate);?></p>
    <p><?php echo 'Status: '.$articleStatus;?></p>
    
    <?php if($articleToEdit !=$articleId ) {?>
    <div class="workspace-sidebar-content-list-buttons">

            <?php if ($articleStatus!="Published" && !$review) {?>
            <a class="link-tag-button"href="?edit=yes&article=<?php echo $articleId;?>" title="Edit">Edit</a>
            
             <a class="link-tag-button" href="<?php echo $website.'/articles/'.$articleSlug.'?preview=yes';?>" title="View">Preview</a>
          
            <?php }?>
           
            
            <?php if ($articleStatus=="Published") {?>
            <a class="link-tag-button" href="<?php echo $website.'/articles/'.$articleSlug;?>" title="View">View</a>
            <?php }?>
        </div>

        <?php if(!$articleFeaturedImage) {?>
                <small class="small-text">No featured image</small>
        <?php }?>

        <?php if($contentChangesNotSaved) {?>
            <small class="small-text">Changes on content not saved</small>
        <?php }?>

         <?php if($review) {?>
            <small class="small-text">Under editorial review</small>
        <?php }?>

        <?php }?>
    

        <?php if($articleToEdit ==$articleId ) {?>
            <small class="small-text">On edit mode</small>
        <?php }?>

    <hr>

    <?php }} ?>
</div>