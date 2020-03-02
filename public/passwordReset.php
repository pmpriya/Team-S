<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php include(SHARED_PATH . '/header.php'); ?>
        <?php
        $page_title = 'KCL Paedriatic Liver Service';

        ?>

        <?php

        $id = $_GET['id'];



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_password = $_POST['password'] ?? '';
            edit_password($id, $new_password);
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
                                        <tr><td>New password:</td><td> <textarea  name="password" rows="1" cols="10"></textarea></td></tr>
                                    </table>

                                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i>Update password</button>
                            </form>
                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>