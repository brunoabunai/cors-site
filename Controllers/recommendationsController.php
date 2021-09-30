<?php

  Class recommendationsController extends Controller{

    public function index(){
      $this->loadTemplate('recommendations');
    }

    public function submit(){
      $r = new recommendations();
      $data = $r->setRecommendationsInformations($_POST['rec_title'], $_POST['rec_description']);

      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('menu');
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

  }

?>
