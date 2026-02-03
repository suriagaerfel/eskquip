<?php


require '../../private/initialize.php'; 

$pageName = "Search";

require (INCLUDESLAYOUT_PATH.'/head.php');

// if (!$queryIn) {
//     header('Location:'.$website.'/search/?query='.$query.'&query-in=general-contents');
// }

// $allowedQueryIns = ['articles','teacher-files','researches','tools','accounts','general-contents'];

// if ($queryIn && !in_array($queryIn,$allowedQueryIns)) {
//     header('Location:'.$website.'/search/?query='.$query.'&query-in=general-contents');
// }


?>




    <?php require (INCLUDESLAYOUT_PATH.'/header.php'); ?>
    <?php require(INCLUDESLAYOUT_PATH.'/loading.php')?>

    <div id="search-page" class="page with-sidebars-page with-single-sidebar-page">
        

        <div class="page-details page-details-single-sidebar">

            <div class="search-page-search-container">
                <p id="query-heading"></p>
               <div style="display: flex; gap:10px;">
                    <input type="search" id="search-page-query" value="<?php echo htmlspecialchars($query);?>" placeholder="Type to search...">
                </div>
                <input type="search" id="query-in" hidden>
 
            </div>
            <div id="search-results-filter">
                
                    <small>Filtered by: </small>

                    
                    
                    <a class="link-tag-button filter-button" id="filter-teacher-files-button">TEACHER FILES</a>
                  
                    <small id="filter-teacher-files-indicator" class="indicator"><strong>TEACHER FILES</strong></small>
                    

                    <a class="link-tag-button filter-button" id="filter-articles-button">ARTICLES</a>
                  
                    <small id="filter-articles-indicator" class="indicator"><strong>ARTICLES</strong></small>
                   

                    
                    <a class="link-tag-button filter-button" id="filter-researches-button">RESEARCHES</a>
                  
                    <small id="filter-researches-indicator" class="indicator"><strong>RESEARCHES</strong></small>


                    <a class="link-tag-button filter-button" id="filter-tools-button">TOOLS</a>
                  
                    <small id="filter-tools-indicator" class="indicator"><strong>TOOLS</strong></small>


                    <small>|</small>
                    

                    <a class="link-tag-button filter-button" id="filter-accounts-button">ACCOUNTS</a>
                  
                    <small id="filter-accounts-indicator" class="indicator"><strong>ACCOUNTS</strong></small>
                
                


            </div>

            <hr>
            <div id="search-results">

            </div>

            

            

        </div>
    
        <?php require (INCLUDESLAYOUT_PATH.'/promotional-sidebar.php');?>

        


    </div>


    <?php require (INCLUDESLAYOUT_PATH.'/footer-scripts.php');?>

</body>
</html>
