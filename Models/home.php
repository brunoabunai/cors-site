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
      $cmd = $this->conn->query(" SELECT pos_idPk, use_idFk, pos_title, pos_description, pos_image, pos_date, pos_dateEdit
                                  FROM posts
                                  ORDER BY pos_idPk DESC
                                ") or die ($this->conn->error);

      foreach ($cmd as $row) {
        $this->data[] = [
          'id' => $row['pos_idPk'],
          'user' => $this->help->getUserPerId($row['use_idFk']),
          'title' => $row['pos_title'],
          'description' => $row['pos_description'],
          "image" => $row['pos_image'],
          'date' => $row['pos_date'],
          'dateEdit' => $row['pos_dateEdit']
        ];
      }

      return ['posts' => $this->data];
    }

    /**
     * Get Post from id
     */
    public function getPostPerTitle($id) {
      // $title = str_replace("-", " ", $title);
      $cmd = $this->conn->query(' SELECT use_idFk, pos_title, pos_description, pos_image 
                                  FROM posts 
                                  WHERE pos_idPk = "'.$id.'"
                                  LIMIT 1 
                                ') or die ($this->help->loadTemplate('unplugged'));
      $this->data = $cmd->fetch_assoc();

      if(empty($this->data)){
        return '';
      }

      return [
        "user" => $this->help->getUserPerId($this->data['use_idFk']),
        "title" => $this->data['pos_title'],
        "description" => $this->data['pos_description'],
        "image" => $this->data['pos_image']
      ];
    }

  }
?>
