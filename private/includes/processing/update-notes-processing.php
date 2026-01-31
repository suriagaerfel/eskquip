<?php

require '../../initialize.php';
require '../../database.php';


// $notes= htmlspecialchars($_POST['notes']);

if (isset($_POST['note_submit'])) {

$notes= htmlspecialchars($_POST['note_notes']);
$userIdHidden = htmlspecialchars($_POST['note_userid']);
$regTypeCap = htmlspecialchars($_POST['note_regtype']);
$regType = htmlspecialchars($_POST['note_regtype_cap']);



 $sqlUpdateNotes = "UPDATE other_registrations 
                        SET otherNotes =?
                        WHERE otherUserId = $userIdHidden AND otherType='$regTypeCap'";

                         $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdateNotes);
    
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"s", $notes);
    mysqli_stmt_execute($stmt);

   echo 'Notes updated successfully!';
  }


}
