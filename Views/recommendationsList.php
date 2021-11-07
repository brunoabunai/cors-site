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

      <input placeholder="pesquise uma sugestão" class="search" type="text">

      <div class="rec-list">

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
