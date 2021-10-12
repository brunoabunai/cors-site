<!DOCTYPE html>
<html lang="pt">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include_once('./styles/register.css'); ?>
    </style>
    <title>Registrar Admin</title>
  </head>

  <body>
    <div class="portable-page">
      <a class="anc-back" href="../menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
        </svg>
      </a>
      <div class="landing">
        <h2 class="title">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4 19H2C2 15.6863 4.68629 13 8 13C11.3137 13 14 15.6863 14 19H12C12 16.7909 10.2091 15 8 15C5.79086 15 4 16.7909 4 19ZM19 16H17V13H14V11H17V8H19V11H22V13H19V16ZM8 12C5.79086 12 4 10.2091 4 8C4 5.79086 5.79086 4 8 4C10.2091 4 12 5.79086 12 8C11.9972 10.208 10.208 11.9972 8 12ZM8 6C6.9074 6.00111 6.01789 6.87885 6.00223 7.97134C5.98658 9.06383 6.85057 9.9667 7.94269 9.99912C9.03481 10.0315 9.95083 9.1815 10 8.09V8.49V8C10 6.89543 9.10457 6 8 6Z"
              fill="#1D263B"></path>
          </svg>
          
          Registrar Admin
        </h2>

        <span class="subtitle">
          Preencha e depois é só cliquar em concluir!
        </span>
      </div>

      <div class="main">

        <form name="form_register" action="./submitAdmin" method="POST">

        <select name="typ_reg">
          <option value="1" selected="selected">User</option>

          <?php 
          foreach ($types as $row) {
            if ($row['id'] != 1) {
          ?>
            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
          <?php 
            }
          } 
          ?>
          
        </select>

          <input type="text" name="reg_name" placeholder="Usuário" value="<?php echo isset($_SESSION['reg_name']) ? $_SESSION['reg_name'] : ''; ?>" />
          <input type="password" name="reg_password" placeholder="Senha" value="<?php echo isset($_SESSION['reg_password']) ? $_SESSION['reg_password'] : ''; ?>" />
          <input type="password" name="reg_confirmPassword" placeholder="Confirme sua senha" value="<?php echo isset($_SESSION['reg_confirmPassword']) ? $_SESSION['reg_confirmPassword'] : ''; ?>" />
          <input type="submit" class="btn-register opacty-button" value="Concluir">
        </form>

      </div>
    </div>

  </body>

</html>

<!-- <script defer>
  // const form = document.querySelector('form');

  // if (condition) {
  //   document.querySelector("form").addEventListener(
  //     "click", 
  //     (event) => {
  //       event.preventDefault();
  //     });
  // }

  const logOff = () => {
    $.ajax({
      type: "POST",
      url: './src/components/geralCommands.php',
      data: {action:'callLogOff'},
      success:function(html) {
        location.href='./index.php?p=landing';
      },
      error:function(html) {
        location.href='../../404.php';
      }
    })
  }
</script> -->
