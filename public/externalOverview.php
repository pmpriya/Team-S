<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

?>

<?php
if(isset($_SESSION['nhsno'])){
    $user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);
    $confirmed_set = find_patient_confirmed_appointments($_SESSION['current_patient_id']);
    $unconfirmed_set = find_patient_unconfirmed_appointments($_SESSION['current_patient_id']);

}else{
    header('Location: index.php');
}
$var = $_GET["confirm"] ?? '';
if (isset($_GET["confirm"])) {
    confirm_appointment($var);
    header('Location: externalOverview.php');
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
        You're currently viewing case status for <b><?php echo $first_name ?> <?php echo $last_name ?></b>.<br><br>
        <td><i><a href=editPatient.php>Update personal details</a></i></td><br><br><br>
        <?php


        if(mysqli_num_rows(access_actve_referral($patient_id))){
            echo 'You currently have an active case with us.<br>';
            echo 'Please use the link below to update your results or edit your referral<br><br>';
            echo "<i><a href=InvestigationsShow.php>Update investigations</a></td></i><br><br><br>";
            echo "<i><a href=referral_show.php>Update my referral</a></td></i><br><br><br>";




            if(mysqli_num_rows($confirmed_set)){
                echo "You currently have the following appointment confirmed:<br>";
                while ($appointment = mysqli_fetch_assoc($confirmed_set)) {
                    echo "Appointment on " . $appointment["date"] . " in the " . $appointment["option_admission"] . " at " . $appointment["time"] . ".<br><br>";
                };

            };

            if(mysqli_num_rows($unconfirmed_set)){
                echo "<b><span style=\"color: red; \"> The following appointments require your confirmation:</span></b><br>";
                while ($appointment = mysqli_fetch_assoc($unconfirmed_set)) {
                    echo "Appointment on " . $appointment["date"] . " in the " . $appointment["option_admission"] . " at " . $appointment["time"] . ".
               <a href=?confirm=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to confirm this Appointment?');\">Confirm</a><br>";
                };


            }
        } else{
            echo 'You currently have no cases in progress, use the link below to start a new referral<br><br>';
            echo '<b><a href=referral_page.php>Start new referral</a></b>';
        }




        ?>


        <br><br>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>