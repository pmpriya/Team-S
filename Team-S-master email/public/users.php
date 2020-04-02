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

if (isset($_POST['submitbtn'])) {
    $q = $_POST['search'];
    $user_set = search_by_username($q);
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            tr:nth-child(odd) {background-color: #f2f2f2;}

            table {
                border-collapse: collapse;
                width: 50%;
            }

            form.example input[type=text] {
                padding: 10px;
                font-size: 17px;
                border: 1px solid grey;
                float: left;
                width: 80%;
                background: #f1f1f1;
            }

            form.example button {
                float: left;
                width: 20%;
                padding: 10px;
                background: #333;
                color: white;
                font-size: 17px;
                border: 1px solid grey;
                border-left: none;
                cursor: pointer;
                height: 42px;
            }

            form.example button:hover {
                background: black;
            }

            form.example::after {
                content: "";
                clear: both;
                display: table;
            }
        </style>

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>


        <center>

                <h1>Staff</h1>
                <form method="post" class="example" action="users.php" style="margin:auto;max-width:700px">
                    <input type="text" name="search" placeholder="Enter Username to Search">
                    <button name="submitbtn" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <br>
                <br>
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
