<?php
//Users
unset(
  $_SESSION['reg_name'],
  $_SESSION['reg_password'],
  $_SESSION['reg_confirmPassword'],
  //Post
  $_SESSION['pos_title'],
  $_SESSION['pos_register']
);
$nameOfNotice = "Ursos pegam mel de senhora...";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('styles/notice.css'); ?>
  </style>
  <title><?php echo $nameOfNotice; ?></title>
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
  <a class="anc-back" href="./home">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
    </svg>
  </a>
  <div class="notice-page">
    <div class="notice">
      <h3 class="head-title">
        Ibespa derrete 2% em reação à reforma do IR; Via (VIIA3) afunda 6%
      </h3>
      <span class="head-author">- Carlos Calixto</span>
      <img src="./public/img/banner_corona.jpg" alt="">
      <span class="head-desc">
        Eirmod dolore nonumy dolore lorem et. Lorem vero est sit takimata sadipscing sed takimata tempor, et magna ipsum sea ut amet accusam et justo dolor, accusam et magna dolores dolor duo amet et, et et tempor dolore est clita, elitr magna amet duo ipsum invidunt labore elitr ipsum. Dolor aliquyam diam dolor clita, clita et et clita labore nonumy et, et clita stet et invidunt labore sed consetetur. Tempor consetetur sed aliquyam tempor sit ipsum at. Accusam diam et et duo amet gubergren rebum sed, sea ea tempor dolore dolor consetetur. Clita et sit lorem vero, gubergren takimata aliquyam sed clita. At et et aliquyam ea tempor sed duo. Dolor diam duo lorem et ipsum diam et ipsum. Labore dolor sit diam magna sit sed diam dolor lorem. Eos sea lorem dolore sed duo accusam rebum voluptua et. Sit accusam no ipsum tempor eos sit clita et diam. At ea sit ea et duo, et amet ea sit no dolore, sadipscing duo et tempor tempor gubergren tempor invidunt. Sanctus eirmod et dolor erat, amet sea voluptua amet est, gubergren elitr voluptua dolor sit justo sed stet voluptua. Et diam elitr takimata et sanctus et, ipsum consetetur sit gubergren sit stet lorem est et sed, gubergren ipsum amet nonumy stet sed et lorem est lorem, aliquyam ea kasd sed aliquyam et tempor et rebum sadipscing. Voluptua invidunt et labore ipsum sit diam diam. Stet justo no nonumy sea. Takimata eirmod sit magna no. Est est no consetetur sanctus lorem at labore. Sit invidunt no est dolor aliquyam dolore sed ipsum clita, diam et duo lorem dolor ipsum gubergren amet clita. Accusam duo rebum amet et. Diam dolor ipsum amet et stet, et takimata rebum kasd et tempor aliquyam sed erat, lorem ea dolores takimata eos amet elitr et voluptua takimata. <br><br>

        Takimata at stet eirmod et kasd. Sadipscing sadipscing sanctus eos ipsum magna clita, vero accusam sadipscing erat amet magna, at dolor sanctus labore elitr consetetur ut. Rebum justo magna accusam sit, lorem dolores diam gubergren dolor takimata sed. Ea eos aliquyam lorem erat et aliquyam dolores no, ut dolores gubergren sit dolor amet stet. At sit gubergren est lorem takimata. Erat nonumy sed ea magna kasd est vero dolor. Dolor takimata ut gubergren ipsum justo diam et est vero, ipsum dolor ipsum accusam ipsum elitr dolor nonumy sadipscing, magna et justo justo amet sit, diam sed dolor stet diam no dolor est. Dolores amet accusam ut duo dolor ipsum. Lorem consetetur ipsum ea dolor erat et justo dolor nonumy, labore dolore sit tempor labore sadipscing justo sit kasd et, at sit dolores et lorem et magna sanctus elitr, et stet aliquyam diam sed diam takimata et voluptua. Rebum magna amet ea clita, diam sanctus ea takimata gubergren, aliquyam labore stet sit magna duo voluptua ipsum, nonumy erat dolore magna magna accusam rebum eos duo eos. Sed voluptua tempor clita sed labore ipsum sadipscing kasd. Ipsum dolor dolore sea voluptua erat nonumy. Sit voluptua nonumy lorem ea. Rebum gubergren sit ipsum kasd.
      </span>
    </div>
  </div>
</body>

</html>