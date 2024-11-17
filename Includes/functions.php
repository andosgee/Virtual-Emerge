<?php
function redirect(){
    header('Location : /index.php');
  }

function get_active_page(){ //Get active page as 'example' instead of '/example/example.php'
    $address = $_SERVER['PHP_SELF']; // Get as /pharcourts/example.php
    $components = explode('/', $address); //Get as array
    $page_name = str_replace('.php', '', end($components));
    $page_name = str_replace('_',' ',$page_name);
    $page_name = ucfirst($page_name);
    if ($page_name == 'Index'){
      $page_name = 'Home';
    }
    return $page_name; //Return last element
  }
?>