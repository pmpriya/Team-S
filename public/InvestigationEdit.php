<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Edit Investigation'; ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>


<?php
if(isset($_GET['id'])){
    $investigation_id= $_GET['id'];
    $investigation_set = find_investigations_by_id($investigation_id);
   
}
elseif(isset($_SESSION['nhsno'])){
    $user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);

}
else{
    header('Location: index.php');
}
$delete = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_investigation($delete);
    header('Location: Patients.php');
}

if(mysqli_num_rows($investigation_set)>=1){
    while($row = mysqli_fetch_array($investigation_set)) {
        $date = $row['date'];
        $BiliTD = $row['BiliTD'];
        $AST = $row['AST'];
        $ALT = $row['ALT'];
        $ALP = $row['ALP'];
        $GGT = $row['GGT'];
        $Prot = $row['Prot'];
        $Alb = $row['Alb'];
        $CK = $row['CK'];
        $HbHct = $row['HbHct'];
        $WCC = $row['WCC'];
        $Neutro = $row['Neutro'];
        $Platelets = $row['Platelets'];
        $CRP = $row['CRP'];
        $ESR = $row['ESR'];
        $PTINR = $row['PTINR'];
        $APTR = $row['APTR'];
        $Fibrinogen = $row['Fibrinogen'];
        $Cortisol = $row['Cortisol'];
        $Urea = $row['Urea'];
        $Creatinine = $row['Creatinine'];
        $Notes = $row['Notes'];
      $patient_ID = $row['patient_ID'];




    }}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_date = $_POST['date'] ?? '';
    $new_BiliTD = $_POST['BiliTD'] ?? '';
    $new_AST = $_POST['AST'] ?? '';
    $new_ALT = $_POST['ALT'] ?? '';
    $new_ALP = $_POST['ALP'] ?? '';
    $new_GGT = $_POST['GGT'] ?? '';
    $new_Prot = $_POST['Prot'] ?? '';
    $new_Alb = $_POST['Alb'] ?? '';
    $new_CK = $_POST['CK'] ?? '';
    $new_HbHct = $_POST['HbHct'] ?? '';
    $new_WCC = $_POST['WCC'] ?? '';
    $new_Neutro = $_POST['Neutro'] ?? '';
    $new_Platelets = $_POST['Platelets'] ?? '';
    $new_CRP = $_POST['CRP'] ?? '';
    $new_ESR = $_POST['ESR'] ?? '';
    $new_PTINR = $_POST['PTINR'] ?? '';
    $new_APTR = $_POST['APTR'] ?? '';
    $new_Fibrinogen = $_POST['Fibrinogen'] ?? '';
    $new_Cortisol = $_POST['Cortisol'] ?? '';
    $new_Urea = $_POST['Urea'] ?? '';
    $new_Creatinine = $_POST['Creatinine'] ?? '';
    $new_Notes = $_POST['Notes'] ?? '';

    edit_investigation($investigation_id, $new_date, $new_BiliTD, $new_AST, $new_ALT, $new_ALP, $new_GGT, $new_Prot, $new_Alb, $new_CK, $new_HbHct, $new_WCC, $new_Neutro, $new_Platelets, $new_CRP, $new_ESR, $new_PTINR, $new_APTR, $new_Fibrinogen, $new_Cortisol, $new_Urea, $new_Creatinine, $new_Notes);
    redirect_to(url_for('InvestigationsShow.php?id=' . $patient_ID));
    exit;
}
?>
    

    <center>
        <h1 id="title-page" >Edit Investigation</h1>


        <form method="post">

            <dl>
                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Date </dt>
                <dd> <input type="text" style = "width: 15%" name= "date" value = "<?php echo h($date);?> " /> </dd>
            </dl> <br>
            <d1>
                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; "> BiliTD </dt>
                <dd> <input type="text" style = "width: 15%" name= "BiliTD" value = "<?php echo $BiliTD;?>" /> </dd>
                </dl> <br>
                <d1>
                    <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > AST </dt>
                    <dd> <input type="text" style = "width: 15%" name= "AST" value = "<?php echo $AST;?> " /> </dd>
                    </dl> <br>
                    <d1>
                        <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; "> ALT </dt>
                        <dd> <input type="text"  style = "width: 15%" name= "ALT" value = "<?php echo $ALT;?>" /> </dd>
                        </dl> <br>
                        <d1>
                            <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > ALP </dt>
                            <dd> <input type="text" style = "width: 15%" name= "ALP" value = "<?php echo $ALP;?> " /> </dd>
                            </dl> <br>
                            <d1>
                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > GGT </dt>
                                <dd> <input type="text" style = "width: 15%" name= "GGT" value = "<?php echo $GGT;?> " /> </dd>
                                </dl> <br>
                                <d1>
                                    <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Prot </dt>
                                    <dd> <input type="text" style = "width: 15%" name= "Prot" value = "<?php echo $Prot;?> " /> </dd>
                                    </dl> <br>
                                    <d1>
                                        <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Alb </dt>
                                        <dd> <input type="text" style = "width: 15%" name= "Alb" value = "<?php echo $Alb;?> " /> </dd>
                                        </dl> <br>
                                        <d1>
                                            <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > CK </dt>
                                            <dd> <input type="text" style = "width: 15%" name= "CK" value = "<?php echo $CK;?> " /> </dd>
                                            </dl> <br>
                                            <d1>
                                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Hb/Hct </dt>
                                                <dd> <input type="text" style = "width: 15%" name= "HbHct" value = "<?php echo $HbHct;?> " /> </dd>
                                                </dl> <br>
                                                <d1>
                                                    <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > WCC </dt>
                                                    <dd> <input type="text" style = "width: 15%" name= "WCC" value = "<?php echo $WCC;?> " /> </dd>
                                                    </dl> <br>
                                                    <d1>
                                                        <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Neutro </dt>
                                                        <dd> <input type="text" style = "width: 15%" name= "Neutro" value = "<?php echo $Neutro;?> " /> </dd>
                                                        </dl> <br>
                                                        <d1>
                                                            <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Platelets </dt>
                                                            <dd> <input type="text" style = "width: 15%" name= "Platelets" value = "<?php echo $Platelets;?> " /> </dd>
                                                            </dl> <br>
                                                            <d1>
                                                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; "> CRP </dt>
                                                                <dd> <input type="text" style = "width: 15%" name= "CRP" value = "<?php echo $CRP;?> " /> </dd>
                                                                </dl> <br>
                                                                <d1>
                                                                    <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > ESR </dt>
                                                                    <dd> <input type="text" style = "width: 15%" name= "ESR" value = "<?php echo $ESR;?> " /> </dd>
                                                                    </dl> <br>
                                                                    <d1>
                                                                        <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > PT/INR </dt>
                                                                        <dd> <input type="text" style = "width: 15%" name= "PTINR" value = "<?php echo $PTINR;?> " /> </dd>
                                                                        </dl> <br>
                                                                        <d1>
                                                                            <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; "> APTR </dt>
                                                                            <dd> <input type="text" style = "width: 15%" name= "APTR" value = "<?php echo $APTR;?> " /> </dd>
                                                                            </dl> <br>
                                                                            <d1>
                                                                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Fibrinogen </dt>
                                                                                <dd> <input type="text" style = "width: 15%" name= "Fibrinogen" value = "<?php echo $Fibrinogen;?> " /> </dd>
                                                                                </dl> <br>
                                                                                <d1>
                                                                                    <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Cortisol </dt>
                                                                                    <dd> <input type="text" style = "width: 15%" name= "Cortisol" value = "<?php echo $Cortisol;?>" /> </dd>
                                                                                    </dl> <br>
                                                                                    <d1>
                                                                                        <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Urea </dt>
                                                                                        <dd> <input type="text" style = "width: 15%" name= "Urea" value = "<?php echo $Urea;?> " /> </dd>
                                                                                        </dl> <br>
                                                                                        <d1>
                                                                                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Creatinine </dt>
                                                                                                <dd> <input type="text" style = "width: 15%" name= "Creatinine" value = "<?php echo $Creatinine;?> " /> </dd>
                                                                                                </dl> <br>
                                                                                            <d1>
                                                                                                <dt style =  "text-align:center ; font-weight:bolder; padding-left: 30px; " > Notes </dt>
                                                                                                <dd> <input type="text" style = "width: 15%" name= "Notes" value = "<?php echo $Notes;?> " /> </dd>
                                                                                                </dl> <br>
                                                                                            <div id="operations">
                                                                                                <input type="submit" id = "editsubmit"  value= "EDIT INVESTIGATION" /> 
                                                                                            </div>
        </form>
        <?php echo"<a href=?delete=" . $investigation_id . " onclick=\"return confirm('Are you sure that you want to delete this investigation?');\">Delete</a></td>" ?>
        <br><br>

    </center>

<?php include(SHARED_PATH . '/footer.php'); ?>
