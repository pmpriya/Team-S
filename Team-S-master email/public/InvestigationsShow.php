<?php // show the investigations that are already if not empty (if empty have only the links) and have links for edit and add ?>
<?php require_once ('../private/initialise.php'); ?>
<?php include('../private/shared/header.php'); ?>
<?php 
    $patient_ID = $_GET['id']?? '1';
    $investigations_of_id = find_investigations_by_patientid($patient_ID);
    $patient_set = find_patient_by_id($patient_ID);
$patient = mysqli_fetch_assoc($patient_set);
?> 

<?php $page_title= 'Show Investigations'; ?>

<?php //Check if $investigations_of_id  is empty and it should have h1 header Investigations display of patient-> name ?>



<div id="content">
<div class= "Show Investigations">
    <h1> Investigations overview for <?php echo $patient["first_name"] . " " . $patient["last_name"]; ?> </h1>



    <table class= "InvestigationsTable">
        <th> Date </th>
        <th> BiliTD</th> 
        <th> AST </th>
        <th> ALT </th>
        <th> ALP </th>
        <th> GGT </th>
        <th> Prot </th>
        <th> Alb </th>
        <th> CK </th>
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
 
        <?php while ($allInvetigations= mysqli_fetch_assoc($investigations_of_id)){ ?>
            <tr>
                <td><a href=InvestigationEdit.php?id=<?php echo h($allInvetigations['id']); ?>><?php echo h($allInvetigations['date']); ?></a></td>
                <td> <?php echo h($allInvetigations['BiliTD']); ?> </td> 
                <td> <?php echo h($allInvetigations['AST']); ?> </td> 
                <td> <?php echo h($allInvetigations['ALT']); ?> </td> 
                <td> <?php echo h($allInvetigations['ALP']); ?> </td> 
                <td> <?php echo h($allInvetigations['GGT']); ?> </td> 
                <td> <?php echo h($allInvetigations['Prot']); ?> </td> 
                <td> <?php echo h($allInvetigations['Alb']); ?> </td> 
                <td> <?php echo h($allInvetigations['CK']); ?> </td> 
                <td> <?php echo h($allInvetigations['HbHct']); ?> </td> 
                <td> <?php echo h($allInvetigations['WCC']); ?> </td> 
                <td> <?php echo h($allInvetigations['Neutro']); ?> </td> 
                <td> <?php echo h($allInvetigations['Platelets']); ?> </td> 
                <td> <?php echo h($allInvetigations['CRP']); ?> </td> 
                <td> <?php echo h($allInvetigations['ESR']); ?> </td> 
                <td> <?php echo h($allInvetigations['PTINR']); ?> </td> 
                <td> <?php echo h($allInvetigations['APTR']); ?> </td> 
                <td> <?php echo h($allInvetigations['Fibrinogen']); ?> </td> 
                <td> <?php echo h($allInvetigations['Cortisol']); ?> </td> 
                <td> <?php echo h($allInvetigations['Urea']); ?> </td> 
                <td> <?php echo h($allInvetigations['Creatinine']); ?> </td> 
            </tr> 
        <?php } ?>
    </table>
<center>       <br><br><a class="action" href= "<?php echo url_for('InvestigationsNew.php?patient_ID=' . $patient_ID); ?>"> Add Investigation </a></center>



    </div>
</div>


