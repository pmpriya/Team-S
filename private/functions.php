<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function u($string="") {
  return urlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}
function send_email($email,$username,$password){

  $to      = $email; 
  $subject = 'Signup verification'; 
  $message = '
   
  Thanks for signing up!
  Your account has been created, you can now login with your username and password with the credentials below:
   
  ------------------------
  Username: '.$username.'
  Password: '.$password.'
  ------------------------
   
  Please log in to your account:
  http://kingschesslondon.herokuapp.com/login.php
   
  '; 
                       
  $headers = 'From:noreply@chesssoc.com' . "\r\n"; 
  mail($to, $subject, $message, $headers); 

}


?>
