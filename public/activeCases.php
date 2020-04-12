<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$user_set = find_all_patients();

settype($var, 'integer');
if ($_SESSION['userLevel'] < 1) {
    redirect_to('index.php');
}

if (isset($_GET["close"])) {
    $var = $_GET["close"];
    close_case($var);
    header('Location: activeCases.php');
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>


        <center>

                <h1 id="title-page">Active Cases</h1>
                <br>
                <br>
                <table>
                    <tr>
                        <th id = "darkblue"><b>Name</b></th>
                        <th id = "lightblue"><b>Surname</b></th>
                        <th id = "darkblue"><b>DOB</b></th>
                        <th id = "lightblue"><b>NHS Number</b></th>
                        <th id = "darkblue"><b>Access Code</b></th>
                        <th id = "lightblue" colspan="3"><b>View</b></th>
                        <th id = "darkblue"><b>Close case</b></th>

                    </tr>
                    <?php
                    while ($users = mysqli_fetch_assoc($user_set)) {

                        if(mysqli_num_rows(access_actve_referral($users["ID"]))){
                        echo "<tr><td >" . $users["first_name"] . "</td>
                    <td>" . $users["last_name"] . "</td>
                    <td>" . $users["date_of_birth"] . "</td>
                    <td>" . $users["nhs_number"] . "</td>
                    <td>" . $users["accessCode"] . "</td>
                    <td><a href=referral_show.php?id=" . $users["ID"] . ">Referral</a></td>
                    <td><a href=InvestigationsShow.php?id=" . $users["ID"] . ">Investigations</a></td>
                            <td><a href=appointments_patient.php?id=" . $users["ID"] . ">Appointments</a></td>
                             <td> <a href=?close=" . $users["ID"] . " onclick=\"return confirm('Are you sure that you want to close this case?');\">Close</a></td></tr>";
                    }else {}}

                ?>


                </table>

        </center>
    </div>

    <style>
        a {
                background-color: white;
    box-shadow: -1 1px 0 blue;
    color: rgb(42,103,204);
    padding: 0.3em 1em;
    position: relative;
    text-decoration: none;
    text-transform: uppercase;
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
