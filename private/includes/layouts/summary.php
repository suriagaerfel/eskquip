<?php 


$queryBaseCount = '';
$queryBaseRecords = '';
$matchedUserId='';

if (!$recordType) {
    if ($query) {
        $sqlQueryUsernameMatch = "SELECT * FROM  registrations WHERE registrantUsername = '$query'";
            $sqlQueryUsernameMatchResult = mysqli_query($conn,$sqlQueryUsernameMatch);
            $queryUsernameMatch = $sqlQueryUsernameMatchResult->fetch_assoc();

            if ($queryUsernameMatch) {
                $matchedUserId = $queryUsernameMatch ['registrantId'];
            } 
    }

}
 


if ($recordType) {

//Base for counting for registrations
if ($recordType=='registrations') {
    if (!$regType && !$recordStatus) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM registrations";

        if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM registrations WHERE registrantAccountName LIKE '%$query%'";
        }
    }


    if ($regType && !$recordStatus) {
    $queryBaseCount = "SELECT COUNT(*) AS total FROM other_registrations WHERE otherType = '$regTypeCap'";

    if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM other_registrations WHERE otherType = '$regTypeCap' AND otherUserId = '$matchedUserId'";
    }

    }


    if ($regType && $recordStatus) {
    $queryBaseCount = "SELECT COUNT(*) AS total FROM other_registrations WHERE otherType = '$regTypeCap' AND otherStatus='$recordStatus'";
    if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM other_registrations WHERE otherType = '$regTypeCap' AND otherStatus='$recordStatus' AND otherUserId = '$matchedUserId'";
    }
    }

    if (!$regType && $recordStatus) {
    $queryBaseCount = "SELECT COUNT(*) AS total FROM registrations WHERE registrantStatus = '$recordStatus'";
    if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM registrations WHERE registrantStatus = '$recordStatus' AND registrantAccountName LIKE '%$query%'";
    }
    }

}


//Base for counting for subscriptions
if ($recordType=='subscriptions') {
if (!$subsType && !$recordStatus) {
    $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions";
    if ($query) {
       $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions WHERE registrant_subscriptionUserId='$matchedUserId'"; 
    }
}

if ($subsType && !$recordStatus) {
    $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions WHERE registrant_subscriptionType='$subsType'";

    if ($query){
    $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionUserId='$matchedUserId'"; 
    }
}

if ($subsType && $recordStatus) {
    $queryBaseCount="SELECT COUNT(*) AS total from regiStrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionStatus='$recordStatus'";

    if ($query){
        $queryBaseCount="SELECT COUNT(*) AS total from regiStrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionStatus='$recordStatus' AND registrant_subscriptionUserId='$matchedUserId'";
    }
}

if (!$subsType && $recordStatus) {
    $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions WHERE  registrant_subscriptionStatus='$recordStatus'";

    if ($query) {
        $queryBaseCount="SELECT COUNT(*) AS total from registrant_subscriptions WHERE  registrant_subscriptionStatus='$recordStatus' AND registrant_subscriptionUserId='$matchedUserId'";
    }
}


}




//Base for counting for promotions

if ($recordType=='promotions') {

    if (!$promoType && !$recordStatus) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions";

        if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionTitle LIKE '%$query%'";
        }
    }

    if (!$promoType && $recordStatus) {
    $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionStatus = '$recordStatus'";
    if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionStatus = '$recordStatus' AND promotionTitle LIKE '%$query%'";
    }
    }



    if ($promoType && !$recordStatus) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionType='$promoType'";

        if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionType='$promoType' AND promotionTitle LIKE '%$query%'";
        }
    }

    if ($promoType && $recordStatus) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionType='$promoType' AND promotionStatus='$recordStatus'";

        if ($query) {
        $queryBaseCount = "SELECT COUNT(*) AS total FROM promotions WHERE promotionType='$promoType' AND promotionStatus='$recordStatus' AND promotionTitle LIKE '%$query%'";
        }
    }



}



