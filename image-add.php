<?php
if (! empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "uploads/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    $targetFile = $targetPath . $_FILES['file']['name'];
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "true";
    } else {
        echo "false";
    }
}
if (! empty($_GET["action"]) && $_GET["action"] == "save") {
    require_once __DIR__ . '/DataSource.php';
    $database = new DataSource();
    $sql = "INSERT INTO images_info (image_path) VALUES(?)";
    $paramType = 's';
    $paramValue = array(
        $imagePath
    );
    print $current_id = $database->insert($sql, $paramType, $paramValue);
}
?>
<html>
<head>
<title>Add New Image</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="dropzone/dropzone.css" />
<script type="text/javascript" src="dropzone/dropzone.js"></script>
</head>
<body>
    <div class="phppot-container">
        <form name="frmimage" action="image-add.php?action=save"
            class="dropzone"></form>
        <div class="row">
            <a href="index.php" class="mr-20">Back to List</a>
        </div>
    </div>
</body>
</html>