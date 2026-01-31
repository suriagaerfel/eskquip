<?php        
        if (!$query) {

            $sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleEditors = '' AND writer_articleStatus='Waiting for Update' ORDER BY writer_articleId DESC";

            if ($myEditsOnly) {
            $sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleEditors= '$registrantId' ORDER BY writer_articleUpdateDate DESC";  
            }

        }

        if ($query) {

            $sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleEditors = '' AND writer_articleStatus='Waiting for Update' AND writer_articleTitle LIKE '%$query%' ORDER BY writer_articleId DESC";

            if ($myEditsOnly) {
            $sqlArticles = "SELECT * FROM writer_articles WHERE writer_articleEditors= '$registrantId' AND writer_articleTitle LIKE '%$query%' ORDER BY writer_articleUpdateDate DESC";  
            }

        }
    
        $resultArticles = $conn->query($sqlArticles);
    ?>


<div id="articles-editor" class="workspace-sidebar workspace-sidebar-content-list-container">
    <h5>Editor Workspace</h5>
    <hr>
    <nav class="regtype-navigation-workspace-site-manager">
            <?php if (isset($_GET['my-edits-only'])){?>
                <a class="link-tag-button" href="<?php echo $website.'/workspace/editor.php';?><?php if ($query) {echo '?query='.urlencode($query);}?>">Show Not Edited</a>
            <?php } ?>
            <?php if (!isset($_GET['my-edits-only'])){?>
                <a class="link-tag-button" href="?<?php echo 'my-edits-only=yes';?><?php if ($query) {echo '&query='.urlencode($query);}?>">Show My Edits</a>
            <?php } ?>
    </nav>
    <hr>    
    <?php if($resultArticles->num_rows > 0) { 
        while($article=$resultArticles->fetch_assoc()) {
        $articleId = $article ['writer_articleId'];
        $articleTitle = $article ['writer_articleTitle'];
        $articleSlug = $article ['writer_articleSlug'];
        $articleCategory = $article ['writer_articleCategory'];
        $articleTopic = $article ['writer_articleTopic'];
        $articleWriter = $article ['writer_articleWriterId'];

        $sqlWriterInfo = "SELECT * FROM registrations WHERE registrantId = '$articleWriter'";
        $sqlWriterInfoResult = mysqli_query($conn,$sqlWriterInfo);
        $writerInfo = $sqlWriterInfoResult->fetch_assoc();

        if ($writerInfo) {
            $writerName = $writerInfo ['registrantAccountName'];
        }

        $articleStatus = $article ['writer_articleStatus'];
    ?>
            
   
    <p><?php echo 'Title: '.$articleTitle;?></p>
    <p><?php echo 'Category: '.$articleCategory;?></p>
    <p><?php echo 'Topic: '.$articleTopic;?></p>
    <p><?php echo 'Writer: '.$writerName;?></p>
    <p><?php echo 'Status: '.$articleStatus;?></p>

    
    
    <?php if($articleToEdit !=$articleId) {?>
        <div class="workspace-sidebar-content-list-buttons">
           <?php if (!$myEditsOnly) {?>
            <a class="link-tag-button"href="?<?php echo 'article='.$articleId;?><?php if ($query) {echo '&query='.urlencode($query);}?>" title="Open">Open</a>
            <?php } ?>

            <?php if($myEditsOnly){?>
                <a class="link-tag-button"href="?<?php echo 'my-edits-only=yes&article='.$articleId;?><?php if ($query) {echo '&query='.urlencode($query);}?>" title="Open">Open</a>
            <?php } ?>

            <?php if ($articleStatus=='Published') {?>
                <a class="link-tag-button" href="<?php echo $website.'/articles/'.$articleSlug;?>" title="View">View</a>
            <?php } ?>

            <?php if ($articleStatus!='Published') {?>
            <a class="link-tag-button" href="<?php echo $website.'/articles/'.$articleSlug.'?preview=yes';?>" title="Preview">Preview</a>
            <?php } ?>
        </div>
    <?php }?>
        
    <?php if($articleToEdit ==$articleId ) {?>
    <small class="small-text">On edit mode</small>
    <?php }?>

    <hr>
    <?php }} ?>
</div>