<?php ?>
<?php require_once ('../../private/initialise.php'); ?>
<img src="../images/nhs.png" alt="Logo" id="logo">
<?php include(SHARED_PATH . '/header.php'); ?>
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
            <a href=referral/new.php?id=<?php echo $patient_ID ?>>Create Referral</a><br>
        <?php }?>
        <br>
    <table class= "ReferralsTable">

        <th> Date </th>
        <th> Consultant name</th> 
        <th> Consultant Specialty</th>
        <th> Organisation Hospital Name</th>

        <th> View </th>
 
     
       
       
 
        <?php while ($allReferrals = mysqli_fetch_assoc($referrals_of_id)){ ?>
            <tr>
                <td><?php echo h($allReferrals['date']); ?></td>
                <td><?php echo h($allReferrals['consultant_name']); ?></td>
                <td><?php echo h($allReferrals['consultant_specialty']); ?></td>
                <td><?php echo h($allReferrals['organisation_hospital_name']); ?></td>
                <td><a href=details.php?id=<?php echo h($allReferrals['ID']); ?>>Details</a></td>
            
            </tr> 
        <?php } ?>
    </table>


    </center>



    </div>
</div>
