<?php 
session_start();
require_once('../private/initialise.php'); ?>
<?php $page_title = 'Referral Form'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if (isset($_GET['id'])){
  $patient_ID = intval($_GET['id']);
  //$user_set = find_user_by_id($patient_ID);
}
else {
$patient_ID = 15;
}
if(is_post_request()){
  $consultant_name = $_POST["consultant_name"]; 
  $organisation_hospital_name  = $_POST["organisation_hospital_name"];
  $organisation_hospital_no  = intval($_POST["organisation_hospital_no"]);
  $referring_name  = $_POST["referring_name"];
  $bleep_number  = $_POST["bleep_number"];
  $is_patient_aware  = $_POST["is_patient_aware"];
  $is_interpreter_needed  = $_POST["is_interpreter_needed"];
  $interpreter_language = $_POST["interpreter_language"];
  $kch_doc_name =  $_POST["kch_doc_name"];
  $current_issue = $_POST["current_issue"];
  $history_of_present_complaint = $_POST["history_of_present_complaint"];
  $family_history =  $_POST["family_history"];
  $current_feeds =  $_POST["current_feeds"];
  $medications = $_POST["medications"];
  $other_investigations = $_POST["other_investigations"];
  if( mysqli_num_rows( find_urgent_investigations_by_patientid($patient_ID) ) > 0 ){$urgent = "Y";}
  else{ $urgent = "N";};
  
     if ($organisation_hospital_name=="" || $organisation_hospital_no=="" || $referring_name=="" || $bleep_number==""  
          || $current_issue=="" || $history_of_present_complaint=="" 
          || $family_history=="" || $current_feeds=="" || $medications=="" ){
            echo '<label class="text-danger">Please fill in all required fields</label>';

          }
 
      else {
                    $result1 = insert_referral($patient_ID, $consultant_name, $organisation_hospital_name, $organisation_hospital_no, $referring_name, 
                    $bleep_number, $is_patient_aware, $is_interpreter_needed, $interpreter_language, $kch_doc_name, $current_issue, 
                    $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations, $urgent);
                    
       
                  redirect_to(url_for('patients.php'));
            }
             }
      

?>

<html>
  <head>
      <meta charset="utf-8">
      <title>Referral Form <?php echo $_GET['id'];?></title>
      <!--<link rel="stylesheet" href="style.css">-->
  </head>
<body>
  <h1><b>REFERRAL FORM </b></h1>
<br>

<form action="<?php echo url_for("/referral_page.php"); ?>" method="post">
 <!-- Consultant Name -->
    <div class="field-column">
     <label>Organisation Hospital Name</label>
      <input type="text" name="organisation_hospital_name" required>
   </div>
     <!-- Organisation Hospital Number -->
     <div class="field-column">
      <label>Organisation Hospital Number</label>
       <input type="number" name="organisation_hospital_no" required>
    </div>
     
    <!-- Current Feeds -->
    <div class="field-column">
    <label>Referring Person's Name</label>
       <input type="text" name="referring_name"  placeholder="Required" required>
      </div>

  <!-- Bleep Number -->

  <div class="field-column">
    <label>Bleep Number</label>
     <input type="number" name="bleep_number"  placeholder="Required" required>
  </div>

   <!-- Is the patient aware of the referral -->

   <div class="field-column">
    <label>Is the patient aware of this referral?</label>
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
     <input type="text" name="interpreter_language"  placeholder="Optional">
  </div>
    <!-- KCH DOC NAME -->
  <div class="field-column">
    <label>Doctor at King's College Hospital this case was discussed with(To be left empty if the case wasn't discussed with anyone at King's)</label>
     <input type="text" name="kch_doc_name" placeholder="Optional">
  </div>
      
   <!-- Current Issue -->

   <div class="field-column">
    <label>Current Issue</label>
    <input type = "textarea" name = "current_issue" placeholder="Required" required>
  </div>

   <!-- History Of Present Complaint -->

   <div class="field-column">
    <label>History Of Present Complaint</label>
    <input type="textarea" name="history_of_present_complaint" placeholder="Required" required>
  </div>

   <!-- Family History -->

   <div class="field-column">
    <label>Family History</label>
    <input type="textarea" name="family_history" placeholder="Required"  required>
  </div>
  
   <!-- Current Feeds -->
 
   <div class="field-column">
    <label>Current Feeds </label>
    <input type="textarea" name="current_feeds"  placeholder="Required" required>
  </div>

   <!-- Medications -->

   <div class="field-column">
    <label>Medications</label>
    <input type="textarea" name="medications" placeholder="Required" required>
  </div>

   <!-- Other Investigations -->

   <div class="field-column">
    <label>Other Investigations</label> <input type="textarea" name="other_investigations" placeholder="Required" required>
  </div>
   <!-- submit -->
   <!--<input type ="submit" name="submit"> -->
   <div class="field-column">
   <button type = "submit" name="submit">Submit</button>

  </div>
   <!-- reset button -->
   <div class="field-column">
   <button type = "reset" name="reset">Reset</button>
  </div>
</form>


<?php include(SHARED_PATH . '/footer.php'); ?>
