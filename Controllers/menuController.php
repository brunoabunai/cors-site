<?php

  Class menuController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
      $this->help->resetSessionsRegister();
    }

    public function index(){
      $this->help->pagesLoginView('menu');
    }

  }

?>
