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
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">MAIN</a></li>
      
      <li><a href="<?php echo url_for('/register_patient.php'); ?>">REGISTER PATIENT</a></li>

       <?php
       if (isset($_SESSION['userLevel'])) {
           if($_SESSION['userLevel'] > 2)
           echo '<li><a href=users.php>STAFF</a></li>';
       }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])) {
            if($_SESSION['userLevel'] > 0)
                echo '<li><a href=patients.php>PATIENTS</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel'])) {
            if($_SESSION['userLevel'] > 0)
                echo '<li><a href=referral_list.php>REFERRALS</a></li>';
        }
        ?>

        <?php
        if (!isset($_SESSION['userLevel'])) {
                echo '<li><a href=user_login.php>STAFF LOGIN</a></li>';
        }
        ?>

        <?php
        if (!isset($_SESSION['userLevel'])) {
            echo '<li><a href=external_access.php>REFEREE LOGIN</a></li>';
        }
        ?>

        <?php
        if (isset($_SESSION['userLevel']) || isset($_SESSION['nhs_no'])) {
                echo '<li><a href=user_logout.php>LOGOUT</a></li>';
        }
        ?>


    </ul>
  </navigation>

  <div>
