<?php

  Class errorController extends Controller {

    public function index() {
      $this->loadTemplate('404');
    }
    
  }

?>
