<?php
  // $password = 'admin';
  // $cryp = password_hash($password, PASSWORD_DEFAULT);
  // print_r($cryp);
  // echo "<br />";
  // echo password_verify($password, $cryp);

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
    <link rel="shortcut icon" type="imagex/png" href="public/img/covid.png">
    
  </head>
  <body>

    <!-- <script defer src="../node_modules/jquery/dist/jquery.js"></script> -->
    <!-- <script defer src="../node_modules/jquery/dist/jquery.js"></script> -->
    <script defer src="./node_modules/jquery/dist/jquery.js"></script>
  </body>
</html>

<?php
  require_once ('autoload.php');
  $c = new Core();
?>






<?php
  // $directory = 'database/userImages/';

  // $help = new auxiliary();
  // $a = ($help->getUserPerId(1)['avatar'] != $directory.'404.jpg') ? 
  //       explode('.', explode($directory, $help->getUserPerId(1)['avatar'])[1])[0] : 
  //       uniqid();
  // print_r($a);
?>
