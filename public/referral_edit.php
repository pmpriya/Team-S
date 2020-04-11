<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Edit Referral'; ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>


<?php
if(isset($_GET['id'])){
    $referral_id= $_GET['id'];
    $referral_set = find_referral_by_id($referral_id);
    $referral_values = mysqli_fetch_assoc($referral_set);
    $patient_ID = $referral_values["patient_ID"];
}

else{
    header('Location: index.php');
}


$delete = $_GET["delete"] ?? '';

if (isset($_GET["delete"])) {
    delete_referral($delete);
    redirect_to(url_for('patients.php'));
}

$consultant_name = $referral_values['consultant_name'];
$consultant_specialty = $referral_values['consultant_specialty'];
$organisation_hospital_name = $referral_values['organisation_hospital_name'];
$organisation_h_no = $referral_values['organisation_hospital_no'];
$referring_doctor_name = $referral_values['referring_name'];
$bleep_no = $referral_values['bleep_number'];
$parents_aware = $referral_values['is_patient_aware'];
$interpreter_needed = $referral_values['is_interpreter_needed'];
$interpreter_language = $referral_values['interpreter_language'];
$doctor_kch_name = $referral_values['kch_doc_name'];
$date_of_referral = $referral_values['date'];
$current_issue = $referral_values['current_issue'];
$history_of_present_complaint = $referral_values['history_of_present_complaint'];
$current_feeds = $referral_values['current_feeds'];
$medications = $referral_values['medications'];
$other_inv=$referral_values['other_investigations'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $new_consultant_name = $_POST['consultant_name'] ?? '';
    $new_consultant_specialty  = $_POST['consultant_specialty'] ?? '';
    $new_organisation_hospital_name = $_POST['organisation_hospital_name'] ?? '';
    $new_organisation_h_no = $_POST['organisation_hospital_no'] ?? '';
    $new_referring_doctor_name = $_POST['referring_name'] ?? '';
    $new_bleep_no = $_POST['bleep_number'] ?? '';
    $new_parents_aware = $_POST['is_patient_aware'] ?? '';
    $new_interpreter_needed = $_POST['is_interpreter_needed'] ?? '';
    $new_interpreter_language = $_POST['interpreter_language'] ?? '';
    $new_doctor_kch_name = $_POST['kch_doc_name'] ?? '';
    $new_date_of_referral= $_POST['date'] ?? '';
    $new_current_issue = $_POST['current_issue'] ?? '';
    $new_family_history = $_POST['family_history'] ?? '';
    $new_history_of_present_complaint = $_POST['history_of_present_complaint'] ?? '';
    $new_current_feeds = $_POST['current_feeds'] ?? '';
    $new_medications = $_POST['medications'] ?? '';
    $new_other_inv = $_POST['other_investigations'] ?? '';

   

    edit_referral($referral_id,$new_consultant_name,$new_consultant_specialty,$new_organisation_hospital_name,$new_organisation_h_no,$new_referring_doctor_name,
     $new_bleep_no,$new_parents_aware,$new_interpreter_needed,$new_interpreter_language,$new_doctor_kch_name,$new_current_issue,
     $new_history_of_present_complaint,$new_family_history,$new_current_feeds,$new_medications,$new_other_inv,$new_date_of_referral);
    redirect_to(url_for('referral_show.php?id=' . $patient_ID));
    exit;
}
?>
    
    <center>
        <h1>Edit Referral </h1>

     <form method="post">

         <!-- Consultant Name -->
    <div class="field-column">
    <label>Consultant Name </label>
        <input type="text" onfocusout="isOnlyCharacter(this,'Consultant Name')" name="consultant_name" id="consultant_name" placeholder="Required" required>
    </div>

    <div class="field-column">
    <label>Consultant Specialty </label>
        <input type="text" onfocusout="isOnlyCharacter(this,'Consultant Specialty')" name="consultant_specialty" id="consultant_specialty" placeholder="Required" required>
    </div>
  <!--  Organisation Hospital Name -->

  <div class="field-column">
    <label>Organisation Hospital Name</label>
        <input type="text" onfocusout="isOnlyCharacter(this,'Organisation Hospital Name')" name="organisation_hospital_name" id="organisation_hospital_name" placeholder="Required" required>
  </div>

 <div class="field-column">
    <label>Organisation Hospital Number</label>
     <input type="number" onfocusout="isOnlyNumber(this,'Organisation Hospital Number')" name="organisation_hospital_no" id="organisation_hospital_no" placeholder="Required" required>
  </div>

