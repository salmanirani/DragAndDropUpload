<?php
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();
if (isset($_GET["image_id"])) {
    $sql = "DELETE FROM images_info WHERE image_id=?";
    $paramType = "i";
    $paramValue = array(
        $_GET["image_id"]
    );
    $database->delete($sql, $paramType, $paramValue);
}
header("Location:index.php");
exit();
?>