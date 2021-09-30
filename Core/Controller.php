<?php

  Class Controller {

    public $dataModel;
    public $data;

    public function __construct() {
      $this -> dataModel = array();
      $this -> data = array();
    }

    // Chamada por "todos" os Controllers; irá projetar o redirecionamento das pages
    public function loadTemplate($nameView, $dataModel = array(), $data = array()) {
      $this -> dataModel = $dataModel;
      $this -> data = $data;
      require_once ('Views/template.php');
    }
    
    // Irá fazer o redirecionamento da page
    public function loadViewInTemplate($nameView, $data = array()) {
      extract($data);

      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";

      if (file_exists('Views/'.$nameView.'.php')){
        require_once ('Views/'.$nameView.'.php');
      } elseif (file_exists('Components/'.$nameView.'.php')){
        require_once ('Components/'.$nameView.'.php');
      }
    }

  }

?>
