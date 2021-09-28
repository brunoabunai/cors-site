<?php

  Class landingController extends Controller {

    public function index() {
      $this -> loadTemplate('landing');
    }

  }