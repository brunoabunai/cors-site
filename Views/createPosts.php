<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('../../TCC/cors-site/styles/createPosts.css'); ?>
  </style>
  <title>Criar Postagem</title>
</head>

<body>
  <div class="createpost-page">
    <a class="anc-back" href="/TCC/cors-site/menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>
    <div class="landing">
      <h2 class="title">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 10H17V7H14V5H17V2H19V5H22V7H19V10Z" fill="var(--title-strong)"></path>
          <path d="M21 12H19V15H8.334C7.90107 14.9988 7.47964 15.1393 7.134 15.4L5 17V5H12V3H5C3.89543 3 3 3.89543 3 5V21L7.8 17.4C8.14582 17.1396 8.56713 16.9992 9 17H19C20.1046 17 21 16.1046 21 15V12Z" fill="var(--title-strong)"></path>
        </svg>

        Criar Post
      </h2>

      <span class="subtitle">
        Tire suas ideias do papel e digite-as aqui!
      </span>
    </div>

    <div class="main">

      <form enctype="multipart/form-data" name="form_createPosts" action="./createPosts/submit" method="post">
        <input style="display:none;" type="text" class="pos_register" name="use_idFk" placeholder="Veremos..." disabled value="' . $_SESSION[" logid"] . '" />
          
          
          <input type="text" class="pos_register" name="pos_title" placeholder="Título do post" value="<?php echo isset($_SESSION['pos_title']) ? $_SESSION['pos_title'] : '' ?>" />
          

          <!-- <input type="file" class="pos_image" name="pos_image" /> -->

          
          <textarea placeholder="Escreva Seu Post..." class="pos_register" name="pos_description" cols="50" rows="10"><?php echo isset($_SESSION['pos_register']) ? $_SESSION['pos_register'] : '' ?></textarea>

          
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.41999 20.579C4.13948 20.5785 3.87206 20.4603 3.68299 20.253C3.49044 20.0475 3.39476 19.7695 3.41999 19.489L3.66499 16.795L14.983 5.48103L18.52 9.01703L7.20499 20.33L4.51099 20.575C4.47999 20.578 4.44899 20.579 4.41999 20.579ZM19.226 8.31003L15.69 4.77403L17.811 2.65303C17.9986 2.46525 18.2531 2.35974 18.5185 2.35974C18.7839 2.35974 19.0384 2.46525 19.226 2.65303L21.347 4.77403C21.5348 4.9616 21.6403 5.21612 21.6403 5.48153C21.6403 5.74694 21.5348 6.00146 21.347 6.18903L19.227 8.30903L19.226 8.31003Z" fill="#fff"></path>
          </svg>
          <label for="file-upload">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 22H4C2.89543 22 2 21.1046 2 20V8H4V20H16V22ZM20 18H8C6.89543 18 6 17.1046 6 16V4C6 2.89543 6.89543 2 8 2H20C21.1046 2 22 2.89543 22 4V16C22 17.1046 21.1046 18 20 18ZM8 4V16H20V4H8ZM15 14H13V11H10V9H13V6H15V9H18V11H15V14Z" fill="var(--text-color)"></path>
            </svg>

            Clique Para Carregar Imagem
            <img id="img-player" src="/TCC/cors-site/public/img/black_screen.jpg">
          </label>
          <input style="display:none;" id="file-upload" type="file" name="pos_image" onchange="previewFile()">
          <!-- <input id="file-upload" type="file" onchange="previewFile()"> -->
          <!-- <img id="img-player" src=""> -->
          <input type="submit" class="btn-register opacty-button" value="Enviar Postagem" />
        </form>

      </div>
    </div>
    <script type="text/javascript">
      const textarea = document.querySelector('textarea')

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


      function keyPressed(evt) {
        evt = evt || window.event;
        var key = evt.keyCode || evt.which;
        return String.fromCharCode(key);
      }

      textarea.onkeypress = function(evt) {
        var str = keyPressed(evt);

        if (evt.shiftKey && (str == '\r')) {
          textarea.value += '\r';
        }
      };
      // const createPost = () => {
      //   const query = document.querySelectorAll(".pos_register");


      //   $.ajax({
      //     type: "POST",
      //     url: './src/components/createPost.php',
      //     data: {action:outPut},
      //     success:(html)=> {
      //       $('#result').html(html);
      //     },
      // error:function(html) {
      //   location.href='../../404.php';
      // }
      //   })
      // }
  </script>
</body>

</html>

