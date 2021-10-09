<?php

  Class registerController extends Controller{

    // public function index(){
    // }

    public function administradores(){
      $this->loadTemplate('register');
    }

    public function member(){
      $this->loadTemplate('registerMember');
    }
    
    public function submitAdmin(){
      $r = new register();
      // $data = $r -> setUserInformations($_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', 2);
      $data = $r -> submit($_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', 2, true);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        $this->loadTemplate('registerSuccess', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }

    public function submitMember(){
      $r = new register();
      // $data = $r -> setUserInformations($_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', 2);
      $data = $r -> submit($_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', 1, false);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }
    
  }

?>
