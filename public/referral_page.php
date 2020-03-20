<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
//$patient_ID = 2;
if (isset($_GET['id'])){
  $patient_ID = intval($_GET['id']);
  $user_set = find_user_by_id($patient_ID);
}
else $patient_ID = 2;
if(is_post_request()){
   
  $consultant_name = $_POST["consultantName"];
  $val = isOnlyCharacter($consultant_name);
            if($val!=1)
            {
                $message += getMessage($val,"Consuttant Name");
                $isValid = false;
            }

  $consultant_specialty = $_POST["consultantSpecialty"];
if(!isset($consultant_specialty) || empty($consultant_specialty)){
                $isValid = false;
                $message += "Consultant Specialty can not be empty";
            }
  $organisation_hospital_name = $_POST["orgName"];
  $val = isOnlyCharacter($organisation_hospital_name);
            if($val!=1)
            {
                $message += getMessage($val,"Organiszation Hospital Name");
                $isValid = false;
            }

  $organisation_hospital_no = $_POST["orgNumber"];
  if(!isset($organisation_hospital_no) || empty($organisation_hospital_no)){
                $isValid = false;
                $message += "Organiszation Hospital Name can not be empty";
            }

  $bleep_number = $_POST["bleepNumber"];
  if(!isset($bleep_number) || empty($bleep_number)){
                $isValid = false;
                $message += "Bleep Number can not be empty";
            }

  $is_patient_aware = $_POST["isAware"];
  $is_interpreter_needed = $_POST["isInterpreterNeeded"];
  $interpreter_language = $_POST["interpreterLanguage"];
  $kch_doc_name = $_POST["kchDocName"];

  $current_issue = $_POST["currentIssue"];
if(!isset($current_issue) || empty($current_issue)){
                $isValid = false;
                $message += "Current Issue can not be empty";
            }
  $history_of_present_complaint = $_POST["complaintHistory"];
if(!isset($history_of_present_complaint) || empty($history_of_present_complaint)){
                $isValid = false;
                $message += "history of patient compliant can not be empty";
            }
  $family_history = $_POST["familyHistory"];
if(!isset($family_history) || empty($family_history)){
                $isValid = false;
                $message += "Family History can not be empty";
            }
  $current_feeds = $_POST["currentFeeds"];
if(!isset($current_feeds) || empty($current_feeds)){
                $isValid = false;
                $message += "Curren Feeds can not be empty";
            }
  $medications = $_POST["medications"];
if(!isset($medications) || empty($medications)){
                $isValid = false;
                $message += "Medications can not be empty";
            }
  $other_investigations = $_POST["otherInvestigations"];
if(!isset($other_investigations) || empty($other_investigations)){
                $isValid = false;
                $message += "Other Investigations can not be empty";
            }
  $datetime = $_POST["datetime"];
if(!isset($datetime) || empty($datetime)){
                $isValid = false;
                $message += "Date Time can not be empty";
            }


//   if(count(array_filters($_POST))!=count($_POST)){
//     echo '<label class = "text-danger">Please fill in all required fields</label';
//   }
  //$result = find_member_by_nhsno($nhs_number);
  // list($usr, $domain) = explode('@', $email);

  // if (!($domain == 'kcl.ac.uk')) {
       // use gmail
     //  echo '<label class="text-danger">This is not a valid Kings College London email (@kcl.ac.uk domain)</label>';
  // } 
//   else {
       
           $result1 = insert_referral( $patient_ID ,$consultant_name, $consultant_speciality, $organisation_hospital_name, $organisation_hospital_number, 
           $bleep_number, $is_patient_aware, $is_interpreter_needed, $kch_doc_name, $current_issue, 
           $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations, $date_time);
           //$new_id = mysqli_insert_id($db);
           redirect_to(url_for('referral_page.php?id=' . $new_id));
       }
    // }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Referral Form</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
<body>
    <h1><b>REFERRAL FORM</b></h1>
    
<h3> <div>Patient Details(Please complete all fields) </div></h3>
<h3><b><div> Referral is NOT accepted without filling ALL Fields in this page </div></b></h3>
<br>
<!--<form class = "form" action="contactform.php" method="post">  -->
    <!-- patient details form -->
    <form action="<?php echo url_for("/referral_page.php"); ?>" method="post">    <!-- Consultant Name -->
      <div class="field-column">
      <label>Consultant Name</label>
         <input type="text" name="consultantName" placeholder="Required" required>
        </div>
    <!-- Consultant Specialty -->
    <div class="field-column">
      <label>Consultant Specialty</label>
       <input type="text" name="consultantSpecialty" >
    </div>
    <!-- Organisation Name -->
    <div class="field-column">
     <label>Organisation Hospital Name</label>
      <input type="text" name="orgName" required>
   </div>
     <!-- Organisation Hospital Number -->
     <div class="field-column">
      <label>Organisation Hospital Number</label>
       <input type="number" name="orgNumber" required>
    </div>
     <!-- Bleep Number -->
     <div class="field-column">
      <label>Bleep Number</label>
       <input type = "number" name = "bleepNumber" required>
    </div>

     <!-- Patient Aware -->
     <div class="field-column">
      <label>Is the patient aware of the referral?</label>
        <input type = "checkbox" name = "isAware" optional>
     </div>

     <!-- Interpreter Needed -->
     <div class="field-column">
      <label>Will there be a language interpreter needed?</label>
       <input type = "checkbox" name = "isInterpreterNeeded" optional>
    </div>
     <!-- Interpreter Language -->
     <div class="field-column">
      <label>Interpreter language(To be left empty if no interpreter is needed)</label>
      <input type = "text" name = "interpreterLanguage" optional>
    </div>
     <!-- Doctor at Kings -->
     <div class="field-column">
      <label>Doctor at King's College Hospital this case was discussed with(To be left empty if the case wasn't discussed with anyone at King's)</label>
      <input type="text" name="kchDocName">
    </div>

     <!-- Current Issue -->

     <div class="field-column">
      <label>Current Issue</label>
      <textarea name= "currentIssue"> </textarea>
    </div>
     <!-- History of Present Complaint -->
     <div class="field-column">
      <label>History of Present Complaint</label>
       <textarea name = "complaintHistory"> </textarea>
    </div>
     <!-- Family History -->
     <div class="field-column">
      <label>Family History</label>
        <textarea name = "familyHistory"> </textarea>
    </div>
    <!-- Current Feeds -->
    <div class="field-column">
     <label>Current Feeds</label>
       <textarea name = "currentFeeds"> </textarea>
   </div>
   <!-- Medications  -->
   <div class="field-column">
    <label>Medications</label>
      <textarea name = "medications"> </textarea>
  </div>
  <!-- Other Investigations -->
  <div class="field-column">
    <label>Other Investigations</label>
    <textarea name = "otherInvestigations"> </textarea>
  </div>
  <!-- Datetime -->
  <div class="field-column">
    <label>Date and Time</label>
    <input type = "datetime-local" name="datetime" required>
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

  
<script type="text/javascript">
  var append = false;
