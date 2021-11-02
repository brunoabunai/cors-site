<?php

  Class unpluggedController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
    }

    public function index(){
      $this->loadTemplate('unplugged');
    }

    public function logOff() {
      session_destroy();
      $this->help->pagesLoginView('landing');
    }

  }

?>
