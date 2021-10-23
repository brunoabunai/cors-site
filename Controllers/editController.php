<?php

  Class editController extends Controller{

    public function index(){
      $this->loadTemplate('selectUser');
      // $this->loadTemplate('edit');
    }

    public function search() {
      $u = new edit();
      $data = $u -> getUsersSearch();
    }

    public function editUser($nameUser) {
      $u = new auxiliary();
      $data = $u -> getUserPerName($nameUser);
      
      $this->loadTemplate('edit', $data);
    }

    public function submitEditUser($userId) {
      $u = new edit();
      $data = $u -> setEditValues($_POST['edi_id'], $_POST['edi_name'], $_POST['edi_email'], $_POST['edi_password'], $_FILES['edi_image']);
      // print_r($data);
      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

    public function removeUser($userName) {
      $u = new edit();
      $data = $u -> removeUser($userName);
      if(isset($data[0]) && $data[0]){
        array_shift($data);
        $this->loadTemplate('success', $data[0]);
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
    }

  }

?>
