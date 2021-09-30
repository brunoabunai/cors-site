<?php
require_once('connection.php');

  Class selectRecommendations {

    private $conn;
    public $help;
    public $data;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->help = new auxiliary();
      $this->data = array();
    }

    public function getRecommendationSearch() {
      /** Variaveis de controle */
      $limit = 5;
      $action = $_POST['action'];

      if($_POST['actualPage'] > 1){
        $start = (($_POST['actualPage'] - 1) * $limit);
        $pages = $_POST['actualPage'];
      } else {
        $start = 0;
        $page = 1;
      }

      /** Get (recommendations) from database */
      $query = " SELECT use_idFk, rec_title, rec_description 
                 FROM recommendations ";

      //if (action) not null, then execute filter from search to find caracters
      ($action != '') ? (
        $query.= ' 
          WHERE rec_title LIKE "%'.str_replace(' ', '%', $action).'%" 
          OR rec_description LIKE "%'.str_replace(' ', '%', $action).'%" 
        '
      ) : null;
      $query .= ' ORDER BY rec_title DESC ';

      //Limit pulls from database
      $queryLimit = $query . 'LIMIT ' . $start . ', ' . $limit;

      $querys = $this->conn->query($query) or die ($this->conn->error); //all pull
      $totalData = $querys->num_rows;

      $limitQueryPages = $this->conn->query($queryLimit) or die ($this->conn->error);
      // $this->data = $limitQueryPages->fetch_assoc();

      if ($totalData > 0) {
        foreach ($limitQueryPages as $row) {
          $this->data[] = [
            'user' => $this->help->getUserPerId($row['use_idFk']),
            'title' => $row['rec_title'],
            'description' => $row['rec_description']
          ];
        }

        return ['recommendations' => $this->data];
      } else {
        return ['return' => 'No data Found'];
      }
    }

  }

?>
