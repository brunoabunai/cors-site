<?php
require_once('connection.php');

  Class login {

    private $conn;
    private $err;
    private $help;

    private $email;
    private $password;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->help = new auxiliary();
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
      if (strlen($this->email) == 0) {
        $this->err[] = 'preencha o e-mail.';
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
        SELECT use_idPk, typ_idFk, use_password, use_avatar 
        FROM users 
        WHERE use_email = '".$this->email."' 
        LIMIT 1
      ";
      $query = $this->conn->query($cmd) or die ($this->conn->error);
      $data = $query->fetch_assoc();

      if(!password_verify($this->password, $data['use_password'])){
        $this->err[] = "User not Found";
      }

      /** View if not existe err, if return = true (login), else (errorLog) */
      if(count($this->err) == 0){
        $_SESSION['loginId'] = $data['use_idPk'];
        $_SESSION['loginType'] = $this->help->getTypePerId($data['typ_idFk']);
        $_SESSION['loginAvatar'] = $data['use_avatar'];
        
        return [
          true,
          // array(
          //   'text' => 'Logado ',
          //   'previousPage' => 'home',
          //   'buttonText' => 'Home'
          // )
        ];
      } else {
        return [false, $this->err, 'previousPage' => 'login'];
      }

    }

  }

?>
