<?php require_once('../private/initialise.php'); ?>
<div class="public">
    <?php include(SHARED_PATH . '/header.php'); ?>
    <?php
    $page_title = 'KCL Paedriatic Liver Service';

    ?>

    <?php

    $id = $_GET['id'];
    $user_set = find_user_by_id($_GET['id']);


    $query = mysqli_query($db, "SELECT * FROM Patient WHERE id = '$id'") or die(mysqli_error());

    if(mysqli_num_rows($query)>=1){
        while($row = mysqli_fetch_array($query)) {
            $nhs_number = $row['nhs_number'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $date_of_birth = $row['date_of_birth'];
            $sex = $row['sex'];
            $home_address = $row['home_address'];
            $postcode = $row['postcode'];
            $home_phone = $row['home_phone'];
            $mobile_phone = $row['mobile_phone'];
            $gp_address = $row['gp_address'];
            $gp_phone = $row['gp_phone'];

        }}



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $patient = [];
            $patient['new_nhs_number'] = $_POST['nhs_number'] ?? '';
            $patient['new_first_name'] = $_POST['first_name'] ?? '';
            $patient['new_last_name'] = $_POST['last_name'] ?? '';
            $patient['new_date_of_birth'] = $_POST['date_of_birth'] ?? '';
            $patient['new_sex'] = $_POST['sex'] ?? '';
            $patient['new_home_address'] = $_POST['home_address'] ?? '';
            $patient['new_postcode'] = $_POST['postcode'] ?? '';
            $patient['new_home_phone'] = $_POST['home_phone'] ?? '';
            $patient['new_mobile_phone'] = $_POST['mobile_phone'] ?? '';
            $patient['new_gp_address'] = $_POST['gp_address'] ?? '';
            $patient['new_gp_phone'] = $_POST['gp_phone'] ?? '';
            $result = edit_patient($patient);
            if($result === true) {
                header('Location: patients.php');
                exit;
            }
            else {
                $errors = $result;
                var_dump($errors);
            }
        }
        ?>
        <style>textarea {
            width: 200px;
        }</style>

        <center>
         <h1>Edit patient</h1>



         <form method="post" id="form">
            <div class="form-group" align="center">
                <span id="alert_message" style="color:red"></span>
                <table>
                    <tr><td>NHS Number:</td><td> <textarea required="" onfocusout="isOnlyNumber(this,'NHS Number')"  name="nhs_number" id="nhs_number" rows="1" cols="10"><?php echo $nhs_number; ?></textarea></td> </tr>

                      <tr><td>First Name:</td><td> <textarea required="" id="first_name" onfocusout="isOnlyCharacter(this,'First Name')" name="first_name" rows="1" cols="10"><?php echo $first_name; ?></textarea></td></tr>

                    <tr><td>Last Name:</td><td> <textarea required="" id="last_name" onfocusout="isOnlyCharacter(this,'Last Name')" name="last_name" rows="1" cols="10"><?php echo $last_name; ?></textarea></td></tr>


                    <tr><td>DOB:</td><td> <input type="date" name="" required="" id="date_of_birth" onfocusout="isEmpty(this,'DOB')" name="date_of_birth" rows="1" cols="10"><?php echo $date_of_birth; ?></input></td></tr>

                    <tr><td>Sex:</td><td> <textarea required="" name="sex" onfocusout="isOnlyCharacter(this,'Sex')" id="sex" rows="1" cols="10"><?php echo $sex; ?></textarea></td></tr>

                    <tr><td>Home address:</td><td> <textarea required="" onfocusout="isEmpty(this,'Home address')" id="home_address" name="home_address" rows="1" cols="10"><?php echo $home_address; ?></textarea></td></tr>
                    <tr><td>Postcode:</td><td> <textarea required="" onfocusout="isEmpty(this,'Postcode')" id="postcode" name="postcode" rows="1" cols="10"><?php echo $postcode; ?></textarea></td></tr>

                    <!--  -->
                    <tr><td>Home Phone:</td><td> <input type="number"required="" onfocusout="isOnlyNumber(this,'Home Phone')" id="home_phone" name="home_phone" rows="1" cols="10"><?php echo $home_phone; ?></input></td></tr>

                    <!--  -->
                    <tr><td>Mobile Phone:</td><td> <input type="number" required="" onfocusout="isOnlyNumber(this,'Mobile Phone')" id="mobile_phone"  name="mobile_phone" rows="1" cols="10"><?php echo $mobile_phone; ?></input></td></tr>

                    <tr><td>HP Address:</td><td> <textarea required="" onfocusout="isEmpty(this,'HP Address')" id="gp_address" name="gp_address" rows="1" cols="10"><?php echo $gp_address; ?></textarea></td></tr>

                    <tr><td>GP Phone:</td><td> <input type="number" onfocusout="isOnlyNumber(this,'GP Phone')" required="" id="gp_phone" name="gp_phone" rows="1" cols="10"><?php echo $gp_phone; ?></input></td></tr>
                </table>

                <button type="button" onclick="validateForm()" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
            </form>
            <br><br>

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
                document.getElementById("alert_message").innerHTML = e+" can only contain characters";
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
    function ValidateEmail() 
    {
        var mail = document.getElementById("email");
        if(!isEmpty(mail,"Mail")){
            mail = mail.value;
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += "Invalid Email";
            else
                document.getElementById("alert_message").innerHTML = "Invalid Email";
            return (false)    
        }
        return false;
        
    }
