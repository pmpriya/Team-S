<?php require_once('../private/initialise.php'); ?>
<?php
     $referrals_set = find_all_referrals();
     $user_set = find_all_patients();
?> 
<php $page_title = 'Referrals'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- // settype($var, 'integer');
// $var = $_GET["delete"] ?? '';
// if (isset($_GET["delete"])) {
//     delete_patient($var);
//     header('Location: patients.php');
// } -->
?>
        
    <div class="public">

        <title>Referrals Form</title>

        <center>

                <h1>Referrals</h1>
                <table>
                    <tr>
                        <th><b>ID</b></th>
                        <th><b>patient_ID</b></th>
                        <th><b>consultant_name</b></th>
                        <th><b>organisation_hospital_name</b></th>
                        <th><b>organisation_hospital_no</b></th>
                        <th><b>referring_name</b></th>
                        <th><b>bleep_number</b></th>
                        <th><b>is_patient_aware</b></th>
                        <th><b>is_interpreter_needed</b></th>
                        <th><b>interpreter_language</b></th>
                        <th><b>kch_doc_name</b></th>
                        <th><b>current_issue</b></th>
                        <th><b>history_of_present_complaint</b></th>
                        <th><b>family_history</b></th>
                        <th><b>current_feeds</b></th>
                        <th><b>medications</b></th>
                        <th><b>other_investigations</b></th>
                        <th><b>datetime</b></th>

                        <th colspan="4"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($referrals = mysqli_fetch_assoc($referrals_set)) { ?>
                        echo "<tr><td >" . $referrals["ID"] . "</td>
                    <td>" . $referrals["patient_ID"] . "</td>
                    <td>" . $referrals["consultant_ID"] . "</td>
                    <td>" . $referrals["organisation_hospital_name"] . "</td>
                    <td>" . $referrals["organisation_hospital_no"] . "</td>
                    <td>" . $referrals["referring_name"] . "</td>
                    <td>" . $referrals["bleep_number"] . "</td>
                    <td>" . $referrals["is_patient_aware"] . "</td>
                    <td>" . $referrals["is_interpreter_needed"] . "</td>
                    <td>" . $referrals["interpreter_language"] . "</td>
                    <td>" . $referrals["kch_doc_name"] . "</td>
                    <td>" . $referrals["current_issue"] . "</td>
                    <td>" . $referrals["history_of_present_complaint"] . "</td>
                    <td>" . $referrals["family_history"] . "</td>
                    <td>" . $referrals["current_feeds"] . "</td>
                    <td>" . $referrals["medications"] . "</td>
                    <td>" . $referrals["other_investigations"] . "</td>
                    <td>" . $referrals["datetime"] . "</td>


                
                   <?php } ?>

                </table>
            <br><td><a href=register_patient.php>Create Referral</a></td>
 
        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
