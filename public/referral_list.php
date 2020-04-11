<?php require_once ('../private/initialise.php'); ?>
<?php

     $referrals_set = find_all_referrals();
     

if ($_SESSION['userLevel'] < 1) {
    redirect_to('index.php');

}
    $patient_set = get_all_patients();
?> 
<php $page_title = 'Referrals'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- // settype($var, 'integer');
// $var = $_GET["delete"] ?? '';
// if (isset($_GET["delete"])) {
//     delete_patient($var);
//     header('Location: patients.php');
// } -->

<?php
if (isset($_POST['submitbtn'])) {
    $data = $_POST['search'];
    $patient_set = search_by_surname($data);
   
}

?> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class= "Referrals listing">
    <h1 id="title-page"> Referrals  </h1>
    <form method="post" class="example" id="searchbar" action="referral_list.php" style="margin:auto;max-width:700px">
                    <input type="text" name="search" id="searchinput" placeholder="Enter Surname to Search">
                    <button name="submitbtn" id="searchbutton" type="submit" style = " margin-left :10px; height:5%"><i class="fa fa-search"></i></button>
   </form>
   <br>
   <br>
   <center>
    <table class= "list">
        <th id = "darkblue"> Name </th>
        <th id = "lightblue"> NHS number </th>
        <th id = "darkblue"> Date of Birth </th>
        <th id = "lightblue"> Email </th>
        <th id = "darkblue"> Referring Doctor Name </th>
    

        <?php while ($patient = mysqli_fetch_assoc($patient_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/referral_show.php?id=' . $patient["ID"]); ?> " ><?php echo h($patient["first_name"]); echo " "; echo h($patient["last_name"]);  ?> </a></td> 
                <td> <?php echo h($patient["nhs_number"]); ?> </td>
                <td> <?php echo h($patient["date_of_birth"]); ?> </td>
                <td> <?php echo h($patient["email"]) ?> </td>
                <td> <?php echo h($patient["referring_doctor_name"]) ?> </td>
            </tr> 
        <?php } ?>
    </table>
    </center>
        <?php mysqli_free_result($patient_set); ?> 

    </div>


<?php include(SHARED_PATH . '/footer.php'); ?>
