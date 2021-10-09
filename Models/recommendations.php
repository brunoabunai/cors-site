<?php
require_once('connection.php');

  Class recommendations{

    private $conn;
    private $err;
    private $help;

    private $user;
    private $title;
    private $description;
    private $data;

    public function __construct() {
      $this->err = array();
      $this->conn = connection::getConnection();
      $this->help = new auxiliary();
    }

    /**
     * Validate the information received
     */
    private function validarInformations() {
      if(strlen($this->title) == 0) {
        $this->err[] = "Preencha o título.";
      } else
      if(strlen($this->title) <= 5) {
        $this->err[] = "Título muito pequeno.";
      }

      if(strlen($this->description) == 0) {
        $this->err[] = "Preencha a descrição.";
      } else
      if(strlen($this->description) <= 50) {
        $this->err[] = "Descrição muito pequeno.";
      }

      $cmd = $this->conn->query(' SELECT rec_description 
                                  FROM recommendations 
                                  WHERE rec_description = "'.$this->description.'" 
                                  or rec_title = "'.$this->title.'"
                                ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();

      if(isset($data) && count($data) != 0) {
        $this->err[] = "Recommendation já cadastrado";
      }

      if(count($this->err) == 0) {
        return [true, $this->insertRegister()];
      } else {
        return [false, $this->err, 'previousPage' => 'recommendationsInfos'];
      }
    }

    /**
     * Set var to informations
     */
    public function setRecommendationsInformations($title, $description, $user = 1) {
      (strpos($title, "  ") != 0) ? $title = $this->help->removeDoubleSpace($title) : $title = $title;
      (strpos($description, "  ") != 0) ? $description = $this->help->removeDoubleSpace($description) : $description = $description;

      date_default_timezone_set('America/Sao_Paulo');
      $date = date("Y-m-d H:i:S");

      $this->user = $user;
      $this->title = trim($title);
      $this->description = trim($description);
      $this->date = $date;

      /**
       * Agora com as sessions é possível remover as variaveis de recommendations
       */
      $_SESSION['rec_title'] = $this->title;
      $_SESSION['rec_register'] = $this->description;

      return $this->validarInformations();
    }

    private function insertRegister() {
      $cmd = $this->conn->query(" INSERT INTO recommendations(
                                    use_idFk,
                                    rec_title,
                                    rec_description,
                                    rec_date
                                  ) VALUES (
                                    '".$this->user."',
                                    '".$this->title."',
                                    '".$this->description."',
                                    '".$this->date."'
                                  );
                                ");

      return array(
        'text' => '"'.$this->title.'" Registrado ',
        'previousPage' => 'home',
        'buttonText' => 'Home'
      );
    }

    /** ------------------------------------------------------ */

    /**
     * Lista as recomendações apartir de 1 pesquisa
     */
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
      $query = " SELECT rec_idPk, use_idFk, rec_title, rec_description 
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
            'id' => $row['rec_idPk'],
            'user' => $this->help->getUserPerId($row['use_idFk']),
            'title' => $row['rec_title'],
            'description' => $row['rec_description']
          ];
        }
  
        return array('recommendations' => $this->data);
      } else {
        return ['recommendations' => ['No data Found']];
      }
    }

    /** ------------------------------------------------------ */

    /**
     * Select Recommendation from id
     */
    public function recommendationFromId($id){
      $data = array();
      $cmd = $this->conn->query(' SELECT use_idFk, rec_title, rec_description
                                  FROM recommendations 
                                  Where rec_idPk = '.$id.'
                                ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();
      // return $data;
      return [
        "user" => $this->help->getUserPerId($data['use_idFk']),
        "title" => $data['rec_title'],
        "description" => $data['rec_description'],
        "content" => 'No duo no sed dolores stet, gubergren amet kasd sit sit lorem. Takimata ut et et sadipscing sea. No sit elitr accusam ipsum nonumy clita sanctus, diam sed ipsum voluptua ut rebum labore sed. Ipsum voluptua at aliquyam sed sanctus no sea no, diam sed et eirmod tempor tempor ea clita. Elitr ea ut kasd duo diam sanctus, no labore takimata sit at lorem. Sed tempor stet et ipsum sea. Gubergren diam ut sed lorem voluptua ea dolor labore, sed dolor accusam lorem at gubergren voluptua invidunt diam, nonumy invidunt sed amet erat et accusam takimata, et sit magna justo.'
      ];
    }

  }

?>
