<?php

  clearstatcache();
  
  if(!isset($_SESSION)){
    session_start();
  }

  // session_unset();

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include "cssm.php" ?>
    

  </head>
  <body>

    <!-- <script defer src="../node_modules/jquery/dist/jquery.js"></script> -->
    
    <?php include "jsm.php" ?>
    <script defer src="./node_modules/jquery/dist/jquery.js"></script>
  </body>
</html>

<?php
  require_once ('autoload.php');
  $c = new Core();
?>
