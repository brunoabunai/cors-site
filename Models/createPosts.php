<?php
require_once('connection.php');

  Class createPosts{

    private $conn;
    private $err;

    private $user;
    private $title;
    private $description;
    private $date;

    public function __construct(){
      $this->err = array();
      $this->conn = connection::getConnection();
    }

    private function validarInformations(){
      if(strlen($this->title) == 0){ //Vê se o campo "Title" está vazio
        $this->err[] = "Preencha o título.";
      } else
      if(strlen($this->title) <= 5){ //Vê se o campo "Title"  tem menos de 6 caracteres
        $this->err[] = "Title muito pequeno.";
      }

      if(strlen($this->description) == 0){ //Vê se o campo "Description" está vazio
        $this->err[] = "Preencha a descrição.";
      } else
      if(strlen($this->description) <= 100){ //Vê se o campo "Description"  tem menos de 101 caracteres
        $this->err[] = "Descrição muito pequeno.";
      }
      
      $cmd = $this->conn->query(' SELECT pos_description 
                                  FROM posts 
                                  WHERE pos_description = "'.$this->description.'"
                                  or pos_title = "'.$this->title.'"
                                ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();

      if(isset($data) && count($data) != 0){ //Vê se usuário já está cadastrado...
        $this->err[] = "Post já cadastrado";
      }

      if(count($this->err) == 0){ //Vê se passou pela verificação...
        // $this->setUserInformations($this->name, $this->password, $this->avatar);
        return [true, $this->insertRegister()];
      } else {
        return [false, $this->err, 'previousPage' => 'createPosts'];
      }
    }

    private function removeDoubleSpace($something){
      while(strpos($something, "  ") != 0){
        return str_replace("  ", " ", $something);
      }
    }

    public function setPostInformations($title, $description, $user = 1){
      (strpos($title, "  ") != 0) ? $title = $this->removeDoubleSpace($title) : $title = $title;
      (strpos($description, "  ") != 0) ? $description = $this->removeDoubleSpace($description) : $description = $description;

      date_default_timezone_set('America/Sao_Paulo');
      $date = date("Y-m-d H:i:s");

      $this->user = $user;
      $this->title = trim($title);
      $this->description = trim($description);
      $this->date = $date;

      /**
       * Agora com as sessions é possível remover as variaveis de posts
       */
      $_SESSION['pos_title'] = $this->title;
      $_SESSION['pos_register'] = $this->description;

      return $this->validarInformations();
    }

    private function insertRegister(){
      $cmd = $this->conn->query(" INSERT INTO posts(
                                    use_idFk,
                                    pos_title,
                                    pos_description,
                                    pos_date,
                                    pos_dateEdit
                                  ) VALUES (
                                    '".$this->user."',
                                    '".$this->title."',
                                    '".$this->description."',
                                    '".$this->date."',
                                    '".$this->date."'
                                  );
                               ");

      return array(
        'user' => $this->user,
        'title' => $this->title,
        'dateCreation' => $this->date,
        'dateEdited' => $this->date,
      );
    }
  }
