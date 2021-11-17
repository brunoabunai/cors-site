<?php
//Users
// unset(
//   $_SESSION['reg_name'],
//   $_SESSION['reg_password'],
//   $_SESSION['reg_confirmPassword'],
//   $_SESSION['reg_email'],
//   //Post
//   $_SESSION['pos_title'],
//   $_SESSION['pos_register']
// );

$nameOfNotice = $title;
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('./styles/notice.css'); ?>
  </style>
  <title><?= $nameOfNotice; ?></title>
</head>

<body>
  <!-- oq eu achei sobre limitar caracteres bruno, da pra limitar os caracteres do post e concatenar com ...
      por favor cria duas variaveis, uma com um limite pra mobile, outro para pc, o resto eu me viro (vo usar display pra aparecer para um de um jeito e para outro de outro)-->
  <?php
  // function limita_caracteres($texto, $limite, $quebra = true)
  // {
  //   $tamanho = strlen($texto);
  //   if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
  //     $novo_texto = $texto;
  //   } else { // Se o tamanho do texto for maior que o limite
  //     if ($quebra == true) { // Verifica a opção de quebrar o texto
  //       $novo_texto = trim(substr($texto, 0, $limite)) . "...";
  //     } else { // Se não, corta $texto na última palavra antes do limite
  //       $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
  //       $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
  //     }
  //   }
  //   return $novo_texto; // Retorna o valor formatado
  // }
  //
  ?>

  <?php
  // echo limita_caracteres("Mensagem de teste para testar o script.", 10); // Resultado: Mensagem d...
  ?>

  <!-- init of page -->
  <a class="anc-back" href="/TCC/cors-site/home">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
    </svg>
  </a>
  <div class="notice-page">
    <div class="notice">
      <h3 class="head-title">
        <?= $title; ?>
      </h3>
      <span class="head-author">- <?= $user['name']; ?></span>
      <img src="<?= "../".$image; ?>" alt="">
      <span class="head-desc">
        <?= $description; ?>
      </span>
    </div>
  </div>
</body>

</html>