<?php if (!$u) { ?>
<div class="profile">
        <div id="profile-top">
                <div id="cover-photo" >
                    <div id="cover-photo-container">
                    <img src="<?php echo $coverPhotoLink?>" id="cover-photo">
                    <?php if (!$u) {?>
                    <div id="cover-photo-camera-container">
                        <a>
                            <img src="<?php echo $website.'/assets/images/camera.svg'?>" id="cover-photo-camera-icon" class="icon profile-details-icon">
                        </a> 
                    </div>
                    <?php } ?> 
                    </div>
                </div>
                <div id="profile-picture-summary">
                    <div id="profile-picture-container">
                        <img src="<?php echo $profilePictureLink?>" id="profile-picture">
                        <?php if (!$u) {?>
                        <a>
                            <img src="<?php echo $website.'/assets/images/camera.svg'?>" 
                            id="profile-camera-icon" class="icon profile-details-icon">
                        </a>
                        <?php } ?>

                    </div>
                    <div id="profile-summary">
                        <h4 class="account-name"><?php echo $accountName?></h4>
                        <p>
                            <?php if ($basicRegistration) { 
                                echo $basicRegistration;
                            }

                            if ($teacherRegistration) {
                                echo " | ".$teacherRegistration;
                            }

                            if ($writerRegistration) {
                                echo " | ".$writerRegistration;
                            }

                            if ($editorRegistration) {
                                echo " | ".$editorRegistration;
                            }

                            if ($siteManagerRegistration) {
                                echo " | ".$siteManagerRegistration;
                            }

                            if ($dataAnalystRegistration) {
                                echo " | ".$dataAnalystRegistration;
                            }

                            if ($developerRegistration) {
                                echo " | ".$developerRegistration;
                            }

                            if ($funderRegistration) {
                                echo " | ".$funderRegistration;
                            }?>
                            </p>
                    
                    </div>

                     
                </div>
        </div>

           
           
            <div id="profile-details">    
                <?php if ($registrantId) { ?>
                <div id="profile-details-top">
                   <h5 id="details">My Details</h5>
                    <?php if (!$u) {?>
                        <a id="edit-profile-details-button"><img src="<?php echo $website.'/assets/images/edit.svg'?>"></a> 
                    <?php } ?>
                </div>

                <div id="profile-update-message" class="alert alert-danger"></div>
 
                <input placeholder="Description" class="description profile-description profile-details-edit" id="profile-description" value="<?php echo $registrantDescription;?>">
            
                <em class="profile-details-view"><?php echo $registrantDescription?></em>
            
                <hr>

                
           
                <div id="profile-details-bottom">
                    <div class="profile-details-group">
                            <input type="text" value="<?php echo $registrantId?>" hidden id="profile-hidden-userid">
                             <input type="text" value="<?php echo $type?>" hidden id="profile-hidden-account-type">
                            <?php if ($type=='Personal') { ?>
                                <input type="text" value="<?php echo $firstName?>" placeholder="First Name" class="profile-details-edit" id="profile-first-name">
                                <p class="profile-details-view">First Name:<?php echo $firstName ?></p><br>
                          

                                <input type="text" value="<?php echo $middleName?>" placeholder="Middle Name" class="profile-details-edit" id="profile-middle-name">
                                <p class="profile-details-view">Middle Name: <?php echo $middleName?></p><br>
                              

                                <input type="text" value="<?php echo $lastName?>" placeholder="Last Name" class="profile-details-edit" id="profile-last-name">
                                <p class="profile-details-view">Last Name:<?php echo $lastName?></p><br>
                            

                            <?php } ?>



                            <?php if($type=='School') {?>
                                <input type="text" value="<?php echo $accountName?>" title="Account Name" placeholder="Name" class="profile-details-edit" id="profile-account-name">
                           
                                <p class="profile-details-view">Name:<?php echo $accountName?></p><br>
                    
                                <select id="profile-school-type" class="profile-details-edit">
                                    <option value="" hidden>Category</option>
                                    <option  value="Elementary School" <?php if ($basicRegistration=='Elementary School') {echo 'selected';}?>>Elementary School</option>
                                    <option  value="Junior High School" <?php if ($basicRegistration=='Junior High School') {echo 'selected';}?>>Junior High School</option>
                                    <option  value="Senior High School" <?php if ($basicRegistration=='Senior High School') {echo 'selected';}?>>Senior High School</option>
                                    <option  value="College or University" <?php if ($basicRegistration=='College or University') {echo 'selected';}?>>College or University</option>
                                    <option  value="Integrated School" <?php if ($basicRegistration=='Integrated School') {echo 'selected';}?>>Integrated School</option>
                                </select>
                                <p class="profile-details-view">Type: <?php echo $basicRegistration ?></p><br>
                               

                            <?php } ?>


                            <input type="text" value="<?php echo $username?>" class="profile-details-edit" id="profile-username" placeholder="Username">
                            <p class="profile-details-view">Username:<?php echo $username?></p><br>
                          
                            <input type="text" value="<?php echo $emailAddress?>"  hidden id="profile-email-address" placeholder="Email Address">
                            <input type="text"value="<?php echo $emailAddress?>" disabled class="profile-details-edit" id="profile-email-address">
                           
                            <p class="profile-details-view">Email Address: <?php echo $emailAddress?></p><br>
                           
                          
                            <input type="text" value="<?php echo $mobileNumber?>" placeholder="Mobile Number" class="profile-details-edit" id="profile-mobile-number">
                           <p class="profile-details-view">Mobile Number:<?php echo $mobileNumber?></p><br>
                          
                    </div>

                    <?php if ($type=='Personal') { ?>
                    <div class="profile-details-group" >  
   
                            <input type="date" value="<?php echo $birthdate?>" required class="profile-details-edit" id="profile-birthdate">
                           
                            <p class="profile-details-view">Birthdate:<?php echo date ("M j, Y",strtotime($birthdate))?></p><br> 
                          
                             <select class="profile-details-edit" id="profile-gender">
                                <option value="" hidden>Gender</option>
                                <option  value="Male" <?php if ($gender=='Male') {echo 'selected';}?>>Male</option>
                                <option value="Female" <?php if ($gender=='Female') {echo 'selected';}?>>Female</option>
                                <option value="Other Gender" <?php if ($gender=='Other Gender') {echo 'selected';}?>>Other Gender</option>
                                <option value="No Gender" <?php if ($gender=='No Gender') {echo 'selected';}?>>No Gender</option>
                                <option value="Hide Gender" <?php if ($gender=='Hide Gender') {echo 'selected';}?>>Hide Gender</option>
                            </select> 
                            <p class="profile-details-view">Gender:<?php echo $gender?></p><br>
                           
                            <select class="profile-details-edit" id="profile-civil-status">
                                <option value="" hidden>Civil Status</option>
                                <option  value="Single" <?php if ($civilStatus=='Single') {echo 'selected';}?>>Single</option>
                                <option  value="Married" <?php if ($civilStatus=='Married') {echo 'selected';}?>>Married</option>
                                <option  value="Widowed" <?php if ($civilStatus=='Widowed') {echo 'selected';}?>>Widowed</option>
                                <option  value="Divorced" <?php if ($civilStatus=='Divorced') {echo 'selected';}?>>Divorced</option>
                                <option  value="Separated" <?php if ($civilStatus=='Separated') {echo 'selected';}?>>Separated</option>
                                <option  value="Common-law" <?php if ($civilStatus=='Common-law') {echo 'selected';}?>>Common-law</option>   
                            </select>                            
                            <p class="profile-details-view">Civil Status:<?php echo $civilStatus?></p><br>
                       

                            <select class="profile-details-edit" id="profile-educational-attainment">
                                <option value="" hidden>Educational Attainment</option>
                                <option  value="Elementary Undergraduate" <?php if ($education=='Elementary Undergraduate') {echo 'selected';}?>>Elementary Undergraduate</option>
                                <option  value="Elementary Graduate" <?php if ($education=='Elementary Graduate') {echo 'selected';}?>>Elementary Graduate</option>
                                <option  value="High School Undergraduate" <?php if ($education=='High School Undergraduate') {echo 'selected';}?>>High School Undergraduate</option>
                                <option  value="High School Graduate" <?php if ($education=='High School Graduate') {echo 'selected';}?>>High School Graduate</option>
                                <option  value="Associate Degree Holder" <?php if ($education==`Associate Degree Holder`) {echo 'selected';}?>>Associate Degree Holder</option>
                                <option  value="College Undergraduate" <?php if ($education=='College Undergraduate') {echo 'selected';}?>>College Undergraduate</option>
                                <option  value="College Graduate" <?php if ($education=='College Graduate') {echo 'selected';}?>>College Graduate</option>
                                <option  value="with Master's Degree" <?php if ($education=="with Master's Degree") {echo 'selected';}?>>with Master's Degree</option>
                                <option  value="with Doctorate Degree" <?php if ($education=="with Doctorate Degree") {echo 'selected';}?>>with Doctorate Degree</option>
                            </select>
                            <p class="profile-details-view">Education:<?php echo $education?></p><br>
                            
                            <input type="text" value="<?php echo $school?>" placeholder="School" class="profile-details-edit" id="profile-school">
                            <p class="profile-details-view">School: <?php echo $school?></p><br>
                         
                            <input type="text" name="Occupation" value="<?php echo $occupation?>" placeholder="Occupation" class="profile-details-edit" id="profile-occupation">
                            <p class="profile-details-view">Occupation:<?php echo $occupation?></p><br>
                        
                    </div>

                    <?php } ?>


                
                    
                    <div class="profile-details-group">
                        
                        <input type="text" value="Philippines" placeholder="Country" hidden id="profile-country">
                            <?php // Path to your JSON file
                            $data = json_decode(file_get_contents('../philippine_provinces_cities_municipalities_and_barangays_2019v2.json'), true);

                           // Prepare regions list for initial dropdown
                            $regions = [];
                            foreach ($data as $regionCode => $regionData) {
                                $regions[$regionCode] = $regionData['region_name'];
                            }?>

                        
                           <select id="profile-region" name="Region" class="profile-details-edit">
                                <option value="">Select Region</option>  
                                <?php foreach ($regions as $code => $name): ?>
                                <option value="<?php echo htmlspecialchars($code); ?>" <?php if ($region===$code) { echo 'selected';}?>><?php echo htmlspecialchars($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                           
                             <p class="profile-details-view">Region:<?php echo $region?></p><br>
                         


                            <select id="profile-province-state" name="Province-State"<?php if (!$province_state) {echo 'disabled';}?> class="profile-details-edit">
                                <option value="<?php echo $province_state;?>"><?php if ($province_state) {echo $province_state;} else {echo 'Select Province/State';} ?></option>
                            </select>
                            <p class="profile-details-view">Province/State:<?php echo $province_state?></p><br>
                           

                        
                            <select id="profile-city-municipality" name="City-Municipality" <?php if (!$city_municipality) {echo 'disabled';}?> class="profile-details-edit">
                                <option value="<?php echo $city_municipality;?>"> <?php if ($city_municipality) {echo $city_municipality;} else {echo 'Select City/Municipality';} ?></option>
                            </select>
                            <p class="profile-details-view">City/Municipality:<?php echo $city_municipality?></p><br>
                           

                           
                            <select id="profile-barangay" name="Barangay" <?php if (!$barangay) {echo 'disabled';}?> class="profile-details-edit">
                                <option value="<?php echo $barangay;?>"><?php if ($barangay) {echo $barangay;} else {echo 'Select Barangay';} ?></option>
                            </select>
                         
                            <p class="profile-details-view">Barangay:<?php echo $barangay?></p><br>
                       

                           
                            <input type="text" name="Street-Subd-Village" value="<?php echo $street_subd_village?>" title="Street/Subd./Village" placeholder="Street/Subd./Village" class="profile-details-edit" id="profile-street-subd-village">
                        
                            <p class="profile-details-view">Street/Subd./Village:<?php echo $street_subd_village?></p><br>
                            
                            <div class="cancel-submit-buttons-container profile-details-edit" >
                                <button id="update-profile-details-cancel-button" class="profile-details-edit">Cancel</button>
                                <button id="update-profile-details-submit-button" class="profile-details-edit">Submit</button>
                            </div>
    
                    
                    </div>
                    
                </div>

                <?php } ?>
        </div>             
</div>
<?php } ?>






            

          






<?php if($u && $uInfo){?>
<div class="profile">
            <div id="profile-top">
                <div id="cover-photo">
                    <div id="cover-photo-container">
                    <img src="<?php echo $u_coverPhotoLink?>">
                    </div>
                </div>
                <div id="profile-picture-summary">
                    <div id="profile-picture-container">
                        <img src="<?php echo $u_profilePictureLink?>" id="profile-picture">
                    </div>
                    <div id="profile-summary">
                    <h4 class="account-name u-account-name"><?php echo $u_accountName?></h4>
                    <p>
                        <?php 
                        
                       
                        if ($u_basicRegistration) { 
                            echo $u_basicRegistration;
                        }

                        if ($u_teacherRegistration) {
                            echo " | ".$u_teacherRegistration;
                        }

                        if ($u_writerRegistration) {
                            echo " | ".$u_writerRegistration;
                        }

                        if ($u_editorRegistration) {
                            echo " | ".$u_editorRegistration;
                        }

                        if ($u_siteManagerRegistration) {
                            echo " | ".$u_siteManagerRegistration;
                        }

                        if ($u_dataAnalystRegistration) {
                            echo " | ".$u_dataAnalystRegistration;
                        }

                        if ($u_developerRegistration) {
                            echo " | ".$u_developerRegistration;
                        }

                        if ($u_funderRegistration) {
                            echo " | ".$u_funderRegistration;
                        }
                        
                        ?>
                        </p>
                    
                    </div>

                </div>
            </div>

           

            <?php if (!$loggedIn || $u_userId!=$registrantId) { ?>
            <div class="account-access-details-container">
                <br>
                <?php if ($u_registrantDescription){?>
                    <hr>
                    <p><?php echo $u_registrantDescription;?></p>
                    <hr>
                <?php } ?>
                <br>
                <div class="account-access-message-container">
                    <?php if ($loggedIn) {?>
                        <p class="alert-danger account-access-message">Some details are hidden since it is not you.</p>
                    <?php } ?>

                    <?php if (!$loggedIn) {?>
                        <p class="alert-danger account-access-message">Some details are hidden when logged out. <a href="<?php echo $website.'/login/'?>"><strong>Login</strong></a> if it's your account.</p>
                    <?php } ?>
                </div>

            </div>
            <?php } ?>
                
                
           
  
        </div>
        <?php } ?>
