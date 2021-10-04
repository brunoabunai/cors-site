<?php

  Class editController extends Controller{

    public function index(){
      $this->loadTemplate('selectUser');
      // $this->loadTemplate('edit');
    }

    public function search() {
      $u = new selectUser();
      $data = $u -> getUsersSearch();

      // $this->loadTemplate('viewSearch', array(), $data);
    }

    public function editUser($nameUser) {
      $u = new selectUser();
      $data = $u->getUserPerName($nameUser);
      
      $this->loadTemplate('edit', $data);
    }

    public function submitEditUser($userId) {
      $u = new selectUser();
      $data = $u -> setEditValues($_POST['edi_id'], $_POST['edi_name'], $_POST['edi_password']);
      // print_r($data);
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
