<?php require_once ('../private/initialise.php'); ?>
<?php
    $referrals_set = find_all_referrals();
    $patient_set = get_all_patients();
?>
<!--         
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
                    <tr>
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
                    </tr>
                
                   <?php } ?>
                </table>
        
    </div>

?>  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class= "Referrals listing">
    <h1> Referrals  </h1>
    <form method="post" class="example" id="searchbar" action="referral_list.php" style="margin:auto;max-width:700px">
                    <input type="text" name="search" id="searchinput" placeholder="Enter NHS Number to Search">
                    <button name="submitbtn" id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
   </form>
   <br>
   <br>
    <table class= "list">
        <th> Name </th>
        <th> NHS number </th>
        <th> Date of Birth </th>
        <th> Email </th>
        <th> Referring Doctor Name </th>
     -->

        <?php while ($patient = mysqli_fetch_assoc($patient_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/referral_show.php?id=' . $patient["ID"]); ?> " ><?php echo h($patient["first_name"]); echo " "; echo h($patient["last_name"]);  ?> </a></td> 
                <td> <?php echo h($patient["nhs_number"]); ?> </td>
                <td> <?php echo h($patient["date_of_birth"]); ?> </td>
                <td> <?php echo h($patient["email"]) ?> </td>
                <td> <?php echo h($patient["referring_doctor_name"]) ?> </td>
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($patient_set); ?> 

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


