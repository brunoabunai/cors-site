<?php
require_once ('connection.php');

  Class edit {

    private $conn;
    private $err;
    private $help;
    public $data;

    private $id, $name, $email, $password, $image;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->err = array();
      $this->data = array();
      $this->help = new auxiliary();
    }

    /**
     * ------------------------------------------------------------
     * Get user from search (input)
     * ------------------------------------------------------------
     */
    public function getUsersSearch() {
      /** Vars of controller */
      $limit = 5;
      $action = $_POST['action'];
      
      if ($_POST['actualPage'] > 1) {
        $start = (($_POST['actualPage'] - 1) * $limit);
        $pages = $_POST['actualPage'];
      } else {
        $start = 0;
        $pages = 1;
      }

      /** Choose user from search */
      $query = " SELECT typ_IdFk, use_name, use_avatar
                 FROM users ";

      //Se o $action estiver com algum conteudo, ele irá fazer o filtro apartir da variavel
      ($action != '') ? $query .= ' WHERE use_name LIKE "%'.str_replace(' ', '%', $action).'%" ' : null;
      $query .= ' ORDER BY use_name ASC ';

      $queryLimit = $query . 'LIMIT ' . $start . ', ' . $limit;

      $querys = $this->conn->query($query) or die($this->conn->error);
      $totalData = $querys->num_rows;

      $limitQueryPages = $this->conn->query($queryLimit) or die($this->conn->error);
      $row = $limitQueryPages->fetch_assoc();

      $output = '
      <!-- <label>Total de Registros - '.$totalData.'</label>-->
      <table class="search-users">
        <tr class="head-users">

          <th>Avatar</th>
          <th>Usuário</th>

          <th class="id">Tipo</th>

          <th class="options">Opções</th>
        </tr>
      ';

      if ($totalData > 0) {
        foreach ($limitQueryPages as $row) {
          $output .= '
          <tr class="column-user">

            <td><img src="'.$row["use_avatar"].'"/></td>
            <td>'.$row["use_name"].'</td>
            
            <td class="id">'.$this->help->getTypePerId($row["typ_IdFk"]).'</td>

            <td class="options-user options">
              <button class="btn-delete-user">
                <a href="./edit/removeUsers/'.str_replace(" ", "-", $row["use_name"]).'">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 22H7C5.89543 22 5 21.1046 5 20V7H3V5H7V4C7 2.89543 7.89543 2 9 2H15C16.1046 2 17 2.89543 17 4V5H21V7H19V20C19 21.1046 18.1046 22 17 22ZM7 7V20H17V7H7ZM9 4V5H15V4H9Z" fill="var(--danger)"></path>
                  </svg>
                </a>
              </button>

              <button class="btn-edit-user">
                <a href="./edit/editUser/'.str_replace(" ", "-", $row["use_name"]).'">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.41999 20.579C4.13948 20.5785 3.87206 20.4603 3.68299 20.253C3.49044 20.0475 3.39476 19.7695 3.41999 19.489L3.66499 16.795L14.983 5.48103L18.52 9.01703L7.20499 20.33L4.51099 20.575C4.47999 20.578 4.44899 20.579 4.41999 20.579ZM19.226 8.31003L15.69 4.77403L17.811 2.65303C17.9986 2.46525 18.2531 2.35974 18.5185 2.35974C18.7839 2.35974 19.0384 2.46525 19.226 2.65303L21.347 4.77403C21.5348 4.9616 21.6403 5.21612 21.6403 5.48153C21.6403 5.74694 21.5348 6.00146 21.347 6.18903L19.227 8.30903L19.226 8.31003Z" fill="var(--alert)"></path>
                  </svg>
                </a>
              </button> 
            </td>
          </tr>
          ';
        }
      } else {
        $output .= '
        <tr>
          <td colspan="4" align="center" style="color:var(--danger);">Usuário Não Encontrado</td>
        </tr>
        </table>
        ';
      }

      /** Final das configurações básicas */

      /** -------------------------------- */
      $totalLinks = ceil($totalData / $limit);
      $pageArray = array();
      $previewsLink = '';
      $nextLink = '';
      $pageLink = '';

      /** Iniciao da paginação */
      if($totalLinks > 4){
        if($pages < 5){
          for($count = 1; $count <= 5; $count++){
            $pageArray[] = $count;
          }
          $pageArray[] = '...';
          $pageArray[] = $totalLinks;

        }else{
          $endLimit = $totalLinks - 5;
          if($pages > $endLimit){
            $pageArray[] = 1;
            $pageArray[] = '...';
            for($count = $endLimit; $count <= $totalLinks; $count++){
              $pageArray[] = $count;
            }

          }else{
            $pageArray[] = 1;
            $pageArray[] = '...';
            for($count = $pages - 1; $count <= $pages + 1; $count++){
              $pageArray[] = $count;
            }
            $pageArray[] = '...';
            $pageArray[] = $totalLinks;

          }
        }

      }else{
        for($count = 1; $count <= $totalLinks; $count++){
          $pageArray[] = $count;
        }

      }
      /** Paginação final */

      /** --------------------- */

      /** Inicio do controle da paginação */

      for($count = 0; $count < count($pageArray); $count++){
        if($pages == $pageArray[$count]){
          $pageLink .= '

            <a class="" href="#">'.$pageArray[$count].'</a>

          ';

          $previousId = $pageArray[$count] - 1;
          if($previousId > 0){
            $previewsLink = '<a class="" href="javascript:void(0)" data-page_number="'.$previousId.'">Previous</a>';
          }else{
            $previewsLink = '

            <a class="" href="#">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.535 3.515L7.05005 12L15.535 20.485L16.95 19.071L9.87805 12L16.95 4.929L15.535 3.515Z" fill="var(--text-color)"></path>
              </svg>

            </a>
            ';
          }

          $nextId = $pageArray[$count] + 1;
          if($nextId > $totalLinks){
            $nextLink = '

              <a class="page-link" href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.46495 20.485L16.95 12L8.46495 3.515L7.04995 4.929L14.122 12L7.04995 19.071L8.46495 20.485Z" fill="var(--text-color)"></path>
                </svg>

              </a>

              ';
          }else{
            $nextLink = '<a class="page-link" href="javascript:void(0)" data-page_number="'.$nextId.'">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.46495 20.485L16.95 12L8.46495 3.515L7.04995 4.929L14.122 12L7.04995 19.071L8.46495 20.485Z" fill="var(--text-color)"></path>
              </svg>

            </a>';
          }
        }else{
          if($pageArray[$count] == '...'){
            $pageLink .= '
            <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
            </li>
            ';
          }else{
            $pageLink .= '
            <li class=""><a class="" href="javascript:void(0)" data-page_number="'.$pageArray[$count].'">'.$pageArray[$count].'</a></li>
            ';
          }
        }
      }

      $output .= "<div class='pagination'> ". $previewsLink . $pageLink . $nextLink . "</div>";
      $output .= '
        </>
      </div>
      ';

      echo $output;
    }

    /**
     * ------------------------------------------------------------
     * Submit edit from database
     * ------------------------------------------------------------
     */
    private function editValidation() {
      /** Validar name */
      if(strlen($this->name) == 0) {
        $this->err[] = 'Preencha o nome';
      } else
      if(strlen($this->name) <= 5) {
        $this->err[] = 'Nome muito pequeno';
      }

      if (strlen($this->email) == 0) {
        $this->err[] = 'preencha o e-mail.';
      }

      /** Validar password */
      if(strlen($this->password) == 0) {
        $this->err[] = 'Preencha a senha';
      } else
      if(strlen($this->password) <= 7) {
        $this->err[] = 'Senha muito pequena';
      }

      /** Validar image */
      // if(!isset($this->image)) {
      //   $this->err[] = "Imagem não selecionada";
      // } else
      if(isset($this->image)) {
        if($this->image['error']) {
          $this->err[] = "Falha ao enviar a imagem";
        } else
        if($this->image['size'] > 2097152) { //2MB
          $this->err[] = "Imagem muito grande! Max: 2MB";
        } else {
          $directory = 'database/userImages/';
          $fileName = $this->image['name'];
          $newNameFile = ($this->help->getUserPerId($this->id)['avatar'] != $directory.'404.jpg') ? 
                          explode('.', explode($directory, $this->help->getUserPerId($this->id)['avatar'])[1])[0] : 
                          uniqid();

          $extensions = array('png', 'jpg', 'jpeg');
          $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

          if(in_array($extension, $extensions) === false) {
            $this->err[] = "Extensão invalida! (png, jpg, jpeg)";
          }

          /** Image settings */
          $right = move_uploaded_file($this->image['tmp_name'], $directory . $newNameFile . '.' . $extension);
          if(!$right) {
            $this->err[] = "Não foi possível fazer o salvamento";
          }
          $this->image = $directory . $newNameFile . '.' . $extension;
        }
      }

      /** Vê se o name está em uso */
      $cmd = $this->conn->query('
                            SELECT use_name 
                            FROM users 
                            WHERE use_name = "'.$this->name.'"
                            AND use_idPk <> "'.$this->id.'"
                          ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();

      if(isset($data) && count($data) != 0) {
        $this->err[] = 'User já em uso';
      }

      /** Visualiza se existe alguma falha e qual será o redirecionamento */
      if(count($this->err) == 0) {
        return [true, $this->editUserSubmit()];
      } else {
        return [false, $this->err, 'previousPage' => 'edit/editUser/'.$this->help->getUserPerId($this->id)['name']];
      }

    }

    public function setEditValues($id, $name, $email, $password, $image) {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->image = $image;

      return $this->editValidation();
    }

    public function editUserSubmit() {
      // DELETE from livros WHERE id=2; <- deletar uma linha do database
      $cmd = $this->conn->query("
        UPDATE users
        SET use_name = '".$this->name."',
        use_email = '".$this->email."',
        use_password = '".password_hash($this->password, PASSWORD_DEFAULT)."',
        use_avatar = '".$this->image."'
        WHERE use_idPk = ".$this->id."
      ") or die ($this->conn->error);

      return array(
        'text' => $this->name.' alterado ',
        'previousPage' => 'menu',
        'buttonText' => 'Menu',
        'pos' => '../../'
      );
    }

    /** Rever código */
    public function removeUser($userName) {
      // DELETE from livros WHERE id=2; <- deletar uma linha do database
      $cmd = $this->conn->query("
        DELETE from users
        WHERE use_idPk = ".$this->help->getUserPerName($userName)['id']."
        LIMIT 1
      ") or die ($this->conn->error);

      return array(
        'text' => $userName.' removido ',
        'previousPage' => 'menu',
        'buttonText' => 'Menu',
        'pos' => '../../'
      );
    }

  }
