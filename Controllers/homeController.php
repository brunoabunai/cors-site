<?php

  Class homeController extends Controller{

    public function index(){
      $this->loadTemplate('home');
    }
    
    public function recentViews(){
      $h = new home();
      $data = $h->recentPosts();
      
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      
      $this->loadTemplate('homePostViews', $data);
    }

  }

?>
