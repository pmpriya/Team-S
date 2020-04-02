<?php require_once ('../private/initialise.php'); ?>
<?php
    $investigations_set = find_all_investigations();
    $patient_set = get_all_patients();
?>
<?php $page_title = 'Investigations';  ?>
<?php include (SHARED_PATH. '/header.php'); ?> 

<div id="content">
    <div class= "Investigations listing">
    <h1> Investigations  </h1>

    <table class= "list">
        <th> Name </th>
        <th> NHS number </th>
        <th> Date of Birth </th>
        <th> Email </th>
        <th> Referring Doctor Name </th>
    

        <?php while ($patient = mysqli_fetch_assoc($patient_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/InvestigationsShow.php?id=' . $patient["ID"]); ?> " ><?php echo h($patient["first_name"]); echo " "; echo h($patient["last_name"]);  ?> </a></td> 
                <td> <?php echo h($patient["nhs_number"]); ?> </td>
                <td> <?php echo h($patient["date_of_birth"]); ?> </td>
                <td> <?php echo h($patient["email"]) ?> </td>
                <td> <?php echo h($patient["referring_doctor_name"]) ?> </td>
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($patient_set); ?> 

    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>