if ($recordType) {
//$resultsPerPage variable is set in the header.
$result = $conn->query($queryBaseCount);
$totalRows = (int)$result->fetch_assoc()['total'];
$totalPages = (int)ceil($totalRows / $resultsPerPage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page= max(1,min($page,$totalPages));
$offset = ($page - 1) * $resultsPerPage;

}


//Base for record for registrations
if ($recordType=='registrations') {
if (!$regType && !$recordStatus) {
    $queryBaseRecords = "SELECT * FROM registrations ORDER BY registrantId DESC";

    if ($query) {
       $queryBaseRecords = "SELECT * FROM registrations WHERE registrantAccountName LIKE '%$query%' ORDER BY registrantId DESC";
    }

}


if ($regType && !$recordStatus) {
  $queryBaseRecords = "SELECT * FROM other_registrations WHERE otherType = '$regTypeCap' ORDER BY otherId DESC LIMIT $offset , $resultsPerPage";

  if ($query) {
        $queryBaseRecords = "SELECT * FROM other_registrations WHERE otherType = '$regTypeCap' AND otherUserId='$matchedUserId' ORDER BY otherId DESC LIMIT $offset , $resultsPerPage";
  }


}

if ($regType && $recordStatus) {
  $queryBaseRecords = "SELECT * FROM other_registrations WHERE otherType = '$regTypeCap' AND otherStatus='$recordStatus' ORDER BY otherId DESC LIMIT $offset , $resultsPerPage";

  if ($query) {
    $queryBaseRecords = "SELECT * FROM other_registrations WHERE otherType = '$regTypeCap' AND otherStatus='$recordStatus' AND otherUserId='$matchedUserId' ORDER BY otherId DESC LIMIT $offset , $resultsPerPage";
  }
}

if (!$regType && $recordStatus) {
  $queryBaseRecords = "SELECT * FROM registrations WHERE registrantStatus = '$recordStatus' ORDER BY registrantId DESC LIMIT $offset , $resultsPerPage";

  if ($query) {
    $queryBaseRecords = "SELECT * FROM registrations WHERE registrantStatus = '$status' AND registrantName LIKE '%$query%'ORDER BY registrantId DESC LIMIT $offset , $resultsPerPage";
  }
}

}

//Base for record for subscriptions
if ($recordType=='subscriptions') {
if (!$subsType && !$recordStatus) {
    $queryBaseRecords="SELECT * from registrant_subscriptions ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";

    if ($query) {
       $queryBaseRecords="SELECT * from registrant_subscriptions WHERE registrant_subscriptionUserId= '$matchedUserId' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage"; 
    }
}

if ($subsType && !$recordStatus) {
    $queryBaseRecords="SELECT * from registrant_subscriptions WHERE registrant_subscriptionType='$subsType' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";

    if ($query) {
        $queryBaseRecords="SELECT * from registrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionUserId= '$matchedUserId' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";
    }
}

if ($subsType && $recordStatus) {
    $queryBaseRecords="SELECT * from registrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionStatus='$recordStatus' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";

    if ($query){
        $queryBaseRecords="SELECT * from registrant_subscriptions WHERE registrant_subscriptionType='$subsType' AND registrant_subscriptionStatus='$recordStatus' AND registrant_subscriptionUserId= '$matchedUserId' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";
    }
}

if (!$subsType && $recordStatus) {

    $queryBaseRecords="SELECT * from registrant_subscriptions WHERE  registrant_subscriptionStatus='$recordStatus' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";

    if ($query){
    $queryBaseRecords="SELECT * from registrant_subscriptions WHERE  registrant_subscriptionStatus='$recordStatus' AND registrant_subscriptionUserId= '$matchedUserId' ORDER BY registrant_subscriptionId  DESC LIMIT $offset , $resultsPerPage";  
    }

}



}

//Base for record for promotions

if ($recordType=='promotions') {
    if (!$promoType && !$recordStatus) {

    $queryBaseRecords = "SELECT * FROM promotions ORDER BY promotionId DESC";

    if ($query) {
       $queryBaseRecords = "SELECT * FROM promotions WHERE promotionTitle LIKE '%$query%' ORDER BY promotionId DESC";
    }

    }

    if (!$promoType && $recordStatus) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionStatus = '$recordStatus' ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";

    if ($query) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionStatus = '$recordStatus' AND promotionTitle LIKE '%$query%'ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";
    }
    }

    if ($promoType && !$recordStatus) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionType='$promoType' ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";

        if ($query) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionType='$promoType' AND promotionTitle LIKE '%$query%' ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";
        }
    }

    if ($promoType && $recordStatus) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionType='$promoType' AND promotionStatus='$recordStatus' ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";

        if ($query) {
        $queryBaseRecords = "SELECT * FROM promotions WHERE promotionType ='$promoType' AND promotionStatus='$recordStatus' AND promotionTitle LIKE '%$query%' ORDER BY promotionId DESC LIMIT $offset , $resultsPerPage";
        }
    }



}


if ($recordType=='registrations') {
$sqlRegistrations = $queryBaseRecords;
$sqlRegistrationsResult = mysqli_query ($conn,$sqlRegistrations);
}

if ($recordType=='subscriptions') {
$sqlSubscriptions = $queryBaseRecords;
$sqlSubscriptionsResult = mysqli_query($conn, $sqlSubscriptions);
} 

if ($recordType=='promotions') {
$sqlPromotions = $queryBaseRecords;
$sqlPromotionsResult = mysqli_query ($conn,$sqlPromotions);
}


}

