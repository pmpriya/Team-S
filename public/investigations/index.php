<?php require_once ('../../private/initialise.php'); ?>
<?php
    $investigations_set = find_all_investigations();
    $patient_set = get_all_userIds()
?>
<php $page_title = 'Investigations'; ?>
<? include (SHARED_PATH. '/staff_header.php'); ?> 

<div id="content">
    <div class= "Investigations listing">
    <h1> Investigation </h1>

    <table class= "list">
        <th> ID </th>
        <th> Last Name </th> 
        <th> First Name </th>

        <?php while ($patient = mysqli_fetch_assoc($patient_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/investigations/show.php?patient_ID=' . $patient['patient_ID']); ?> " ><?php echo h($patient['patient_ID']); ?> </a></td> 
                <td> <?php echo h($patient['last_name']); ?> </td> 
                <td> <?php echo h($patient['first_name']); ?> </td> 
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($patient_set); ?> 

    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>



