<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php
  foreach ($recommendations as $key) {

    if ($recommendations[0] == 'No data Found') {
  ?>
      <h1><?= $key; ?></h1>
    <?php
      break;
    }
    ?>
    <div class="link-rec">
      <a href="./recommendations/getRecommendation/ <?= $key['id']; ?>">
        <div class="rec rec-one">
          <div class="rec-author">
            <img src="<?= $key['user']['avatar']; ?>" alt="avatar">
            <span><?= $key['user']['name']; ?></span>
          </div>

          <div class="rec-infos">
            <h3 class="rec-title">
              <?= $key['title']; ?>
            </h3>
            <span class="analysis-space rec-desc">
              <!-- Diam lorem takimata accusam stet et sed sanctus diam at aliquyam... -->
              <?= mb_strimwidth(rtrim(($key['description'])), 0, 83, "..."); ?>
            </span>
          </div>
        </div>


      </a>
      <button>
        <a href="./edit/removeUsers/<?= $key['id'] ?>">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22C9.34711 22.0024 6.80218 20.9496 4.9263 19.0737C3.05042 17.1978 1.99762 14.6529 2 12V11.8C2.08179 7.79223 4.5478 4.22016 8.26637 2.72307C11.9849 1.22597 16.2381 2.0929 19.074 4.92601C21.9365 7.78609 22.7932 12.0893 21.2443 15.8276C19.6955 19.5659 16.0465 22.0024 12 22ZM12 13.41L14.59 16L16 14.59L13.41 12L16 9.41001L14.59 8.00001L12 10.59L9.41001 8.00001L8.00001 9.41001L10.59 12L8.00001 14.59L9.41001 16L12 13.411V13.41Z" fill="var(--danger)"></path>
          </svg>
        </a>
      </button>
    </div>

  <?php
  }
  ?>

  <script src="/TCC/cors-site/utils/analysis_space.js"></script>
</body>

</html>