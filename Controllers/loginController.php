<?php

  Class loginController extends Controller{

    public function index(){
      $this->loadTemplate('login');
    }
    
    public function submit() {
      $l = new login();
      $data = $l -> setLoginValues($_POST['log_email'], $_POST['log_password']);

      if(isset($data[0]) && $data[0]) {
        // array_shift($data);
        $this->loadTemplate('home');
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

  }

?>
