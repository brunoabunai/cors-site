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
    <?php include_once('styles/registerMember.css'); ?>
  </style>
  <title>Registre-se</title>
</head>

<body>
  <a class="anc-back" href="../login">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
    </svg>

  </a>
  <div class="login-page">
    <div class="landing">

      <h2 class="title">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 2C17.1046 2 18 2.89543 18 4L4 4L4 15.1765C2.89543 15.1765 2 14.281 2 13.1765V4C2 2.89543 2.89543 2 4 2H16Z" fill="#5438DC"></path>
          <path d="M14 22L11.3333 19.1765H8C6.89543 19.1765 6 18.281 6 17.1765V8C6 6.89543 6.89543 6 8 6H20C21.1046 6 22 6.89543 22 8V17.1765C22 18.281 21.1046 19.1765 20 19.1765H16.6667L14 22ZM15.8046 17.1765L20 17.1765V8L8 8V17.1765H12.1954L14 19.0872L15.8046 17.1765Z" fill="#5438DC"></path>
        </svg>

        Cadastrar-se
      </h2>



    </div>

    <div class="main">
      <form name="form_register" action="./submitMember" method="POST">
        <label>Digite um Nome de Usuário:</label>
        <input name="reg_name" type="text" value="<?php echo isset($_SESSION['reg_name']) ? $_SESSION['reg_name'] : ''; ?>" />
        <label>Digite uma Senha:</label>
        <input name="reg_password" type="password" value="<?php echo isset($_SESSION['reg_password']) ? $_SESSION['reg_password'] : ''; ?>" />
        <label>Confirme sua senha:</label>
        <input name="reg_confirmPassword" type="password" value="<?php echo isset($_SESSION['reg_confirmPassword']) ? $_SESSION['reg_confirmPassword'] : ''; ?>" />
        <input type="submit" id="btn" class="btn-begin opacty-button" value="Completar Cadastro">
      </form>


    </div>
  </div>
  <?php include 'redirects/input_validation.php' ?>
</body>

</html>