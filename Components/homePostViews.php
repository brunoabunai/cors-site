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
        <div class="at-notice">
          <a href="./home/getPostFromTitle/<?= $value['id']; ?>">
            <div class="noticie noticieOne">
              <img src="<?= $value['image']; ?>" alt="">

              <div class="headline">
                <span class="head-author"><?= $value['user']['name']; ?> - <small> <?php echo $value['date']; ?></small></span>
                <h3 class="head-title">
                  <?= $value['title']; ?>
                </h3>
                <span class="analysis-space head-desc">
                  <?= mb_strimwidth(rtrim(($value['description'])), 0, 60, "..."); ?>
                </span>

                <p class="lastPost">
                  Ultima Postagem
                </p>
              </div>

            </div>
          </a>
          <a class="remove-post" href="#">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 22C9.34711 22.0024 6.80218 20.9496 4.9263 19.0737C3.05042 17.1978 1.99762 14.6529 2 12V11.8C2.08179 7.79223 4.5478 4.22016 8.26637 2.72307C11.9849 1.22597 16.2381 2.0929 19.074 4.92601C21.9365 7.78609 22.7932 12.0893 21.2443 15.8276C19.6955 19.5659 16.0465 22.0024 12 22ZM12 13.41L14.59 16L16 14.59L13.41 12L16 9.41001L14.59 8.00001L12 10.59L9.41001 8.00001L8.00001 9.41001L10.59 12L8.00001 14.59L9.41001 16L12 13.411V13.41Z" fill="var(--danger)"></path>
            </svg>
          </a>
        </div>


      <?php } else { ?>
        <div class="at-notice">
          <a href="./home/getPostFromTitle/<?= $value['id']; ?>">
            <div class="noticie">
              <div class="headline">
                <span class="head-author"><?= $value['user']['name']; ?> - <small> <?php echo $value['date']; ?></small></span>
                <h3 class="head-title">
                  <?= $value['title']; ?>
                </h3>
                <span class="analysis-space head-desc">
                  <?= mb_strimwidth(rtrim(($value['description'])), 0, 60, "..."); ?>
                </span>
              </div>

              <img src="<?= $value['image']; ?>" alt="">
            </div>
          </a>
          <a class="remove-post" href="#">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 22C9.34711 22.0024 6.80218 20.9496 4.9263 19.0737C3.05042 17.1978 1.99762 14.6529 2 12V11.8C2.08179 7.79223 4.5478 4.22016 8.26637 2.72307C11.9849 1.22597 16.2381 2.0929 19.074 4.92601C21.9365 7.78609 22.7932 12.0893 21.2443 15.8276C19.6955 19.5659 16.0465 22.0024 12 22ZM12 13.41L14.59 16L16 14.59L13.41 12L16 9.41001L14.59 8.00001L12 10.59L9.41001 8.00001L8.00001 9.41001L10.59 12L8.00001 14.59L9.41001 16L12 13.411V13.41Z" fill="var(--danger)"></path>
            </svg>
          </a>
        </div>


      <?php } ?>

    <?php } ?>
  </div>
  <script src="/TCC/cors-site/utils/analysis_space.js"></script>
</body>

</html>