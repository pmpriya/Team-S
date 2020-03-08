<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$user_set = find_all_patients();

settype($var, 'integer');
$var = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_patient($var);
    header('Location: patients.php');
}
?>
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

                <h1>Patients</h1>
                <table>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Surname</b></th>
                        <th><b>DOB</b></th>
                        <th><b>Postcode</b></th>
                        <th colspan="3"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($users = mysqli_fetch_assoc($user_set)) {
                        echo "<tr><td >" . $users["first_name"] . "</td>
                    <td>" . $users["last_name"] . "</td>
                    <td>" . $users["date_of_birth"] . "</td>
                    <td>" . $users["postcode"] . "</td>
                    <td><a href=viewPatient.php?id=" . $users["ID"] . ">View</a></td>
                <td><a href=editPatient.php?id=" . $users["ID"] . ">Edit</a></td>
                <td><a href=?delete=" . $users["ID"] . " onclick=\"return confirm('Are you sure that you want to delete this user?');\">Delete</a></td></tr>";
                    } ?>

                </table>
            <br><td><a href=register_patient.php>Add patient</a></td>

        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>