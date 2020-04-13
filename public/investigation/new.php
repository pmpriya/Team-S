<?php require_once ('../../private/initialise.php');?>
<?php include(SHARED_PATH . '/header.php'); ?>

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
    header('Location: ../index.php');
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
        $Notes = $_POST['Notes'] ?? '';

        $result = insert_investigation($patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine, $Notes,$referral_id);
        header('Location: show.php?id=' . $patient_ID);
    }
    

?>



    <div id= "content";>
        <a class = "back-Link" href="<?php echo url_for('investigation/show.php?id=' . $patient_ID); ?>"> &laquo; Back to Display of Investigations </a>
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
        <dt> Bili T/D  <input type="text" id="BiliTD" name= "BiliTD" placeholder="optional" required> </dt>
    </dl>
    <d1> 

    <d1>
    <dl>
        <dt> AST <input type="text" id="AST" name= "AST" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> ALT <input type="text" id="ALT" name= "ALT" placeholder="optional" required> </dt>
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
        <dt> Hb/Hct <input type="tinytext" id="HbHct" name="HbHct" placeholder="optional" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> WCC <input type="tinytext" id="WCC" name="WCC" placeholder="optional" required> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Neutro <input type="tinytext" id="Neutro" name="Neutro" placeholder="optional"> </dt>
    </dl>
    <d1>

    <d1>
    <dl>
        <dt> Platelets <input type="text" id="Platelets" name= "Platelets" placeholder="optional" required> </dt>
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
        <dt> PT/INR <input type="text" id="PTINR" name= "PTINR" placeholder="optional" required> </dt>
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
        
<script>
    <script type="text/javascript" src="../../private/validation_functions.js"></script>
</script>
        
<script type="text/javascript">
    function submitInvestigation(){
        append = true;
        document.getElementById("alert_message").innerHTML = "";

        var date = document.getElementById("date");

        var isOkay = true;
        if(isEmpty(date,"Date")){
            console.log(1);
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
