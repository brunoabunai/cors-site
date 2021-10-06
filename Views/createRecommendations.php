<!DOCTYPE html>
<html lang="pt">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include_once('./styles/createPosts.css'); ?>
    </style>
    <title>Criar Recomendação</title>
  </head>

  <body>
    <div class="createpost-page">
      <a class="anc-back" href="./recommendationsInfos">
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
        
          Mandar Recomendação
        </h2>

        <span class="subtitle">
          Escrava sua sugestão de repostagem e nos envie!
        </span>
      </div>

      <div class="main">

        <form name="form_recommendations" action="./recommendations/submit" method="post">
          <input style="display:none;" type="text" class="rec_register" name="use_idFk" placeholder="Veremos..." disabled value="' . $_SESSION["logid"] . '" />
          
          <input type="text" class="rec_register" name="rec_title" placeholder="Título da recomendação" value="<?php echo isset($_SESSION['pos_title']) ? $_SESSION['pos_title'] : '' ?>" />

          <textarea placeholder="Escreva Sua recomendação..." class="rec_register" name="rec_description" cols="50" rows="10"><?php echo isset($_SESSION['pos_register']) ? $_SESSION['pos_register'] : '' ?></textarea>

          <input type="submit" class="btn-register opacty-button" value="Concluir" />
        </form>

      </div>
    </div>

  </body>

</html>

<script defer>
  const textarea=document.querySelector('textarea')
  function keyPressed(evt) {
    evt = evt || window.event;
    var key = evt.keyCode || evt.which;
    return String.fromCharCode(key);
  }

  textarea.onkeypress = function(evt) {
    var str = keyPressed(evt);

    if(evt.shiftKey&& (str=='\r')){
      textarea.value+='\r';
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