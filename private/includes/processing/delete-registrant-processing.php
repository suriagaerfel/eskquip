<?php

require '../../initialize.php';
require '../../database.php';


if (isset($_GET['deletedid'])) {
    $registrantToDelete = htmlspecialchars($_GET['deletedid']);

    $sqlDeleteId = mysqli_query($conn,"delete from registrations where registrantId =  $registrantToDelete");
    $sqlDeleteFromTeachers = mysqli_query($conn,"delete from teacher_registrations where teacherUserId =  $registrantToDelete");

    header('Location:'.$website.'/workspace/site-manager.php');

}