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
         <input name="upload[]" type="file" multiple="multiple" class="form-control-file btn btn-danger" required/>
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
     $files = array_filter($_FILES['upload']['name']);
     // Count # of uploaded files in array
     $total = count($_FILES['upload']['name']);
     echo "<h1>Uploading to Key: $key </h1></br>";
     // Loop through each file
     for( $i=0 ; $i < $total ; $i++ ) {

     //Get the temp file path
     $tmpFilePath = $_FILES['upload']['tmp_name'][$i];     
     //Make sure we have a file path
     if ($tmpFilePath != ""){
         //Setup our new file path
         $newFilePath = $target_dir . $_FILES['upload']['name'][$i];
 
         //Upload the file into the temp dir
         if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            
            echo $_FILES['upload']['name'][$i]." Uploaded Successfully</br>";
         //Handle other code here
        } else
            echo "ERROR Uploading";
      }
    }
   }
   ?>
