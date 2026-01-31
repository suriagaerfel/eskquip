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

           
            <form id="profile-details-form" method="post" action="../../private/includes/processing/update-details-processing.php"> 
                 
                   

                <?php if ($loggedIn) { ?>
                <div id="profile-details-top">
                   <h5 id="details">My Details</h5>
                    <?php if (!$u) {?>
                        <?php if(!isset($_GET['update-details'])) { ?>
                        <a href="<?php echo $website.'/account/?update-details=true&userid='.$registrantId.'#details'?>"><img src="<?php echo $website.'/assets/images/edit.svg'?>"></a>

                        <a id="edit-profile-details"><img src="<?php echo $website.'/assets/images/edit.svg'?>"></a>
                        <?php } ?>
                    <?php } ?>

                </div>

                 <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Description?>
                    <textarea type="text" name="registrantDescription" title="Description" placeholder="Description" class="description profile-description"><?php echo $registrantDescription;?></textarea>
                <?php } else {
                    echo "<em>$registrantDescription</em>";
                } ?>

                <hr>

                <?php //This appears when the first name is empty.
        
                if (isset($_SESSION ['empty-first-name'])) {

                echo "<div class='alert alert-danger'>First name is required.</div>";
                unset ($_SESSION ['empty-first-name']);

                } ?>

                <?php //This appears when the last name is empty.
        
                if (isset($_SESSION ['empty-last-name'])) {

                echo "<div class='alert alert-danger'>Last name is required.</div>";
                unset ($_SESSION ['empty-last-name']);

                } ?>

                <?php //This appears when the last name is empty.
        
                if (isset($_SESSION ['empty-username'])) {

                echo "<div class='alert alert-danger'>Username is required.</div>";
                unset ($_SESSION ['empty-username']);

                } ?>

                 <?php //This appears when the username is already used.
        
                if (isset($_SESSION ['username-taken'])) {

                echo "<div class='alert alert-danger'>The username is already taken.</div>";
                unset ($_SESSION ['username-taken']);

                } ?>

                <?php //This appears when the email address is empty.
        
                if (isset($_SESSION ['empty-email-address'])) {

                echo "<div class='alert alert-danger'>Email address is required.</div>";
                unset ($_SESSION ['empty-email-address']);

                } ?>

                <?php //This appears when the email address is invalid.
        
                if (isset($_SESSION ['invalid-email-address'])) {

                echo "<div class='alert alert-danger'>Email address is not valid.</div>";
                unset ($_SESSION ['invalid-email-address']);

                } ?>

                <?php //This appears when the email address is already used.
        
                if (isset($_SESSION ['email-address-taken'])) {

                echo "<div class='alert alert-danger'>The email address is already taken.</div>";
                unset ($_SESSION ['email-address-taken']);

                } ?>


                <?php //This appears when the mobile number is not valid.
        
                if (isset($_SESSION ['invalid-mobile-number'])) {

                echo "<div class='alert alert-danger'>Mobile number must contain numbers only.</div>";
                unset ($_SESSION ['invalid-mobile-number']);

                } ?>

           
            <div id="profile-details-bottom">
                    <div class="profile-details-group">

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Hidden Id?>
                            <input type="text" name="hiddenId" value="<?php echo $registrantId?>"title="Registrant Id" placeholder="Registrant Id" hidden>
                            <?php } ?>





                            <?php if ($type=='Personal') { ?>
                    
                                <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //First Name?>
                                <input type="text" name="firstName" value="<?php echo $firstName?>"title="First Name" placeholder="First Name">
                                <?php } else {
                                    echo "<p>First Name: ".$firstName."</p><br>";
                                } ?>

                                
                                <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Middle Name?>
                                <input type="text" name="middleName" value="<?php echo $middleName?>"title="Middle Name" placeholder="Middle Name">
                                <?php } else {
                                    echo "<p>Middle Name: ".$middleName."</p><br>";
                                } ?>


                                <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Last Name?>
                                <input type="text" name="lastName" value="<?php echo $lastName?>"title="Last Name" placeholder="Last Name">
                                <?php } else {
                                    echo "<p>Last Name: ".$lastName."</p><br>";
                                } ?>

                            <?php } ?>



                            <?php if($type=='School') {?>
                                <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Account Name?>
                                <input type="text" name="firstName" value="<?php echo $firstName?>" hidden>
                                <input type="text" name="lastName" value="<?php echo $lastName?>" hidden>
                                <input type="text" name="accountName" value="<?php echo $accountName?>"title="Account Name" placeholder="Account Name">
                                <?php } else {
                                    echo "<p>Name: ".$accountName."</p><br>";
                                } ?>

                                <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Basic Registration?>
                                <select name="basicRegistration" id="selectBasicRegistration">">
                                    <option value="" hidden>Category</option>
                                    <option  value="Elementary School" <?php if ($basicRegistration=='Elementary School') {echo 'selected';}?>>Elementary School</option>
                                    <option  value="Junior High School" <?php if ($basicRegistration=='Junior High School') {echo 'selected';}?>>Junior High School</option>
                                    <option  value="Senior High School" <?php if ($basicRegistration=='Senior High School') {echo 'selected';}?>>Senior High School</option>
                                    <option  value="College or University" <?php if ($basicRegistration=='College or University') {echo 'selected';}?>>College or University</option>
                                    <option  value="Integrated School" <?php if ($basicRegistration=='Integrated School') {echo 'selected';}?>>Integrated School</option>
                                </select>
                                <?php } else {
                                    echo "<p>Type: ".$basicRegistration."</p><br>";
                                } ?>

                            <?php } ?>


                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Username?>
                            <input type="text" name="username" value="<?php echo $username?>" title="Username">
                            <?php } else {
                                echo "<p>Username: ".$username."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Email Address?>
                            <input type="text" name="emailAddress" value="<?php echo $emailAddress?>"  title="Email Address" hidden>
                            <input type="text" name="emailAddress" value="<?php echo $emailAddress?>"  title="Email Address" disabled>
                            <?php } else {
                                echo "<p>Email Address: ".$emailAddress."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Mobile Number?>
                            <input type="text" name="mobileNumber" value="<?php echo $mobileNumber?>" title="Mobile Number" placeholder="Mobile Number">
                            <?php } else {
                                echo "<p>Mobile Number: ".$mobileNumber."</p><br>";
                            } ?> 
                    </div>

                    <?php if ($type=='Personal') { ?>
                    <div class="profile-details-group" >  

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Birthdate?>
                            <input type="date" name="birthdate" value="<?php echo $birthdate?>" title="Birthdate" required>
                            <?php } else {
                                echo "<p>Birthdate: ".date ("M j, Y",strtotime($birthdate))."</p><br>"; 
                            } ?> 

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Gender?>
                             <select name="gender" id="selectGender">">
                                <option value="" hidden>Gender</option>
                                <option  value="Male" <?php if ($gender=='Male') {echo 'selected';}?>>Male</option>
                                <option value="Female" <?php if ($gender=='Female') {echo 'selected';}?>>Female</option>
                                <option value="Other Gender" <?php if ($gender=='Other Gender') {echo 'selected';}?>>Other Gender</option>
                                <option value="No Gender" <?php if ($gender=='No Gender') {echo 'selected';}?>>No Gender</option>
                                <option value="Hide Gender" <?php if ($gender=='Hide Gender') {echo 'selected';}?>>Hide Gender</option>
                            </select>
                            <?php } else {
                                echo "<p>Gender: ".$gender."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Civil Status?>
                            <select name="civilStatus" id="selectCivilStatus">">
                                <option value="" hidden>Civil Status</option>
                                <option  value="Single" <?php if ($civilStatus=='Single') {echo 'selected';}?>>Single</option>
                                <option  value="Married" <?php if ($civilStatus=='Married') {echo 'selected';}?>>Married</option>
                                <option  value="Widowed" <?php if ($civilStatus=='Widowed') {echo 'selected';}?>>Widowed</option>
                                <option  value="Divorced" <?php if ($civilStatus=='Divorced') {echo 'selected';}?>>Divorced</option>
                                <option  value="Separated" <?php if ($civilStatus=='Separated') {echo 'selected';}?>>Separated</option>
                                <option  value="Common-law" <?php if ($civilStatus=='Common-law') {echo 'selected';}?>>Common-law</option>   
                            </select>

                            <?php } else {
                                echo "<p>Civil Status: ".$civilStatus."</p><br>";
                            } ?>


                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Education?>
                            <select name="EducationalAttainment" id="selectCivilStatus">">
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

                            <?php } else {
                                echo "<p>Education: ".$education."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //School?>
                            <input type="text" name="School" value="<?php echo $school?>" title="School" placeholder="School">
                            <?php } else {
                                echo "<p>School: ".$school."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Occupation?>
                            <input type="text" name="Occupation" value="<?php echo $occupation?>" title="Occupation" placeholder="Occupation">
                            <?php } else {
                                echo "<p>Occupation: ".$occupation."</p><br>";
                            } ?>
                    </div>

                    <?php } ?>


                
                    
                    <div class="profile-details-group">
                        <?php if ($updateDetails== "true" && $getUserId==$registrantId) {
                            // Path to your JSON file
                            $data = json_decode(file_get_contents('../philippine_provinces_cities_municipalities_and_barangays_2019v2.json'), true);

                           // Prepare regions list for initial dropdown
                            $regions = [];
                            foreach ($data as $regionCode => $regionData) {
                                $regions[$regionCode] = $regionData['region_name'];
                            }
                         } ?>

                        

                        <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Country?>
                            <input type="text" name="Country" value="Philippines" title="Country" placeholder="Country" hidden>
                            <input type="text" name="Country" value="Philippines" title="Country" placeholder="Country" hidden>

                        <?php } ?>

                        <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Region ?>
                           <select id="region" name="Region">
                                <option value="">Select Region</option>  
                                <?php foreach ($regions as $code => $name): ?>
                                <option value="<?php echo htmlspecialchars($code); ?>" <?php if ($region===$code) { echo 'selected';}?>><?php echo htmlspecialchars($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php } else {
                                echo "<p>Region: ".$region."</p><br>";
                            } ?>



                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Province-State?>
                            <select id="province" name="Province-State" <?php if (!$province_state) {echo 'disabled';}?>>
                                <option value="<?php echo $province_state;?>"><?php if ($province_state) {echo $province_state;} else {echo 'Select Province/State';} ?></option>
                            </select>
                            <?php } else {
                                echo "<p>Province/State: ".$province_state."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //City-Municipality?>
                            <select id="municipality" name="City-Municipality" <?php if (!$city_municipality) {echo 'disabled';}?>>
                                <option value="<?php echo $city_municipality;?>"> <?php if ($city_municipality) {echo $city_municipality;} else {echo 'Select City/Municipality';} ?></option>
                            </select>
                            <?php } else {
                                echo "<p>City/Municipality: ".$city_municipality."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Barangay?>
                            <select id="barangay" name="Barangay" <?php if (!$barangay) {echo 'disabled';}?>>
                                <option value="<?php echo $barangay;?>"><?php if ($barangay) {echo $barangay;} else {echo 'Select Barangay';} ?></option>
                            </select>
                            <?php } else {
                                echo "<p>Barangay: ".$barangay."</p><br>";
                            } ?>

                            <?php if ($updateDetails== "true" && $getUserId==$registrantId) { //Street?>
                            <input type="text" name="Street-Subd-Village" value="<?php echo $street_subd_village?>" title="Street/Subd./Village" placeholder="Street/Subd./Village">
                            <?php } else {
                                echo "<p>Street/Subd./Village: ".$street_subd_village."</p><br>";
                            } ?>

                            
                            <?php if($updateDetails=="true" && $getUserId ==$registrantId) { //Buttons?>
                            <div class="cancel-submit-buttons-container">
                                <a href="<?php echo $website.'/account/';?>" class="cancel-button">Cancel</a>
                                <input type="text" name="accountType" value="<?php echo $type?>" hidden>
                                <button type="submit" name="updateDetails" >Submit</button>
                            </div>
                            <?php } ?>
                    
                    </div>
                    
                </div>

                <?php } ?>
            </form>
  
        </div>
        <?php } ?>






            <?php //Script for auto-populated options

            if (!$u && $updateDetails== "true" && $getUserId==$registrantId) { ?>
                                    
            <script>
            // Pass the PHP data to JavaScript
            const data = <?php echo json_encode($data); ?>;

            const regionSelect = document.getElementById('region');
            const provinceSelect = document.getElementById('province');
            const municipalitySelect = document.getElementById('municipality');
            const barangaySelect = document.getElementById('barangay');

            regionSelect.addEventListener('change', function() {
                const regionCode = this.value;
                provinceSelect.innerHTML = '<option value=""> Select Province/State </option>';
                municipalitySelect.innerHTML = '<option value=""> Select City/Municipality </option>';
                barangaySelect.innerHTML = '<option value=""> Select Barangay</option>';
                municipalitySelect.disabled = true;
                barangaySelect.disabled = true;

                if(regionCode && data[regionCode]) {
                    const provinces = data[regionCode]['province_list'];
                    for(let p in provinces) {
                        let option = document.createElement('option');
                        option.value = p;
                        option.textContent = p;
                        provinceSelect.appendChild(option);
                    }
                    provinceSelect.disabled = false;
                } else {
                    provinceSelect.disabled = true;
                }
            });

            provinceSelect.addEventListener('change', function() {
                const regionCode = regionSelect.value;
                const province = this.value;
                municipalitySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;

                if(regionCode && province && data[regionCode]['province_list'][province]) {
                    const municipalities = data[regionCode]['province_list'][province]['municipality_list'];
                    for(let m in municipalities) {
                        let option = document.createElement('option');
                        option.value = m;
                        option.textContent = m;
                        municipalitySelect.appendChild(option);
                    }
                    municipalitySelect.disabled = false;
                } else {
                    municipalitySelect.disabled = true;
                }
            });

            municipalitySelect.addEventListener('change', function() {
                const regionCode = regionSelect.value;
                const province = provinceSelect.value;
                const municipality = this.value;
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';

                if(regionCode && province && municipality && data[regionCode]['province_list'][province]['municipality_list'][municipality]) {
                    const barangays = data[regionCode]['province_list'][province]['municipality_list'][municipality]['barangay_list'];
                    for(let i=0; i < barangays.length; i++) {
                        let option = document.createElement('option');
                        option.value = barangays[i];
                        option.textContent = barangays[i];
                        barangaySelect.appendChild(option);
                    }
                    barangaySelect.disabled = false;
                } else {
                    barangaySelect.disabled = true;
                }
            });
            </script>

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
