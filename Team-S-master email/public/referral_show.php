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

    <a class="back-link" href="<?php echo url_for('/referral_list.php'); ?>">Back to List</a>
    <br>
    <br>
    <table class= "ReferralsTable">
        <th> ID </th>
        <th> Date </th>
        <th> Consultant name</th> 
        <th> Consultant Specialty</th>
        <th> Organisation Hospital Name</th>
        <th> Organisation Hospital Number </th>
        <th> Bleep Number</th>
        <th> Name of KCH Doctor </th>
 
     
       
       
 
        <?php while ($allReferrals = mysqli_fetch_assoc($referrals_of_id)){ ?>
            <tr>
                <td><a href=referral_details.php?id=<?php echo h($allReferrals['ID']); ?>><?php echo h($allReferrals['ID']); ?> </a></td>
                <td><?php echo h($allReferrals['date']); ?></td>
                <td><?php echo h($allReferrals['consultant_name']); ?></td>
                <td><?php echo h($allReferrals['consultant_specialty']); ?></td>
                <td><?php echo h($allReferrals['organisation_hospital_name']); ?></td>
                <td><?php echo h($allReferrals['organisation_hospital_no']); ?></td>
                <td><?php echo h($allReferrals['bleep_number']); ?></td>
                <td><?php echo h($allReferrals['kch_doc_name']); ?></td>
            
            </tr> 
        <?php } ?>
    </table>





    </div>
</div>
