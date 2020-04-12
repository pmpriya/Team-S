<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$appointment_set = find_all_appointments();

settype($var, 'integer');
$var = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_appointment($var);
    header('Location: appointments_past.php');
}
if (isset($_POST['submitbtn'])) {
    $q = $_POST['search'];
    $appointment_set = search_by_date($q);

}

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

        tr:nth-child(odd) {background-color: #f2f2f2;}

        table {
            border-collapse: collapse;
            width: 50%;
        }
    </style>

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>


        <center>


            <h1>Past Appointments</h1>


            <form method="post" class="example" id="searchbar" action="appointments_past.php" style="margin:auto;max-width:700px">
                <input type="text" name="search" id="searchinput" placeholder="Enter Date to Search (yyyy-mm-dd)">
                <button name="submitbtn" id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <br>


            <table>
                <tr>
                    <th><b>ID</b></th>
                    <th><b>Patient Name</b></th>
                    <th><b>Date</b></th>
                    <th><b>Admission</b></th>
                    <th><b>Time</b></th>

                    <th colspan="3"><b>Manage</b></th>
                </tr>
                <?php
                while ($appointment = mysqli_fetch_assoc($appointment_set)) {
                    echo "<tr><td >" . $appointment["id"] . "</td>
                    <td>" . $appointment["first_name"].' '.$appointment["last_name"]. "</td>
                    <td>" . $appointment["date"] . "</td>
                    <td>" . $appointment["option_admission"] . "</td>
                    <td>" . $appointment["time"] . "</td>
                <td><a href=?delete=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to delete this Appointment?');\">Delete</a></td></tr>";
                } ?>

            </table>


        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>