<?php require_once('../../private/initialise.php'); ?>
    <div class="public">
        <img src="../images/nhs.png" alt="Logo" id="logo">
        <?php include(SHARED_PATH . '/header.php'); ?>
        <?php include(SHARED_PATH . '/validation.php'); ?>
        <?php
        $page_title = 'KCL Paedriatic Liver Service';
        if ($_SESSION['userLevel'] < 2) {
            redirect_to('../index.php');

        }
        ?>

        <?php



        $message = "";
        $isValid = true;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'] ?? '';
            if(!isset($username) || empty($username)){
                $isValid = false;
                $message .= "Username can not be empty";
            }
            $name = $_POST['name'] ?? '';
            $val = isOnlyCharacter($name);
            if($val!=1)
            {
                $message .= getMessage($val,"Name");
                $isValid = false;
            }
            $surname = $_POST['surname'] ?? '';
            $val = isOnlyCharacter($surname);
            if($val!=1)
            {
                $message .= getMessage($val,"Surname");
                $isValid = false;
            }
            $email = $_POST['email'] ?? '';
            $val = validateUserEmail($email);
            if($val!=1)
            {
                $message .= getMessage($val,"Email");
                $isValid = false;
            }
            $password = $_POST['password'] ?? '';
            if(!isset($password) || empty($password)){
                $isValid = false;
                $message .= "Password can not be empty";
            }
            $userLevel = $_POST['userLevel'] ?? '';
            $val = isOnlyNumber($userLevel);
            if($val!=1)
            {
                $message .= getMessage($val,"UserLevel");
                $isValid = false;

    
            }
           
            if(isValid){

            add_user($username,$name,$surname,$email,$password, $userLevel);
                header('Location: index.php');
                exit;
            }
        }
        ?>

<style>textarea {
        width: 200px;
    }</style>

           <center>
               <h1>Add user</h1>

<form method="post" id="form">
                                <div class="form-group" align="center">
                                    <span id="alert_message" style="color:red"></span>
                                    <table>
                                        <tr><td>Username:</td><td> <textarea minlength="2" maxlength="10" required="" name="username" id="username" onfocusout="isEmpty(this,'Username')"  rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Name:</td><td> <textarea name="name" minlength="2" maxlength="10" id="name" onfocusout="isOnlyCharacter(this,'Name')" required="" name="name" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Surname:</td><td> <textarea name="surname" minlength="2" maxlength="10" id="surname" onfocusout="isOnlyCharacter(this,'Surname')" required=""  name="surname" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Email:</td><td> <textarea required="" name="email" id="email" onfocusout="ValidateNHSEmail(this, 'Email')" name="email" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Password:</td><td> <input name="password" id="password" onfocusout="isEmpty(this,'Password')" type="password" minlength="2" maxlength="32" required="" name="password" rows="1" cols="10"></input></td></tr>
                                        <tr><td>Confirm Password:</td><td> <input name="confirmpassword" id="confirmpassword" type="password" onfocusout="isEmpty(this,'Confirm Password')" minlength="2" maxlength="32" required="" name="confirmpassword" rows="1" cols="10"></input></td></tr>
                                        <tr><td>userLevel:</td><td> <input type="text" name="userLevel" id="userLevel" onfocusout="isOnlyNumber(this,'UserLevel')" required="" name="userLevel" rows="1" cols="10"></textarea></td></tr>
 
                                    </table>
                             <br>
                                <button type="button" onclick="validateForm()" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
                                </br>
                            </form>
               <br><br>

                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>
<script type="text/javascript" src="../../private/validation_functions.js"></script>
<script type="text/javascript">
    var append = false;
</script>
<script type="text/javascript">
    function validateForm(){
        document.getElementById("alert_message").innerHTML ="";
        append = true;
        var username = document.getElementById("username");
        var name = document.getElementById("name");
        var surname = document.getElementById("surname");
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirmpassword");
        var userLevel = document.getElementById("userLevel");
        
        var isOkay = true; 
        
        if(password.value != confirm_password.value) {
            document.getElementById("alert_message").innerHTML = " Passwords don't match";
            isOkay=false;
         } 
       

        //password.onchange = validatePassword;
        //confirm_password.onkeyup = validatePassword;

        if(isEmpty(username,"Username")){
            isOkay = false;
        }
        if(!isOnlyCharacter(name,"Name")){
            isOkay = false;
        }
        if(!isOnlyCharacter(surname,"Surname")){
            isOkay = false;
        }
        if(!ValidateNHSEmail()){
            isOkay = false;
        }
        if(isEmpty(password,"Password")){
            isOkay = false;
        }
        if (isEmpty(confirm_password,"Confirm Password")) { 

            isOkay = false; 
        }
        if(!isOnlyNumber(userLevel,"userLevel")){
            isOkay = false;
        }
 
       
        if(isOkay){
            
            document.getElementById("form").submit();
            
            return true;
        }
        
        // if(!isEmpty(username,"Username")&&isOnlyCharacter(name,"Name")&&isOnlyCharacter(surname,"Surname")&&ValidateEmail()&&!isEmpty(password,"Password")&&isOnlyNumber(userLevel,"userLevel")){
        //     document.getElementById("form").submit();
           
        //     return true;
        // }
        append = false;
        return false;
    }
</script>
