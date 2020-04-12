<?php require_once('../../private/initialise.php'); ?>
<?php $page_title = 'Referral Form'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php include(SHARED_PATH . '/validation.php'); ?>

<?php

  $patient_ID = $_GET["id"];
  $patient = find_patient_by_id($patient_ID);
  $patient_values = mysqli_fetch_assoc($patient);

?>
<?php

if(is_post_request()){
$isValid = true;
  $consultant_name = $_POST["consultant_name"]; 
  $val = isOnlyCharacter($consultant_name);
  if($val!=1)
  {
    $message .= getMessage($val,"Consultant Name");
    $isValid = false;
  }
  
  $consultant_specialty=$_POST["consultant_specialty"];
  $val = isOnlyCharacter($consultant_specialty);
  if($val!=1)
  {
    $message .= getMessage($val,"Consultant Specialty");
    $isValid = false;
  }
  
  $organisation_hospital_name  = $_POST["organisation_hospital_name"];
  $val = isOnlyCharacter($organisation_hospital_name);
  if($val!=1)
  {
    $message .= getMessage($val,"Organiszation Hospital Name");
    $isValid = false;
  }

  $organisation_hospital_no  = intval($_POST["organisation_hospital_no"]);
  if(!isset($organisation_hospital_no) || empty($organisation_hospital_no))
  {
    $isValid = false;
    $message .= "Organiszation Hospital Name can not be empty";
  }

  $referring_name  = $_POST["referring_name"];
  $val = isOnlyCharacter($referring_name);
  if($val!=1)
  {
    $message .= getMessage($val,"Referring Person's Name");
    $isValid = false;
  }

  $bleep_number  = $_POST["bleep_number"];
  if(!isset($bleep_number) || empty($bleep_number))
  {
    $isValid = false;
    $message .= "Bleep Number can not be empty";
  }

  $is_patient_aware  = $_POST["is_patient_aware"];
  $is_interpreter_needed  = $_POST["is_interpreter_needed"];
  $interpreter_language = $_POST["interpreter_language"];
  $kch_doc_name =  $_POST["kch_doc_name"];

  $current_issue = $_POST["current_issue"];
  if(!isset($current_issue) || empty($current_issue))
  {
    $isValid = false;
    $message .= "Current Issue can not be empty";
  }

  $history_of_present_complaint = $_POST["history_of_present_complaint"];
  if(!isset($history_of_present_complaint) || empty($history_of_present_complaint))
  {
    $isValid = false;
    $message .= "History of present compliant can not be empty";
  }

  $family_history =  $_POST["family_history"];
  if(!isset($family_history) || empty($family_history))
  {
    $isValid = false;
    $message .= "Family History can not be empty";
  }

  $current_feeds =  $_POST["current_feeds"];
  if(!isset($current_feeds) || empty($current_feeds))
  {
    $isValid = false;
    $message .= "Current Feeds can not be empty";
  }

  $medications = $_POST["medications"];
  if(!isset($medications) || empty($medications))
  {
    $isValid = false;
    $message .= "Medications can not be empty";
  }

  $other_investigations = $_POST["other_investigations"];
  if(!isset($other_investigations) || empty($other_investigations))
  {
    $isValid = false;
    $message .= "Other Investigations can not be empty";
  }
  $date = strtotime($_POST["date"]);
  $date = date('Y-m-d', $date);
    
  if(!isset($date) || empty($date)){
              $isValid = false;
              $message .= "Date can not be empty";
          }
        
 

  
      if ($consultant_name=="" || $consultant_specialty=="" || $organisation_hospital_name=="" || $organisation_hospital_no=="" || $referring_name=="" || $bleep_number==""  
          || $current_issue=="" || $history_of_present_complaint=="" 
          || $family_history=="" || $current_feeds=="" || $medications=="" || $date=="")
          {
            
            echo '<label class="text-danger">Please fill in all required fields</label>';

          }
 
      else  {
                if($isValid)
                {
                    $result1 = insert_referral($patient_ID, $consultant_name, $consultant_specialty, $organisation_hospital_name, $organisation_hospital_no, $referring_name, 
                    $bleep_number, $is_patient_aware, $is_interpreter_needed, $interpreter_language, $kch_doc_name, $current_issue, 
                    $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations,$date);
                    header('Location: show.php?id=' . $patient_ID);
                }
                else 
                {
                    echo $message;
                }
            }
      }
?>
<html>
  <head>
      <meta charset="utf-8">
      <title>Referral Form</title>
      <!--<link rel="stylesheet" href="style.css">-->
  </head>
<body>
  <h1><b>REFERRAL FORM for <?php echo $patient_values["first_name"] . " ". $patient_values["last_name"];?> </b></h1>
<br>
<center>
<span id="alert_message" style="color:red"></span>
</center>
<form action="<?php echo url_for("/new.php?id=" . $patient_ID); ?>" method="post" id="form">
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
  </div>
   <!-- submit -->
   <!--<input type ="submit" name="submit"> -->
   <div class="field-column">
   <button type = "submit" onclick="validateForm()" name="submitbtn">Submit</button>

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

<script type="text/javascript" src="../../private/validation_functions.js"></script>

<script type="text/javascript">
  function validateForm(){
    document.getElementById("alert_message").innerHTML ="";
    append = true;
    var consultantName = document.getElementById("consultant_name");
    var consultantSpec = document.getElementById("consultant_specialty");
    var orgName = document.getElementById("organisation_hospital_name");
    var orgNumber = document.getElementById("organisation_hospital_no");
    var refName = document.getElementById("referring_name");
    var bleepNumber = document.getElementById("bleep_number");
    var interLang = document.getElementById("interpreter_language");    
    var kchDoctor = document.getElementById("kch_doc_name");    
    var currentIssue = document.getElementById("current_issue");
    var complaintHistory = document.getElementById("history_of_present_complaint");
    var familyHistory = document.getElementById("family_history");
    var currentFeeds = document.getElementById("current_feeds");
    var medications = document.getElementById("medications");
    var otherInvestigations = document.getElementById("other_investigations");

    var isOkay = true;
    if(!isOnlyCharacter(consultantName,"Consultant Name")){
      isOkay = false;
    }
    if(!isOnlyCharacter(consultantSpec,"Consultant Specialty")){
      isOkay = false;
    }
    if(!isOnlyCharacter(orgName,"Organisation Name")){
      isOkay = false;
    }
    if(!isOnlyNumber(orgNumber,"Organisation Number")){
      isOkay = false;
    }
    if(!isOnlyCharacter(refName,"Referring Doctor's Name")){
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

    if(isOkay){
      document.getElementById("form").submit();

      return true;
    }

    append = false;
    return false;
  }
</script>
