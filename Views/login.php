<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include_once('./styles/login.css'); ?>
  </style>
  <title>Loge-se</title>
</head>

<body>
  <a class="anc-back" href="/TCC/cors-site/landing">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
    </svg>
  </a>

  <div class="login-page">
    <div class="landing">

      <h2 class="title">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 2C17.1046 2 18 2.89543 18 4L4 4L4 15.1765C2.89543 15.1765 2 14.281 2 13.1765V4C2 2.89543 2.89543 2 4 2H16Z" fill="#5438DC"></path>
          <path d="M14 22L11.3333 19.1765H8C6.89543 19.1765 6 18.281 6 17.1765V8C6 6.89543 6.89543 6 8 6H20C21.1046 6 22 6.89543 22 8V17.1765C22 18.281 21.1046 19.1765 20 19.1765H16.6667L14 22ZM15.8046 17.1765L20 17.1765V8L8 8V17.1765H12.1954L14 19.0872L15.8046 17.1765Z" fill="#5438DC"></path>
        </svg>

        Loge-se
      </h2>

      <span class="subtitle">
        Entre em sua conta para acessar suas funcionalidades de admin.
      </span>

    </div>

    <div class="main">
      <form name="form_login" action="./login/submit" method="POST">
        <input name="log_email" type="email" placeholder="Email">
        <div class="group-password">
          <input name="log_password" type="password" placeholder="Senha">
          <a href="#" class="see-password" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
          </a>
        </div>
        <input type="submit" id="btn" class="btn-begin opacty-button" value="Entrar Na Sua Conta">
        <span class="toRegisterMember">
          Não tem uma conta&#63;
          <a href="/TCC/cors-site/register/member">
            Clique aqui.
          </a>
        </span>
      </form>

    </div>
  </div>

  <?php include 'redirects/input_validation.php' ?>
  <?php include 'redirects/see_password.php' ?>
</body>

</html>
