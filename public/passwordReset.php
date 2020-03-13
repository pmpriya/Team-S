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


                            <form method="post" id="form">
                                <div class="form-group" align="center">
                                    <span id="alert_message" style="color:red"></span>

                                    <table>
                                        <tr><td>New Password:</td><td> <textarea   required=""  id="password"  onfocusout="isEmpty(this,'New Password')" name="password" rows="1" cols="10"></textarea></td></tr>
                                    </table>

                                <button type="button" onclick="validateForm()" class="btn btn-sm btn-primary"><i class="far fa-save"></i>Update password</button>
                            </form>
                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>

        <script type="text/javascript">
    var append = false;
</script>
<script type="text/javascript">
    function isEmpty(r,e){
       if(r.value.trim()==""){
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can't be empty.</br>";
            else
                document.getElementById("alert_message").innerHTML =e+" can't be empty";
            return true;
       }
       if(append) 
            document.getElementById("alert_message").innerHTML += "";
        else
            document.getElementById("alert_message").innerHTML = "";
       return false;
    }
</script>
   

<script type="text/javascript">
    function validateForm(){
        document.getElementById("alert_message").innerHTML = "";
        var password = document.getElementById("password");

        append = true;
       

        if(!isEmpty(password,"password")){
            document.getElementById("form").submit();

            return true;
        }
        append = false;
        return false;
    }
</script>
