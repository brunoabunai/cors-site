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
    <style>
      <?php include_once('./styles/global.css'); ?>
      <?php include_once('./styles/boxes.css'); ?>
      <?php include_once('./styles/classes.css'); ?>
    </style>

  </head>
  <body>

    <!-- <script defer src="../node_modules/jquery/dist/jquery.js"></script> -->
    <script src="./utils/globall.js" defer></script>
    <script src="./utils/box.js" defer></script>
    <script src="./utils/input.js" defer></script>

    <script defer src="./node_modules/jquery/dist/jquery.js"></script>
  </body>
</html>

<?php
  require_once ('autoload.php');
  $c = new Core();
?>
