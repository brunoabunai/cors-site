<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('./styles/recommendations.css'); ?>
  </style>
  <title>Lista de Sugestões</title>
</head>

<body>
  <div class="recommendationsList-page">
    <a class="anc-back" href="/TCC/cors-site/recommendations">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>

    <div class="rec">
      <div class="rec-author">
        <img src="<?= '../../'.$user['avatar']; ?>" alt="avatar">
        <span><?= $user['name']; ?></span>
      </div>

      <div class="rec-infos">

        <h3 class="rec-title analysis-space">
          <?= $title; ?>
        </h3>
        <span class="rec-desc analysis-space">
        <?= mb_strimwidth(rtrim(($description)), 0, 83, "..."); ?>
        </span>
      </div>
    </div>

    <div class="rec-content">
      <p>
        <?= $description ?>
      </p>

    </div>
  </div>

  </div>
  <script src="/TCC/cors-site/utils/analysis_space.js"></script>

</body>

</html>
