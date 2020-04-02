<?php require_once ('../private/initialise.php');?>
<?php include('../private/shared/header.php'); ?>
<?php $page_title = 'Add Investigation'; ?>
<div class="public">
<?php $patient_ID = $_GET['patient_ID']?? '3'; ?>
<?php include(SHARED_PATH . '/validation.php'); ?>

<?php
    //$patient_ID = GET['patient_ID']?? '1';
    //mysqli_insert_id($db);
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
        $val = isOnlyNumber($AST);
            if($val!=1)
            {
                $message += getMessage($val,"AST");
                $isValid = false;
            }

        $ALT = $_POST['ALT'] ?? '';
        $val = isOnlyNumber($ALT);
            if($val!=1)
            {
                $message += getMessage($val,"ALT");
                $isValid = false;
            }

        $ALP = $_POST['ALP'] ?? '';
        $val = isOnlyNumber($ALP);
            if($val!=1)
            {
                $message += getMessage($val,"ALP");
                $isValid = false;
            }

        $GGT = $_POST['GGT'] ?? '';
        $val = isOnlyNumber($GGT);
        if($val!=1)
        {
            $message += getMessage($val,"GGT");
            $isValid = false;
        }

        $Prot = $_POST['Prot'] ?? '';
        $val = isOnlyNumber($Prot);
        if($val!=1)
            {
                $message += getMessage($val,"Prot");
                $isValid = false;
            }

        $Alb = $_POST['Alb'] ?? '';
        $val = isOnlyNumber($Alb);
            if($val!=1)
            {
                $message += getMessage($val,"Alb");
                $isValid = false;
            }

        $CK = $_POST['CK'] ?? '';
        $val = isOnlyNumber($CK);
            if($val!=1)
            {
                $message += getMessage($val,"CK");
                $isValid = false;
            }

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
        $val = isOnlyNumber($Neutro);
            if($val!=1)
            {
                $message += getMessage($val,"Neutro");
                $isValid = false;
            }

        $Platelets = $_POST['Platelets'] ?? '';
        $val = isOnlyNumber($Platelets);
            if($val!=1)
            {
                $message += getMessage($val,"Platelets");
                $isValid = false;
            }

        $CRP = $_POST['CRP'] ?? '';
        $val = isOnlyNumber($CRP);
            if($val!=1)
            {
                $message += getMessage($val,"CRP");
                $isValid = false;
            }

        $ESR = $_POST['ESR'] ?? '';
        $val = isOnlyNumber($ESR);
            if($val!=1)
            {
                $message += getMessage($val,"ESR");
                $isValid = false;
            }
        
        $PTINR = $_POST['PTINR'] ?? '';
        $val = isOnlyNumber($PTINR);
            if($val!=1)
            {
                $message += getMessage($val,"PTINR");
                $isValid = false;
            }

        $APTR = $_POST['APTR'] ?? '';
        $val = isOnlyNumber($APTR);
            if($val!=1)
            {
                $message += getMessage($val,"APTR");
                $isValid = false;
            }

        $Fibrinogen = $_POST['Fibrinogen'] ?? '';
        $val = isOnlyNumber($Fibrinogen);
            if($val!=1)
            {
                $message += getMessage($val,"Fibrinogen");
                $isValid = false;
            }

        $Cortisol = $_POST['Cortisol'] ?? '';
        $val = isOnlyNumber($Cortisol);
            if($val!=1)
            {
                $message += getMessage($val,"Cortisol");
                $isValid = false;
            }

        $Urea = $_POST['Urea'] ?? '';
        $val = isOnlyNumber($Urea);
            if($val!=1)
            {
                $message += getMessage($val,"Urea");
                $isValid = false;
            }

        $Creatinine = $_POST['Creatinine'] ?? '';
        $val = isOnlyNumber($Creatinine);
            if($val!=1)
            {
                $message += getMessage($val,"Creatinine");
                $isValid = false;
            }

        $result = insert_investigation($patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine);
        header('Location: InvestigationsShow.php?id=' . $patient_ID);
    }
    

?> 



<div id= "content";>
<a class = "back-Link" href="<?php echo url_for('InvestigationsShow.php?patient_ID=' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
</div>
<div class = "new investigation">
<center>
<h1> Create Investigation </h1> 

