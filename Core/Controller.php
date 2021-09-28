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
      require_once ('Views/'.$nameView.'.php');
    }

  }

?>
