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

  }

?>
