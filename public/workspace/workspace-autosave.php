<?php

if(isset($_POST['articleContentAutoSave'])) {
    // Assign the received data to a PHP variable
    $auto_saved_article_content = $_POST['articleContentAutoSave'];

    // You can now process this data, for example:
    // 1. Store in a session variable
    // $_SESSION['user_input'] = $saved_data; 
    
    // 2. Save to a database (requires additional code)

    // Send a response back to the JavaScript
    echo "Data successfully saved: " . htmlspecialchars($saved_data);
} 
?>




