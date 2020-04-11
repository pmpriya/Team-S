<?php require_once('../private/initialise.php'); ?>
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
                    header('Location: referral_show.php?id=' . $patient_ID);
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
<form action="<?php echo url_for("/referral_page.php?id=" . $patient_ID); ?>" method="post" id="form">
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
