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
<!-- 
<?php
if (isset($_POST['submitbtn'])) {
    $data = $_POST['search'];
    $patient_set = search_by_surname($data);
   
}


                    while ($referrals = mysqli_fetch_assoc($referrals_set)) { ?>
                    <tr>
                    <td ><?php echo h($referrals["urgent"]); ?></td>
                    <td ><?php echo h($referrals["ID"]); ?> </td>
                    <td><?php echo h($referrals["patient_ID"]); ?> </td>
                    <td><?php echo h($referrals["consultant_ID"]); ?>  </td>
                    <td><?php echo h($referrals["organisation_hospital_name"]); ?>  </td>
                    <td><?php echo h($referrals["organisation_hospital_no"]); ?>  </td>
                    <td><?php echo h($referrals["referring_name"] ); ?> </td>
                    <td><?php echo h( $referrals["bleep_number"] ); ?></td>
                    <td><?php echo h($referrals["is_patient_aware"] ); ?> </td>
                    <td><?php echo h($referrals["is_interpreter_needed"] ); ?> </td>
                    <td> <?php echo h($referrals["interpreter_language"] ); ?></td>
                    <td><?php echo h($referrals["kch_doc_name"] ); ?> </td>
                    <td> <?php echo h($referrals["current_issue"] ); ?></td>
                    <td> <?php echo h($referrals["history_of_present_complaint"]); ?> </td>
                    <td> <?php echo h($referrals["family_history"] ); ?></td>
                    <td> <?php echo h($referrals["current_feeds"] ); ?></td>
                    <td> <?php echo h($referrals["medications"] ); ?></td>
                    <td> <?php echo h($referrals["other_investigations"] ); ?> </td>
                    <td><?php echo h($referrals["datetime"] ); ?></td>
                    <td><?php echo h($referrals["Urgent"] ); ?></td>
                    </tr>
                
                   <?php } ?>
                </table>
        
    </div> -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class= "Referrals listing">
    <h1 id="title-page"> Referrals  </h1>
    <form method="post" class="example" id="searchbar" action="referral_list.php" style="margin:auto;max-width:700px">
                    <input type="text" name="search" id="searchinput" placeholder="Enter Surname to Search">
                    <button name="submitbtn" id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
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
                <td> <a class="actions" href = "<?php echo url_for('/referral_show.php?id=' . $patient["ID"]); ?> " ><?php if(check_patient_investigation_urgent(h($patient["ID"]))){echo "&#10071 ";}echo h($patient["first_name"]).  " ".  h($patient["last_name"]);  ?> </a></td> 
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
<style>
    a {
    background-color: white;
    box-shadow: -1 1px 0 blue;
    color: rgb(42,103,204);
    padding: 0.3em 1em;
    position: relative;
    text-decoration: none;
   
} 

a:hover {
  background-color: rgb(19, 26, 102);
  cursor: pointer;
}

a:active {
  box-shadow: none;
  top: 5px;
}

</style>
<?php include(SHARED_PATH . '/footer.php'); ?>


