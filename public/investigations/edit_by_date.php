
<?php require_once ('../../../private/initialize.php'); 
if(!isset($GET['patient_ID'])){
    redirect_to(url_for('/investigations/show.php?patient_ID= ' . $patient_ID));
}
$patient_ID = $_GET['patient_ID'];
$date = $_GET['date'];

if(is_post_request()){
    $investigation =[];
    $investigation['date'] = $_POST['date'] ?? '';
    $investigation['Bili T/D'] = $_POST['Bili T/D'] ?? '';
    $investigation['AST'] = $_POST['AST'] ?? '';
    $investigation['ALT'] = $_POST['ALT'] ?? '';
    $investigation['ALP'] = $_POST['ALP'] ?? '';
    $investigation['GGT'] = $_POST['GGT'] ?? '';
    $investigation['Prot'] = $_POST['Prot'] ?? '';
    $investigation['Alb'] = $_POST['Alb'] ?? '';
    $investigation['CK'] = $_POST['CK'] ?? '';
    $investigation['Hb/Hct'] = $_POST['Hb/Hct'] ?? '';
    $investigation['WCC'] = $_POST['WCC'] ?? '';
    $investigation['Neutro'] = $_POST['Neutro'] ?? '';
    $investigation['Platelets'] = $_POST['Platelets'] ?? '';
    $investigation['CRP'] = $_POST['CRP'] ?? '';
    $investigation['ESR'] = $_POST['ESR'] ?? '';
    $investigation['PT/INR'] = $_POST['PT/INR'] ?? '';
    $investigation['APTR'] = $_POST['APTR'] ?? '';
    $investigation['Fibrinogen'] = $_POST['Fibrinogen'] ?? '';
    $investigation['Cortisol'] = $_POST['Cortisol'] ?? '';
    $investigation['Urea'] = $_POST['Urea'] ?? '';
    $investigation['Creatinine'] = $_POST['Creatinine'] ?? '';

    $result = update_investigation($investigation);
    if ($result == true ){
        redirect_to(url_for('/investigations/show.php?patient_ID= ' . $patient_ID));
    } else {
        $errors = $result;
    }

} else {
    $investigation= find_investigations_by_id($patient_ID);
}
$investigation_set = find_investigations_by_id($patient_ID);
$investigation_count = mysqli_num_rows($investigation_set)+1;
mysqli_free_result($investigation_set);
?>

<?php $page_title='Edit Investigation'?>
<?php include(SHARED_PATH . ('header.php')); ?>

<div id = "content">

    <a class = "back-Link" href="<?php echo url_for('/investigations/show.php?patient_ID= ' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
    <div class = "Investigation edit">
        <h1> Edit Investigation <h1> 
        
        <?php echo display_errors($errors);?>
        <form action="<?php echo url_for('/investigations/edit_by_date.php?patient_ID= ' . h(u($patient_ID))); ?>" method="post">
        
        <dl>
            <dt> Date </dt>
            <dd> <input type="text" name= "date" value = "<?php echo h($investigation['date']);?> " /> </dd>
    </dl> 
    <d1>
        <dt> Bili T/D </dt>
        <dd> <input type="text" name= "Bili T/D" value = "<?php echo $investigation['Bili T/D'];?>" /> </dd>
    </dl> 
    <d1>
        <dt> AST </dt>
        <dd> <input type="text" name= "AST" value = "<?php echo $investigation['AST'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> ALT </dt>
        <dd> <input type="text" name= "ALT" value = "<?php echo $investigation['ALT'];?>" /> </dd>
    </dl> 
    <d1>
        <dt> ALP </dt>
        <dd> <input type="text" name= "ALP" value = "<?php echo $investigation['ALP'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> GGT </dt>
        <dd> <input type="text" name= "GGT" value = "<?php echo $investigation['GGT'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Prot </dt>
        <dd> <input type="text" name= "Prot" value = "<?php echo $investigation['Prot'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Alb </dt>
        <dd> <input type="text" name= "Alb" value = "<?php echo $investigation['Alb'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> CK </dt>
        <dd> <input type="text" name= "CK" value = "<?php echo $investigation['CK'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Hb/Hct </dt>
        <dd> <input type="text" name= "Hb/Hct" value = "<?php echo $investigation['Hb/Hct'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> WCC </dt>
        <dd> <input type="text" name= "WCC" value = "<?php echo $investigation['WCC'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Neutro </dt>
        <dd> <input type="text" name= "Neutro" value = "<?php echo $investigation['Neutro'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Platelets </dt>
        <dd> <input type="text" name= "Platelets" value = "<?php echo $investigation['Platelets'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> CRP </dt>
        <dd> <input type="text" name= "CRP" value = "<?php echo $investigation['CRP'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> ESR </dt>
        <dd> <input type="text" name= "ESR" value = "<?php echo $investigation['ESR'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> PT/INR </dt>
        <dd> <input type="text" name= "PT/INR" value = "<?php echo $investigation['PT/INR'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> APTR </dt>
        <dd> <input type="text" name= "APTR" value = "<?php echo $investigation['APTR'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Fibrinogen </dt>
        <dd> <input type="text" name= "Fibrinogen" value = "<?php echo $investigation['Fibrinogen'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Cortisol </dt>
        <dd> <input type="text" name= "Cortisol" value = "<?php echo $investigation['Cortisol'];?>" /> </dd>
    </dl> 
    <d1>
        <dt> Urea </dt>
        <dd> <input type="text" name= "Urea" value = "<?php echo $investigation['Urea'];?> " /> </dd>
    </dl> 
    <d1>
        <dt> Creatinine </dt>
        <dd> <input type="text" name= "Creatinine" value = "<?php echo $investigation['Creatinine'];?> " /> </dd>
    </dl> 
    <div id="operations">
        <input type="submit" value="Edit Investigation"/>
    </div>
</form>

</div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>



