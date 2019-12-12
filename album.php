<htmL>
   <!-- <link rel="Stylesheet" href="album.css"> -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- <script src="album.js"></script> -->
   <body style="background-color: #1F2739;">
      <div class="container">
         <form action="index.html">
            <h1><input type="submit" value="Home"></h1>
         </form>
         <?php 
            $key = trim($_POST['key']);
            if(!is_dir("Albums/".$key."/")) {
               echo "<h1 style='color: white;'>No such Album</h1>";
             }
            else{
               // Pull images
               $files = glob("Albums/$key/*.*");      
               echo '<div class="row">';
               for ($i=0; $i<count($files); $i++) {
               $image = $files[$i];
               
               echo '<div class="col-md-4 "><div class="thumbnail">
                     <a href="'.$image.'" target="blank">
                     <img src="'.$image.'" alt="'.$image.'" style="width:100%">
                     <div class="caption">'.$image.'</div></div></div>';
               }
               echo '</div>';
            }
            
            ?>
      </div>
   </body>
</html>