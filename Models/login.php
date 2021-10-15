<?php
require_once('connection.php');

  Class login {

    private $conn;
    private $err;

    private $email;
    private $password;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->err = array();
    }

    public function setLoginValues($email, $password) {
      $this->email = $email;
      $this->password = $password;

      return $this->loginValidation();
    }

    /**
     * Function to validation values
     */
    private function loginValidation() {
      // if (strlen($this->email) == 0) {
      //   $this->err[] = 'preencha o nome.';
      // }
      if (strlen($this->password) == 0) {
        $this->err[] = 'preencha a senha.';
      }

      return $this->login();
    }

    /**
     * Finction get data from database and compar to execute login
     */
    private function login() {
      /** pull from database */
      $cmd = "
        SELECT use_idPk 
        FROM users 
        WHERE use_email = '".$this->email."' 
        AND use_password = '".md5(md5($this->password))."'
      ";
      $query = $this->conn->query($cmd) or die ($this->conn->error);
      $data = $query->fetch_assoc();
      
      if(empty($data)){
        $this->err[] = "User not Found";
      }

      /** View if not existe err, if return = true (login), else (errorLog) */
      if(count($this->err) == 0){
        return [
          true,
          array(
            'text' => 'Logado ',
            'previousPage' => 'home',
            'buttonText' => 'Home'
          )
        ];
      } else {
        return [false, $this->err, 'previousPage' => 'login'];
      }

    }

  }

?>
