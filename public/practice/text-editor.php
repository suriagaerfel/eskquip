<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Custom Text Editor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="toolbar">
        <button onclick="insertImage()">Insert Image</button>
        <button onclick="insertVideo()">Insert Video</button>
        <button onclick="insertTable()">Insert Table</button>
    </div>
    <div id="editor" contenteditable="true" class="editor"></div>
    <script src="script.js"></script>
</body>
</html>