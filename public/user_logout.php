<?php require_once('../private/initialise.php'); ?>
<div class="public">
<?php $page_title = 'Log Out'; ?>
    <img src="images/nhs.png" alt="Logo" id="logo">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['userLevel']);
session_unset(); 
redirect_to(url_for('/index.php'));
?>
