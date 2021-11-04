<?php

  Class loginController extends Controller{

    private $help;
    public $data = array();

    public function __construct() {
      $this->help = new auxiliary();
    }

    public function index(){
      $this->help->pagesLoginView('home', 'login');
    }
    
    public function submit() {
      $l = new login();
      $this->data = $l -> setLoginValues($_POST['log_email'], $_POST['log_password']);

      if(isset($this->data[0]) && $this->data[0]) {
        // $this->help->pagesLoginView('home');
        echo ("
          <script>
          window.location.href = \"../home\";
          </script>
        ");
      } else {
        array_shift($this->data);
        $this->loadTemplate('errorLog', $this->data);
      }
    }

  }

?>
