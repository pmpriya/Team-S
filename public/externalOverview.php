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
        <h1>Current status</h1>
        You're currently viewing status of the referral for <?php echo $first_name ?> <?php echo $last_name ?>.<br>
        <td><b><a href=editPatient.php>Update Patient's details</a></b></td><br><br>
        <?php


        if(mysqli_num_rows(access_referral($patient_id))){
            echo 'You currently have a pending referral, use the link below to complete.<br>';
            echo '<b><a href=newReferral.php>Complete Referral</a></b>';
        }
        elseif(mysqli_num_rows(access_investigation($patient_id))){
            echo 'You currently have an investigation in progress, use the link below to update the results.<br>';
            echo "<b><a href=InvestigationsShow.php?id=" . $patient_id . '>Update investigations</a></td></b>';
        }else{
            echo 'You currently have no cases in progress, use the link below to submit results for a review<br>';
            echo '<b><a href=newInvestigation.php>Start new investigation</a></b>';
        }




        ?>


        <br><br>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>