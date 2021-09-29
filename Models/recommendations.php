<?php
require_once('connection.php');

  Class recommendations{

    private $conn;
    private $err;

    private $user;
    private $title;
    private $description;
    private $data;

    public function __construct() {
      $this->err = array();
      $this->conn = connection::getConnection();
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
        return [false, $this->err, 'previousPage' => 'recommendations'];
      }
    }

    /**
     * Remove double spaces from string
     */
    private function removeDoubleSpace($something) {
      while(strpos($something, "  ") != 0){
        return str_replace("  ", " ", $something);
      }
    }

    /**
     * Set var to informations
     */
    public function setRecommendationsInformations($title, $description, $user = 1) {
      (strpos($title, "  ") != 0) ? $title = $this->removeDoubleSpace($title) : $title = $title;
      (strpos($description, "  ") != 0) ? $description = $this->removeDoubleSpace($description) : $description = $description;

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
        'user' => $this->user,
        'title' => $this->title,
        'dateCreation' => $this->date
      );
    }

  }

?>
