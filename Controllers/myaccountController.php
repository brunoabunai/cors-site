<?php

  Class myaccountController extends Controller{
    
    public function user(){
      $l = new auxiliary();
      $data = $l->getUserPerId($_SESSION['loginId']);

      $this->loadTemplate('myaccount', $data);
    }

  }

?>
