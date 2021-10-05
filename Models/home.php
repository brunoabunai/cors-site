<?php
require_once('connection.php');

  Class home {

    private $conn;
    public $data;
    public $help;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->data = array();
      $this->help = new auxiliary();
    }

    public function recentPosts() {
      $cmd = $this->conn->query("
        SELECT use_idFk, pos_title, pos_description
        FROM posts
        ORDER BY pos_idPk DESC
      ") or die ($this->conn->error);
        
      foreach ($cmd as $row) {
        $this->data[] = [
          'user' => $this->help->getUserPerId($row['use_idFk']),
          'title' => $row['pos_title'],
          'description' => $row['pos_description']
        ];
      }

      return ['recommendations' => $this->data];
    }

  }
?>
