<?php

  Class covidInformationsController extends Controller {

    public function index() {
      $this->loadTemplate('infosars');
    }

    public function preventions() {
      $this->loadTemplate('preventions');
    }

    public function symptoms() {
      $this->loadTemplate(('symptoms'));
    }
  }

?>
