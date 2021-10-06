<?php
  // print_r($data);
  // echo $name;
  // echo $pos_idPk;
  session_destroy();
?>

<!DOCTYPE html>
<html lang="pt">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        <?php include_once('./styles/registerSuccess.css'); ?>
      </style>
      <title>Registrado com Sucesso</title>
  </head>

  <body>

    <div class="portable-page">

      <div class="landing">
        <h2 class="title">
          <?php echo $name; ?> Registrado Com Sucesso!
        </h2>
      </div>

      <div class="main">

        <a href="../menu" class="btn opacty-button">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 22H5C4.44772 22 4 21.5523 4 21V13H2L11.292 3.70698C11.4796 3.51921 11.7341 3.4137 11.9995 3.4137C12.2649 3.4137 12.5194 3.51921 12.707 3.70698L22 13H20V21C20 21.5523 19.5523 22 19 22ZM10 15H14V20H18V11.828L12 5.82798L6 11.828V20H10V15Z" fill="#fbfbfb"></path>
          </svg>

          Ir Para Home
        </a> <!-- //fix this tab in future -->

        <a href="<?php echo '../selectUser/editUser/'.$name; ?>" class="btn opacty-button">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z" fill="#fbfbfb"></path>
            <path d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z" fill="#fbfbfb"></path>
          </svg>

          Editar <?php echo $name; ?>
        </a>

        <a href="../register" class="btn opacty-button">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#5F5F5F"></path>
          </svg>

          Continuar Cadastrando
        </a>
      </div>

    </div>

  </body>

</html>
