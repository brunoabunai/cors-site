
<?php

  Class recommendationsListController extends Controller{

    public function index(){
      $this->loadTemplate('recommendationsList');
    }
    
    public function search(){
      $s = new selectRecommendations();
      $data = $s -> getRecommendationSearch();
      
      $this->loadTemplate('recommendationSearchView', $data);
    }

  }

?>
