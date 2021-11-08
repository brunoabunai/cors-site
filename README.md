# To Run this project You Need:
- node.js
- yarn || npx || npm
- jquery (we used: yarn add jquery)
- database: database/coronaN.sql
- connection.php

## exemple of connection.php

```php
<?php

  Class connection{

    private static $conn;

    private function __construct(){}

    public static function getConnection(){
      if (!isset(self::$conn)) {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = "coronan";

        try {
          self::$conn = new mysqli($server, $user, $password, $dbname);

        } catch(Exception $e) {
          echo 'Error (potato): '.$e;
        }
      }
      return self::$conn;
    }
  }

?>
```
