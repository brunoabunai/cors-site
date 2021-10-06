<?php
//Users
// unset(
//   $_SESSION['reg_name'],
//   $_SESSION['reg_password'],
//   $_SESSION['reg_confirmPassword'],
//   //Post
//   $_SESSION['pos_title'],
//   $_SESSION['pos_register']
// );

$option = "admin";
$outputPrefixOfSucessProcess = " Com Sucesso!";

//CURRENT
//$outputSucess= $_POST["messageOfSucess"]; 
//$lastRoute= $_POST["nameOfLastRoute"];

//TEST
$outputSucess = $text;
$lastRoute = $previousPage;
$textButton = $buttonText;
$position = isset($pos) ? $pos : '../';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('styles/success.css'); ?>
  </style>
  <title>Sucesso</title>
</head>

<body>
  <div class="success-page">
    <div class="page-title">
      <img src="<?php echo $position; ?>public/img/sucess.png" alt="sucess">
      <div>
        <h2><?php echo $outputSucess . $outputPrefixOfSucessProcess ?></h2>
        <a class="opacty-button" href="<?php echo $position.$lastRoute ?>">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#fff"></path>
          </svg>

          <?php echo $textButton ?>
        </a>
      </div>
    </div>

  </div>
</body>

</html>