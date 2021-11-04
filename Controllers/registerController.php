<?php

  Class registerController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
    }

    // public function index(){
    // }

    public function administradores(){
      $g = new auxiliary();
      $data = $g -> getType();

      // $this->loadTemplate('register', $data);
      $this->help->pagesLoginViewTyp(['admin'], 'register', 'unplugged', $data);
    }

    public function member(){
      $this->loadTemplate('registerMember');
    }
    
    public function submitAdmin(){
      $r = new register();
      $data = $r -> submit($_POST['reg_email'], $_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', $_POST['typ_reg'], true);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        $h = new auxiliary();
        $h->resetSessionsRegister();

        $this->loadTemplate('registerSuccess', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }

    public function submitMember(){
      $r = new register();
      $data = $r -> submit($_POST['reg_email'], $_POST['reg_name'], $_POST['reg_password'], $_POST['reg_confirmPassword'], '', 1, false);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);$h = 
        new auxiliary();
        $h->resetSessionsRegister();

        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }
    
  }

?>
