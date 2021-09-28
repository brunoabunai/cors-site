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
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('styles/infosars.css'); ?>
  </style>
  <title>Home</title>
</head>

<body>

  <div class="infosars-page">
    <a class="anc-back" href="./home">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>

    <a href="./preventions">
      <div class="preventions-page">
        <div class="prevention-box">
          <div class="box-firstLine">
            <img src="./public/img/cv2.png" alt="">
            <h2> Para evitar a propagação da COVID-19:</h2>
          </div>
        </div>
      </div>
    </a>

    <a href="./symptoms">
    <div class="symptoms-page">
      <div class="symptoms-box">
        <div class="box-firstLine">
          <img src="./public/img/cv3.png" alt="">
          <h2> Fique atento aos sintomas da COVID-19:</h2>
        </div>
      </div>
    </div>
    </a>


  </div>

</body>

</html>