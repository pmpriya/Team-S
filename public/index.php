<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'KCL Paedriatic Liver Service'; ?>

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>
        <br>

        <img src="images/kcl.jpg" alt="Logo" id="logo">
        <?php echo $_SESSION['userLevel'];?>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>