?>










   


    <?php if (isset($_SESSION['notes-saved'])) {
        echo "<div class='alert alert-success'>Notes updated successfully!</div>";
        unset($_SESSION['notes-saved']); 
    } ?>

    <?php if ($recordType) {?>
    <?php if ($totalPages > 1) {?>
    <small>[<?php echo 'Page '.$page.' of '.$totalPages.' Pages'?>]</small>
    <?php } ?>

    <?php if ($totalPages == 1) {?>
    <small>[<?php echo 'Page '.$page.' of '.$totalPages.' Page'?>]</small>
    <?php } ?>

    <strong>
        <?php if ($totalRows<=1) {echo $totalRows.' Result '; }?>
        <?php if ($totalRows > 1) {echo $totalRows.' Results '; }?>
        <?php if ($query) {echo "for '".$query."'";}?>
        <?php echo " in '";?>
        <?php echo ucwords($recordType)?><?php if ($regType) {echo '/'.ucwords($regType);}?>
        <?php if ($subsType) {echo '/'.ucwords($subsType);}?><?php if ($promoType) {echo '/'.ucwords($promoType);}?><?php if ($recordStatus) {echo '/'.$recordStatus;}?>
        <?php echo "'";?>
    </strong>
    <?php } ?>

 

    <br><br>

    <div class="summary-navigation-container">
        <div class="record-type-container summary-buttons-containers">
            <small>Record Type:</small>
            <?php if ($recordType) {?>
            <a href="<?php echo $website.'/workspace/site-manager.php'?><?php if ($query) {echo '?query='.urlencode($query);}?>" class="link-tag-button">Home</a>
            <?php } ?>
            <?php if ($recordType!='registrations') {?>
            <a href="?<?php if ($query) {echo 'query='.urlencode($query).'&';}?><?php echo 'recordtype=registrations';?>" class="link-tag-button">Registrations</a>
            <?php } ?>

            <?php if ($recordType=='registrations') {?>
            <small><strong>Registrations</strong></small>
            <?php } ?>

            <?php if ($recordType!='subscriptions') {?>
            <a href="?<?php if ($query) {echo 'query='.urlencode($query).'&';}?><?php echo 'recordtype=subscriptions';?>" class="link-tag-button">Subscriptions</a>
            <?php } ?>

            <?php if ($recordType=='subscriptions') {?>
            <small><strong>Subscriptions</strong></small>
            <?php } ?>

            <?php if ($recordType!='promotions') {?>
            <a href="?<?php if ($query) {echo 'query='.urlencode($query).'&';}?><?php echo 'recordtype=promotions';?>" class="link-tag-button">Promotions</a>
            <?php } ?>

            <?php if ($recordType=='promotions') {?>
            <small><strong>Promotions</strong></small>
            <?php } ?>

        </div>
       

  
        <?php if ($recordType) {?>
      
            <?php if ($recordType=='registrations') {?>
                <div class="reg-type-container summary-buttons-containers">
                <small>Type:</small>
                
                <?php if ($regType) {?>
                <a href="?<?php echo 'recordtype='.$recordType?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">General</a>
                <?php } ?>
                <?php if (!$regType) {?>
                <small> <strong> General</strong></small>
                <?php } ?>

                <?php if ($regType!='teacher') {?>
                <a href="?<?php echo 'recordtype='.$recordType;?><?php echo '&regtype=teacher'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Teacher</a>
                <?php } ?>
                <?php if ($regType=='teacher') {?>
                <small> <strong> Teacher</strong></small>
                <?php } ?>

                <?php if ($regType!='writer') {?>
                <a href="?<?php echo 'recordtype='.$recordType;?><?php echo '&regtype=writer'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button"> Writer</a>
                <?php } ?>
                <?php if ($regType=='writer') {?>
                <small> <strong>Writer</strong></small>
                <?php } ?>
                
                <?php if ($regType!='editor') {?>
                <a href="?<?php echo 'recordtype='.$recordType;?><?php echo '&regtype=editor'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Editor</a>
                <?php } ?>

                <?php if ($regType=='editor') {?>
                <small> <strong>Editor</strong></small>
                <?php } ?>

                <?php if ($regType!='developer') {?>
                <a href="?<?php echo 'recordtype='.$recordType;?><?php echo '&regtype=developer'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Developer</a>
                <?php } ?>

                <?php if ($regType=='developer') {?>
                <small> <strong>Developer</strong></small>
                <?php } ?>

                <?php if ($regType!='researches') {?>
                <a href="?<?php echo 'recordtype='.$recordType;?><?php echo '&regtype=researches'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Researches</a>
                <?php } ?>

                <?php if ($regType=='researches') {?>
                <small> <strong>Researches</strong></small>
                <?php } ?>

                </div>

                
              

            <?php } ?>


            <?php if ($recordType=='subscriptions') {?>
                <div class="sub-type-container summary-buttons-containers">
                <small>Type:</small>
                
                <?php if (!$subsType) {?>
                <small> <strong> All</strong></small>
                <?php } ?>

                <?php if ($subsType) {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">All</a>
                <?php } ?>

                <?php if ($subsType!='tools') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&substype=tools'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Tools</a>
                <?php } ?>
                <?php if ($subsType=='tools') {?>
                <small> <strong> Tools</strong></small>
                <?php } ?>

                <?php if ($subsType!='files') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&substype=files'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Files</a>
                <?php } ?>
                <?php if ($subsType=='files') {?>
                <small> <strong> Files</strong></small>
                <?php } ?>

                <?php if ($subsType!='seller') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&substype=seller'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Seller</a>
                <?php } ?>
                <?php if ($subsType=='seller') {?>
                <small> <strong> Seller</strong></small>
                <?php } ?>

                <?php if ($subsType!='shelf') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&substype=shelf'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Shelf</a>
                <?php } ?>
                <?php if ($subsType=='shelf') {?>
                <small> <strong> Shelf</strong></small>
                <?php } ?>
            </div>
            <?php } ?>



            <?php if ($recordType=='promotions') {?>
                <div class="prom0-type-container summary-buttons-containers">
                <small>Type:</small>
                
                <?php if (!$promoType) {?>
                <small> <strong> All</strong></small>
                <?php } ?>

                <?php if ($promoType) {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">All</a>
                <?php } ?>

                <?php if ($promoType!='products') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&promotype=products'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Products</a>
                <?php } ?>
                <?php if ($promoType=='products') {?>
                <small> <strong>Products</strong></small>
                <?php } ?>

                <?php if ($promoType!='services') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php echo '&promotype=services'?><?php if ($recordStatus) {echo'&status='.$recordStatus;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Services</a>
                <?php } ?>
                <?php if ($promoType=='services') {?>
                <small> <strong>Services</strong></small>
                <?php } ?>
               
            </div>

            <?php } ?>

    
            <div class="status-container summary-buttons-containers">
                <small>Status:</small>
                
                <?php if (!$recordStatus) {?>
                <small> <strong> All</strong></small>
                <?php } ?>

                <?php if ($recordStatus) {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php if ($promoType) {echo'&promotype='.$promoType;}?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">All</a>
                <?php } ?>
              
                <?php if ($regType || $recordType=='subscriptions') {?>

                <?php if ($recordStatus!='Pending') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php if ($promoType) {echo'&promotype='.$promoType;}?><?php echo '&status=Pending'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Pending</a>
                <?php } ?>

                <?php if ($recordStatus=='Pending') {?>
                <small> <strong> Pending</strong></small>
                <?php } ?>

                <?php if ($recordStatus!='Approved') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php echo '&status=Approved'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Approved</a>
                <?php } ?>
                <?php if ($recordStatus=='Approved') {?>
                <small> <strong> Approved</strong></small>
                <?php } ?>

                <?php if ($recordStatus!='Rejected') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php echo '&status=Rejected'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Rejected</a>
                <?php } ?>
                <?php if ($recordStatus=='Rejected') {?>
                <small> <strong> Rejected</strong></small>
                <?php } ?>
                <?php } ?>

                <?php if ($recordType=='registrations') {?>
                <?php if ($recordStatus!='Revoked') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php echo '&status=Revoked'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Revoked</a>
                <?php } ?>
                <?php if ($recordStatus=='Revoked') {?>
                <small> <strong> Revoked</strong></small>
                <?php } ?>

                <?php if ($recordStatus!='Kept') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($regType) {echo'&regtype='.$regType;}?><?php if ($subsType) {echo'&substype='.$subsType;}?><?php echo '&status=Kept'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Kept</a>
                <?php } ?>
                <?php if ($recordStatus=='Kept') {?>
                <small> <strong> Kept</strong></small>
                <?php } ?>
                <?php } ?>

                <?php if ($recordType=='promotions') {?>

                <?php if ($recordStatus!='Draft') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($promoType) {echo'&promotype='.$promoType;}?><?php echo '&status=Draft'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Draft</a>
                <?php } ?>
                <?php if ($recordStatus=='Draft') {?>
                <small> <strong>Draft</strong></small>
                <?php } ?>

                <?php if ($recordStatus!='Published') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($promoType) {echo'&promotype='.$promoType;}?><?php echo '&status=Published'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Published</a>
                <?php } ?>
                <?php if ($recordStatus=='Published') {?>
                <small> <strong>Published</strong></small>
                <?php } ?>

                <?php if ($recordStatus!='Unpublished') {?>
                <a href="<?php echo '?recordtype='.$recordType;?><?php if ($promoType) {echo'&promotype='.$promoType;}?><?php echo '&status=Unpublished'?><?php if ($query) {echo '&query='.urlencode($query);}?>" class="link-tag-button">Unpublished</a>
                <?php } ?>
                <?php if ($recordStatus=='Unpublished') {?>
                <small> <strong>Unpublished</strong></small>
                <?php } ?>
                
                <div class="actions">
                <a class="link-tag-button button" id="new-promotion">New Promotion</a>
                </div>
              
                <?php } ?>

                

            </div>

       
        <?php } ?>
  

  </div>




