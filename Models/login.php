<?php
require_once('connection.php');

  Class login {

    private $conn;

    public function __construct() {
      $this->conn = connection::getConnection();
    }

    public function login() {
      echo "hello";
    }

  }

?>
