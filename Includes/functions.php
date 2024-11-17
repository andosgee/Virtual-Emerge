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

  function sanitizeInput($input, $db = null)
{
    // Trim whitespace from the beginning and end of the string
    $input = trim($input);

    // Remove HTML tags to prevent XSS
    $input = strip_tags($input);

    // Convert special characters to HTML entities
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    // If a mysqli object is provided, use it to escape the string
    if ($db && $db instanceof mysqli) {
        $input = $db->real_escape_string($input);
    }

    return $input;
}
?>