<?php

  Class Core {

    public function __construct() {
      $this -> run();
    }

    public function run() {
      $parameters = array(); // parameters, variavel de controle (passa informações para dentro de uma função)

      if (isset($_GET['pag'])) {
        $url = htmlentities(addslashes($_GET['pag']));
      }

      //Irá pegar o Controller / Class
      if (!empty($url) && $url != '/') { //Caso a variavel "URL" estiver vazia, ele irá fazer..
        $url = explode('/', $url); //Vai separar a string no caracter '/'
        $controller = $url[0].'Controller'; //Ele irá procurar o "Controller" referente á primeira palavra do url
        array_shift($url); //Irá fazer o array "url" descer uma posição, o que estava no (0) [não existe mais], o que estava no (1) [agr é 0], e assim por diante...

        //Irá pegar a função da Class
        if (isset($url[0]) && !empty($url[0])) {
          $method = $url[0]; //essa variavel irá armazenar a função que será executada
          array_shift($url);
        } else {
          $method = 'index'; //se o usuário não passou nem uma função, então ele irá para a função padrão
        }
  
        //Irá pegar os parâmetros
        if (count($url) > 0) {
          $parameters = $url;
        }
      } else {
        $controller = 'landingController'; //Controller of page
        $method = 'index'; //Function active from class of page 'controller'
      }

      $route = 'cors/mvc/Controllers/'.$controller.'.php';
      
      if (!file_exists($route) && !method_exists($controller, $method)) {
        $controller = 'errorController';
        $method = 'index';
      }

      $c = new $controller; //Inicializa o controller (class)
      call_user_func_array(array($c, $method), $parameters); //Ativa a função dentro da classe, podendo sim ou não passar os parâmetros...
    }
  }

?>
