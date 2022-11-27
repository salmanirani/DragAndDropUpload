<?php
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();
if (! empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "uploads/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    $targetFile = $targetPath . $_FILES['file']['name'];
    $sql = "select image_path from images_info where image_id=?";
    $paramType = 'i';
    $paramValue = array(
        $_GET["image_id"]
    );
    $image = $database->select($sql, $paramType, $paramValue);
    if (move_uploaded_file($tempFile, $targetFile)) {
        if (file_exists($image[0]['image_path'])) {
            if (! unlink($image[0]['image_path'])) {
                echo ("Error deleting $image");
            } else {
                echo ("Deleted " . $image[0]['image_path']);
            }
        }
    } else {
        echo ("Problem in uploading the file in dropzone.s");
    }
    if (! empty($_GET["action"]) && $_GET["action"] == "save") {
        $query = "UPDATE images_info SET  image_path=? WHERE image_id=?";
        $paramType = 'si';
        $paramValue = array(
            $imagePath,
            $_GET["image_id"]
        );
        $id = $database->update($query, $paramType, $paramValue);
    }
    exit();
}
$sql = "select * from images_info where image_id=? ";
$paramType = 'i';
$paramValue = array(
    $_GET["image_id"]
);
$result = $database->select($sql, $paramType, $paramValue);
?>
<html>
<head>
<title>Edit Image</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="dropzone/dropzone.css" />
<script type="text/javascript" src="dropzone/dropzone.js"></script>
<style>
.box-preview {
    width: 300px;
    margin: 30px auto;
    border: 10px #f3f3f6 solid;
    border-radius: 2px;
}

.box-preview img {
    width: 100%;
}

.preview-footer {
    padding: 10px 0px;
    background: #f3f3f6;
    color: #4e4e4e;
}
</style>
</head>
<body>
    <div class="box-preview">
        <img src="<?php echo $result[0]["image_path"]; ?>" />
        <div class="preview-footer"><?php echo $result[0]["image_path"]; ?></div>
    </div>
    <div class="phppot-container">
        <form name="frmImage"
            action="image-edit.php?action=save&image_id=<?php echo $_GET['image_id']?>"
            class="dropzone"></form>
        <div class="row">
            <a href="index.php" class="mr-20">Back to List</a>
        </div>
    </div>
</body>
</html>