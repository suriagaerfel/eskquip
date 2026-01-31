<body>
        <?php if ($pageName != 'Create Account' && $pageName != 'Login' && $pageName != 'Get Password Link') {?>
        <div class="header">
            <div class="logo-container">
                <a href="<?php echo $website;?>">
                    <img src="<?php echo $website.'/assets/images/EskQuip-new3.png';?>" alt="EskQuip logo" class="logo" title="EskQuip">
                </a>
            </div>

            <div class="page-navigation-container">
            <?php require (INCLUDESLAYOUT_PATH.'/header-page-navigation.php')?>
            </div>

            <?php if ($registrantId) {?>
            <div class="offline-note offline-note-header">
                <small class="small-text small-text-offline">Offline</small>
            </div>
            <?php } ?>

            
            <img src="<?php echo $website.'/assets/images/caret-down.svg'?>" class="icon header-icon show-mobile-navigation" id="show-mobile-navigation" onclick="toggleMobileTabletNavigation()">
    
            <img src="<?php echo $website.'/assets/images/caret-up.svg'?>" class="icon header-icon hide-mobile-navigation" id="hide-mobile-navigation" onclick="toggleMobileTabletNavigation()">
              
           
            <?php 
            $placeholder = '';
            ?>
            
            <?php if ($pageName !='Search'){ ?> 
           
            <div id="header-search-container" class="search-container">

                <?php $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;?>
                    
                    <?php if ($pageName=='Home' || $pageName=='My Account' || $pageName=='404 - Page Not Found'){
                        $placeholder = 'Search content...';
                    }?>

                    <?php if ($pageName=='Tools' || $pageName=='Articles' || $pageName=='Teacher Files' || $pageName=='Researches'){
                        $placeholder = 'Search in '.strtolower($pageName).'...';
                    }?>

                    
                    <?php if (str_contains($currentURL, '/articles/')){
                        $placeholder = 'Search in articles...';
                        $queryIn='articles';
                    }?>

                    <?php if (str_contains($currentURL, '/tools/')){
                        $placeholder = 'Search in tools...';
                        $queryIn='tools';
                    }?>

                    <?php if (str_contains($currentURL, '/teacher-files/')){
                        $placeholder = 'Search in teacher files...';
                        $queryIn='teacher-files';
                    }?>

                    <?php if (str_contains($currentURL, '/file-purchase/')){
                        $placeholder = 'Search in teacher files...';
                        $queryIn='teacher-files';
                    }?>

                    <?php if (str_contains($currentURL, '/researches/')){
                        $placeholder = 'Search in researches...';
                        $queryIn='researches';
                    }?>

                    <?php if (str_contains($currentURL, '/account/')){
                        $placeholder = 'Search in accounts...';
                        $queryIn='accounts';
                    }?>

                    <?php if ($u){
                        $placeholder = 'Search in accounts...';
                        $queryIn='accounts';
                    }?>
                    

                    
                    <?php if ($pageName=='Workspace - Developer') {
                        $placeholder = 'Search in my tools...';
                    }?>

                    <?php if ($pageName=='Workspace - Teacher') {
                        $placeholder = 'Search in my files...';
                    }?>

                    <?php if ($pageName=='Workspace - Writer') {
                        $placeholder = 'Search in my articles...';
                    }?>

                    <?php if ($pageName=='Workspace - Editor') {
                        $placeholder = 'Search in articles...';
                    }?>

                    <?php if ($pageName=='School Workspace - Researches') {
                        $placeholder = 'Search in my researches...';
                    }?>

                     <?php if ($pageName=='Workspace - Site Manager') {
                        $placeholder = 'Search in records...';
                    }?>

                    <?php if ($pageName=='Terms of Use') {
                        $placeholder = 'Search in articles...';
                    }?>

                    <?php if ($pageName=='Data Privacy') {
                        $placeholder = 'Search in articles...';
                    }?>

                    <?php if ($pageName=='About Us') {
                        $placeholder = 'Search in articles...';
                    }?>

                    <?php if ($pageName=='Messages') {
                        $placeholder = 'Search in messages...';
                    }?>

                    <?php if ($pageName=='Updates') {
                        $placeholder = 'Search in updates...';
                    }?>




                    <?php if ($pageName=='Login' || $pageName=='Create Account' || $pageName=='Get Password Link' || $pageName=='Change Password'){
                        $placeholder = 'Search in accounts...';
                    }?>

                    

                <?php 
                // $searchAction = "../../private/includes/processing/search-processing.php";
                // if ($pageName=='Workspace - Site Manager') {
                //     $searchAction = "../../private/includes/processing/search-processing.php";
                // }
                ?>
                <form action="../../private/includes/processing/search-processing.php" method="post" id="search-form" >
                    
                    <?php require (INCLUDESLAYOUT_PATH.'/search-conditions.php');?>
                   

                    <input type="search" name="query" value="<?php echo $query?>" placeholder="<?php echo $placeholder?>" class="input search-input header-search-input">

                    <button type="submit" class="search-button header-search-button ">
                        <img src="<?php echo $website.'/assets/images/header-search.svg'?>" class="icon header-icon search-icon header-search-icon " title="Search">
                    </button>
                </form>
            </div>
            <?php }?>

            <div id="account-container">

                    <?php if (!$loggedIn) {?>
                        <div id="account-not-loggedin">

                        <?php if ($pageName !='Login') { ?>

                        <a href="<?php echo $website.'/login/';?>" class="header-link">Login</a>

                        <?php } ?>

                        

                        <?php if ($pageName !='Create Account' && $pageName !='Login') {?>

                        <a class="header-link">/</a>

                        <?php } ?>

                        

                         <?php if ($pageName !='Create Account') {?>

                        <a href="<?php echo $website.'/create-account/';?>" class="header-link">Create Account</a>

                        <?php } ?>




                        

                        </div>
                        <?php } else {?>

                        <div id="account-loggedin">

                                <a href="<?php echo $website.'/updates/'?>"><img src="<?php echo $website.'/assets/images/update.svg'?>" class="header-icon" title="Updates"></a>
                                
                                <a href="<?php echo $website.'/messages/'?>"><img src="<?php echo $website.'/assets/images/message.svg'?>" class="header-icon" title="Messages"></a>
                               

                                <a href="<?php echo $website.'/account/'?>"><img src="<?=$profilePictureLink?>" class="header-icon header-profile-image" alt="<?php echo $accountName.' Profile Picture';?>"></a>

                                <span class="header-link"><?php echo $accountName?></span>
                                                             
                                
                                <form action="../../private/includes/processing/logout-processing.php" method="post" id="logout-form">
                                    <input type="text" name="fromURL" value="<?php echo $currentURL?>"hidden>

                                    <button type="submit" name="logout" title="Logout" class="logout-button internet-based">
                                        <img src="<?php echo $website.'/assets/images/logout.svg'?>" class="icon header-icon" title="Logout">
                                    </button>
                                </form>
                        
                        </div>


                        <?php } ?>

                    
            </div>


        </div>

        <div class="page-navigation-container-mobile-tablet" id="page-navigation-container-mobile-tablet">
            <?php require (INCLUDESLAYOUT_PATH.'/header-page-navigation.php')?>
        </div>
        
        
        
        <?php include ('website-modal.php');?>

        <?php } ?>
      
        

       

    






