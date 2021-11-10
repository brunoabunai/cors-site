<?php

  Class recommendationsController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
    }

    public function index(){
      $this->help->pagesLoginViewTyp(['admin', 'writer'], 'recommendationsList');
    }

    public function infos(){
      $this->loadTemplate('recommendationsInfos');
    }

    public function create(){
      $this->loadTemplate('createRecommendations');
    }

    public function submit(){
      $r = new recommendations();
      $data = $r->setRecommendationsInformations($_POST['rec_title'], $_POST['rec_description'], $_SESSION['loginId']);

      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $h = new auxiliary();
        $h->resetSessionsRegister();

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

      $this->help->pagesLoginViewTyp(['admin', 'writer'], 'recommendationSearchView', '', $data);
    }
    
    /** Select */
    public function getRecommendation($id = null){
      $s = new recommendations();
      $data = (!empty($s->recommendationFromId($id))) ? $s->recommendationFromId($id) : array();

      $this->help->pagesLoginViewTyp(['admin', 'writer'], 'recommendations', 'unplugged', $data);
    }

  }

?>
