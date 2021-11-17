<?php
require_once('connection.php');

  Class posts{

    private $conn;
    private $err;

    private $user;
    private $title;
    private $description;
    private $image;
    private $date;

    public function __construct(){
      $this->err = array();
      $this->conn = connection::getConnection();
    }

    private function validarInformations(){
      if(strlen($this->title) == 0) { //Vê se o campo "Title" está vazio
        $this->err[] = "Preencha o título.";
      } else
      if(strlen($this->title) <= 5) { //Vê se o campo "Title"  tem menos de 6 caracteres
        $this->err[] = "Title muito pequeno.";
      }

      if(strlen($this->description) == 0) { //Vê se o campo "Description" está vazio
        $this->err[] = "Preencha a descrição.";
      } else
      if(strlen($this->description) <= 100) { //Vê se o campo "Description"  tem menos de 101 caracteres
        $this->err[] = "Descrição muito pequeno.";
      }

      $cmd = $this->conn->query(' SELECT pos_idPk, pos_description 
                                  FROM posts 
                                  WHERE pos_description = "'.$this->description.'"
                                  or pos_title = "'.$this->title.'"
                                ');
      $data = $cmd->fetch_assoc();

      if(isset($data) && count($data) != 0){ //Vê se usuário já está cadastrado...
        $this->err[] = "Post já cadastrado";
      }

      if(!isset($this->image)) {
        $this->err[] = "Imagem não selecionada";
      } else
      if($this->image['error']) {
        $this->err[] = "Falha ao enviar a imagem";
      } else
      if($this->image['size'] > 2097152) { //2MB
        $this->err[] = "Imagem muito grande! Max: 2MB";
      } else {
        $directory = 'database/postsImages/';
        $fileName = $this->image['name'];
        $newNameFile = uniqid();

        $extensions = array('png', 'jpg', 'jpeg');
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if(in_array($extension, $extensions) === false) {
          $this->err[] = "Extensão invalida! (png, jpg, jpeg)";
        }

        $right = move_uploaded_file($this->image['tmp_name'], $directory . $newNameFile . '.' . $extension);
        if(!$right) {
          $this->err[] = "Não foi possível fazer o salvamento";
        }

        $this->image = $directory.$newNameFile.'.' . $extension;
      }

      if(count($this->err) == 0){ //Vê se passou pela verificação...
        // $this->setUserInformations($this->name, $this->password, $this->avatar);
        return [true, $this->insertRegister()];
      } else {
        return [false, $this->err, 'previousPage' => 'posts'];
      }
    }

    private function removeDoubleSpace($something){
      while(strpos($something, "  ") != 0){
        return str_replace("  ", " ", $something);
      }
    }

    public function setPostInformations($title, $description, $image, $user){
      (strpos($title, "  ") != 0) ? $title = $this->removeDoubleSpace($title) : $title = $title;
      (strpos($description, "  ") != 0) ? $description = $this->removeDoubleSpace($description) : $description = $description;

      date_default_timezone_set('America/Sao_Paulo');
      $date = date("Y-m-d H:i:s");

      $this->user = $user;
      $this->title = $title;
      $this->description = trim($description);
      $this->image = $image;

      //// $this->image = file_get_contents($image); // Transformando foto em dados (binário)

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
                                    pos_image,
                                    pos_date,
                                    pos_dateEdit
                                  ) VALUES (
                                    '".$this->user."',
                                    '".$this->title."',
                                    '".$this->description."',
                                    '".$this->image."',
                                    '".$this->date."',
                                    '".$this->date."'
                                  );
                               ");

      return array(
        'text' => '"'.$this->title.'" Criado ',
        'previousPage' => 'menu',
        'buttonText' => 'Menu'
      );
    }
  }