<?php //echo display_error($errors);?> 
<form id="form" method="post">
<span id="alert_message" style="color:red"></span>
<d1>
     <dl>
        <dt> Date<input type="date" onfocusout="isEmpty(this,'Date')" id="date" name= "date"/> </dt>
    </dl>
    <d1>
    
   <d1>
    <dl>
        <dt> Bili T/D  <input type="text" onfocusout="isOnlyNumber(this,'Bili T/D')" id="BiliTD" name= "BiliTD"/> </dt>
    </dl>
    <d1> 

    <d1>
    <dl>
        <dt> AST <input type="text" onfocusout="isOnlyNumber(this,'AST')" id="AST" name= "AST"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALT <input type="text" onfocusout="isOnlyNumber(this,'ALT')" id="ALT" name= "ALT"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALP <input type="text" onfocusout="isOnlyNumber(this,'ALP')" id="ALP" name= "ALP"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> GGT <input type="text" onfocusout="isOnlyNumber(this,'GGT')" id="GGT" name= "GGT"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Prot <input type="text" onfocusout="isOnlyNumber(this,'Prot')" id="Prot" name= "Prot"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Alb <input type="text" onfocusout="isOnlyNumber(this,'Alb')" id="Alb" name= "Alb"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CK <input type="text" onfocusout="isOnlyNumber(this,'CK')" id="CK" name= "CK"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Hb/Hct <input type="tinytext" onfocusout="isOnlyNumber(this,'HbHct')" id="HbHct" name="HbHct"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> WCC <input type="tinytext" onfocusout="isOnlyNumber(this,'WCC')" id="WCC" name="WCC"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Neutro <input type="tinytext" onfocusout="isOnlyNumber(this,'Neutro')" id="Neutro" name="Neutro"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Platelets <input type="text" onfocusout="isOnlyNumber(this,'Platelets')" id="Platelets" name= "Platelets"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CRP <input type="text" onfocusout="isOnlyNumber(this,'CRP')" id="CRP" name= "CRP"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ESR <input type="text" onfocusout="isOnlyNumber(this,'ESR')" id="ESR" name= "ESR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> PT/INR <input type="text" onfocusout="isOnlyNumber(this,'PTINR')" id="PTINR" name= "PTINR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> APTR <input type="text" onfocusout="isOnlyNumber(this,'APTR')" id="APTR" name= "APTR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Fibrinogen <input type="text" onfocusout="isOnlyNumber(this,'Fibrinogen')" id="Fibrinogen" name= "Fibrinogen"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Cortisol <input type="text" onfocusout="isOnlyNumber(this,'Cortisol')" id="Cortisol" name= "Cortisol"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Urea <input type="text" onfocusout="isOnlyNumber(this,'Urea')" id="Urea" name= "Urea"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Creatinine <input type="text" onfocusout="isOnlyNumber(this,'Creatinine')" id="Creatinine" name= "Creatinine"/> </dt>
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
            if (/^\d+$/.test(r.value.trim()))
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
        if(!isOnlyNumber(AST,"AST")){
            console.log(3);
            isOkay = false;
        }
        if(!isOnlyNumber(ALT,"ALT")){
            console.log(4);
            isOkay = false;
        }
        if(!isOnlyNumber(ALP,"ALP")){
            console.log(5);
            isOkay = false;
        }
        if(!isOnlyNumber(GGT,"GGT")){
            console.log(6);
            isOkay = false;
        }
        if(!isOnlyNumber(Prot,"Prot")){
            console.log(7);
            isOkay = false;
        }
        if(!isOnlyNumber(Alb,"Alb")){
            console.log(8);
            isOkay = false;
        }
        if(!isOnlyNumber(CK,"CK")){
            console.log(9);
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
        if(!isOnlyNumber(Neutro,"Neutro")){
            console.log(12);
            isOkay = false;
        }
        if(!isOnlyNumber(Platelets,"Platelets")){
            console.log(13);
            isOkay = false;
        }
        if(!isOnlyNumber(CRP,"CRP")){
            console.log(14);
            isOkay = false;
        }
        if(!isOnlyNumber(ESR,"ESR")){
            console.log(15);
            isOkay = false;
        }
        if(!isOnlyNumber(PTINR,"PT/INR")){
            console.log(16);
            isOkay = false;
        }
        if(!isOnlyNumber(APTR,"APTR")){
            console.log(17);
            isOkay = false;
        }
        if(!isOnlyNumber(Fibrinogen,"Fibrinogen")){
            console.log(18);
            isOkay = false;
        }
        if(!isOnlyNumber(Cortisol,"Cortisol")){
            console.log(19);
            isOkay = false;
        }
        if(!isOnlyNumber(Urea,"Urea")){
            console.log(20);
            isOkay = false;
        }
        if(!isOnlyNumber(Creatinine,"Creatinine")){
            console.log(21);
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