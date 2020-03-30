<?php ?>
<?php require_once ('../private/initialise.php'); ?>
<?php include('../private/shared/header.php'); ?>
<?php 
    $patient_ID = $_GET['id'] ?? '1';
    $referral = find_referrals_by_id($patient_ID);
?> 

<?php $page_title= 'Show Referrals'; ?>

<?php ?>

<div id="content">
<div class= "Show Referral">
    <h1> The Referral Form of patient ID : <?php $patient_ID ?> </h1>

    <a class="back-link" href="<?php echo url_for('/referral_list.php'); ?>">; Back to List</a>

   <div class = "attributes">
   <dl>
   <dt> ID </dt>
     <dd><?php echo $referral['ID']; ?>
    </dl>
    <dl> 
     <dt> Patient ID </dt>
     <dd><?php echo $referral['patient_ID']; ?>
 </dl>
 <dl> 
     <dt> Consultant Name </dt>
     <dd><?php echo $referral['consultant_name']; ?>
 </dl>
 <dl> 
     <dt> Consultant Speciality </dt>
     <dd><?php echo $referral['consultant_speciality']; ?>
 </dl>
 <dl> 
     <dt> Organisation Hospital Name </dt>
     <dd><?php echo $referral['organisation_hospital_name']; ?>
 </dl>
 <dl> 
     <dt> Organisation Hospital Number </dt>
     <dd><?php echo $referral['organisation_hospital_no']; ?>
 </dl>
 <dl> 
     <dt> Bleep Number </dt>
     <dd><?php echo $referral['bleep_number']; ?>
 </dl>
 <dl> 
     <dt> Is patient Aware ? </dt>
     <dd><?php echo $referral['is_patient_aware']; ?>
 </dl>
 <dl> 
     <dt> Is Interpreter Needed </dt>
     <dd><?php echo $referral['is_interpreter_needed']; ?>
 </dl>
 <dl> 
     <dt> Interpreter Language </dt>
     <dd><?php echo $referral['interpreter_language']; ?>
 </dl>
 <dl> 
     <dt> KCH Doc Name </dt>
     <dd><?php echo $referral['kcl_doc_name']; ?>
 </dl>
 <dl> 
     <dt> Current Issue </dt>
     <dd><?php echo $referral['current_issue']; ?>
 </dl>
 <dl> 
     <dt> History Of Present Complaint </dt>
     <dd><?php echo $referral['history_of_present_complaint']; ?>
 </dl>
 <dl> 
     <dt> Family History </dt>
     <dd><?php echo $referral['family_history']; ?>
 </dl>
 <dl> 
     <dt> Current Feeds </dt>
     <dd><?php echo $referral['current_feeds']; ?>
 </dl>
 <dl> 
     <dt> Medications </dt>
     <dd><?php echo $referral['medications']; ?>
 </dl>
 <dl> 
     <dt> Other Investigations </dt>
     <dd><?php echo $referral['other_investigations']; ?>
 </dl>
 <dl> 
     <dt> Data And Time </dt>
     <dd><?php echo $referral['datetime']; ?>
 </dl>
    
    
        <?php mysqli_free_result($referral); ?> 

    </div>
</div>
