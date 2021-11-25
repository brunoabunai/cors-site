<?php

  Class editController extends Controller{

    private $help;

    public function __construct() {
      $this->help = new auxiliary();
    }

    public function index(){
      $this->help->pagesLoginViewTyp(['admin'], 'selectUser', 'unplugged', array(''), array(), ['mensagem' => "Você não tem permissão!!"]);
    }

    public function search() {
      $u = new edit();
      $data = $u -> getUsersSearch();
    }

    public function editUser($nameUser = null) {
      $data = (!empty($this->help->getUserPerName($nameUser))) ? $this->help->getUserPerName($nameUser) : array();
      if($this->help->getUserPerName($nameUser)['id'] == $_SESSION['loginId']){
        $this->help->pagesLoginViewTyp(['admin', 'user', 'writer'], 'edit', 'unplugged', $data);
      } else {
        $this->help->pagesLoginViewTyp(['admin'], 'edit', 'unplugged', $data);
      }
    }

    public function submitEditUser($userId) {
      $u = new edit();
      // exit;
      $data = $u -> setEditValues($_POST['edi_id'], $_POST['edi_name'], $_POST['edi_email'], $_POST['edi_password'], $_FILES['edi_image']);

      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

    public function removeUsers($userName) {
      $u = new edit();
      $data = $u -> removeUser($userName);
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
