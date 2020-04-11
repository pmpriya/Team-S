<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

?>

<?php
if(isset($_SESSION['nhsno'])){
    $user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);

}else{
    header('Location: index.php');
}


if(mysqli_num_rows($user_set)>=1){
    while($row = mysqli_fetch_array($user_set)) {
        $patient_id = $row['ID'];
        $nhs_number = $row['nhs_number'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $sex = $row['sex'];
        $home_address = $row['home_address'];
        $postcode = $row['postcode'];
        $home_phone = $row['home_phone'];
        $mobile_phone = $row['mobile_phone'];
        $gp_address = $row['gp_address'];
        $gp_phone = $row['gp_phone'];




    }}
?>
    <style>textarea {
            width: 200px;
        }</style>

    <center>
        <h1>My case</h1>
        You're currently viewing case status for <b><?php echo $first_name ?> <?php echo $last_name ?></b>.<br>
        <td><i><a href=editPatient.php>Update personal details</a></i></td><br><br>
        <?php


        if(mysqli_num_rows(access_actve_referral($patient_id))){
            echo 'You currently have a case with us.<br>';
            echo 'Please use the link below to update your results<br>';
            echo "<b><a href=InvestigationsShow.php>Update investigations</a></td></b><br>";
        } else{
            echo 'You currently have no cases in progress, use the link below to start a new referral<br>';
            echo '<b><a href=referral_page.php>Start new referral</a></b>';
        }




        ?>


        <br><br>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>