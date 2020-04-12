<?php

  require_once('functions.php');

  function log_in_user($user) {
    session_start();
    session_regenerate_id();
    $_SESSION['id'] = $user['id'];
    $_SESSION['userLevel'] = $user['userLevel'];
    return true;
  }

  function is_logged_in() {
    return isset($_SESSION['id']);
  }

  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/user_login.php'));
    }
  }


function grant_external_access($nhsno, $accessCode) {
  session_start();
  session_regenerate_id();
$_SESSION['nhsno'] = $nhsno;
$_SESSION['accessCode'] = $accessCode;
$current_patient = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);
if(mysqli_num_rows($current_patient)>=1){
while($row = mysqli_fetch_array($current_patient)) {
  $_SESSION['current_patient_id']=$row['ID'];}}



  return true;
}


?>
