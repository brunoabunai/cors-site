<?php

  Class recommendationsController extends Controller{

    public function index(){
      $this->loadTemplate('recommendationsList');
    }

    public function infos(){
      $this->loadTemplate('recommendationsInfos');
    }

    public function create(){
      $this->loadTemplate('createRecommendations');
    }

    public function submit(){
      $r = new recommendations();
      $data = $r->setRecommendationsInformations($_POST['rec_title'], $_POST['rec_description']);

      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

    /** Pull */
    public function search(){
      $s = new recommendations();
      $data = $s -> getRecommendationSearch();

      // print_r($data);

      $this->loadTemplate('recommendationSearchView', $data);
    }
    
    /** Select */
    public function getRecommendation($id){
      $s = new recommendations();
      $data = $s -> recommendationFromId($id);

      $this->loadTemplate('recommendations', $data);
    }

  }

?>
