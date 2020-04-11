<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

if ($_SESSION['userLevel'] < 1) {
    redirect_to('index.php');

}

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
        <h1 id="title-page">Patient Details</h1>


        <h4 style = "color :  rgb(116,174,219);"> NHS Number: <b></h4> <h4><?php echo $nhs_number ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">First name: <b></h4><h4><?php echo $first_name ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Last Name: <b></h4><h4><?php echo $last_name ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">DOB: <b></h4><h4><?php echo $date_of_birth ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Sex: <b></h4><h4><?php echo $sex ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">E-mail: <b></h4><h4><?php echo $email ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Address: <b></h4><h4><?php echo $home_address?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Postcode: <b></h4><h4><?php echo $postcode ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Landline: <b></h4><h4><?php echo $home_phone ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">Mobile: <b></h4><h4><?php echo $mobile_phone ?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">GP Address: <b></h4><h4><?php echo $gp_address?></b></h4>

        <h4 style = "color :  rgb(116,174,219);">GP Phone: <b></h4><h4><?php echo $gp_phone?></b></h4>
            <?php if (!$_SESSION['userLevel'] == 1) { ?>
        <h4 style = "color :  rgb(116,174,219);">Access Code: <b></h4><h4><?php echo $accessCode?></b></h4>

        <br><a href="editPatient.php?id=<?php echo $id?>">Edit Patient</a><br>
        <?php } ?>
       <a href="patients.php">Go Back</a>



    </center>

    <style>
    a {
    background-color: white;
    box-shadow: -1 1px 0 blue;
    color: rgb(42,103,204);
    padding: 0.3em 1em;
    position: relative;
    text-decoration: none;
   
} 

a:hover {
  background-color: rgb(19, 26, 102);
  cursor: pointer;
}

a:active {
  box-shadow: none;
  top: 5px;
}

</style>
<?php include(SHARED_PATH . '/footer.php'); ?>
