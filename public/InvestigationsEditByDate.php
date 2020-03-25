<?php require_once ('../../private/initialise.php'); 
include('../../private/shared/header.php'); 
// if(!isset($GET['patient_ID'])){
//     redirect_to(url_for('/InvestigationsShow.php?patient_ID= ' . $patient_ID));
// }
$patient_ID = $_GET['patient_ID'];
$date = $_GET['date']; 

if(is_post_request()){
    $date = $_POST['date'] ?? '';
    $BiliTD = $_POST['BiliTD'] ?? '';
    $AST = $_POST['AST'] ?? '';
    $ALT = $_POST['ALT'] ?? '';
    $ALP = $_POST['ALP'] ?? '';
    $GGT = $_POST['GGT'] ?? '';
    $Prot = $_POST['Prot'] ?? '';
    $Alb = $_POST['Alb'] ?? '';
    $CK = $_POST['CK'] ?? '';
    $HbHct = $_POST['HbHct'] ?? '';
    $WCC = $_POST['WCC'] ?? '';
    $Neutro = $_POST['Neutro'] ?? '';
    $Platelets = $_POST['Platelets'] ?? '';
    $CRP = $_POST['CRP'] ?? '';
    $ESR = $_POST['ESR'] ?? '';
    $PTINR = $_POST['PTINR'] ?? '';
    $APTR = $_POST['APTR'] ?? '';
    $Fibrinogen = $_POST['Fibrinogen'] ?? '';
    $Cortisol = $_POST['Cortisol'] ?? '';
    $Urea = $_POST['Urea'] ?? '';
    $Creatinine = $_POST['Creatinine'] ?? '';

    // $result = update_investigation($investigation);
    // if ($result == true ){
    //     redirect_to(url_for('/InvestigationsShow.php?patient_ID= ' . $patient_ID));
    // } else {
    //     $errors = $result;
    // }

} else {
    $investigation= find_investigations_by_id($patient_ID);
}
$investigation_set = find_investigations_by_id($patient_ID);
$investigation_count = mysqli_num_rows($investigation_set)+1;
mysqli_free_result($investigation_set);
?>

<?php $page_title='Edit Investigation'?>

<div id = "content">

    <a class = "back-Link" href="<?php echo url_for('/InvestigationsShow.php?patient_ID= ' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
    <div class = "Investigation edit">
        <h1> Edit Investigation <h1> 

        <form action="<?php echo url_for('/InvestigationsEditByDate.php?patient_ID= ' . h(u($patient_ID)).'?date= '. h(u($date))); ?>" method="post">
        
        <dl>
            <dt> Date </dt>
            <dd> <input type="text" name= "date" value = "<?php echo h($date);?> " /> </dd>
    </dl> 
    <d1>
        <dt> BiliTD </dt>
        <dd> <input type="text" name= "BiliTD" value = "<?php echo $BiliTD;?>" /> </dd>
    </dl> 
    <d1>
        <dt> AST </dt>
        <dd> <input type="text" name= "AST" value = "<?php echo $AST;?> " /> </dd>
    </dl> 
    <d1>
        <dt> ALT </dt>
        <dd> <input type="text" name= "ALT" value = "<?php echo $ALT;?>" /> </dd>
    </dl> 
    <d1>
        <dt> ALP </dt>
        <dd> <input type="text" name= "ALP" value = "<?php echo $ALP;?> " /> </dd>
    </dl> 
    <d1>
        <dt> GGT </dt>
        <dd> <input type="text" name= "GGT" value = "<?php echo $GGT;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Prot </dt>
        <dd> <input type="text" name= "Prot" value = "<?php echo $Prot;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Alb </dt>
        <dd> <input type="text" name= "Alb" value = "<?php echo $Alb;?> " /> </dd>
    </dl> 
    <d1>
        <dt> CK </dt>
        <dd> <input type="text" name= "CK" value = "<?php echo $CK;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Hb/Hct </dt>
        <dd> <input type="text" name= "HbHct" value = "<?php echo $HbHct;?> " /> </dd>
    </dl> 
    <d1>
        <dt> WCC </dt>
        <dd> <input type="text" name= "WCC" value = "<?php echo $WCC;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Neutro </dt>
        <dd> <input type="text" name= "Neutro" value = "<?php echo $Neutro;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Platelets </dt>
        <dd> <input type="text" name= "Platelets" value = "<?php echo $Platelets;?> " /> </dd>
    </dl> 
    <d1>
        <dt> CRP </dt>
        <dd> <input type="text" name= "CRP" value = "<?php echo $CRP;?> " /> </dd>
    </dl> 
    <d1>
        <dt> ESR </dt>
        <dd> <input type="text" name= "ESR" value = "<?php echo $ESR;?> " /> </dd>
    </dl> 
    <d1>
        <dt> PT/INR </dt>
        <dd> <input type="text" name= "PTINR" value = "<?php echo $PTINR;?> " /> </dd>
    </dl> 
    <d1>
        <dt> APTR </dt>
        <dd> <input type="text" name= "APTR" value = "<?php echo $APTR;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Fibrinogen </dt>
        <dd> <input type="text" name= "Fibrinogen" value = "<?php echo $Fibrinogen;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Cortisol </dt>
        <dd> <input type="text" name= "Cortisol" value = "<?php echo $Cortisol;?>" /> </dd>
    </dl> 
    <d1>
        <dt> Urea </dt>
        <dd> <input type="text" name= "Urea" value = "<?php echo $Urea;?> " /> </dd>
    </dl> 
    <d1>
        <dt> Creatinine </dt>
        <dd> <input type="text" name= "Creatinine" value = "<?php echo $Creatinine;?> " /> </dd>
    </dl> 
    <div id="operations">
        <input type="submit" value="Edit Investigation"/>
    </div>
</form>

</div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
