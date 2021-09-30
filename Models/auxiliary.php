<?php
require_once('connection.php');

  Class auxiliary{

    private $conn;
    public $ret;

    public function __construct(){
      $this->conn = connection::getConnection();
    }

    public function getUserPerId($id){
      $cmd = $this->conn->query(' 
        SELECT use_name, use_avatar 
        FROM users 
        WHERE use_idPk = "'.$id.'"
      ');
      $this->ret = $cmd->fetch_assoc();

      return ([
        'name' => $this->ret['use_name'],
        'avatar' => $this->ret['use_avatar']
      ]);
    }

  }

?>
