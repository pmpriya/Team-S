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
    //$user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);

}
else{
    header('Location: index.php');
}
$delete = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_investigation($delete);
    header('Location: patients.php');
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

    edit_investigation($investigation_id, $new_date, $new_BiliTD, $new_AST, $new_ALT, $new_ALP, $new_GGT, $new_Prot, $new_Alb, $new_CK, $new_HbHct, $new_WCC, $new_Neutro, $new_Platelets, $new_CRP, $new_ESR, $new_PTINR, $new_APTR, $new_Fibrinogen, $new_Cortisol, $new_Urea, $new_Creatinine);
    header('Location: patients.php');
    exit;
}
?>
    <style>textarea {
            width: 200px;
        }</style>

    <center>
        <h1>Edit Investigation</h1>


        <form method="post">

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
        <?php echo"<a href=?delete=" . $investigation_id . " onclick=\"return confirm('Are you sure that you want to delete this investigation?');\">Delete</a></td>" ?>
        <br><br>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>