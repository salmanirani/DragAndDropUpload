<?php
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();
$sql = "SELECT * FROM images_info ORDER BY image_id DESC";
$result = $database->select($sql);
?>
<html>
<head>
<title>Images List</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
    <div class="phppot-container">
        <form name="frmImage" method="post" action="">
            <div>
                <div class="message">
                <?php if(isset($message)) { echo $message; } ?>
                </div>
                <div class="btn-menu" align="right"
                    style="padding-bottom: 5px;">
                    <a href="image-add.php" class="font-bold">Add Image</a>
                </div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Image Path</th>
                            <th>Added at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
<?php
$i = 0;
if (is_array($result) || is_object($result)) {
    foreach ($result as $key => $value) {
        ?>
<tr>
                        <td><?php echo $result[$key]["image_path"]; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($result[$key]["date"])); ?></td>
                        <td><a
                            href="image-edit.php?image_id=<?php echo $result[$key]["image_id"]; ?>"
                            class="mr-20">Edit</a> <a
                            href="image-delete.php?image_id=<?php echo $result[$key]["image_id"]; ?>"
                            class="mr-20"
                            onclick="return confirm('Are you sure you want to delete this item')">Delete</a></td>
                    </tr>
<?php
        $i ++;
    }
}
?>
</table>
            </div>
        </form>
    </div>
</body>
</html>