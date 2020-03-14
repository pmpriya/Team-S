<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php include(SHARED_PATH . '/header.php'); ?>
        <?php
        $page_title = 'KCL Paedriatic Liver Service';

        ?>

        <?php

        $id = $_GET['id'];
        $user_set = find_user_by_id($_GET['id']);


$query = mysqli_query($db, "SELECT * FROM User WHERE id = '$id'") or die(mysqli_error());

if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query)) {
        $username = $row['username'];
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        $userLevel = $row['userLevel'];}}



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_username = $_POST['username'] ?? '';
            $new_name = $_POST['name'] ?? '';
            $new_surname = $_POST['surname'] ?? '';
            $new_email = $_POST['email'] ?? '';
            $new_userLevel = $_POST['userLevel'] ?? '';
            edit_user($id, $new_username,$new_name,$new_surname,$new_email,$new_userLevel);
            header('Location: users.php');
            exit;
        }
        ?>
<style>textarea {
        width: 200px;
    }</style>

           <center>
               <h1>Edit user</h1>


                            <form method="post">
                                <div class="form-group" align="center">
                                    <table>
                                        <tr><td>Username:</td><td> <textarea  name="username" rows="1" cols="10"><?php echo $username; ?></textarea></td></tr>
                                        <tr><td>Name:</td><td> <textarea  name="name" rows="1" cols="10"><?php echo $name; ?></textarea></td></tr>
                                        <tr><td>Surname:</td><td> <textarea  name="surname" rows="1" cols="10"><?php echo $surname; ?></textarea></td></tr>
                                        <tr><td>Email:</td><td> <textarea  name="email" rows="1" cols="10"><?php echo $email; ?></textarea></td></tr>
                                        <tr><td>userLevel:</td><td> <textarea  name="userLevel" rows="1" cols="10"><?php echo $userLevel; ?></textarea></td></tr>
                                    </table>

                                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
                            </form>
               <br><br>
               <td><a href=passwordReset.php?id=<?php echo $id; ?>>Update password</a></td>

                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>