<?php


require '../../initialize.php';
require '../../database.php';


if (isset($_POST['update_profile_details_submit'])) {

    $profile = htmlspecialchars($_POST['profile_hidden_userid']);
    $accountType = htmlspecialchars($_POST ['profile_hidden_account_type']);
    $update_registrantDescription = htmlspecialchars($_POST["profile_description"]);
    
    $update_username = htmlspecialchars($_POST["profile_username"]);
    $update_emailAddress = htmlspecialchars($_POST["profile_email_address"]);
    $update_mobileNumber = htmlspecialchars($_POST["profile_mobile_number"]);

    $update_addressStreet = htmlspecialchars($_POST["profile_street_subd_village"]);
    $update_addressBarangay = htmlspecialchars($_POST["profile_barangay"]);
    $update_addressCity = htmlspecialchars($_POST["profile_city_municipality"]);

    $update_addressCountry = htmlspecialchars($_POST["profile_country"]);
    $update_addressRegion = htmlspecialchars($_POST["profile_region"]);
    $update_addressProvince = htmlspecialchars($_POST["profile_province_state"]);


    


    $updateErrors=[];
    $responses = [];

  
    if ($accountType=='Personal') {

        $update_firstName = htmlspecialchars($_POST["profile_first_name"]);
        $update_middleName = htmlspecialchars($_POST["profile_middle_name"]);
        $update_lastName = htmlspecialchars($_POST["profile_last_name"]);
    
        $accountName = [];
        
        if(empty($update_firstName)) {
        $error='Empty first name.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);   
        } else {
            array_push ($accountName,$update_firstName);
        }

        if ($update_middleName) {
            array_push ($accountName,$update_middleName);
        }

        if(empty($update_lastName)) {
        $error='Empty last name.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);   
        } else {
            array_push ($accountName,$update_lastName);
        }

        $update_accountName = implode(' ',$accountName);

        $update_birthdate = htmlspecialchars($_POST["profile_birthdate"]);
        $update_gender = htmlspecialchars($_POST["profile_gender"]);
        $update_civilStatus = htmlspecialchars($_POST["profile_civil_status"]);

        $update_educationalAttainment = htmlspecialchars($_POST["profile_educational_attainment"]);
        $update_school = htmlspecialchars($_POST["profile_school"]);
        $update_occupation = htmlspecialchars($_POST["profile_occupation"]);

        $update_basicRegistration = 'Basic User';

    }

     if ($accountType=='School') {
         $update_schoolType =htmlspecialchars($_POST["profile_school_type"]);

        if(empty($update_schoolType)) {
        $error='Empty school type.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);   
        } 
        
       
        $update_accountName =htmlspecialchars($_POST["profile_account_name"]);

        if(empty($update_accountName)) {
        $error='Empty school name.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);   
        } 

         $update_basicRegistration = $update_schoolType;
        
    }
    


    
    if(empty($update_username)) {
    $error='Empty username.';
    array_push ($updateErrors,$error);
    array_push ($responses,$error);   
    } else {
        $sqlUsername = "SELECT * FROM registrations WHERE registrantUsername = '$update_username'";
        $sqlUsernameResult = mysqli_query($conn,$sqlUsername);
        $username = $sqlUsernameResult->fetch_assoc();

        if($username) {
            if($username['registrantId']!=$profile) {
            $error='Username is already taken.';
                array_push ($updateErrors,$error);
                array_push ($responses,$error);   
            } 
        }
    }

    
    if(empty($update_emailAddress)) {
           $error='Empty email address.';
            array_push ($updateErrors,$error);
            array_push ($responses,$error);   
    } else {
        if (!filter_var($update_emailAddress, FILTER_VALIDATE_EMAIL)) {
        $error='Invalid email address.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);   
        } else {

            $sqlEmailAddress = "SELECT * FROM registrations WHERE registrantEmailAddress = '$update_emailAddress'";
            $sqlEmailAddressResult = mysqli_query($conn,$sqlEmailAddress);
            $emailAddress = $sqlEmailAddressResult->fetch_assoc();

            if($emailAddress) {
                if($emailAddress['registrantId']!=$profile) {
                   $error='Email address is already taken.';
                    array_push ($updateErrors,$error);
                    array_push ($responses,$error);  
                } 
            }

        }
    }


    
    if($update_mobileNumber) {
        if( !is_numeric($update_mobileNumber)) {
        $error='Invalid mobile number.';
        array_push ($updateErrors,$error);
        array_push ($responses,$error);  
        } 
    } 


    
    if(!$updateErrors) {

        $sqlUpdateDetails = "UPDATE registrations 
                        SET registrantFirstName =?,
                        registrantMiddleName = ?,
                        registrantLastName = ?,
                        registrantAccountName = ?,
                        registrantBasicAccount = ?,
                        registrantDescription=?,
                        registrantUsername = ?,
                        registrantEmailAddress = ?,
                        registrantMobileNumber = ?,
                        registrantBirthdate = ?,
                        registrantGender = ?,
                        registrantCivilStatus = ?,
                        registrantAddressStreet = ?,
                        registrantAddressBarangay = ?,
                        registrantAddressCity = ?,
                        registrantAddressProvince = ?,
                        registrantAddressRegion = ?,
                        registrantAddressCountry = ?,
                        registrantAddressZipCode = ?,
                        registrantEducationalAttainment=?,
                        registrantSchool=?,
                        registrantOccupation =?
                        WHERE registrantId = $profile";

    
   

        $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateDetails);
            
            if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssss", $update_firstName, $update_middleName,$update_lastName,$update_accountName,$update_basicRegistration,$update_registrantDescription,$update_username,$update_emailAddress,$update_mobileNumber,$update_birthdate,$update_gender, $update_civilStatus,$update_addressStreet,$update_addressBarangay,$update_addressCity,$update_addressProvince,$update_addressRegion,$update_addressCountry,$update_addressZipCode,$update_educationalAttainment,$update_school,$update_occupation);
            mysqli_stmt_execute($stmt);

            echo 'Updated successfully!';

                                    
            }   
                


    } else {
        foreach ($responses as $response) {
        echo $response ."<br>";
        }  
    }




     

}




