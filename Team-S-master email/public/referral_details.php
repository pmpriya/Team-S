<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
$page_title = 'Edit referral';

?>
<?php
$id = $_GET['id'];
$referral = find_referral_by_id($id);
$referral_values = mysqli_fetch_assoc($referral);
$patient_ID = $referral_values["patient_ID"];
$patient = find_patient_by_id($patient_ID);
$patient_values = mysqli_fetch_assoc($patient);
?>

<div id="content">
<div class= "Show Referral">
    <h1>Referral for <?php echo $patient_values["first_name"] . " " . $patient_values["last_name"];?> from <?php echo $referral_values["date"]; ?> </h1>
 <?php   

        $consultant_name = $referral_values['consultant_name'];
        $consultant_specialty = $referral_values['consultant_specialty'];
        $organisation_hospital_name = $referral_values['organisation_hospital_name'];
        $organisation_h_no = $referral_values['organisation_hospital_no'];
        $referring_doctor_name = $referral_values['referring_name'];
        $bleep_no = $referral_values['bleep_number'];
        $parents_aware = $referral_values['is_patient_aware'];
        $interpreter_language = $referral_values['interpreter_language'];
        $doctor_kch_name = $referral_values['kch_doc_name'];
        $current_issue = $referral_values['current_issue'];
        $history_of_present_complaint = $referral_values['history_of_present_complaint'];
        $current_feeds = $referral_values['current_feeds'];
        $medications = $referral_values['medications'];
        $other_inv=$referral_values['other_investigations'];
        //$urgent = $referral_values['urgent'];
  

?>

    <center>
        <h2>Referral details</h2>


        <div>
            <p><b> Consultant name :</b> <?php echo $consultant_name; ?> </p>
            <p><b> Consultant specialty :</b> <?php echo $consultant_specialty; ?> </p>
            <p><b> Name of organisation hospital :</b> <?php echo $organisation_hospital_name; ?> </p>
            <p><b> Number of organisation hospital :</b> <?php echo $organisation_h_no; ?> </p>
            <p><b> Name of referring doctor :</b> <?php echo $referring_doctor_name; ?> </p>
            <p><b> Bleep number :</b> <?php echo $bleep_no; ?> </p>
            <p><b> Are parents aware of referral? :</b> <?php echo $parents_aware; ?> </p>
            <?php if($interpreter_language != ""): ?>   <p><b> Interpreter language :</b> <?php echo $interpreter_language; ?> </p> 
            <?php endif; ?>    
            <p><b> Name of King's Hospital Doctor :</b> <?php echo $doctor_kch_name; ?> </p>
            <p><b> Current issue :</b> <?php echo $current_issue; ?> </p>
            <p><b> Present Complaint History :</b> <?php echo $history_of_present_complaint; ?> </p>
            <p><b> Current feeds :</b> <?php echo $current_feeds; ?> </p>
            <p><b> Medications :</b> <?php echo $medications; ?> </p>
            <p><b> Other investigations :</b> <?php echo $other_inv; ?> </p>

    </div>




    <br><a href="referral_edit.php?id=<?php echo $id?>">Edit Referral</a><br>
    <br><a href="referral_show.php?id=<?php echo $patient_ID?>">Go Back</a>




    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>