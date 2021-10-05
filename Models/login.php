<?php
require_once('connection.php');

  Class login {

    private $conn;
    private $err;

    private $name;
    private $password;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->err = array();
    }

    public function setLoginValues($name, $password) {
      $this->name = $name;
      $this->password = $password;

      return $this->loginValidation();
      // return md5(md5($password));
    }

    /**
     * Function to validation values
     */
    private function loginValidation() {
      if (strlen($this->name) == 0) {
        $this->err[] = 'preencha o nome.';
      }
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
        WHERE use_name = '".$this->name."' 
        AND use_password = '".md5(md5($this->password))."'
      ";
      $query = $this->conn->query($cmd) or die ($this->conn->error);
      $data = $query->fetch_assoc();
      
      if(empty($data)){
        $this->err[] = "User not Found";
        $this->err[] = $cmd;
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
