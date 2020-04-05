<?php require_once ('../../private/initialise.php'); 
include('../../private/shared/header.php'); 
// if(!isset($GET['patient_ID'])){
//     redirect_to(url_for('/InvestigationsShow.php?patient_ID= ' . $patient_ID));
// }
$patient_ID = $_GET['patient_ID'];
$date = $_GET['date']; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['date'] ?? '';
    if(!isset($date) || empty($date)){
                $isValid = false;
                $message += "Date can not be empty";
            }

    $BiliTD = $_POST['BiliTD'] ?? '';
    $val = isOnlyNumber($BiliTD);
            if($val!=1)
            {
                $message += getMessage($val,"Bili T/D");
                $isValid = false;
            }

    $AST = $_POST['AST'] ?? '';

    $ALT = $_POST['ALT'] ?? '';
    $val = isOnlyNumber($ALT);
        if($val!=1)
        {
            $message += getMessage($val,"ALT");
            $isValid = false;
        }

    $ALP = $_POST['ALP'] ?? '';
    $GGT = $_POST['GGT'] ?? '';
    $Prot = $_POST['Prot'] ?? '';
    $Alb = $_POST['Alb'] ?? '';
    $CK = $_POST['CK'] ?? '';

    $HbHct = $_POST['HbHct'] ?? '';
    $val = isOnlyNumber($HbHct);
        if($val!=1)
        {
            $message += getMessage($val,"HbHct");
            $isValid = false;
        }

    $WCC = $_POST['WCC'] ?? '';
    $val = isOnlyNumber($WCC);
        if($val!=1)
        {
            $message += getMessage($val,"WCC");
            $isValid = false;
        }
    
    $Neutro = $_POST['Neutro'] ?? '';

    $Platelets = $_POST['Platelets'] ?? '';
    $val = isOnlyNumber($Platelets);
        if($val!=1)
        {
            $message += getMessage($val,"Platelets");
            $isValid = false;
        }

    $CRP = $_POST['CRP'] ?? '';
    $ESR = $_POST['ESR'] ?? '';
    
    $PTINR = $_POST['PTINR'] ?? '';
    $val = isOnlyNumber($PTINR);
        if($val!=1)
        {
            $message += getMessage($val,"PTINR");
            $isValid = false;
        }

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
            <dd> <input type="text" onfocusout="isEmpty(this,'Date')" name= "date" value = "<?php echo h($date);?> " placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> BiliTD </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'Bili T/D')" name= "BiliTD" value = "<?php echo $BiliTD;?>" placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> AST </dt>
        <dd> <input type="text"  name= "AST" value = "<?php echo $AST;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> ALT </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'ALT')" name= "ALT" value = "<?php echo $ALT;?>" placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> ALP </dt>
        <dd> <input type="text" name= "ALP" value = "<?php echo $ALP;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> GGT </dt>
        <dd> <input type="text" name= "GGT" value = "<?php echo $GGT;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Prot </dt>
        <dd> <input type="text" name= "Prot" value = "<?php echo $Prot;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Alb </dt>
        <dd> <input type="text" name= "Alb" value = "<?php echo $Alb;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> CK </dt>
        <dd> <input type="text" name= "CK" value = "<?php echo $CK;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Hb/Hct </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'HbHct')" name= "HbHct" value = "<?php echo $HbHct;?> " placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> WCC </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'WCC')" name= "WCC" value = "<?php echo $WCC;?> " placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> Neutro </dt>
        <dd> <input type="text" name= "Neutro" value = "<?php echo $Neutro;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Platelets </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'Platelets')" name= "Platelets" value = "<?php echo $Platelets;?> " placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> CRP </dt>
        <dd> <input type="text" name= "CRP" value = "<?php echo $CRP;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> ESR </dt>
        <dd> <input type="text" name= "ESR" value = "<?php echo $ESR;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> PT/INR </dt>
        <dd> <input type="text" onfocusout="isOnlyNumber(this,'PTINR')" name= "PTINR" value = "<?php echo $PTINR;?> " placeholder="required" required> </dd>
    </dl> 
    <d1>
        <dt> APTR </dt>
        <dd> <input type="text" name= "APTR" value = "<?php echo $APTR;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Fibrinogen </dt>
        <dd> <input type="text" name= "Fibrinogen" value = "<?php echo $Fibrinogen;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Cortisol </dt>
        <dd> <input type="text" name= "Cortisol" value = "<?php echo $Cortisol;?>" placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Urea </dt>
        <dd> <input type="text" name= "Urea" value = "<?php echo $Urea;?> " placeholder="optional"> </dd>
    </dl> 
    <d1>
        <dt> Creatinine </dt>
        <dd> <input type="text" name= "Creatinine" value = "<?php echo $Creatinine;?> " placeholder="optional"> </dd>
    </dl> 
    <div id="operations">
        <input type="submit" value="Edit Investigation"/>
    </div>
</form>

</div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
<script type="text/javascript">
    var append = false;
</script>
<script type="text/javascript" src="../private/validation_functions.js"></script>

<script type="text/javascript">
    function submitInvestigation(){
        append = true;
        document.getElementById("alert_message").innerHTML = "";

        var date = document.getElementById("date");
        var BiliTD = document.getElementById("BiliTD");
        var AST = document.getElementById("AST");
        var ALT = document.getElementById("ALT");
        var ALP = document.getElementById("ALP");
        var GGT = document.getElementById("GGT");
        var Prot = document.getElementById("Prot");
        var Alb = document.getElementById("Alb");
        var CK = document.getElementById("CK");
        var HbHct = document.getElementById("HbHct");
        var WCC = document.getElementById("WCC");
        var Neutro = document.getElementById("Neutro");
        var Platelets = document.getElementById("Platelets");
        var CRP = document.getElementById("CRP");
        var ESR = document.getElementById("ESR");
        var PTINR = document.getElementById("PTINR");
        var APTR = document.getElementById("APTR");
        var Fibrinogen = document.getElementById("Fibrinogen");
        var Cortisol = document.getElementById("Cortisol");
        var Urea = document.getElementById("Urea");
        var Creatinine = document.getElementById("Creatinine");

        var isOkay = true;
        if(isEmpty(date,"Date")){
            console.log(1);
            isOkay = false;
        }
        if(!isOnlyNumber(BiliTD,"Bili T/D")){
            console.log(2);
            isOkay = false;
        }
        if(!isOnlyNumber(ALT,"ALT")){
            console.log(4);
            isOkay = false;
        }
        if(!isOnlyNumber(HbHct,"Hb/Hct")){
            console.log(10);
            isOkay = false;
        }
        if(!isOnlyNumber(WCC,"WCC")){
            console.log(11);
            isOkay = false;
        }
        if(!isOnlyNumber(Platelets,"Platelets")){
            console.log(13);
            isOkay = false;
        }
        if(!isOnlyNumber(PTINR,"PT/INR")){
            console.log(16);
            isOkay = false;
        }

        if(isOkay){
            //alert("all good");
            document.getElementById("form").submit();
            return true;
        }

      
        append = false;
        return false;
    }
</script>