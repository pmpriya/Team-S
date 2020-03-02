<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$user_set = find_all_users();

settype($var, 'integer');
$var = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_user($var);
    header('Location: users.php');
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

                <h1>Users</h1>
                <table>
                    <tr>
                        <th><b>Username</b></th>
                        <th><b>Name</b></th>
                        <th><b>Surname</b></th>
                        <th><b>Level</b></th>
                        <th colspan="2"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($users = mysqli_fetch_assoc($user_set)) {
                        echo "<tr><td >" . $users["username"] . "</td>
                    <td>" . $users["name"] . "</td>
                    <td>" . $users["surname"] . "</td>
                    <td>" . $users["userLevel"] . "</td>
                <td><a href=editUser.php?id=" . $users["id"] . ">Edit</a></td>
                <td><a href=?delete=" . $users["id"] . " onclick=\"return confirm('Are you sure that you want to delete this user?');\">Delete</a></td></tr>";
                    } ?>

                </table>
            <br><td><a href=addUser.php>Add user</a></td>

        </center>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>