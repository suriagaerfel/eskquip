                    <?php if ($pageName == 'Workspace - Site Manager') {?>

                    <?php if(isset($_GET['recordtype'])) { ?>
                    <input type="search" name="recordtype" value="<?php echo $recordType?>" hidden>
                    <input type="search" name="regtype" value="<?php echo $regType?>" hidden>
                    <input type="search" name="substype" value="<?php echo $subsType?>" hidden>
                    <input type="search" name="promotype" value="<?php echo $promoType?>" hidden>

                    <input type="search" name="recordStatus" value="<?php echo $recordStatus?>" hidden>
                    <?php } ?>
                    <?php } ?>

                    <?php if ($pageName == 'Workspace - Writer') {?>
                    <input type="search" name="articleId" value="<?php echo $articleToEdit?>" hidden>
                    <input type="search" name="setVersion" value="<?php echo $setVersion?>" hidden>
            
                    <?php } ?>


                    <?php if ($pageName == 'Workspace - Editor') {?>
                    <input type="search" name="articleId" value="<?php echo $articleToEdit?>" hidden>

                    <input type="search" name="editorId" value="<?php echo $registrantId?>"hidden>
            
                    <?php } ?>

                    <?php if ($pageName == 'Workspace - Teacher') {?>
                    <input type="search" name="fileId" value="<?php echo $fileToEdit?>" hidden>
            
                    <?php } ?>

                    <?php if ($pageName == 'Workspace - Developer') {?>
                    <input type="search" name="toolId" value="<?php echo $toolToEdit?>" hidden>
            
                    <?php } ?>

                    <?php if ($pageName == 'School Workspace - Researches') {?>
                    <input type="search" name="researchId" value="<?php echo $researchToEdit?>" hidden>
            
                    <?php } ?>



                    <input type="search" name="pageName" value="<?php echo $pageName?>" hidden>
                    <input type="search" name="page" value="<?php echo $page?>" hidden>
                    <input type="search" name="queryIn" value="<?php echo $queryIn?>" hidden>
                    <input type="search" name="query" value="<?php echo $query?>" placeholder="<?php echo $placeholder?>" hidden>