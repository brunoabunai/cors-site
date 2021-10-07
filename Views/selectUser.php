<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários</title>

  <style>
    <?php include_once('styles/selectUser.css'); ?>
  </style>

</head>

<body>
  <a class="anc-back" href="./menu">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
    </svg>
  </a>

  <div class="search">
    <p>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.577 19L12.81 14.234C10.6539 15.6564 7.77106 15.2164 6.13737 13.2156C4.50369 11.2147 4.64914 8.30214 6.47405 6.474C8.30186 4.6484 11.2148 4.50231 13.216 6.13589C15.2173 7.76946 15.6576 10.6526 14.235 12.809L19 17.577L17.577 19ZM10.034 7.014C8.5933 7.01309 7.35253 8.03002 7.07053 9.44291C6.78854 10.8558 7.54386 12.2711 8.87457 12.8234C10.2053 13.3756 11.7408 12.9109 12.542 11.7135C13.3433 10.5161 13.1871 8.91947 12.169 7.9C11.6043 7.33135 10.8355 7.0123 10.034 7.014Z" fill="var(--text-color)"></path>
      </svg>

      Pesquisar Admin
    </p>
    <input type="text" name="searchUser" id="searchInput">
  </div>

  <div class="selectUser-page">




    <div class="users">

      <?php
      // for($i = 0; $i < count($this->data[0]); $i++) {
      ?>

      <!-- <a href="<?php echo 'editUser/' . str_replace(" ", "-", $this->data[0][$i]['use_name']); ?>">
          <div>
            <h3><?php //echo $this->data[0][$i]['use_name']; 
                ?></h3>
            <img src="<?php //echo $this->data[0][$i]['use_avatar']; 
                      ?>" />
          </div>
        </a> -->

      <?php
      // }
      ?>

    </div>
  </div>
  <!-- <script defer src="./node_modules/jquery/dist/jquery.js"></script> -->
</body>

</html>

<script defer type="module">
  $(document).ready(function() {
    loadDatas(1);

    function loadDatas(page, query = '') {
      $.ajax({
        type: "POST",
        url: 'edit/search/', //config url execute (edit/search/)
        data: {
          actualPage: page,
          action: query
        },
        // dataType: "json",
        // beforeSend: function() {

        // },
        success: function(html) {
          $('.users').html(html);
          // console.log('success');
        },
        error: function(html) {
          console.log('error');
        }
      });

    }

    $('#searchInput').keyup(function() {
      let query = $('#searchInput').val();
      loadDatas(1, query);
    });

  });
</script>