<?php 

require '../../initialize.php';
require '../../database.php';


if (isset($_POST['check_registration'])) {

$regType = $_POST['regtype'];


$recordedRegistration='';
$recordedRegistrationStatus='';

            
$checkRegistration = "SELECT * FROM other_registrations WHERE otherUserId = $registrantId AND otherType='$regType'";
$checkRegistrationResult = mysqli_query($conn,$checkRegistration);
$recordedRegistration = $checkRegistrationResult->fetch_assoc();

if($recordedRegistration) {
    $recordedRegistrationStatus= $recordedRegistration['otherStatus'];
    echo $recordedRegistrationStatus;
} else {
    echo 'No recorded registration';
}

}




?>