<br>
<!--<form class = "form" action="contactform.php" method="post">  -->

     <!-- Referring Person's Name -->
    <div class="field-column">
    <label>Referring Person's Name</label>
       <input type="text" onfocusout="isOnlyCharacter(this,'Referring Person's Name')" name="referring_name" id="referring_name"  placeholder="Required" required>
      </div>

  <!-- Bleep Number -->

  <div class="field-column">
    <label>Bleep Number</label>
     <input type="number" onfocusout="isOnlyNumber(this,'Bleep Number')" name="bleep_number" id="bleep_number" placeholder="Required" required>
  </div>

   <!-- Is the patient aware of the referral -->

   <div class="field-column">
    <label>Are parents aware of this referral?</label>
     <input id="aware" type="radio" name="is_patient_aware" value="y" checked><label id="awareOption">Yes</label>
     <input id="aware" type="radio" name="is_patient_aware" value="n" ><label id="awareOption">No</label>
  </div>
   <!-- Is interpreter needed -->

   <div class="field-column">
    <label>Will there be an interpreter needed?</label>
    <input id="interpreter" type="radio" name="is_interpreter_needed" value="y" checked><label id="interpreterOption">Yes</label>
    <input id="interpreter" type="radio" name="is_interpreter_needed" value="n" ><label id="interpreterOption">No</label>
  </div>
    <!-- Interpreter language -->         
  <div class="field-column">
    <label>Interpreter language(To be left empty if no interpreter is needed)</label>
     <input type="text" name="interpreter_language" id="interpreter_language" placeholder="Optional">
  </div>
    <!-- KCH DOC NAME -->
  <div class="field-column">
    <label>Doctor at King's College Hospital this case was discussed with(To be left empty if the case wasn't discussed with anyone at King's)</label>
     <input type="text" name="kch_doc_name" id="kch_doc_name" placeholder="Optional">
  </div>

  <div class="field-column">
      <label>Date of referral</label>
       <input type = "date"   id="date" name = "date" required>

    </div>
   <!-- Current Issue -->

   <div class="field-column">
    <label>Current Issue</label>
    <textarea onfocusout="isEmpty(this,'Current Issue')" name = "current_issue" id="current_issue" placeholder="Required" required>
    </textarea>
  </div>

   <!-- History Of Present Complaint -->

   <div class="field-column">
    <label>History Of Present Complaint</label>
    <textarea onfocusout="isEmpty(this,'Complaint History')" name="history_of_present_complaint" id="history_of_present_complaint" placeholder="Required" required>
    </textarea>
  </div>

   <!-- Family History -->

   <div class="field-column">
    <label>Family History</label>
    <textarea onfocusout="isEmpty(this,'Family History')" name="family_history" id="family_history" placeholder="Required"  required>
    </textarea>
  </div>
  
   <!-- Current Feeds -->
 
   <div class="field-column">
    <label>Current Feeds</label>
    <textarea onfocusout="isEmpty(this,'Current Feeds')" name="current_feeds" id="current_feeds" placeholder="Required" required>
    </textarea>
  </div>

   <!-- Medications -->

   <div class="field-column">
    <label>Medications</label>
    <textarea onfocusout="isEmpty(this,'Medications')" name="medications" id="medications" placeholder="Required" required>
    </textarea>
  </div>

   <!-- Other Investigations -->

   <div class="field-column">
    <label>Other Investigations</label> 
    <textarea onfocusout="isEmpty(this,'Other Investigations')" name="other_investigations" id="other_investigations" placeholder="Required" required>
    </textarea>
    <div>
      <input type="submit" value="Edit Referral"/>
   </div>
 
       
        <?php echo"<a href=?delete=" . $referral_id . " onclick=\"return confirm('Are you sure that you want to delete this referral?');\">Delete</a></td>" ?>
  </div>      
 
</form>

  </div>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>