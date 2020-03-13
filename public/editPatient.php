<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_set = find_patient_by_id($_GET['id']);
}
elseif(isset($_SESSION['nhsno'])){
    $user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);

}else{
    header('Location: index.php');
}


if(mysqli_num_rows($user_set)>=1){
    while($row = mysqli_fetch_array($user_set)) {
        $nhs_number = $row['nhs_number'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $sex = $row['sex'];
        $home_address = $row['home_address'];
        $postcode = $row['postcode'];
        $home_phone = $row['home_phone'];
        $mobile_phone = $row['mobile_phone'];
        $gp_address = $row['gp_address'];
        $gp_phone = $row['gp_phone'];




    }}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_nhs_number = $_POST['nhs_number'] ?? '';
    $new_first_name = $_POST['first_name'] ?? '';
    $new_last_name = $_POST['last_name'] ?? '';
    $new_date_of_birth = $_POST['date_of_birth'] ?? '';
    $new_sex = $_POST['sex'] ?? '';
    $new_home_address = $_POST['home_address'] ?? '';
    $new_postcode = $_POST['postcode'] ?? '';
    $new_home_phone = $_POST['home_phone'] ?? '';
    $new_mobile_phone = $_POST['mobile_phone'] ?? '';
    $new_gp_address = $_POST['gp_address'] ?? '';
    $new_gp_phone = $_POST['gp_phone'] ?? '';
    edit_patient($id, $new_nhs_number, $new_first_name, $new_last_name, $new_date_of_birth,$new_sex,$new_home_address,$new_postcode,$new_home_phone,$new_mobile_phone,$new_gp_address,$new_gp_phone);
    header('Location: patients.php');
    exit;
}
?>
    <style>textarea {
            width: 200px;
        }</style>

    <center>
        <h1>Edit patient</h1>


        <form method="post">
            <div class="form-group" align="center">
                <table>
                    <tr><td>NHS Number:</td><td> <textarea  name="nhs_number" rows="1" cols="10"><?php echo $nhs_number; ?></textarea></td></tr>
                    <tr><td>First Name:</td><td> <textarea  name="first_name" rows="1" cols="10"><?php echo $first_name; ?></textarea></td></tr>
                    <tr><td>Last Name:</td><td> <textarea  name="last_name" rows="1" cols="10"><?php echo $last_name; ?></textarea></td></tr>
                    <tr><td>DOB:</td><td> <textarea  name="date_of_birth" rows="1" cols="10"><?php echo $date_of_birth; ?></textarea></td></tr>
                    <tr><td>Sex:</td><td> <textarea  name="sex" rows="1" cols="10"><?php echo $sex; ?></textarea></td></tr>
                    <tr><td>Home address:</td><td> <textarea  name="home_address" rows="1" cols="10"><?php echo $home_address; ?></textarea></td></tr>
                    <tr><td>Postcode:</td><td> <textarea  name="postcode" rows="1" cols="10"><?php echo $postcode; ?></textarea></td></tr>
                    <tr><td>Home Phone:</td><td> <textarea  name="home_phone" rows="1" cols="10"><?php echo $home_phone; ?></textarea></td></tr>
                    <tr><td>Mobile Phone:</td><td> <textarea  name="mobile_phone" rows="1" cols="10"><?php echo $mobile_phone; ?></textarea></td></tr>
                    <tr><td>HP Address:</td><td> <textarea  name="gp_address" rows="1" cols="10"><?php echo $gp_address; ?></textarea></td></tr>
                    <tr><td>GP Phone:</td><td> <textarea  name="gp_phone" rows="1" cols="10"><?php echo $gp_phone; ?></textarea></td></tr>
                </table>

                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
        </form>
        <br><br>

    </center>
<?php include(SHARED_PATH . '/footer.php'); ?>