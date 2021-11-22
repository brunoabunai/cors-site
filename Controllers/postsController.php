<?php

  Class postsController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
    }

    public function index(){
      $this->help->pagesLoginViewTyp(['admin', 'writer'], 'createPosts');
    }

    public function submit(){
      $r = new posts();
      $data = $r -> setPostInformations($_POST['pos_title'], $_POST['pos_description'], $_FILES['pos_image'], $_SESSION['loginId']);

      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        $h = new auxiliary();
        $h->resetSessionsRegister();

        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }

    }

    public function removePost($postId) {
      $u = new posts();
      $data = $u -> removePost($postId);
      // print_r($data);

      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('success', $data);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }
    
  }

?>
