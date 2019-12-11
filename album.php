<htmL>
  <body>
      <form action="index.html">
  <h1><input type="submit" value="Home"></h1>
</form>
  <?php 
      $key = $_POST['key'];
      // header('Content-type: albums/jpeg');
      // Pull images
      $files = glob("albums/$key/*.*");      
      for ($i=0; $i<count($files); $i++) {
        $image = $files[$i];
        
        // print $image ."<br />";
        echo "<img src='".$image ."' alt='Random&nbsp;' width='600' height='400'>";
      }
      ?>
</body>
</html>