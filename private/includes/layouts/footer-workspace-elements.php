




<?php if (str_contains($currentURL, '/workspace/')){ ?>

      <?php if ($pageName !=='Workspace - Site Manager' && $pageName !=='Workspace - Data Analyst' && $pageName !=='Workspace - Funder') {?>
      <img src="<?php echo $website.'/assets/images/list.svg'?>" class="icon list-icon">
      <img src="<?php echo $website.'/assets/images/edit.svg'?>" class="icon edit-icon">
      <?php } ?>

      
      <div class="workspace-search-container-mobile-tablet">
            <form method="post" action="../../private/includes/processing/search-processing.php" class="workspace-page-search-form page-search-form">

                <?php require (INCLUDESLAYOUT_PATH.'/search-conditions.php');?>

                <input type="search" name="query" id="search-input" value="<?php echo htmlspecialchars($query);?>" placeholder="<?php echo $placeholder?>">

              
                <button type="submit" class="non-header-search-button"><img src="<?php echo $website.'/assets/images/search.svg'?>" class="search-icon non-header-search-icon"></button>
            </form>
        </div>
        
  <?php } ?>


