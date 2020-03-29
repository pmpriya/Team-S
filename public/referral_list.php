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
                        <th><b>Status</b></th>
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
                        <th><b>Urgent (Y/N)</b></th>

                        <th colspan="4"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($referrals = mysqli_fetch_assoc($referrals_set)) { ?>
                    
                    <td ><?php echo h($referrals["urgent"]); ?></td>
                    <td ><?php echo h($referrals["ID"]); ?> </td>
                    <td><?php echo h($referrals["patient_ID"]); ?> </td>
                    <td><?php echo h($referrals["consultant_ID"]); ?>  </td>
                    <td><?php echo h($referrals["organisation_hospital_name"]); ?>  </td>
                    <td><?php echo h($referrals["organisation_hospital_no"]); ?>  </td>
                    <td><?php echo h($referrals["referring_name"] ); ?> </td>
                    <td><?php echo h( $referrals["bleep_number"] ); ?></td>
                    <td><?php echo h($referrals["is_patient_aware"] ); ?> </td>
                    <td><?php echo h($referrals["is_interpreter_needed"] ); ?> </td>
                    <td> <?php echo h($referrals["interpreter_language"] ); ?></td>
                    <td><?php echo h($referrals["kch_doc_name"] ); ?> </td>
                    <td> <?php echo h($referrals["current_issue"] ); ?></td>
                    <td> <?php echo h($referrals["history_of_present_complaint"]); ?> </td>
                    <td> <?php echo h($referrals["family_history"] ); ?></td>
                    <td> <?php echo h($referrals["current_feeds"] ); ?></td>
                    <td> <?php echo h($referrals["medications"] ); ?></td>
                    <td> <?php echo h($referrals["other_investigations"] ); ?> </td>
                    <td><?php echo h($referrals["datetime"] ); ?></td>
                    <td><?php echo h($referrals["Urgent"] ); ?></td>

                
                   <?php } ?>

                </table>
            <br><td><a href=register_patient.php>Create Referral</a></td>
 
        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


