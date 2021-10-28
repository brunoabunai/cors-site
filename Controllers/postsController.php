<?php

  Class postsController extends Controller{

    public function index(){
      $this->loadTemplate('createPosts');
    }

    public function submit(){
      $r = new posts();
      $data = $r -> setPostInformations($_POST['pos_title'], $_POST['pos_description'], $_FILES['pos_image']);

      // print_r($data);

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
  }

?>