<?php if ($recordType) {?>
    <?php if ($recordType=='registrations') {//Registrations?>
    <div id="registrations-list-container">
        <?php if(!$regType) { //If registration type is not set...?>
        <table class="summary-table">
            <thead>
                <tr>
                <th class="userid-column">Id</th>
                <th class="account-name-column account-name-registration">Name</th>
                <th class="username-column">Username</th>
                <th class="email-column">Email</th>
                <th class="mobile-column">Mobile Number</th>
                <th class="account-types-column">Account Types</th>
                <th class="timestamp-column timestamp-registration">Account Created</th>
                <th class="action-column-head action-registration">Action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php if($sqlRegistrationsResult->num_rows > 0) {
                while ($registrations=$sqlRegistrationsResult->fetch_assoc()) { 
                $registrationUserId=$registrations['registrantId'];
                $registrationAccountName=$registrations['registrantAccountName'];
                $registrationUsername=$registrations['registrantUsername'];
                $registrationEmailAddress=$registrations['registrantEmailAddress'];
                $registrationMobileNumber=$registrations['registrantMobileNumber'];
                $registrationStatus=$registrations['registrantStatus'];

                $registrantAccountCreated = dcomplete_format($registrations['registrantCreatedAt']);

                $registrationBasic=$registrations['registrantBasicAccount'];
                $registrationTeacher=$registrations['registrantTeacherAccount'];
                $registrationWriter=$registrations['registrantWriterAccount'];
                $registrationEditor=$registrations['registrantEditorAccount'];
                 $registrationDeveloper=$registrations['registrantDeveloperAccount'];
                $registrationSiteManager=$registrations['registrantSiteManagerAccount'];
                $registrationDataAnalyst=$registrations['registrantDataAnalystAccount'];
               
                $registrationFunder=$registrations['registrantFunderAccount'];

                $registrantAccounts = [];

                if ($registrationBasic) {
                    array_push($registrantAccounts,$registrationBasic);
                }

                if ($registrationTeacher) {
                    array_push($registrantAccounts,$registrationTeacher);
                }

                if ($registrationWriter) {
                    array_push($registrantAccounts,$registrationWriter);
                }

                if ($registrationEditor) {
                    array_push($registrantAccounts, $registrationEditor);
                }

                if ($registrationDeveloper) {
                    array_push($registrantAccounts, $registrationDeveloper);
                }

                if ($registrationSiteManager) {
                    array_push($registrantAccounts,$registrationSiteManager);
                }

                 if ($registrationDataAnalyst) {
                    array_push($registrantAccounts,$registrationDataAnalyst);
                }

                 if ($registrationFunder) {
                    array_push($registrantAccounts,$registrationFunder);
                }




                $addressStreet = $registrations['registrantAddressStreet'];
                $addressBarangay = $registrations['registrantAddressBarangay'];
                $addressCity = $registrations['registrantAddressCity'];
                $addressProvince= $registrations['registrantAddressProvince'];
                $addressRegion= $registrations['registrantAddressRegion'];
                $addressCountry= $registrations['registrantAddressCountry'];
                $addressZipCode= $registrations['registrantAddressZipCode'];

                $address = [];

                        if($addressStreet){array_push($address,$addressStreet); }

                        if($addressBarangay){array_push($address,$addressBarangay); }

                        if($addressCity){array_push($address,$addressCity); }

                        if($addressProvince){array_push($address,$addressProvince); }

                        if($addressRegion){array_push($address,$addressRegion); }

                        if($addressCountry){array_push($address,$addressCountry); }
                        
                        if($addressZipCode){array_push($address,$addressZipCode); }

                ?>
                
                <tr class="record-main ">
                    <td class="userid-column"><?php echo $registrationUserId;?></td>
                    <td class="account-name-column account-name-registration"><?php echo $registrationAccountName;?></td>
                    <td class="username-column"><?php echo $registrationUsername;?></td>
                    <td class="email-column"><?php echo $registrationEmailAddress;?></td>
                    <td class="mobile-column"><?php echo $registrationMobileNumber;?></td>
                    <td class="account-types-column"><?php if ($registrantAccounts) { echo implode(', ',$registrantAccounts);}?>  </td>
                    <td class="timestamp-column timestamp-registration"><?php echo $registrantAccountCreated;?></td>
                    <td class="action-column-data action-registration actions">
                        <?php if ($registrationStatus !='Revoked') { ?>
                            <?php if (!$regType) {?>
                            <a class="link-tag-button-main action-button" id='main-reg-revoke-<?php echo $registrationUserId;?>'>Revoke</a>
                            <?php } ?>

                        <?php } ?>

                        <?php if ($registrationStatus !='Kept') { ?>
                            <?php if (!$regType) {?>
                            <a class="link-tag-button-main action-button" id='main-reg-keep-<?php echo $registrationUserId;?>'>Keep</a>
                            <?php } ?>

                        <?php } ?>

                        <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>

                        <a href="<?php echo $website.'/'.$registrationUsername;?>"class='link-tag-button-main action-button' target="_blank">View</a>
                    </td>
                </tr>
                <tr>
                    <td class="other-details">
                            <p class="omitted-account-name-registration omitted">Account Name : <?php echo $registrationAccountName;?></p>
                            <p class="omitted-user-name omitted">Username : <?php echo $registrationUsername;?></p>
                            <p class="omitted-email omitted">Email Address : <?php echo $registrationEmailAddress;?></p>
                            <p class="omitted-mobile omitted">Mobile Number : <?php echo $registrationMobileNumber;?></p>
                            <p class="omitted-account-types omitted">Account Type (s) : <?php if ($registrantAccounts) { echo implode(', ',$registrantAccounts);}?></p>
                            <p class="omitted-timestamp-registration omitted">Account Created : <?php echo $registrantAccountCreated;?></p>
                            <p> <?php if ($address) { echo 'Address: '.implode(', ',$address);} ?></p>
                            <div class="omitted-actions-registration omitted actions" >
                                <?php if ($registrationStatus !='Revoked') { ?>
                                    
                                    <?php if (!$regType) {?>
                                    <a class="link-tag-button-main action-button" id='main-reg-revoke-<?php echo $registrationUserId;?>'>Revoke</a>
                                    <?php } ?>

                                <?php } ?>

                                <?php if ($registrationStatus !='Kept') { ?>
                                    <?php if (!$regType) {?>
                                    <a class="link-tag-button-main action-button" id='main-reg-keep-<?php echo $registrationUserId;?>'>Keep</a>
                                    <?php } ?>

                                <?php } ?>

                                <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>
                                <a href="<?php echo $website.'/'.$registrationUsername;?>"class='link-tag-button-main action-button' target="_blank">View</a>
                            </div>

                        <hr>
                    </td>
                    
                </tr>
               
                <?php }}?>
            </tbody> 
        </table>
        <?php } ?>









        <?php if($regType) { //If registration type is set... ?>
        <table class="summary-table">
            <thead>
                <tr >
                <th class="timestamp-column timestamp-other-registration">Timestamp</th>
                <th class="account-name-column account-name-other-registration">Account Name</th>
                <th class="resume-column">Resume</th>
                <th class="license-certificate-column">License/Ceritifcation</th>
                <th class="sample-column">Sample</th>
                <th class="agreement-column">Agreement</th>
                <th class="status-column status-other-registration">Status</th>
                <th class="action-column-head action-other-registration">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if($sqlRegistrationsResult->num_rows > 0) {
                while ($registrations=$sqlRegistrationsResult->fetch_assoc()) {  
                $otherRegistrationUserId= $registrations['otherUserId'];
                $otherRegistrationTimestamp= dcomplete_format($registrations['otherTimestamp']);
                $otherRegistrationResume= $registrations['otherResume'];
                $otherRegistrationLicenseCertification= $registrations['otherLicenseCertification'];
                $otherRegistrationSample= $registrations['otherSample'];
                $otherRegistrationAgreement= $registrations['otherAgreement'];
                $otherRegistrationStatus= $registrations['otherStatus'];
                $otherRegistrationNotes= $registrations['otherNotes'];
                
                ?>
                
                <tr class="record-main">
                <?php //Get other details
                $sqlOtherRegistrationDetails="SELECT * FROM registrations WHERE registrantId = $otherRegistrationUserId";
                $sqlOtherRegistrationDetailsResult = mysqli_query($conn, $sqlOtherRegistrationDetails);
                $otherRegistrationDetails = $sqlOtherRegistrationDetailsResult->fetch_assoc();
                
                if ($otherRegistrationDetails) {
                $otherRegistrationAccountName = $otherRegistrationDetails ['registrantAccountName'];
                }
                
                ?>

                    <td class="timestamp-column timestamp-other-registration">
                        <?php echo $otherRegistrationTimestamp; ?>
                    </td>

                    <td class="account-name-column account-name-other-registration">
                        <?php echo $otherRegistrationAccountName;?>
                    </td>

                    <td class="resume-column"><a href="<?php echo $privateFolder.$otherRegistrationResume;?>">&#x1F441;</a></td>
                    <td class="license-certificate-column"><a href="<?php echo $privateFolder.$otherRegistrationLicenseCertification;?>">&#x1F441;</a></td>
                    <td class="sample-column"><a href="<?php echo $otherRegistrationSample;?>">&#x1F441;</a></td>
                    <td class="agreement-column"><a href="<?php echo $privateFolder.$otherRegistrationAgreement;?>">&#x1F441;</a></td>
                    <td class="status-column status-other-registration"><?php echo $otherRegistrationStatus;?></td>

                    <td class="action-buttons-container action-column-data action-other-registration actions">
                        <?php if ($otherRegistrationStatus=="Pending") { ?>
                            <?php if (!$regType) {?>

                                <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-approve-<?php echo $otherRegistrationUserId;?>'>Approve</a>

                                <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-reject-<?php echo $otherRegistrationUserId;?>'>Reject</a>

                            <?php } ?>

                        <?php }?>

                        <?php if ($otherRegistrationStatus=="Approved" || $otherRegistrationStatus=="Kept") { ?>
                            <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-revoke-<?php echo $otherRegistrationUserId;?>'>Revoke</a>
                        <?php } ?>

                        <?php if ($otherRegistrationStatus=="Revoked"){ ?>
                            <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-keep-<?php echo $otherRegistrationUserId;?>'>Keep</a>
                        <?php } ?>

                        <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>

                        <a class="link-tag-button-main action-button show-note-button" id='show-note-<?php echo $otherRegistrationUserId;?>'>Show Notes</a>
            
                    </td>
                </tr>

                <tr>
                <td class="other-details">
                    <p class="omitted-timestamp-other-registration omitted">Timestamp : <?php echo $otherRegistrationTimestamp?></p>
                    <p class="omitted-account-name-other-registration omitted">Account Name : <?php echo $otherRegistrationAccountName?></p>
                    <div class="omitted-attachments omitted ">
                        <small>Attachment (s) :</small>
                         <?php if ($regType =='teacher') {?>   
                        <a href="<?php echo $privateFolder.$otherRegistrationLicenseCertification;?>" class="link-tag-button">License/Certification</a>
                        <?php } ?>

                        <?php if ($regType =='writer' || $regType =='editor' || $regType =='developer') {?>   
                        <a href="<?php echo $otherRegistrationSample;?>" class="link-tag-button">Sample</a>
                        <?php } ?>

                        <a href="<?php echo $privateFolder.$otherRegistrationAgreement;?>" class="link-tag-button">Agreement</a>
                    </div>
                    <p class="omitted-status-other-registration omitted">Status : <?php echo $otherRegistrationStatus;?></p>
                    <div class="omitted-actions-other-registration omitted actions">
                        <?php if ($otherRegistrationStatus=="Pending") { ?>
                             <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-approve-<?php echo $otherRegistrationUserId;?>'>Approve</a>

                            <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-reject-<?php echo $otherRegistrationUserId;?>'>Reject</a>

                            <?php }?>

                            <?php if ($otherRegistrationStatus=="Approved" || $otherRegistrationStatus=="Kept") { ?>
                                <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-revoke-<?php echo $otherRegistrationUserId;?>'>Revoke</a>
                            <?php } ?>
                            <?php if ($registrations['otherStatus']=="Revoked"){ ?>
                                <a class="link-tag-button-main action-button" id='<?php echo $regType;?>-reg-keep-<?php echo $otherRegistrationUserId;?>'>Keep</a>
                            <?php } ?>

                            <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>

                              <a class="link-tag-button-main action-button show-note-button" id='mt-show-note-<?php echo $otherRegistrationUserId;?>'>Show Notes</a>

                    </div>
               
                    <div class="notes-container modal website-modal website-modal-wrapper"  id="modal-notes-container-<?php echo $otherRegistrationUserId;?>">
                        <div class="note-inputs-container website-modal-content">
                            <a class="close close-without-null-redirection">&times;</a>
                            <div class="alert alert-success modal-note-message" id="modal-note-message-<?php echo $otherRegistrationUserId?>"></div>
                            <input value="<?php echo $otherRegistrationUserId?>"  id='note-userid-<?php echo $otherRegistrationUserId?>' hidden>
                            <input value="<?php echo $regType?>" id="note-regtype-<?php echo $otherRegistrationUserId?>" hidden>
                            <input  value="<?php echo $regTypeCap?>" id="note-regtype-cap-<?php echo $otherRegistrationUserId?>" hidden>
                            <br>
                            <textarea placeholder="Add note (s)" class="note-inputs" id="note-notes-<?php echo $otherRegistrationUserId?>"><?php echo $otherRegistrationNotes;?></textarea>

                            <div class="note-buttons-container">
                            <button class='link-tag-button-main action-button' id="note-save-button-<?php echo $otherRegistrationUserId;?>">
                                Save
                            </button>
                            
                            
                            <button class='link-tag-button-main action-button' id="note-clear-button-<?php echo $otherRegistrationUserId;?>">
                                Clear
                            </button>
                           

                        </div>
                        </div>
                        
                    </div>
                   

                <hr>
                </td>
                
                </tr>
                <?php }}?>
                
            </tbody> 
        </table>
        <?php } ?>
        
    </div>
    <?php } ?>


    <?php if ($recordType=='subscriptions') {//Subscriptions?>

    <div id="subscriptions-list-container">
        <table class="summary-table">
            <thead>
                <tr>
                    <th class="timestamp-column timestamp-subscription">Date/Time</th>
                    <th class="account-name-column account-name-subscription">Account Name</th>
                    <th class="type-column">Type</th>
                    <th class="duration-column">Duration</th>
                    <th class="date-column">Date</th>
                    <th class="expiry-column">Expiry</th>
                    <th class="remaining-days-column">Remaining Days</th>
                    <th class="status-column status-subscription">Status</th>
                    <th class="action-column-head action-subscription">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sqlSubscriptionsResult->num_rows >0) {
                while ($subscriptions=$sqlSubscriptionsResult->fetch_assoc()) { 
                $subscriptionUserId= $subscriptions['registrant_subscriptionUserId'];
                $subscriptionId= $subscriptions['registrant_subscriptionId'];
                $subscriptionTimestamp= dcomplete_format($subscriptions['registrant_subscriptionTimestamp']);
                $subscriptionType= $subscriptions['registrant_subscriptionType'];
                $subscriptionDuration= $subscriptions['registrant_subscriptionDuration'];
                $subscriptionTotal= $subscriptions['registrant_subscriptionTotal'];
                $subscriptionPaymentOption= $subscriptions['registrant_subscriptionPaymentOption'];
                $subscriptionRefNumber= $subscriptions['registrant_subscriptionRefNumber'];
                $subscriptionProofOfPayment= $subscriptions['registrant_subscriptionProofOfPayment'];
                $subscriptionStatus= $subscriptions['registrant_subscriptionStatus'];

                $subscriptionDate= dcomplete_format($subscriptions['registrant_subscriptionDate']);
                $subscriptionExpiry= dcomplete_format($subscriptions['registrant_subscriptionExpiry']);

                $subscriptionRemainingDays = ceil ((strtotime($subscriptionExpiry) - $currentTime)/86400);
                
                
                $sqlSubscriberRegistrationDetails="SELECT * FROM registrations WHERE registrantId = $subscriptionUserId";
                $sqlSubscriberRegistrationDetailsResults = mysqli_query($conn, $sqlSubscriberRegistrationDetails);
                $subscriberRegistrationDetails = $sqlSubscriberRegistrationDetailsResults->fetch_assoc();
                if($subscriberRegistrationDetails) {
                    $subscriptionAccounName = $subscriberRegistrationDetails ['registrantAccountName'];
                }?>
                <tr>
                    <td class="timestamp-column timestamp-subscription"><?php echo $subscriptionTimestamp;?></td>
                    <td class="account-name-column account-name-subscription"><?php echo $subscriptionAccounName;?></td>
                    <td class="type-column"><?php echo $subscriptionType;?></td>
                    <td class="duration-column"><?php echo $subscriptionDuration;?><?php if ($subscriptionType !='Shelf') {echo ' Months';} ?></td>
                    <td class="date-column"><?php echo $subscriptionDate;?></td>
                    <td class="expiry-column"><?php echo $subscriptionExpiry;?></td>
                    <td class="remaining-days-column"><?php if ($subscriptionStatus=='Pending') {echo '---';} else {echo $subscriptionRemainingDays;}?></td>
                    <td class="status-column status-subscription"><?php echo $subscriptionStatus;?></td>
                    <td class="action-buttons-container action-column-data action-subscription actions">

                        <?php if ($subscriptionStatus=="Pending"){?>

                        <a class="link-tag-button-main action-button" id='<?php echo $subscriptionType;?>-subscription-approve-<?php echo $subscriptionId;?>'>Approve</a>

                        <a class="link-tag-button-main action-button" id='<?php echo $subscriptionType;?>-subscription-reject-<?php echo $subscriptionId;?>'>Reject</a>


                        <?php } ?>
                        <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>
                    </td>
                </tr>
                <tr>
                    <td class="other-details">
                        <p class="omitted-timestamp-subscription omitted">Date/Time : <?php echo $subscriptionTimestamp;?></p>
                        <p class="omitted-account-name-subscription omitted">Account Name : <?php echo $subscriptionAccounName;?></p>
                        <p class="omitted-subscription-type omitted">Type : <?php echo $subscriptionType;?></p>
                        <p class="omitted-duration omitted">Duration : <?php echo $subscriptionDuration;?></p>
                        <input type="text" id="subscription-duration-<?php echo $subscriptionId;?>" value=" <?php echo $subscriptionDuration;?>" hidden>
                         <p class="omitted-date omitted">Start : <?php echo $subscriptionDate;?></p>
                        <p class="omitted-expiry omitted">End : <?php echo $subscriptionExpiry;?></p>
                        <p class="omitted-remaining-days omitted">Remaining Days : <?php echo $subscriptionRemainingDays;?></p>
                        <p >Total : <?php echo '₱'.$subscriptionTotal;?></p>
                        <p >Payment Option : <?php echo $subscriptionPaymentOption;?></p>
                        <p >Reference Number : <?php echo $subscriptionRefNumber;?></p>
                        <div class="attachments-container">
                        <small>Attachment (s): </small>
                        <a href="<?php echo $privateFolder.$subscriptionProofOfPayment;?>" class="link-tag-button">Proof of Payment</a>
                        </div>
                        <p class="omitted-status-subscription omitted">Status : <?php echo $subscriptionStatus;?></p>
                       
                        <div class="omitted-actions-subscription omitted actions">
                            <?php if ($subscriptionStatus=="Pending"){?>

                             <a class="link-tag-button-main action-button" id='<?php echo $subscriptionType;?>-subscription-approve-<?php echo $subscriptionId;?>'>Approve</a>

                            <a class="link-tag-button-main action-button" id='<?php echo $subscriptionType;?>-subscription-reject-<?php echo $subscriptionId;?>'>Reject</a>
            

                            <?php } ?>
                            <a href="<?php echo $website.'/messages/'?>" class='link-tag-button-main action-button' target="_blank">Message</a>
                        </div>
                        
                        <hr>
                    </td>
                </tr>
                <?php }}?>
                
            </tbody>

        </table>

    </div>
    
    <?php } ?>  










     <?php if ($recordType=='promotions') {//Promotions?>
   
    <div id="promotions-list-container">
        <table class="summary-table">
            <thead>
                <tr>
                    <th class="timestamp-column timestamp-promotion">Date/Time</th>
                    <th class="name-company-column">Name/Company</th>
                    <th class="title-column">Title</th>
                    <th class="type-column">Type</th>
                    <th class="topics-column">Topic (s)</th>
                    <th class="description-column">Description</th>
                    <th class="status-column status-promotion">Status</th>
                    <th class="action-column-head action-promotion">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sqlPromotionsResult->num_rows >0) {
                while ($promotions=$sqlPromotionsResult->fetch_assoc()) { 
                $promotionId= $promotions['promotionId'];
                $promotionTimestamp= dcomplete_format($promotions['promotionTimestamp']);
                $promotionNameCompany= $promotions['promotionNameCompany'];
                $promotionTitle= $promotions['promotionTitle'];
                $promotionDescription= $promotions['promotionDescription'];
                $promotionType= $promotions['promotionType'];
                $promotionTopics= $promotions['promotionTopics'];
                $promotionImage= $privateFolder.$promotions['promotionImage'];
                $promotionLink= $promotions['promotionLink'];
                $promotionDuration= $promotions['promotionDuration'];
                $promotionAmount= $promotions['promotionAmount'];
                $promotionDate= dcomplete_format($promotions['promotionDate']);
                $promotionExpiry= dcomplete_format($promotions['promotionExpiry']);

                $promotionAgreement= $privateFolder.$promotions['promotionAgreement'];

                $promotionRemainingDays = ceil ((strtotime($promotionExpiry) - $currentTime)/86400);

                $promotionStatus= $promotions['promotionStatus'];
                
                ?>

                <tr>
                    <td class="timestamp-column timestamp-promotion"><?php echo $promotionTimestamp;?></td>
                    <td class="name-company-column"><?php echo $promotionNameCompany;?></td>
                    <td class="title-column"><?php echo $promotionTitle;?></td>
                    <td class="type-column"><?php echo $promotionType;?></td>
                    <td class="topics-column"><?php echo $promotionTopics;?></td>
                    <td class="description-column"><?php echo $promotionDescription;?></td>
                    <td class="status-column status-promotion"><?php echo $promotionStatus;?></td>
                    <td class="action-buttons-container action-column-data action-promotion actions">
                        
                        

                        <?php if ($promotionStatus !="Published"){?>
                        <a class="link-tag-button-main action-button" id='promotion-status-publish-<?php echo $promotionId;?>'>Publish</a>

                        <?php } ?>

                        <?php if ($promotionStatus =="Published"){?>

                        <a class="link-tag-button-main action-button" id='promotion-status-unpublish-<?php echo $promotionId;?>'>Unpublish</a>

                        <?php } ?>

                        <?php if ($promotionStatus !="Published"){?>

                        <input type="text" id="update-promotion-name-company-<?php echo $promotionId?>" value="<?php echo $promotionNameCompany;?>" hidden>

                        <input type="text" id="update-promotion-title-<?php echo $promotionId?>" value="<?php echo $promotionTitle;?>" hidden>

                        <input type="text" id="update-promotion-type-<?php echo $promotionId?>" value="<?php echo $promotionType;?>" hidden>

                        <input type="text" id="update-promotion-topics-<?php echo $promotionId?>" value="<?php echo $promotionTopics;?>" hidden>

                        <input type="text" id="update-promotion-description-<?php echo $promotionId?>" value="<?php echo $promotionDescription;?>" hidden>

                        <input type="text" id="update-promotion-link-<?php echo $promotionId?>" value="<?php echo $promotionLink;?>" hidden>

                        <input type="text" id="update-promotion-duration-<?php echo $promotionId?>" value="<?php echo $promotionDuration;?>" hidden>

                        <input type="text" id="update-promotion-amount-<?php echo $promotionId?>" value="<?php echo $promotionAmount;?>" hidden>

                        <input type="text" id="update-promotion-image-link-<?php echo $promotionId?>" value="<?php echo $promotionImage;?>" hidden>

                        <input type="text" id="update-promotion-agreement-link-<?php echo $promotionId?>" value="<?php echo $promotionAgreement;?>" hidden>

                        <a class='link-tag-button-main action-button' id="show-promotion-<?php echo $promotionId;?>">Update</a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td class="other-details">
                        <p class="omitted-timestamp-promotion omitted">Date/Time : <?php echo $promotionTimestamp;?></p>
                        <p class="omitted-name-company-promotion omitted">Name/Company : <?php echo $promotionNameCompany;?></p>
                        <p class="omitted-title-promotion omitted">Title : <?php echo $promotionTitle;?></p>
                        <p class="omitted-type-promotion omitted">Type : <?php echo $promotionType;?></p>
                        <p class="omitted-topics-promotion omitted">Topic (s) : <?php echo $promotionTopics;?></p>
                        <p class="omitted-description-promotion omitted">Description : <?php echo $promotionDescription;?></p>
                        

                        <p class="omitted-duration-promotion">Duration : <?php echo $promotionDuration;?></p>

                        <p class="omitted-amount-promotion">Amount : <?php echo $promotionAmount;?></p>
                        <div class="attachments-container">
                            <small>Attachment (s): </small>
                            <a class="link-tag-button" href="<?php echo $promotionImage;?>">Image</a>
                            <a class="link-tag-button" href="<?php echo $promotionLink;?>">Link</a>
                            <a class="link-tag-button" href="<?php echo $promotionAgreement;?>">Agreement</a>
                        </div>

                        <p class="omitted-status-promotion omitted">Status : <?php echo $promotionStatus;?></p>
                       
                        <div class="omitted-actions-promotion omitted actions">
                        
                        <?php if ($promotionStatus !="Published"){?>
                            <a class="link-tag-button-main action-button" id='promotion-status-publish-<?php echo $promotionId;?>'>Publish</a>
                        <?php } ?>

                        <?php if ($promotionStatus =="Published"){?>
                            <a class="link-tag-button-main action-button" id='promotion-status-unpublish-<?php echo $promotionId;?>'>Unpublish</a>
                        <?php } ?>
                        
                        <?php if ($promotionStatus !="Published"){?>
                        <a class='link-tag-button-main action-button' id="show-promotion-<?php echo $promotionId;?>">Update</a>
                        <?php } ?>

                        </div>
                        
                        <hr id="<?php echo 'promotion-details-promotion-id-'.$promotionId;?>">
                    </td>
                </tr>
                <?php }}?>
                
            </tbody>

        </table>

    </div>
    
    <?php } ?>  








        


    <?php if($totalPages > 1) {?>
                <?php require (INCLUDESLAYOUT_PATH.'/pagination.php');?>  
    <?php } ?> 

<?php } ?>