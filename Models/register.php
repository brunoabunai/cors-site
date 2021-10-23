<?php
require_once('connection.php');

  Class register{

    /**
     * General vars
     */
    private $conn;
    private $err;
    private $help;

    /**
     * User informations vars
     */
    private $email;
    private $name;
    private $password;
    private $confirmPassword;
    private $avatar;
    private $type;

    public function __construct(){
      $this->err = array();
      $this->conn = connection::getConnection();
      $this->help = new auxiliary();
    }

    /**
     * Validade tinformations from users
     */
    private function validateInformations(){      

      if(strlen($this->name) == 0){ //Vê se o campo "Name" está vazio
        $this->err[] = "Preencha o nome.";
      } else
      if(strlen($this->name) <= 5){ //Vê se o campo "Name" tem menos de 5 caracteres
        $this->err[] = "Nome muito pequeno.";
      }
      
      if (strlen($this->email) == 0) {
        $this->err[] = 'preencha o e-mail.';
      }

      if(strlen($this->password) == 0){ //Vê se o campo "Password" está vazio
        $this->err[] = "Preencha a senha.";
      } else
      if(strlen($this->password) <= 7){ //Vê se o campo "Password" tem menos de 6 caracteres
        $this->err[] = "Senha muito pequena.";
      } else
      if(!($this->password === $this->confirmPassword)){ //Vê se a senha bate com a confirmação da senha
        $this->err[] = "Senhas não correspondem";
        // print_r($this->password);
        print_r($this->confirmPassword);
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

    }

    /**
     * Set users var from receipt of data
     */
    private function setUserInformations($email, $name, $password, $confirmPassword, $avatar = null, $type = 1){
      while((strpos($name, "  ") != 0)){ //Enquanto existir doble space
        (strpos($name, "  ") != 0) ? $name = $this->help->removeDoubleSpace($name) : $name = $name;
      }
      $name = $this->help->removeAccents($name);

      $this->email = $email;
      $this->name = $name;
      $this->password = $password;
      $this->confirmPassword = $confirmPassword;
      $this->avatar = $avatar;
      $this->type = $type;

      /**
       * Agora com as sessions é possível remover as variaveis de users
       */
      $_SESSION['reg_email'] = $this->email;
      $_SESSION['reg_name'] = $this->name;

      return $this->validateInformations();
    }
    
    /**
     * Submit from database
     */
    private function insertRegister(){
      (strlen($this->avatar) == 0) ? ( //User avatar is empty
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_email,
                                      use_name,
                                      use_password
                                    ) VALUES (
                                      '".$this->type."',
                                      '".$this->email."',
                                      '".$this->name."',
                                      '".md5(md5($this->password))."'
                                    );
                                  ")
        ) : ( //User avatar is not empty
      $cmd = $this->conn->query(" INSERT INTO users(
                                    typ_idFk,
                                    use_name,
                                    use_email,
                                    use_password,
                                    use_avatar
                                  ) VALUES (
                                    '".$this->type."',
                                    '".$this->name."',
                                    '".$this->email."',
                                    '".md5(md5($this->password))."',
                                    '".$this->avatar."'
                                  );
                                ") or die ($this->conn->error)
        );

      return [
        true,
        array(
          'text' => $this->name.' Registrado ',
          'previousPage' => 'login',
          'buttonText' => 'Logar'
        )
      ];
    }

    private function insertRegisterAdmin(){
      (strlen($this->avatar) == 0) ? ( //User avatar is empty
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_email,
                                      use_name,
                                      use_password
                                    ) VALUES (
                                      '".$this->type."',
                                      '".$this->email."',
                                      '".$this->name."',
                                      '".md5(md5($this->password))."'
                                    );
                                  ")
      ) : ( //User avatar is not empty
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_name,
                                      use_email,
                                      use_password,
                                      use_avatar
                                    ) VALUES (
                                      '".$this->type."',
                                      '".$this->name."',
                                      '".$this->email."',
                                      '".md5(md5($this->password))."',
                                      '".$this->avatar."'
                                    );
                                  ") or die ($this->conn->error)
      );

      return [true, array('name' => $this->name)];
    }

    public function submit($email, $name, $password, $confirmPassword, $avatar = '', $type = 1, $isAdminSubmit = false){
      $this->setUserInformations($email, $name, $password, $confirmPassword, $avatar = '', $type);

      if($isAdminSubmit){
        if(count($this->err) == 0){ //Vê se passou pela verificação...
          return $this->insertRegisterAdmin();
        } else {
          return [false, $this->err, 'previousPage' => 'register/administradores'];
        }
      } else {
        if(count($this->err) == 0){ //Vê se passou pela verificação...
          return $this->insertRegister();
        } else {
          return [false, $this->err, 'previousPage' => 'register/member'];
        }
      }
    }

  }
