<?php

  Class homeController extends Controller{

    public function index(){
      $this->loadTemplate('home');
    }
    
    public function recentViews(){
      $h = new home();
      $data = $h->recentPosts();
      
      $this->loadTemplate('homePostViews', $data);
    }

    public function getPostFromTitle($title){
      $p = new home();
      $data = $p -> getPostPerTitle($title);

      $this->loadTemplate('notice', $data);
    }

  }

?>
