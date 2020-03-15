<?php require_once ('../../private/initialise.php'); ?>
<?php
    $referrals_set = find_all_referrals();
    $patient_set = get_all_patientIds()
?>
<php $page_title = 'Referrals'; ?>
<? include (SHARED_PATH. '/staff_header.php'); ?> 

<div id="content">
    <div class= "Referral listing">
    <h1> Referrals </h1>

    <table class= "list">
        <th> ID </th>
        <th> Last Name </th> 
        <th> First Name </th>

        <?php while ($patient = mysqli_fetch_assoc($patient_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/referral_show.php?patient_ID=' . $patient['patient_ID']); ?> " ><?php echo h($patient['patient_ID']); ?> </a></td> 
                <td> <?php echo h($patient['last_name']); ?> </td> 
                <td> <?php echo h($patient['first_name']); ?> </td> 
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($patient_set); ?> 

    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