if (isset($_POST['upload_submit']))  {
    
    $uploadType = htmlspecialchars($_POST['upload_type']);
    $userId = htmlspecialchars($_POST['profile_upload_registrant_hidden_id']);
    $accountNameImage  = htmlspecialchars($_POST["profile_upload_registrant_hidden_accountName"]);


    $imageFileName = '';
    $imageFileSize = '';
    $imageFileNameExt = '';
    $imageFileNameActualExt = '';

    $allowedImage = ['jpeg','jpg'];
    $maxSize = 10 * 1024 * 1024;

     $imageErrors = [];
    $responses = [];

   if (isset($_FILES ['upload_image'])) {
    $image = $_FILES ['upload_image'];
    $imageFileName = $image ['name'];
    $imageFileSize = $image ['size'];
    $imageFileNameExt = explode ('.',$imageFileName);
    $imageFileNameActualExt = strtolower(end($imageFileNameExt));

        if ($imageFileNameActualExt=='jpg') {
            $imageFileNameActualExt='jpeg';
        }
    


        if((!in_array($imageFileNameActualExt,$allowedImage))) {
            $error= 'Please select an image in JPEG or JPG format only.';
        array_push ($imageErrors,$error);
        array_push ($responses,$error);


        }

        if($imageFileSize>$maxSize) {
            $error= 'Your image is too big in size.';
        array_push ($imageErrors,$error);
        array_push ($responses,$error);

        }



   } else {
        $error= 'You did not select an image.';
        array_push ($imageErrors,$error);
        array_push ($responses,$error);
   }
    
    

    if (!$imageErrors) {

    if($uploadType=='Profile Picture') {
        $imageFolder = '../../uploads/profile-pictures/';
        $imageLinkColumn = 'registrantProfilePictureLink';
        $maxResolution = 500;
        
    }

    if ($uploadType=='Cover Photo') {
        $imageFolder = '../../uploads/cover-photos/';
        $imageLinkColumn = 'registrantCoverPhotoLink';
        $maxResolution = 1000;
    
    }

    $sqlRegistrantData = "SELECT * FROM registrations WHERE registrantId = '$userId'";
    $sqlRegistrantDataResult = mysqli_query($conn,$sqlRegistrantData);
    $registrantData= $sqlRegistrantDataResult->fetch_assoc();

    $registrantImageLink = $registrantData [$imageLinkColumn];
    

    if ($registrantImageLink) {
        $registrantImageLinkDelete = '../..'.$registrantImageLink;
        $registrantImageLinkDeleted = unlink($registrantImageLinkDelete);
    } else {
         $registrantImageLinkDelete='';
          $registrantImageLinkDeleted='';
    }

    // Create folders if they don't exist
    if (!is_dir($imageFolder)) {
        mkdir($imageFolder, 0777, true);
    }

    $imageFile = $imageFolder .str_replace(" ","_",$accountNameImage)."-".date("YmdHis",time()).".".$imageFileNameActualExt;

    $uploadOk = 1;

    if (move_uploaded_file($image["tmp_name"], $imageFile)) {
        $uploadOk = 1;
    } 


    //Resize and crop image
    
    if ($imageFileNameActualExt=='jpeg') {
    $originalImage = imagecreatefromjpeg($imageFile);
    }

    if ($imageFileNameActualExt=='png') {
    $originalImage = imagecreatefrompng($imageFile);
    }


    
    $originalWidth = imagesx($originalImage);
    $originalHeight = imagesy($originalImage);

    if ($originalHeight > $originalWidth) {
    $ratio = $maxResolution / $originalWidth;
    $newWidth = $maxResolution;
    $newHeight = $originalHeight * $ratio;

    $difference= $newHeight - $newWidth;

    $x=0;
    $y = round($difference/2);

    } 
    
    elseif($originalHeight < $originalWidth) {

      $ratio = $maxResolution / $originalHeight;
      $newHeight = $maxResolution;
      $newWidth = $originalWidth * $ratio;

      $difference= $newWidth - $newHeight;

      $x = round($difference/2);
      $y=0;
    } 
    
    elseif ($originalHeight == $originalWidth) {

    
      $newWidth = $maxResolution;
      $newHeight = $maxResolution;

        $x=0;
        $y=0;

    
       
    }


    if ($originalImage) {
    $newImage = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresampled($newImage,$originalImage,0,0,0,0,$newWidth,$newHeight,$originalWidth,$originalHeight); 

    if ($uploadType=='Profile Picture') {
    $newCropImage = imagecreatetruecolor($maxResolution,$maxResolution);
    imagecopyresampled($newCropImage,$newImage,0,0,$x,$y,$maxResolution,$maxResolution,$maxResolution,$maxResolution); 
    }

    if ($uploadType=='Cover Photo') {

   $newCropImage = imagecreatetruecolor($maxResolution,$maxResolution/3);
    imagecopyresampled($newCropImage,$newImage,0,0,$x,$y,$maxResolution,$maxResolution,$maxResolution,$maxResolution); 
    }

    imagejpeg($newCropImage,$imageFile,90);
    }


  

    $uploadedImageFile= substr($imageFile,5);
    $imageStatus = 0;

    $sqlUpdateImage = "UPDATE registrations
                        SET 
                        $imageLinkColumn=?
                        WHERE registrantId = $userId";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateImage);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $uploadedImageFile);

    mysqli_stmt_execute($stmt);

                                
        echo 'Upload Successful';

     }

     
    } else {
        foreach ($responses as $response) {
        echo $response."<br>";
        }
    }
    
}
       



