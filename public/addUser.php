<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php include(SHARED_PATH . '/header.php'); ?>
        <?php
        $page_title = 'KCL Paedriatic Liver Service';

        ?>

        <?php







        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $userLevel = $_POST['userLevel'] ?? '';
            add_user($username,$name,$surname,$email,password_hash($password, PASSWORD_DEFAULT), $userLevel);
            header('Location: users.php');
            exit;
        }
        ?>
<style>textarea {
        width: 200px;
    }</style>

           <center>
               <h1>Add user</h1>


                            <form method="post">
                                <div class="form-group" align="center">
                                    <table>
                                        <tr><td>Username:</td><td> <textarea  name="username" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Name:</td><td> <textarea  name="name" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Surname:</td><td> <textarea  name="surname" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Email:</td><td> <textarea  name="email" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Password:</td><td> <textarea  name="password" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>userLevel:</td><td> <textarea  name="userLevel" rows="1" cols="10"></textarea></td></tr>

                                    </table>

                                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
                            </form>
               <br><br>

                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>