<?php

  Class homeController extends Controller{

    private $help;
    public $data = array();

    public function __construct() {
      $this->help = new auxiliary();
      $this->help->resetSessionsRegister();
    }

    public function index(){
      $this->help->pagesLoginView('home');
    }
    
    public function recentViews(){
      $h = new home();
      $this->data = $h->recentPosts();

      $this->help->pagesLoginView('homePostViews', '', $this->data);
    }

    public function getPostFromTitle($title = null){
      // if($title != null){
        $p = new home();
        $this->data = (!empty($p->getPostPerTitle($title))) ? $p->getPostPerTitle($title) : array();
        // }
        $this->help->pagesLoginView('notice', '', $this->data);
      }
      
    }

    ?>
