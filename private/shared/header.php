<?php
  if(!isset($page_title)) { $page_title = 'Paediatric liver service KCL';}
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


        <?php
        if (isset($_SESSION['userLevel'])) {
            if(!$_SESSION['userLevel'] == 1) {
                echo '<li><a href='.WWW_ROOT.'/patient/new.php>REGISTER PATIENT</a></li>';
            }        else{
                echo '<li><a href='.WWW_ROOT.'/patient/new.php>REGISTER PATIENT</a></li>';
            }}elseif (isset($_SESSION['nhsno'])) {}

        else{
            echo '<li><a href='.WWW_ROOT.'/patient/new.php>REGISTER PATIENT</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])) {
            if($_SESSION['userLevel'] > 1)
                echo '<li><a href='.WWW_ROOT.'/activeCases.php>ACTIVE CASES</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])) {
            if($_SESSION['userLevel'] > 0)
                echo '<li><a href='.WWW_ROOT.'/patient/index.php>PATIENTS</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])||isset($_SESSION['nhsno'])) {
        }else{
            echo '<li><a href='.WWW_ROOT.'/user_login.php>STAFF LOGIN</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])||isset($_SESSION['nhsno'])) {
            }else{
            echo '<li><a href='.WWW_ROOT.'/external_access.php>REFEREE LOGIN</a></li>';
        }
        ?>
        
         <?php
        if (isset($_SESSION['userLevel'])) {
            if($_SESSION['userLevel'] > 0)
                echo '<li><a href='.WWW_ROOT.'/appointment/index.php>APPOINTMENTS</a></li>';
        }
        ?>

        <?php
       if (isset($_SESSION['userLevel'])) {
           if($_SESSION['userLevel'] > 2){
               echo '<li><a href='.WWW_ROOT.'/user/index.php>STAFF</a></li>';
       }}
        ?>


        <?php
        if (isset($_SESSION['nhsno'])) {
            echo '<li><a href='.WWW_ROOT.'/externalOverview.php>MY CASE</a></li>';
        }
        ?>


<?php
        if (isset($_SESSION['userLevel']) || isset($_SESSION['nhsno'])) {
             echo '<li><a href='.WWW_ROOT.'/user_logout.php>LOGOUT</a></li>';
        }
        ?>


    </ul>
  </navigation>

  <div>
