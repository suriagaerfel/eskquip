


<!DOCTYPE html>
<html>
<head>

    <?php 
    session_start();
if (isset($_POST['textarea'])) {
    $text = $_POST['textarea'];
    $_SESSION['autosave'] = $text; // Save to session
    $php_variable = $text; // Save to PHP variable
    echo "Saved: " . $text;
}
    
    
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <textarea id="myTextarea" rows="10" cols="50"><?php echo $_SESSION['autosave'];?></textarea>

    <script>
        // Autosave every 1 second
        setInterval(function() {
            var text = $("#myTextarea").val();
            $.ajax({
                url:window.location.href,
                type: "POST",
                data: { textarea: text },
                success: function(response) {
                    // Optional: show saved status
                    console.log("Saved: " + response);
                }
            });
        }, 1000);
    </script>
</body>
</html>




