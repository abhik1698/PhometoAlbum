<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body style="background-color: #1F2739;color: white;" class="container">
      <form action="index.html">
         <h1><input class="btn btn-success" type="submit" value="Home"></h1>
      </form>
      <form  class="form-group" method="post" enctype="multipart/form-data">
         <h2>Album's Key value to upload?</h2>
         <input class="form-control-lg form-control" type="text" name="key" placeholder="Set KEY value" required>
         <h2>Select image to upload:</h2>
         <input type="file" class="form-control-file btn btn-danger" name="fileToUpload" id="fileToUpload" required>
         </br><input type="submit" class="btn btn-success" value="Upload Image" name="submit">
      </form>
   </body>
</html>
<?php
   if(isset($_POST['submit'])){
     $key = trim($_POST["key"]);
     if(!is_dir("Albums/".$key."/")) {
       mkdir("Albums/".$key."/");
     }
   
     $target_dir = "Albums/".$key."/";    
     
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake image
     if(isset($_POST["submit"])) {
         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false) {
             echo "<h2>File is an image - </h2></br>" . $check["mime"] . ".";
             $uploadOk = 1;
         } else {
             echo "File is not an image.</br>";
             $uploadOk = 0;
         }
     }
     // Check if file already exists
     if (file_exists($target_file)) {
         echo "Sorry, file already exists.</br>";
         $uploadOk = 0;
     }
     // Check file size
     // if ($_FILES["fileToUpload"]["size"] > 500000) {
     //     echo "Sorry, your file is too large.";
     //     $uploadOk = 0;
     // }
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
         $uploadOk = 0;
     }
     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
         echo "</br><h2>Sorry, your file was not uploaded.<h2>";
     // if everything is ok, try to upload file
     } else {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
             echo "<h2>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to Key: $key.</h2></br>";
         } else {
             echo "<h2>Sorry, there was an error uploading your file.</h2>";
         }
     }
   }
   ?>