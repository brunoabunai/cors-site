<?php

  Class registerController extends Controller{

    public function index(){
      $this->loadTemplate('register');
    }
    
    public function submitAdmin(){
      $r = new register();
      $data = $r -> setUserInformations($_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], 2);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        // $this->loadTemplate('registerSuccess', $data[0]);
        $this->loadTemplate('registerSuccess', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }
    
  }

?>
