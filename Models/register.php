<?php
require_once('connection.php');

  Class register{

    /**
     * General vars
     */
    private $conn;
    private $err;

    /**
     * User informations vars
     */
    private $name;
    private $password;
    private $confirmPassword;
    private $avatar;

    public function __construct(){
      $this->err = array();
      $this->conn = connection::getConnection();
    }

    /**
     * Validade tinformations from users
     */
    private function validateInformations(){      

      if(strlen($this->name) == 0){ //Vê se o campo "Name" está vazio
        $this->err[] = "Preencha o nome.";
      } else
      if(strlen($this->name) <= 4){ //Vê se o campo "Name" tem menos de 5 caracteres
        $this->err[] = "Nome muito pequeno.";
      }

      if(strlen($this->password) == 0){ //Vê se o campo "Password" está vazio
        $this->err[] = "Preencha a senha.";
      } else
      if(strlen($this->password) <= 5){ //Vê se o campo "Password" tem menos de 6 caracteres
        $this->err[] = "Senha muito pequena.";
      } else
      if(!($this->password === $this->confirmPassword)){ //Vê se a senha bate com a confirmação da senha
        $this->err[] = "Senhas não correspondem";
      }
      
      /**
       * Verifica se o usuário já está cadastrado
       */
      $cmd = $this->conn->query(' SELECT use_name 
                                  FROM users 
                                  WHERE use_name = "'.$this->name.'" 
                                ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();
                                
      if(isset($data) && count($data) != 0){ //Vê se usuário já está cadastrado...
        $this->err[] = "Usuário já cadastrado";
      }

      /**
       * Visualiza se tem alguma falha nas informações do usuário
       */
      if(count($this->err) == 0){ //Vê se passou pela verificação...
        // $this->setUserInformations($this->name, $this->password, $this->avatar);
        return [true, $this->insertRegister()];
      } else {
        return [false, $this->err, 'previousPage' => 'register'];
      }
    }

    /**
     * Remove all double spaces from (something)
     */
    private function removeDoubleSpace($something){
      while(strpos($something, "  ") != 0){
        return str_replace("  ", " ", $something);
      }
    }

    /**
     * Remove all accents from (string)
     */
    private function removeAcentos($string){
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
    }

    /**
     * Set users var from receipt of data
     */
    public function setUserInformations($name, $password, $confirmPassword, $avatar = ''){
      while((strpos($name, "  ") != 0)){ //Enquanto existir doble space
        (strpos($name, "  ") != 0) ? $name = $this->removeDoubleSpace($name) : $name = $name;
      }
      $name = $this->removeAcentos($name);

      $this->name = trim($name);
      $this->password = $password;
      $this->confirmPassword = $confirmPassword;
      $this->avatar = $avatar;

      /**
       * Agora com as sessions é possível remover as variaveis de users
       */
      $_SESSION['reg_name'] = $this->name;
      $_SESSION['reg_password'] = $this->password;
      $_SESSION['reg_confirmPassword'] = $this->confirmPassword;

      return $this->validateInformations();
    }
    
    /**
     * Submit from database
     */
    private function insertRegister(){
      (strlen($this->avatar) == 0) ? ( //User avatar is empty
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_name,
                                      use_password
                                    ) VALUES (
                                      '".(2)."',
                                      '".$this->name."',
                                      '".md5(md5($this->password))."'
                                    );
                                  ")
        ) : ( //User avatar is not empty
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_name,
                                      use_password,
                                      use_avatar
                                    ) VALUES (
                                      '".(2)."',
                                      '".$this->name."',
                                      '".md5(md5($this->password))."',
                                      '".$this->avatar."'
                                    );
                                  ")
      );

      return array('name' => $this->name); //Return (array) name registred
    }
  }
