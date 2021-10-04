<!DOCTYPE html>
<html lang="pt">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include_once('./styles/edit.css'); ?>
    </style>
    <title>Edit</title>
  </head>

  <body>
    <div class='portable-page'>
      <a class='anc-back' href='../../edit'>
        <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
          <path d='M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z' fill='#343434'></path>
        </svg>
      </a>

      <div class='landing'>
        <h2 class='title'>
          <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path d='M12.8971 21.968C12.366 21.9696 11.8565 21.7586 11.4821 21.382L3.64805 13.547C3.23464 13.1348 3.02266 12.5621 3.06805 11.98L3.56805 5.41401C3.63935 4.4264 4.42625 3.64163 5.41405 3.57301L11.9801 3.07301C12.0311 3.06201 12.0831 3.06201 12.1341 3.06201C12.6639 3.06337 13.1718 3.27399 13.5471 3.64801L21.3821 11.482C21.7573 11.8571 21.9681 12.3659 21.9681 12.8965C21.9681 13.4271 21.7573 13.9359 21.3821 14.311L14.3111 21.382C13.9369 21.7583 13.4277 21.9693 12.8971 21.968ZM12.1331 5.06201L5.56205 5.56201L5.06205 12.133L12.8971 19.968L19.9671 12.898L12.1331 5.06201ZM8.65405 10.654C7.69989 10.6542 6.87847 9.98037 6.69213 9.04458C6.5058 8.10879 7.00646 7.17169 7.88792 6.80639C8.76939 6.44109 9.78615 6.74933 10.3164 7.54259C10.8466 8.33586 10.7426 9.39322 10.0681 10.068C9.69388 10.4443 9.18473 10.6553 8.65405 10.654Z' fill='#1D263B'></path>
          </svg>

          Editar Admin
        </h2>

        <span class='subtitle'>
          Pesquise o Admin e edite seus dados
        </span>
      </div>

      <div class='main'>
        <div class='div-search'>
          <div id='WicthUserBox'>
            <span>
              Admin em Edição:&nbsp;<span id='WicthUser'><?php echo $use_name; ?></span>
            </span>
          </div>
  
        </div>

        <form name="form_edit" action="../submitEditUser/<?php echo $use_name ?>" method="POST">
          <input class='user' name='edi_id' id='user' type='text' placeholder='Id' value='<?php echo $use_idPk; ?>' readonly>
          <input class='user' name='edi_name' id='user' type='text' placeholder='Usuário' value='<?php echo $use_name; ?>'>
          <input class='password' name='edi_password' id='password' type='password' placeholder='Senha'>
          <input id='sub' type='submit' class='btn-register opacty-button' value='Concluir Edição'>
          <input onclick='resetEdition()' id='res' type='reset' class='btn-reset opacty-button' value='Resetar'>
        </form>

      </div>
    </div>

  </body>

</html>
