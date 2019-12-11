<htmL>
  <body>
  <?php 
      $key = $_POST['key'];
      // header('Content-type: albums/jpeg');
      // Pull images
      $files = glob("albums/$key/*.*");      
      for ($i=0; $i<count($files); $i++) {
        $image = $files[$i];
        
        // print $image ."<br />";
        echo "<img src='".$image ."' alt='Random&nbsp;' width='200' height='100'>";
      }
      ?>
</body>
</html>