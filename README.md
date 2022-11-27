# DragAndDropUpload
PHP Image Upload Using DropzoneJs
Drag and drop image upload with php and dropzone.js

Database Table image_info

The following SQL script is used to create the image_info database table before getting started with the Dropzone image upload and its CRUD actions.

I have given the complete SQL script which is to be imported while setting this example code in your development environment.
```
CREATE TABLE `images_info` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `images_info`
  ADD PRIMARY KEY (`image_id`);
 AUTO_INCREMENT for dumped tables

 AUTO_INCREMENT for table `images_info`
ALTER TABLE `images_info`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
```

You can see other scripts in  http://www.school4web.com
