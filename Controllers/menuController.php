<?php

  Class menuController extends Controller{

    public function __construct() {
      $h = new auxiliary();
      $h->resetSessionsRegister();
    }

    public function index(){
      $this->loadTemplate('menu');
    }

  }

?>
