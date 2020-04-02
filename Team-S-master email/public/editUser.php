<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php include(SHARED_PATH . '/header.php'); ?>
          <?php include(SHARED_PATH . '/validation.php'); ?>

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

 $message = "";
        $isValid = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_username = $_POST['username'];
            if(!isset($new_username) || empty($new_username)){
                $isValid = false;
                $message .= "Username can not be empty";
            }


            $new_name = $_POST['name'];
            $val = isOnlyCharacter($new_name);
            if($val!=1)
            {
                $message .= getMessage($val,"Name");
                $isValid = false;
            }

            $new_surname = $_POST['surname'];
            $val = isOnlyCharacter($new_surname);
            if($val!=1)
            {
                $message .= getMessage($val,"Surname");
                $isValid = false;
            }

            $new_email = $_POST['email'];
              $val = validateUserEmail($new_email);
            if($val!=1)
            {
                $message .= getMessage($val,"Email");
                $isValid = false;
            }


            $new_userLevel = $_POST['userLevel'];
              $val = isOnlyNumber($new_userLevel);
            if($val!=1)
            {
                $message .= getMessage($val,"UserLevel");
                $isValid = false;
            }
            if($isValid){
            edit_user($id, $new_username,$new_name,$new_surname,$new_email,$new_userLevel);
            header('Location: users.php');
            exit;

        }
        else {
            echo $message;
        }
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
                                        <tr><td>Username:</td><td> <textarea required="" id="username"   onfocusout="isEmpty(this,'Username')" name="username" rows="1" cols="10"><?php echo $username; ?></textarea></td></tr>
                                        <tr><td>Name:</td><td> <textarea  required="" id="name" onfocusout="isOnlyCharacter(this,'Name')" name="name" rows="1" cols="10"><?php echo $name; ?></textarea></td></tr>
                                        <tr><td>Surname:</td><td> <textarea  required="" id="surname" onfocusout="isOnlyCharacter(this,'Surname')"  name="surname" rows="1" cols="10"><?php echo $surname; ?></textarea></td></tr>

                                        <tr><td>Email:</td><td> <textarea required="" id="email" onfocusout="ValidateEmail(this,'Email')" name="email" rows="1" cols="10"><?php echo $email; ?></textarea></td></tr>

                                        <tr><td>userLevel:</td><td> <input value="<?php echo $userLevel; ?>" type="number" required="" id="userLevel" onfocusout="isOnlyNumber(this,'userLevel')"  name="userLevel" rows="1" cols="10"></input></td></tr>
                                    </table>

                                <button type="button" onclick="validateForm()" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
                            </form>
               <br><br>
               <td><a href=passwordReset.php?id=<?php echo $id; ?>>Update password</a></td>

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
    function isOnlyCharacter(r,e){
        if(!isEmpty(r,e)){
            if(r.value.length<2){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have more than equal to 2 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have more than equal to 2 characters";
                return false;
            }
            if(r.value.length>10){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have less than equal to 10 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have less than equal to 10 characters";
                return false;
            }
            if (/^([a-zA-Z]+\s)*[a-zA-Z]+$/.test(r.value.trim()))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can only contain characters<br/>";
            else
                document.getElementById("alert_message").innerHTML = e+" can only contain characters<br/>";
            return (false)    
        }
        return false;
    }
</script>
<script type="text/javascript">
    function ValidateEmail() 
    {
        var mail = document.getElementById("email");
        if(!isEmpty(mail,"Mail")){
            mail = mail.value;
            if (/^\w+([\.-]?\w+)*@nhs.net$/.test(mail))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }else if (/^\w+([\.-]?\w+)*@[0-9a-zA-Z]+.nhs.uk$/.test(mail))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += "Invalid Email<br/>";
            else
                document.getElementById("alert_message").innerHTML = "Invalid Email";
            return (false)    
        }
        return false;
        
    }
</script>
<script type="text/javascript">
    function isOnlyNumber(r,e){
        if(!isEmpty(r,e)){
            if (/^\d+$/.test(r.value.trim()))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can only contain Numbers<br/>";
            else
                document.getElementById("alert_message").innerHTML = e+" can only contain Numbers";
            return (false)    
        }
        return false;
    }
</script>


<script type="text/javascript">
    function validateForm(){
        document.getElementById("alert_message").innerHTML = "";
        var username = document.getElementById("username");
        var name = document.getElementById("name");
        var surname = document.getElementById("surname");
        var email = document.getElementById("email");
        var userLevel = document.getElementById("userLevel");
        var isOkay = true;
        append = true;

        if(isEmpty(username,"Username")){
            isOkay = false;
        }
        if(!isOnlyCharacter(name,"Name")){
            isOkay = false;
        }
        if(!isOnlyCharacter(surname,"Sur Name")){
            isOkay = false;
        }
        if(!ValidateEmail(email,"Email")){
            isOkay = false;
        }
        if(!isOnlyNumber(userLevel,"User Level")){
            isOkay = false;
        }


        if(isOkay){
            document.getElementById("form").submit();
            return true;
        }

        // if(!isEmpty(username,"Username")&&isOnlyCharacter(name,"Name")&&isOnlyCharacter(surname,"Sur Name")&&ValidateEmail(email,"Email")&&isOnlyNumber(userLevel,"User Level")  ){
        //     document.getElementById("form").submit();

        //     return true;
        // }
        append = false;
        return false;
    }
</script>
