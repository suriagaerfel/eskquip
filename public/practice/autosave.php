<?php
session_start();
if (isset($_POST['textarea'])) {
    $text = $_POST['textarea'];
    $_SESSION['autosave'] = $text; // Save to session
    $php_variable = $text; // Save to PHP variable
    echo "Saved: " . $text;
}
?>