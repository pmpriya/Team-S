<?php require_once ('../private/initialise.php');?>
<?php include('../private/shared/header.php'); ?>
<?php $page_title = 'Add Investigation'; ?>
<div class="public">
<?php $patient_ID = $_GET['patient_ID']?? '3'; ?>

<?php
    //$patient_ID = GET['patient_ID']?? '1';
    //mysqli_insert_id($db);
    if(is_post_request()){
        $date = trim($_POST['date']) ?? '';
        $BiliTD = trim($_POST['BiliTD']) ?? '';
        $AST = trim($_POST['AST']) ?? '';
        $ALT = trim($_POST['ALT']) ?? '';
        $ALP = trim($_POST['ALP']) ?? '';
        $GGT= trim($_POST['GGT']) ?? '';
        $Prot = trim($_POST['Prot']) ?? '';
        $Alb = trim($_POST['Alb']) ?? '';
        $CK = trim($_POST['CK']) ?? '';
        $HbHct = trim($_POST['HbHct'])?? '';
        $HbHct = preg_replace('/[\x00-\x1F\x7F]/u', '', $HbHct);
        $WCC = trim($_POST['WCC']) ?? '';
        $WCC = preg_replace('/[\x00-\x1F\x7F]/u', '', $WCC);
        $Neutro = trim($_POST['Neutro']) ?? '';
        $Neutro = preg_replace('/[\x00-\x1F\x7F]/u', '', $Neutro);
        $Platelets = trim($_POST['Platelets']) ?? '';
        $CRP = trim($_POST['CRP']) ?? '';
        $ESR = trim($_POST['ESR'])?? '';
        $PTINR = trim($_POST['PTINR']) ?? '';
        $APTR = trim($_POST['APTR']) ?? '';
        $Fibrinogen = trim($_POST['Fibrinogen']) ?? '';
        $Cortisol = trim($_POST['Cortisol']) ?? '';
        $Urea = trim($_POST['Urea'] )?? '';
        $Creatinine = trim($_POST['Creatinine']) ?? '';

        //sanitise the data a=to trim //remove spaces
       echo $patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine;


      //echo $patient_ID; //it says it is 0 mistake it should be 14
       $result = insert_investigation($patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine); //this is the problem
       if ($result == true ){
           // find what is the  id
           //$patient_ID = mysqli_insert_id($db);
          redirect_to(url_for('/InvestigationShow.php?patient_ID= ' . $patient_ID));
       }
    } 

    

?> 



<div id= "content";>
<a class = "back-Link" href="<?php echo url_for('/InvestigationsShow.php?patient_ID=' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
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