if (isset($_POST ['updateBankDetails'])) {
    $fileId = htmlspecialchars($_POST['fileIdHidden']);
    $teacherId = htmlspecialchars($_POST['teacherIdHidden']);
    $channel = htmlspecialchars($_POST['paymentChannel']);
    $accountName = htmlspecialchars($_POST['accountName']);
    $accountNumber = htmlspecialchars($_POST['accountNumber']);

    if ($fileId) {
    $goBackURL = 'Location: ' .$website.'/workspace/teacher.php?edit=yes&file='.$fileId;
    } else {
        $goBackURL = 'Location: ' .$website.'/workspace/teacher.php';
    }

    $_SESSION ['paymentChannel']=$channel;
    $_SESSION ['accountName'] = $accountName;
    $_SESSION ['accountNumber'] = $accountNumber;

 
     $sqlUpdatePaymentInfo = "UPDATE registrations
                        SET registrantPaymentChannel=?,
                        registrantBankAccountName=?,
                        registrantBankAccountNumber=?
                        WHERE registrantId = $teacherId";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdatePaymentInfo);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss", $channel, $accountName,$accountNumber);

    mysqli_stmt_execute($stmt);

    $_SESSION ['payment-updated'] = "yes";
    
    unset($_SESSION ['paymentChannel']);
    unset($_SESSION ['accountName']);
    unset($_SESSION ['accountNumber']);


    header ($goBackURL);

                             
    }   

}



if (isset($_POST ['updateReviewSchedules'])) {
    $fileId = htmlspecialchars($_POST['fileIdHidden']);
    $teacherId = htmlspecialchars($_POST['teacherIdHidden']);
    $reviewSchedules = htmlspecialchars($_POST['reviewSchedules']);

     if ($fileId) {
    $goBackURL = 'Location: ' .$website.'/workspace/teacher.php?edit=yes&file='.$fileId;
    } else {
        $goBackURL = 'Location: ' .$website.'/workspace/teacher.php';
    }
    

    $_SESSION ['reviewSchedules']=$_POST['reviewSchedules'];
 
     $sqlUpdatePaymentInfo = "UPDATE registrations
                        SET registrantReviewSchedules=?
                        WHERE registrantId = $teacherId";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdatePaymentInfo);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $reviewSchedules);

    mysqli_stmt_execute($stmt);

    $_SESSION ['schedules-updated'] = "yes";
    unset($_SESSION ['reviewSchedules']);
;
    header ($goBackURL);

                             
    }   

}