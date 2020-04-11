<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';

settype($var, 'integer');
$var = $_GET["delete"] ?? '';

$id = $_GET['id'];
$confirmed_set = find_patient_confirmed_appointments($id);
$unconfirmed_set = find_patient_unconfirmed_appointments($id);

$var = $_GET["confirm"] ?? '';
if (isset($_GET["confirm"])) {
    confirm_appointment($var);
    header('Location: appointments.php');
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


                <h1>Appointments</h1>

                <br>

                <center> <br><td><a href=add_appointment.php>Add an appointment</a></td> </center>

                <br>

                <b><h2>Appointments confirmed by the patients</h2></b>
                <table>
                    <tr>
                        <th><b>Patient Name</b></th>
                        <th><b>Date</b></th>
                        <th><b>Admission</b></th>
                        <th><b>Time</b></th>
                        <th><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($appointment = mysqli_fetch_assoc($confirmed_set)) {
                        echo "<tr><td>" . $appointment["first_name"].' '.$appointment["last_name"]. "</td>
                    <td>" . $appointment["date"] . "</td>
                    <td>" . $appointment["option_admission"] . "</td>
                    <td>" . $appointment["time"] . "</td>

                <td><a href=?delete=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to delete this Appointment?');\">Delete</a></td></tr>";
                    } ?>

                </table>

                <br><br><b><h2><i><span style="color: orange; "> Appointments awaiting confirmation by the patients</span></i></h2></b>
                <table>
                    <tr>
                        <th><b>Patient Name</b></th>
                        <th><b>Date</b></th>
                        <th><b>Admission</b></th>
                        <th><b>Time</b></th>
                        <th colspan="2"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($appointment = mysqli_fetch_assoc($unconfirmed_set)) {
                        echo "<td>" . $appointment["first_name"].' '.$appointment["last_name"]. "</td>
                    <td>" . $appointment["date"] . "</td>
                    <td>" . $appointment["option_admission"] . "</td>
                    <td>" . $appointment["time"] . "</td>

                <td><a href=?delete=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to delete this Appointment?');\">Delete</a></td>
                <td><a href=?confirm=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to confirm this Appointment?');\">Confirm</a></td></tr>";
                    } ?>

                </table>



            </center>

        </div>

        <?php include(SHARED_PATH . '/footer.php'); ?>
