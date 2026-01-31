<?php 

$title = htmlspecialchars($pageName);

$sqlPageArticle = "SELECT * FROM writer_articles WHERE writer_articleTitle = '$title'";
$sqlPageArticleResult = mysqli_query($conn,$sqlPageArticle);
$pageArticle = $sqlPageArticleResult-> fetch_assoc();

if ($pageArticle) {
    $articleTitle = $pageArticle ['writer_articleTitle'];
    $articleContent = $pageArticle ['writer_articleContent'];
    $articleStatus = $pageArticle ['writer_articleStatus'];
} 


?>







<div class="page-details page-details-single-sidebar"> 
        
        <div class="individual-content"> 
        <?php if ($pageArticle) {?> 
            <?php if ($articleStatus == 'Published') {?>
            <h1><?php echo $articleTitle?></h1>
            <hr>
            <div><?php echo $articleContent?></div>
            <?php } ?>

            <?php if ($articleStatus != 'Published') {?>
             <h1><?php echo $articleTitle;?></h1>
             <hr>
             <p>[Found but not published]</p>
            <?php } ?>
        <?php } ?>

        <?php if (!$pageArticle) {?>
            <h1><?php echo $articleTitle;?></h1>
             <hr>
            <p>[Not found]</p>
        <?php } ?>
        </div>

        <hr>

    <div class="page-links-container">
        <span>Read : </span>

        <?php if ($pageName != 'Terms of Use') {?>
        <a href="<?php echo $website.'/terms-of-use/'?>"><strong>Terms of Use</strong></a>
        <?php } ?>

        <?php if ($pageName != 'Data Privacy') {?>
        <a href="<?php echo $website.'/data-privacy/'?>"><strong>Data Privacy</strong></a>
        <?php } ?>

        <?php if ($pageName != 'About Us') {?>
        <a href="<?php echo $website.'/about-us/'?>"><strong>About Us</strong></a>
        <?php } ?>
    </div>


    </div>