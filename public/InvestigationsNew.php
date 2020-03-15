<?php require_once ('../private/initialise.php');?>
<?php include('../private/shared/header.php'); ?>
<?php $page_title = 'Add Investigation'; ?>
<div class="public">
<?php $patient_ID = $_GET['patient_ID']?? '3'; ?>

<?php
    //$patient_ID = GET['patient_ID']?? '1';
    //mysqli_insert_id($db);
    if(is_post_request()) {
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
<form method="post">

    <d1>
     <dl>
        <dt> Date<input type="date" name= "date"/> </dt>
    </dl>
    <d1>
    
   <d1>
    <dl>
        <dt> Bili T/D  <input type="text" name= "BiliTD"/> </dt>
    </dl>
    <d1> 

    <d1>
    <dl>
        <dt> AST <input type="text" name= "AST"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALT <input type="text" name= "ALT"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALP <input type="text" name= "ALP"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> GGT <input type="text" name= "GGT"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Prot <input type="text" name= "Prot"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Alb <input type="text" name= "Alb"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CK <input type="text" name= "CK"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Hb/Hct <input type="tinytext" name="HbHct"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> WCC <input type="tinytext" name="WCC"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Neutro <input type="tinytext" name="Neutro"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Platelets <input type="text" name= "Platelets"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> CRP <input type="text" name= "CRP"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ESR <input type="text" name= "ESR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> PT/INR <input type="text" name= "PTINR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> APTR <input type="text" name= "APTR"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Fibrinogen <input type="text" name= "Fibrinogen"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Cortisol <input type="text" name= "Cortisol"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Urea <input type="text" name= "Urea"/> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Creatinine <input type="text" name= "Creatinine"/> </dt>
    </dl>
    <d1> 

    
    <div id="operations">
        <input type="submit" value="Add Investigation"/>
    </div>
    
   
</form>


</div>
</center>
<?php include(SHARED_PATH . '/footer.php'); ?>


