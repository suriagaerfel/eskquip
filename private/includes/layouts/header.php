<body>
        <input type="text" value="<?php echo $pageName;?>" hidden id="page-name">
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
                <div style="display: flex; gap:10px;">  
                    <button type="submit" class="search-button header-search-button " id="header-search-button">
                            <img src="<?php echo $website.'/assets/images/header-search.svg'?>" class="icon header-icon search-icon header-search-icon " title="Search" id="header-search-button">
                    </button>
                </div>
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

        
      
        

       

    






