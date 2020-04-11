<?php require_once ('../private/initialise.php');?>
<?php include('../private/shared/header.php'); ?>

<?php $page_title = 'Add Investigation'; ?>

<div class="public">

<?php $patient_ID = $_GET['patient_ID']?? '3'; ?>

<?php $row = mysqli_fetch_array(find_active_referral($patient_ID)); 
$referral_id = $row["ID"]; ?>

<?php include(SHARED_PATH . '/validation.php'); ?>

    <?php
    if (isset($_SESSION['userLevel'])) {
if ($_SESSION['userLevel'] > 1) {
     if(isset($_GET['id'])){
 $patient_ID = $_GET['id'];
     }}}
     elseif(isset($_SESSION['nhsno'])){
         $patient_ID = $_SESSION['current_patient_id'];
     }else{
    header('Location: index.php');
}
    ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

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

        $APTR = $_POST['APTR'] ?? '';
        $Fibrinogen = $_POST['Fibrinogen'] ?? '';
        $Cortisol = $_POST['Cortisol'] ?? '';
        $Urea = $_POST['Urea'] ?? '';
        $Creatinine = $_POST['Creatinine'] ?? '';
        $Notes = $_POST['Notes'] ?? '';

        $result = insert_investigation($patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine, $Notes,$referral_id);
        header('Location: InvestigationsShow.php?id=' . $patient_ID);
    }
    

?> 



<div id= "content";>
<a class = "back-Link" href="<?php echo url_for('InvestigationsShow.php?id=' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
</div>
<div class = "new investigation">
<center>
<h1> Create Investigation </h1> 

<?php //echo display_error($errors);?> 
<form id="form" method="post">
<span id="alert_message" style="color:red"></span>
<d1>
     <dl>
        <dt> Date<input type="date" onfocusout="isEmpty(this,'Date')" id="date" name= "date"> </dt>
    </dl>
    <d1>
    
   <d1>
    <dl>
        <dt> Bili T/D  <input type="text" onfocusout="isOnlyNumber(this,'Bili T/D')" id="BiliTD" name= "BiliTD" placeholder="required" required> </dt>
    </dl>
    <d1> 

    <d1>
    <dl>
        <dt> AST <input type="text" id="AST" name= "AST" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALT <input type="text" onfocusout="isOnlyNumber(this,'ALT')" id="ALT" name= "ALT" placeholder="required" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALP <input type="text" id="ALP" name= "ALP" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> GGT <input type="text" id="GGT" name= "GGT" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Prot <input type="text" id="Prot" name= "Prot" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Alb <input type="text" id="Alb" name= "Alb" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CK <input type="text" id="CK" name= "CK" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Hb/Hct <input type="tinytext" onfocusout="isOnlyNumber(this,'HbHct')" id="HbHct" name="HbHct" placeholder="required" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> WCC <input type="tinytext" onfocusout="isOnlyNumber(this,'WCC')" id="WCC" name="WCC" placeholder="required" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Neutro <input type="tinytext" id="Neutro" name="Neutro" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Platelets <input type="text" onfocusout="isOnlyNumber(this,'Platelets')" id="Platelets" name= "Platelets" placeholder="required" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CRP <input type="text" id="CRP" name= "CRP" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ESR <input type="text" id="ESR" name= "ESR" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> PT/INR <input type="text" onfocusout="isOnlyNumber(this,'PTINR')" id="PTINR" name= "PTINR" placeholder="required" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> APTR <input type="text" id="APTR" name= "APTR" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Fibrinogen <input type="text" id="Fibrinogen" name= "Fibrinogen" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Cortisol <input type="text" id="Cortisol" name= "Cortisol" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Urea <input type="text" id="Urea" name= "Urea" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Creatinine <input type="text" id="Creatinine" name= "Creatinine" placeholder="optional"> </dt>
    </dl>
    <d1>

        <d1>
            <dl>
                <dt> Additional notes <input type="text" id="Notes" name= "Notes" placeholder="optional"> </dt>
            </dl>
            <d1>


            <div id="operations">
    <input type="button" onclick="submitInvestigation()" name="btnsubmit" value="Add Investigation"/>
    </div>
    
   
</form>


</div>
</div>
</center>
<?php include(SHARED_PATH . '/footer.php'); ?>
<script type="text/javascript">
    var append = false;
</script>
<script type="text/javascript">
    function isEmpty(r,e){
       if(r.value.trim()==""){
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can't be empty.</br>";
            else
                document.getElementById("alert_message").innerHTML =e+" can't be empty";
            return true;
       }
       if(append) 
            document.getElementById("alert_message").innerHTML += "";
        else
            document.getElementById("alert_message").innerHTML = "";
       return false;
    }
</script>
<script type="text/javascript">
    function isOnlyNumber(r,e){
        if(!isEmpty(r,e)){
            if (/[-]?[0-9]+[,.]?[0-9]*([\/][0-9]+[,.]?[0-9]*)*/.test(r.value.trim()))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can only contain Numbers<br/>";
            else
                document.getElementById("alert_message").innerHTML = e+" can only contain Numbers";
            return (false)    
        }
        return false;
    }
</script> 

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