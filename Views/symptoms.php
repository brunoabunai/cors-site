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
    <?php include_once('./styles/symptoms.css'); ?>
  </style>
  <title>Sintomas</title>
</head>

<body>
  <div class="symptoms-page">
    <a class="anc-back" href="/TCC/cors-site/covidInformations">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>

    <div class="symptoms-box">
      <div class="box-firstLine">
        <img src="/TCC/cors-site/public/img/cv3.png" alt="">
        <h2> Fique atento aos sintomas da COVID-19:</h2>
      </div>
      <div class="content content-mobile">
        <div class="group-box">

          <div class="content-box">
            <h3>Sintomas menos comuns</h3>
            <ul>
              <li>dores e desconfortos</li>
              <li>dor de garganta</li>
              <li>diarreia</li>
              <li>dor de cabeça</li>
              <li>perda de paladar ou olfato</li>
            </ul>
          </div>

          <div class="content-box">
            <h3>Sintomas mais comuns</h3>
            <ul>
              <li>febre</li>
              <li>tosse seca</li>
              <li>cansaço</li>
            </ul>
          </div>
        </div>

        <div class="content-box">
          <h3>Sintomas graves</h3>
          <ul>
            <li>dificuldade de respirar ou falta de ar</li>
            <li>dor ou pressão no peito</li>
            <li>perda de fala ou movimento</li>
          </ul>
        </div>



      </div>

      <div class="content content-desktop">
        <div class="group-box">

          <div class="content-box">
            <h3>Sintomas menos comuns</h3>
            <ul>
              <li>dores e desconfortos</li>
              <li>dor de garganta</li>
              <li>diarreia</li>
              <li>dor de cabeça</li>
              <li>perda de paladar ou olfato</li>
            </ul>
          </div>

          <div class="content-box">
            <h3>Sintomas mais comuns</h3>
            <ul>
              <li>febre</li>
              <li>tosse seca</li>
              <li>cansaço</li>
            </ul>
          </div>
        </div>

        <div class="content-box">
          <h3>Sintomas graves</h3>
          <ul>
            <li>dificuldade de respirar ou falta de ar</li>
            <li>dor ou pressão no peito</li>
            <li>perda de fala ou movimento</li>
          </ul>
        </div>
      </div>

    </div>
</body>

</html>