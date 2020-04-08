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

function send_mail_ref_doctor($reg_email,$first_name,$last_name,$nhs_number,$accessCode){

    
  $to  = $reg_email; 
  $subject = 'Signup verification'; 
  $message = '
   
  As a patient of yours: '.$first_name . ' '.$last_name. ' has been registered with Kings College Health Centre - Paediatric Liver Section, you have been created a KCH account automatically.
  You can now login with your username and password with the credentials below:
   
  ------------------------
  NHS number: '.$nhs_number.'
  Access Code: '.$accessCode.'
  ------------------------
   
  Please log in to your account if you want to view or edit data of your newly registered patient:
  http://project.juliusz.uk/public/external_access.php
   
  '; 
                       
  $headers = 'From:noreply@nhs.net' . "\r\n"; 
  mail($to, $subject, $message, $headers); 
}

function send_mail_registration($email,$first_name){
    $subject = 'Patient registration'; 
    $message = '

       Hello '.$first_name.',
        
       We are happy to let you know that you have been fully registered with Kings College Health Centre - Paediatric Liver Section.
       Now we have access to your investigations and personal data and you will be notified by email before every appointment with us.


       Kind Regards,

       Kings College London NHS Health Centre
       
      

       ';
    $to = $email; 
    $headers = 'From:noreply@nhs.net' . "\r\n"; 
    mail($to, $subject, $message, $headers); 
  
  }


?>