</script>
<script type="text/javascript">
    function validateForm(){
        document.getElementById("alert_message").innerHTML = "";
        var nhs_number = document.getElementById("nhs_number");

        var first_name = document.getElementById("first_name");
        var last_name = document.getElementById("last_name");
        var date_of_birth = document.getElementById("date_of_birth");
        var sex = document.getElementById("sex");
        var home_address = document.getElementById("home_address");
        var postcode = document.getElementById("postcode");
        var home_phone = document.getElementById("home_phone");
        var mobile_phone = document.getElementById("mobile_phone");
        var gp_address = document.getElementById("gp_address");
        var gp_phone = document.getElementById("gp_phone");
        append = true;
        var isOkay = true;
        if(!isOnlyNumber(nhs_number,"NHS Number")){
            isOkay = false;
        }
        if(!isOnlyCharacter(first_name,"First Name")){
            isOkay = false;
        }
        if(!isOnlyCharacter(last_name,"Last Name")){
            isOkay = false;
        }
        if(isEmpty(date_of_birth,"date_of_birth")){
            isOkay = false;
        }
        if(!isOnlyCharacter(sex,"SEX")){
            isOkay = false;
        }
        if(isEmpty(home_address,"Home Address")){
            isOkay = false;
        }
        if(isEmpty(postcode,"Post Code")){
            isOkay = false;
        }
        if(!isOnlyNumber(home_phone,"Home Phone")){
            isOkay = false;
        }
        if(!isOnlyNumber(mobile_phone,"Mobile Phone")){
            isOkay = false;
        }
        if(isEmpty(gp_address,"GP Address")){
            isOkay = false;
        }
        if(!isOnlyNumber(gp_phone,"GP Phone"))
        {
            isOkay =false;
        }


        if(isOkay){
            document.getElementById("form").submit();
            return true;
        }        

        // if(isOnlyNumber(nhs_number,"NHS Number")&&isOnlyCharacter(first_name,"First Name")&&isOnlyCharacter(last_name,"Last Name")&&&&!isEmpty(date_of_birth,"date_of_birth")&&isOnlyCharacter(sex,"SEX")&&!isEmpty(home_address,"Home Address") &&!isEmpty(postcode,"Post Code") &&isOnlyNumber(home_phone,"Home Phone") &&isOnlyNumber(mobile_phone,"Mobile Phone") &&!isEmpty(gp_address,"GP Address") &&isOnlyNumber(gp_phone,"GP Phone") ){
        //     document.getElementById("form").submit();

        //     return true;
        // }
        append = false;
        return false;
    }
</script>

