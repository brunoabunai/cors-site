<?php
  @session_start();
  // foreach ($_SESSION as $key => $value) {
  //   echo $key;
  //   echo '<br>';
  //   echo '<br>';
  // }
  // unset($_SESSION['logname']); //Não existe mais (por garantia vai ficar)
  // unset($_SESSION['logAdminName']); //Não existe mais (por garantia vai ficar)

  // unset($_SESSION['selectedSearch']); //Page (search), seleciona o adm from edit
  // unset($_SESSION['logid']); //Page (login), qual usuário está logado
  // unset($_SESSION['registerUserId']); //Page (register/registerSucess), seleciona o id do new admin registered
  // unset($_SESSION['errors']); //Page (register, login, createPost), erros que vem dessas page
  // unset($_SESSION['logged']); //Page (login), se tem alguém logado

  unset($_SESSION['selectedSearch']);
  unset($_SESSION['registerUserId']);
  unset($_SESSION['errors']);
?>