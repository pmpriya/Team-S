<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

?>

<?php

$id = $_GET['id'];
$user_set = find_user_by_id($_GET['id']);


$query = mysqli_query($db, "SELECT * FROM Patient WHERE id = '$id'") or die(mysqli_error());

if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query)) {
        $nhs_number = $row['nhs_number'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $sex = $row['sex'];
        $email = $row['email'];
        $home_address = $row['home_address'];
        $postcode = $row['postcode'];
        $home_phone = $row['home_phone'];
        $mobile_phone = $row['mobile_phone'];
        $gp_address = $row['gp_address'];
        $gp_phone = $row['gp_phone'];
        $accessCode = $row['accessCode'];




    }}

?>

    <center>
        <h1>Patient details</h1>


        <h4>NHS Number: <b><?php echo $nhs_number ?></b></h4>

        <h4>First name: <b><?php echo $first_name ?></b></h4>

        <h4>Last Name: <b><?php echo $last_name ?></b></h4>

        <h4>DOB: <b><?php echo $date_of_birth ?></b></h4>

        <h4>Sex: <b><?php echo $sex ?></b></h4>

        <h4>E-mail: <b><?php echo $email ?></b></h4>

        <h4>Address: <b><?php echo $home_address?></b></h4>

        <h4>Postcode: <b><?php echo $postcode ?></b></h4>

        <h4>Landline: <b><?php echo $home_phone ?></b></h4>

        <h4>Mobile: <b><?php echo $mobile_phone ?></b></h4>

        <h4>GP Address: <b><?php echo $gp_address?></b></h4>

        <h4>GP Phone: <b><?php echo $gp_phone?></b></h4>

        <h4>Access Code: <b><?php echo $accessCode?></b></h4>

        <br><a href="editPatient.php?id=<?php echo $id?>">Edit Patient</a><br>
        <br><a href="patients.php">Go Back</a>









    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>