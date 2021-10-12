<?php
  $help = new auxiliary();
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="title">
      <h2>Ultimas Postagens Sobre o Corona Vírus</h2>
    </div>

    <div class="news">
      <?php foreach ($posts as $row => $value) { ?>

        <?php if ($row == 0) { ?>

        <a href="./home/getPostFromTitle/<?= str_replace(" ", "-", $help->removeAccents($value['title'])); ?>">
          <div class="noticie noticieOne">
            <img src="./public/img/banner_corona.jpg" alt="">

            <div class="headline">
              <span class="head-author"><?= $value['user']['name']; ?></span>
              <h3 class="head-title">
                <?= $value['title']; ?>
              </h3>
              <span class="head-desc">
                <?= mb_strimwidth(rtrim(($value['description'])), 0, 60, "..."); ?>
              </span>

              <p class="lastPost">
                Ultima Postagem
              </p>
            </div>

          </div>
        </a>

        <?php } else { ?>
          
          <a href="./home/getPostFromTitle/<?= str_replace(" ", "-", $help->removeAccents($value['title'])); ?>">
            <div class="noticie">
              <div class="headline">
                <span class="head-author"><?= $value['user']['name']; ?></span>
                <h3 class="head-title">
                  <?= $value['title']; ?>
                </h3>
                <span class="head-desc">
                  <?= mb_strimwidth(rtrim(($value['description'])), 0, 60, "..."); ?>
                </span>
              </div>

              <img src="./public/img/banner_corona.jpg" alt="">
            </div>
          </a>
          
        <?php } ?>
        
      <?php } ?>
    </div>

  </body>

</html>
