Show
<?php // show the investigations that are already if not empty (if empty have only the links) and have links for edit and add ?>
<?php require_once ('../../private/initialise.php'); ?>
<?php 
    $patient_ID = $GET['patient_ID']?? '1';
    $investigations_of_id = find_investigations_by_id($patient_ID);
?>

<?php $page_title= 'Show Investigations'; ?>
<?php include(SHARED_PATH . ('header.php')); ?>

<?php //Check if $investigations_of_id  is empty ?>

<div id="content">
<div class= "Show Investigations">
    <h1> <?php "The Investigations Form of the patient: " .$patient_ID. " " ?> </h1>

    <div class= "actions">
    <a class="action" href= "<?php echo url_for('investigatons/new.php'); ?>"> Add Investigation </a> 
    </div>

    <div class= "actions">
    <a class="action" href= "<?php echo url_for('investigatons/edit.php'); ?>"> Edit Investigation </a> 
    </div>


    <table class= "list">
        <th> Date </th>
        <th> Bili T/D</th> 
        <th> AST </th>
        <th> ALT </th>
        <th> ALP </th>
        <th> GGT </th>
        <th> Prot </th>
        <th> Alb </th>
        <th> Hb/Hct </th>
        <th> WCC </th>
        <th> Neutro </th>
        <th> Platelets </th>
        <th> CRP </th>
        <th> ESR </th>
        <th> PT/INR </th>
        <th> APTR </th>
        <th> Fibrinogen </th>
        <th> Cortisol </th>
        <th> Urea </th>
        <th> Creatinine </th>
 
        <?php while ($investigation= mysqli_fetch_assoc($investigations_of_id)){ ?>
            <tr>
                <td> <?php echo h($investigation['date']); ?> </td> 
                <td> <?php echo h($investigation['Bili T/D'] ); ?> </td> 
                <td> <?php echo h($investigation['AST']); ?> </td> 
                <td> <?php echo h($investigation['ALT'] ); ?> </td> 
                <td> <?php echo h($investigation['ALP']); ?> </td> 
                <td> <?php echo h($investigation['GGT']); ?> </td> 
                <td> <?php echo h($investigation['Prot'] ); ?> </td> 
                <td> <?php echo h($investigation['Alb']); ?> </td> 
                <td> <?php echo h($investigation['CK']); ?> </td> 
                <td> <?php echo h($investigation['Hb/Hct']); ?> </td> 
                <td> <?php echo h($investigation['WCC']); ?> </td> 
                <td> <?php echo h($investigation['Neutro']); ?> </td> 
                <td> <?php echo h($investigation['Platelets']); ?> </td> 
                <td> <?php echo h($investigation['CRP'] ); ?> </td> 
                <td> <?php echo h($investigation['ESR']); ?> </td> 
                <td> <?php echo h($investigation['PT/INR']); ?> </td> 
                <td> <?php echo h($investigation['APTR']); ?> </td> 
                <td> <?php echo h($investigation['Fibrinogen']); ?> </td> 
                <td> <?php echo h($investigation['Cortisol']); ?> </td> 
                <td> <?php echo h($investigation['Urea']); ?> </td> 
                <td> <?php echo h( $investigation['Creatinine']); ?> </td> 
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($investigations_of_id); ?> 

    </div>
</div>


