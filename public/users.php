<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$user_set = find_all_users();

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
                        <th width="5%"><b>ID</b></th>
                        <th><b>Username</b></th>
                        <th><b>Name</b></th>
                        <th><b>Surname</b></th>
                        <th><b>Level</b></th>
                        <th colspan="3"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($users = mysqli_fetch_assoc($user_set)) {
                        echo "<tr><td width=\"5%\"><a href=userDetails.php?id=" . $users["id"] . ">" . $users["id"] . "</a></td>
                    <td >" . $users["username"] . "</td>
                    <td>" . $users["name"] . "</td>
                    <td>" . $users["surname"] . "</td>
                    <td>" . $users["userLevel"] . "</td>
                <td><a href=userDetails.php?id=" . $users["id"] . ">View</a></td>
                <td><a href=userEdit.php?id=" . $users["id"] . ">Edit</a></td>
                <td><a href=?delete=" . $users["id"] . ">Delete</td></tr>";
                    } ?>

                </table>

        </center>

    </div>

