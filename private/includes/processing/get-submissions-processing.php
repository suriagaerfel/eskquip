<?php 

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['get_submissions'])) {

$regType = $_POST['regtype'];


$recordedRegistration='';
$recordedRegistrationStatus='';

            
$sqlSubmissions = "SELECT * FROM other_registrations WHERE otherUserId = $registrantId AND otherType='$regType'";
$sqlSubmissionsResult = mysqli_query($conn,$sqlSubmissions);
$submitted= $sqlSubmissionsResult->fetch_assoc();

if($submitted) {
    $submissions = [];
    $submittedSample= $submitted['otherSample'];
    $submittedLicenseCertification= $submitted['otherLicenseCertification'];
    $submittedAgreement= $submitted['otherAgreement'];

    if ($submittedSample) {
        array_push($submissions,$submittedSample);
    }

     if ($submittedLicenseCertification) {
        array_push($submissions,$submittedLicenseCertification);
    }

     if ($submittedAgreement) {
        array_push($submissions,$submittedAgreement);
    }
    

    foreach ($submissions as $submission) {
                echo $submission ."<br>";
                }
    
} else {
    echo 'Did not submit';
}

}




?>