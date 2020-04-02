<?php require_once "Mail.php"; ?>

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
// function send_email($email,$username,$password){

//   $to      = $email; 
//   $subject = 'Signup verification'; 
//   $message = '
   
//   Thanks for signing up!
//   Your account has been created, you can now login with your username and password with the credentials below:
   
//   ------------------------
//   Username: '.$username.'
//   Password: '.$password.'
//   ------------------------
   
//   Please log in to your account:
//   http://kingshospitallondon.herokuapp.com/login.php
   
//   '; 
                       
//   $headers = 'From:noreply@chesssoc.com' . "\r\n"; 
//   mail($to, $subject, $message, $headers); 

// }

function send_email($email,$subject,$messgae){

  echo ('reached send mail');
  $from = 'ticketmachineproject@gmail.com';
  $to      = $email; 
  echo($email);
  echo ($subject);                 
  // $headers = 'From:noreply@chesssoc.com' . "\r\n"; 
  $headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject);
   echo($headers);
    $smtp = @Mail::factory('smtp', array(
                  'host' => 'smtp.gmail.com',
                  'port' => '587',
                  'auth' => true,
                  'STMPSecure' => "tls",
                  'username' => 'ticketmachineproject@gmail.com',
                  'password' => 'KCLproject'
              ));
              if (PEAR::isError($smtp)) {
                echo $smtp->getMessage() . "\n" . $smtp->getUserInfo() . "\n";
            }
  echo ('stmp set up ! ');
  echo($from);
  echo($to);
     $mail = $smtp->send($to, $headers, $message);
    echo($mail);  
              if (@PEAR::isError($mail)) {
                  echo('<p>' . $mail->getMessage() . '</p>');
                   return false;
              } else {
                  echo('<p>Message successfully sent!</p>');
                  echo ('successful');
                  return true;
              }
            
  // mail($to, $subject, $message, $headers); 

}
// function send_mail ($from,$to,$subject,$body) {
//   $from = '<fromaddress@gmail.com>';
//   $to = '<toaddress@yahoo.com>';
//   $subject = 'Hi!';
//   $body = "Hi,\n\nHow are you?";
  
//   $headers = array(
//       'From' => $from,
//       'To' => $to,
//       'Subject' => $subject
//   );
  
//   $smtp = Mail::factory('smtp', array(
//           'host' => 'ssl://smtp.gmail.com',
//           'port' => '465',
//           'auth' => true,
//           'username' => 'johndoe@gmail.com',
//           'password' => 'passwordxxx'
//       ));




?>
