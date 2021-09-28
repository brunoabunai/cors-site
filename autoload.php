<?php

  spl_autoload_register(function($filename){ // Vai ativar quando tiver a palavra chave "NEW"
    if (file_exists('Controllers/'.$filename.'.php')) {
      require_once('Controllers/'.$filename.'.php');

    } elseif (file_exists('Core/'.$filename.'.php')) {
      require_once('Core/'.$filename.'.php');
      
    } elseif (file_exists('Models/'.$filename.'.php')) {
      require_once('Models/'.$filename.'.php');
      
    }
  });
?>
