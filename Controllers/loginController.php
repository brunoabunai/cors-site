<?php

  Class loginController extends Controller{

    public function index(){
      $this->loadTemplate('login');
    }

    public function submit() {
      $l = new login();
      $l -> login();
    }

  }

?>