</script>
<script type="text/javascript">
  function isEmpty(r,e){
   if(r.value.trim()==""){
    if(append)
      document.getElementById("alert_message").innerHTML += e+" can't be empty.</br>";
    else
      document.getElementById("alert_message").innerHTML =e+" can't be empty";
    return true;
  }
  if(append) 
    document.getElementById("alert_message").innerHTML += "";
  else
    document.getElementById("alert_message").innerHTML = "";
  return false;
}
</script>
<script type="text/javascript">
  function isOnlyCharacter(r,e){
    if(!isEmpty(r,e)){
      if(r.value.length<2){
        if(append)
          document.getElementById("alert_message").innerHTML += e+" must have more than equal to 2 characters<br/>";
        else
          document.getElementById("alert_message").innerHTML = e+" must have more than equal to 2 characters";
        return false;
      }
      if(r.value.length>10){
        if(append)
          document.getElementById("alert_message").innerHTML += e+" must have less than equal to 10 characters<br/>";
        else
          document.getElementById("alert_message").innerHTML = e+" must have less than equal to 10 characters";
        return false;
      }
      if (/^([a-zA-Z]+\s)*[a-zA-Z]+$/.test(r.value.trim()))
      {
        if(append)
          document.getElementById("alert_message").innerHTML += "";
        else
          document.getElementById("alert_message").innerHTML = "";
        return (true)
      }
   
      if(append)
        document.getElementById("alert_message").innerHTML += e+" can only contain characters<br/>";
      else
        document.getElementById("alert_message").innerHTML = e+" can only contain characters<br/>";
      return (false)    
    }
    return false;
  }
</script>
<script type="text/javascript">
  function isOnlyNumber(r,e){
    if(!isEmpty(r,e)){
      if (/^\d+$/.test(r.value.trim()))
      {
        if(append)
          document.getElementById("alert_message").innerHTML += "";
        else
          document.getElementById("alert_message").innerHTML = "";
        return (true)
      }
      if(append)
        document.getElementById("alert_message").innerHTML += e+" can only contain Numbers<br/>";
      else
        document.getElementById("alert_message").innerHTML = e+" can only contain Numbers";
      return (false)    
    }
    return false;
  }
</script>
<script type="text/javascript">
  function validateForm(){
    document.getElementById("alert_message").innerHTML ="";
    append = true;
    var consultantName = document.getElementById("consultantName");
    var consultantSpecialty = document.getElementById("consultantSpecialty");
    var orgName = document.getElementById("orgName");
    var orgNumber = document.getElementById("orgNumber");
    var bleepNumber = document.getElementById("bleepNumber");
    var currentIssue = document.getElementById("currentIssue");
    var complaintHistory = document.getElementById("complaintHistory");
    var familyHistory = document.getElementById("familyHistory");
    var currentFeeds = document.getElementById("currentFeeds");
    var medications = document.getElementById("medications");
    var otherInvestigations = document.getElementById("otherInvestigations");
    var datetime = document.getElementById("datetime");

    var isOkay = true;
    if(!isOnlyCharacter(consultantName,"Consultant Name")){
      isOkay = false;
    }
    if(!isOnlyCharacter(consultantSpecialty,"Consultant Specialty")){
      isOkay = false;
    }
    if(!isOnlyCharacter(orgName,"Organisation Name")){
      isOkay = false;
    }
    if(!isOnlyNumber(orgNumber,"Organisation Number")){
      isOkay = false;
    }
    if(!isOnlyNumber(bleepNumber,"Bleep Number")){
      isOkay = false;
    }
    if(isEmpty(currentIssue,"Current Issue")){
      isOkay = false;
    }
    if(isEmpty(complaintHistory,"Complaint History")){
      isOkay = false;
    }
    if(isEmpty(familyHistory,"Family History")){
      isOkay = false;
    }

    if(isEmpty(currentFeeds,"Current Feeds")){
      isOkay = false;
    }

    if(isEmpty(medications,"Medications")){
      isOkay = false;
    }

    if(isEmpty(otherInvestigations,"Other Investigations")){
      isOkay = false;
    }

    if(isEmpty(datetime,"Date and Time")){
      isOkay = false;
    }
    if(isOkay){
      document.getElementById("form").submit();

      return true;
    }

    append = false;
    return false;
  }
</script>
