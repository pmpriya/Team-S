<?php ?>
<?php require_once ('../private/initialise.php'); ?>
<?php include('../private/shared/header.php'); ?>
<?php 
    $patient_ID = $_GET['id'] ?? '1';
    $referrals_of_id = find_referrals_by_id($patient_ID);
    $patient_set = find_patient_by_id($patient_ID);
    $patient = mysqli_fetch_assoc($patient_set);
?> 

<?php $page_title= 'Show Referrals'; ?>

<div id="content">
<div class= "Show Referral">
    <h1>Referrals for <?php echo $patient["first_name"] . " ". $patient["last_name"]; ?> </h1>


    <center>
    <br>

        <?php  if(!mysqli_num_rows(access_actve_referral($patient_ID))){ ?>
            This patient has no ongoing referrals at the moment, please use the link below to start a new case.<br><br>
        <a href=referral_page.php?id=<?php echo $patient_ID ?>>Create Referral</a><br>
        <?php }?>
        <br>
    <table class= "ReferralsTable">

        <th> Date </th>
        <th> Consultant name</th> 
        <th> Consultant Specialty</th>
        <th> Organisation Hospital Name</th>
        <th> Status</th>
        <th> View </th>
 
     
       
       
 
        <?php while ($allReferrals = mysqli_fetch_assoc($referrals_of_id)){ ?>
            <tr>
                <td><?php echo h($allReferrals['date']); ?></td>
                <td><?php echo h($allReferrals['consultant_name']); ?></td>
                <td><?php echo h($allReferrals['consultant_specialty']); ?></td>
                <td><?php echo h($allReferrals['organisation_hospital_name']); ?></td>
                <td><?php if($allReferrals['Active']==1){echo "<b><font color=green>IN PROGRESS</b></font>";} else{echo "<b><font color=Red>RESOLVED</b></font>";} ?></td>
                <td><a href=referral_details.php?id=<?php echo h($allReferrals['ID']); ?>>Details</a></td>
            
            </tr> 
        <?php } ?>
    </table>
        <td><?php echo h($allReferrals['Active']); ?></td>

    </center>


    </div>
</div>
