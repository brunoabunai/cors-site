a<?php
require_once ('connection.php');

  Class selectUser {
    
    private $conn;
    public $data;
    // public $informations;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->data = array();
      // $this->informations = array();
    }

    /**
     * ------------------------------------------------------------
     * Get all users regitereds
     * ------------------------------------------------------------
     */
    public function getUsers() {
      // $data = array();
      $cmd = $this->conn->query(' SELECT use_idPk, use_name, use_avatar 
                                  FROM users ');

      // foreach ($cmd->fetch_assoc() as $row) {
      //   $data[] = $row;
      // }
      while($row = $cmd->fetch_assoc()) {
        $this->data[] = $row;
      }
      return $this->data;
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
      <label>Total de Registros - '.$totalData.'</label>
      <table class="search-users">
        <tr class="head-users">
          <th class="id">Type</th>

          <th>Avatar</th>
          <th>Nome de usuário</th>
          <th class="id">ID</th>

          <th class="options">Opções</th>
        </tr>
      ';

      if ($totalData > 0) {
        foreach ($limitQueryPages as $row) {
          $output .= '
          <tr class="column-user">
            <td class="id">'.$this->getTypePerId($row["typ_IdFk"]).'</td>

            <td><img src="'.$row["use_avatar"].'"/></td>
            <td>'.$row["use_name"].'</td>
            <td class="id">'.$row["typ_IdFk"].'</td>

            <td class="options-user options">
              <button class="btn-delete-user">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17 22H7C5.89543 22 5 21.1046 5 20V7H3V5H7V4C7 2.89543 7.89543 2 9 2H15C16.1046 2 17 2.89543 17 4V5H21V7H19V20C19 21.1046 18.1046 22 17 22ZM7 7V20H17V7H7ZM9 4V5H15V4H9Z" fill="var(--danger)"></path>
                </svg>
              </button>

              <button class="btn-edit-user">
                <a href="./edit/editUser/'.$row["use_name"].'">
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
          <td colspan="4" align="center">No Data Found</td>
        </tr>
        </table>
        ';
      }

      /** Final das configurações básicas */

      /** -------------------------------- */
      // $totalLinks = ceil($totalData / $limit);
      // $pageArray = array();
      // $previewsLink = '';
      // $nextLink = '';
      // $pageLink = '';

      // /** Iniciao da paginação */
      // if($totalLinks > 4){
      //   if($pages < 5){
      //     for($count = 1; $count <= 5; $count++){
      //       $pageArray[] = $count;
      //     }
      //     $pageArray[] = '...';
      //     $pageArray[] = $totalLinks;

      //   }else{
      //     $endLimit = $totalLinks - 5;
      //     if($pages > $endLimit){
      //       $pageArray[] = 1;
      //       $pageArray[] = '...';
      //       for($count = $endLimit; $count <= $totalLinks; $count++){
      //         $pageArray[] = $count;
      //       }

      //     }else{
      //       $pageArray[] = 1;
      //       $pageArray[] = '...';
      //       for($count = $pages - 1; $count <= $pages + 1; $count++){
      //         $pageArray[] = $count;
      //       }
      //       $pageArray[] = '...';
      //       $pageArray[] = $totalLinks;

      //     }
      //   }

      // }else{
      //   for($count = 1; $count <= $totalLinks; $count++){
      //     $pageArray[] = $count;
      //   }

      // }
      // /** Paginação final */

      // /** --------------------- */

      // /** Inicio do controle da paginação */

      // for($count = 0; $count < count($pageArray); $count++){
      //   if($pages == $pageArray[$count]){
      //     $pageLink .= '
          
      //       <a class="" href="#">'.$pageArray[$count].'</a>
          
      //     ';
    
      //     $previousId = $pageArray[$count] - 1;
      //     if($previousId > 0){
      //       $previewsLink = '<a class="" href="javascript:void(0)" data-page_number="'.$previousId.'">Previous</a>';
      //     }else{
      //       $previewsLink = '
            
      //       <a class="" href="#">Previous</a>
      //       ';
      //     }
    
      //     $nextId = $pageArray[$count] + 1;
      //     if($nextId > $totalLinks){
      //       $nextLink = '
            
      //         <a class="page-link" href="#">Next</a>
           
      //         ';
      //     }else{
      //       $nextLink = '<a class="page-link" href="javascript:void(0)" data-page_number="'.$nextId.'">Next</a>';
      //     }
      //   }else{
      //     if($pageArray[$count] == '...'){
      //       $pageLink .= '
      //       <li class="page-item disabled">
      //           <a class="page-link" href="#">...</a>
      //       </li>
      //       ';
      //     }else{
      //       $pageLink .= '
      //       <li class=""><a class="" href="javascript:void(0)" data-page_number="'.$pageArray[$count].'">'.$pageArray[$count].'</a></li>
      //       ';
      //     }
      //   }
      // }

      // $output .= $previewsLink . $pageLink . $nextLink;
      // $output .= '
      //   </>
      // </div>
      // ';

      echo $output;
    }

    /**
     * ------------------------------------------------------------
     * Select user from view
     * ------------------------------------------------------------
     */
    public function getUserPerName($name) {
      $Name = str_replace("-", " ", $name);
      // $data = array();
      $cmd = $this->conn->query(' SELECT use_name, use_avatar 
                                  FROM users
                                  WHERE use_name = "'.$name.'" ');
      $this->data = $cmd->fetch_assoc();
      
      return ($this->data);
    }

    /**
     * ------------------------------------------------------------
     * Select user from view per id
     * ------------------------------------------------------------
     */
    private function getTypePerId($id) {
      $cmd = $this->conn->query(' SELECT typ_name 
                                  FROM types
                                  WHERE typ_idPk = "'.$id.'" ');
      $ret = $cmd->fetch_assoc(); //retorno
      return ($ret['typ_name']);
    }

  }

?>
