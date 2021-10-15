<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('/TCC/cors-site/styles/edit.css'); ?>
  </style>
  <title>Editar Usuário</title>
</head>

<body>
  <div class='portable-page'>
    <a class='anc-back' href='/TCC/cors-site/edit'>
      <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z' fill='#343434'></path>
      </svg>
    </a>

    <div class='landing'>

      <span class='subtitle'>
        <label onclick="makeAnimationImgCLicked()"style="cursor: pointer;" for="file-upload" class="custom-file-upload">
          <img id="img-player" src="/TCC/cors-site/public/img/cv3.png">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.41999 20.579C4.13948 20.5785 3.87206 20.4603 3.68299 20.253C3.49044 20.0475 3.39476 19.7695 3.41999 19.489L3.66499 16.795L14.983 5.48103L18.52 9.01703L7.20499 20.33L4.51099 20.575C4.47999 20.578 4.44899 20.579 4.41999 20.579ZM19.226 8.31003L15.69 4.77403L17.811 2.65303C17.9986 2.46525 18.2531 2.35974 18.5185 2.35974C18.7839 2.35974 19.0384 2.46525 19.226 2.65303L21.347 4.77403C21.5348 4.9616 21.6403 5.21612 21.6403 5.48153C21.6403 5.74694 21.5348 6.00146 21.347 6.18903L19.227 8.30903L19.226 8.31003Z" fill="#fff"></path>
          </svg>


        </label>
        <input style="display: none;" id="file-upload" type="file" onchange="previewFile()">

        <h2>
          <?php echo $name; ?>
        </h2>
      </span>

    </div>

    <div class='main'>

      <form name="form_edit" action="../submitEditUser/<?php echo $name ?>" method="POST">
        <!--<input class='user' name='edi_id' id='user' type='text' placeholder='Id' value='<?php echo $id; ?>' readonly>-->
        <input class='user' name='edi_name' id='user' type='text' placeholder='Usuário' value='<?php echo $name; ?>'>
        <input class='user' name='edi_name' id='user' type='email' placeholder='Email' value='<?php echo $name; ?>@gmail.com'>
        <input class='password' name='edi_password' id='password' type='password' placeholder='Senha'>
        <input id='sub' type='submit' class='btn-register opacty-button' value='Concluir Edição'>
      </form>

    </div>
  </div>
  <script type="text/javascript">
    function previewFile() {
      var preview = document.querySelector('#img-player');
      var file = document.querySelector('input[type=file]').files[0];
      var reader = new FileReader();

      reader.onloadend = function() {
        preview.src = reader.result;
      }

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
      }
    }

    function makeAnimationImgCLicked(){
      let img= document.querySelector('label');
      let endAnimationOfBox = img.animate([
      // keyframes
      {
        opacity: 1
      },
      {
        opacity: 0.7
      }
    ], {
      // timing options
      duration: 200,
      iterations: 1
    });
    }

  </script>
</body>

</html>