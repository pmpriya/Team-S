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
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">MAIN</a></li>
      
      <li><a href="<?php echo url_for('/register_member.php'); ?>">REGISTER PATIENT</a></li>
      

    </ul>
  </navigation>

  <div>
