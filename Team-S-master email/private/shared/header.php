<?php
  if(!isset($page_title)) { $page_title = 'Paediatric liver service KCL'; }
?>
<!doctype html>

<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/service.css'); ?>" />
  </head>

  <body>

  <navigation>
  <img src="images/nhs.png" alt="Logo" id="logo">
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">MAIN</a></li>
      
      <li><a href="<?php echo url_for('/register_patient.php'); ?>">REGISTER PATIENT</a></li> 
     
        <li><a href="<?php echo url_for('/users.php'); ?>">STAFF</a></li>
       
        <li><a href="<?php echo url_for('/patients.php'); ?>">PATIENTS</a></li>

        <li><a href="<?php echo url_for('/referral_list.php'); ?>">REFERRALS </a></li>
        <li><a href="<?php echo url_for('/external_access.php'); ?>">STATUS</a></li>
        <li><a href="<?php echo url_for('/user_login.php'); ?>">LOG IN</a></li>

        <li><a href="<?php echo url_for('/user_logout.php'); ?>">LOG OUT</a></li>


    </ul>
  </navigation>

