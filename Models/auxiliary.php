<?php
require_once('connection.php');

  Class auxiliary extends Controller{

    private $conn;
    public $ret;

    public function __construct(){
      $this->conn = connection::getConnection();
    }

    /** Users */
    public function getUserPerId($id){
      $cmd = $this->conn->query('
        SELECT use_name, use_email, use_avatar
        FROM users
        WHERE use_idPk = "'.$id.'"
      ');
      $this->ret = $cmd->fetch_assoc();

      return ([
        'name' => $this->ret['use_name'],
        'email' => $this->ret['use_email'],
        'avatar' => $this->ret['use_avatar']
      ]);
    }

    public function getUserPerName($name) {
      $name = str_replace("-", " ", $name);
      // $data = array();
      $cmd = $this->conn->query(' SELECT use_idPk, use_name, use_email, use_avatar
                                  FROM users
                                  WHERE use_name = "'.$name.'" ');
      $this->ret = $cmd->fetch_assoc();

      return ([
        'id' => $this->ret['use_idPk'],
        'name' => $this->ret['use_name'],
        'email' => $this->ret['use_email'],
        'avatar' => $this->ret['use_avatar']
      ]);
    }


    /** Type */
    public function getType() {
      $cmd = $this->conn->query(' SELECT typ_idPk, typ_name 
                                  FROM types
                                ') or die ($this->conn->error);

      foreach ($cmd as $row){
        $this->ret[] = array(
          "id" => $row['typ_idPk'],
          "name" => $row['typ_name']
        );
      }

      return array('types' => $this->ret);
    }

    public function getTypePerId($id) {
      $cmd = $this->conn->query(' SELECT typ_name 
                                  FROM types
                                  WHERE typ_idPk = "'.$id.'" ');
      $this->ret = $cmd->fetch_assoc(); //retorno

      return ($this->ret['typ_name']);
    }


    /** Gerais */
    public function removeDoubleSpace($something) {
      while(strpos($something, "  ") != 0) {
        return str_replace("  ", " ", $something);
      }
    }

    public function removeAccents($something) {
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$something);
    }

    public function resetSessionsRegister() {
      unset(
        //Users
        $_SESSION['reg_name'],
        $_SESSION['reg_email'],
        //Post
        $_SESSION['pos_title'],
        $_SESSION['pos_register'],
        //Recommendation
        $_SESSION['rec_title'],
        $_SESSION['rec_register']
      );
    }

    public function pagesLoginView($pageName, $noLoged = 'unplugged', $dataModel = array(''), $data = array()) {
      if (isset($_SESSION['loginId']) && !empty($dataModel)){
        $this->loadTemplate($pageName, $dataModel, $data);
      } else {
        $this->loadTemplate($noLoged);
      }
    }
    
    public function pagesLoginViewTyp($permission = array(), $pageName, $noLoged = 'unplugged', $dataModel = array(''), $data = array()) {
      if (isset($_SESSION['loginId']) && !empty($dataModel)){
        foreach ($permission as $key => $value) {
          if($value === $this->getTypePerId($_SESSION['loginType'])) {
            $this->loadTemplate($pageName, $dataModel, $data);
            exit;
          }
        }
        
        $this->loadTemplate($noLoged);
      } else {
        $this->loadTemplate($noLoged);
      }
    }

  }

?>
