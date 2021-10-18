<!DOCTYPE html>
<html lang="pt">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include_once('./styles/recommendationslist.css'); ?>
    </style>
    <title>Lista de Recomendações</title>
  </head>

  <body>
    <div class="recommendationsList-page">
      <a class="anc-back" href="/TCC/cors-site/menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
        </svg>
      </a>

      <input placeholder="pesquise uma recomendação" class="search" type="text">


      <div class="rec-list">
        <!-- <a href="./recommendations">
          <div class="rec rec-one">
            <div class="rec-author">
              <img src="./public/img/cv2.png" alt="avatar">
              <span>José clebino</span>
            </div>

            <div class="rec-infos">

              <h3 class="rec-title">
                Sobre os ursos polares
              </h3>
              <span class="rec-desc">
                Diam lorem takimata accusam stet et sed sanctus diam at aliquyam...
              </span>
            </div>
            <button>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C9.34711 22.0024 6.80218 20.9496 4.9263 19.0737C3.05042 17.1978 1.99762 14.6529 2 12V11.8C2.08179 7.79223 4.5478 4.22016 8.26637 2.72307C11.9849 1.22597 16.2381 2.0929 19.074 4.92601C21.9365 7.78609 22.7932 12.0893 21.2443 15.8276C19.6955 19.5659 16.0465 22.0024 12 22ZM12 13.41L14.59 16L16 14.59L13.41 12L16 9.41001L14.59 8.00001L12 10.59L9.41001 8.00001L8.00001 9.41001L10.59 12L8.00001 14.59L9.41001 16L12 13.411V13.41Z" fill="var(--danger)"></path>
              </svg>
            </button>
          </div>
        </a> -->
      </div>

    </div>
    </div>

  </body>

</html>

<script defer type="module">
  $(document).ready(function(){
    loadDatas(1);

    function loadDatas(page, query = '') {
      $.ajax({
        type: "POST",
        url: 'recommendations/search/',
        data: {
          actualPage: page,
          action: query
        },
        success: function(html) {
          $('.rec-list').html(html);
        },
        error: function(html) {
          console.log('error');
        }
      });

    };

    $('.search').keyup(function() {
      let query = $('.search').val();
      loadDatas(1, query);
    });
  });
</script>
