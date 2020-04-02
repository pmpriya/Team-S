<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Edit patient'; ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
  <?php include(SHARED_PATH . '/validation.php'); ?>



<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_set = find_patient_by_id($_GET['id']);
}
elseif(isset($_SESSION['nhsno'])){
    $user_set = find_patient_by_nhsno_and_accesscode($_SESSION['nhsno'], $_SESSION['accessCode']);

}else{
    header('Location: index.php');
}


if(mysqli_num_rows($user_set)>=1){
    while($row = mysqli_fetch_array($user_set)) {
        $nhs_number = $row['nhs_number'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $sex = $row['sex'];
        $email = $row['email'];
        $home_address = $row['home_address'];
        $postcode = $row['postcode'];
        $home_phone = $row['home_phone'];
        $mobile_phone = $row['mobile_phone'];
        $gp_address = $row['gp_address'];
        $gp_phone = $row['gp_phone'];
        $accessCode = $row['accessCode'];

    }}


 $message = "";
        $isValid = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $new_nhs_number = $_POST['nhs_number'];
    $val = isOnlyNumber($new_nhs_number);
            if($val!=1)
            {
                $message .= getMessage($val,"New Nhs Number");
                $isValid = false;
            }

    $new_first_name = $_POST['first_name'];
    $val = isOnlyCharacter($new_first_name);
            if($val!=1)
            {
                $message .= getMessage($val,"First Name");
                $isValid = false;
            }

    $new_last_name = $_POST['last_name'];
    $val = isOnlyCharacter($new_last_name);
            if($val!=1)
            {
                $message .= getMessage($val,"Last Name");
                $isValid = false;
            }

    $new_date_of_birth = $_POST['date_of_birth'];
    if(!isset($new_date_of_birth) || empty($new_date_of_birth)){
                $isValid = false;
                $message .= "Date Of birth can not be empty";
            }

    $new_sex = $_POST['sex'];
    if(!isset($new_sex) || empty($new_sex)){
                $isValid = false;
                $message .= "sex cant be empty.<br/>";
            }

    $new_email = $_POST['new_email'];
    
    $val = validateClientEmail($new_email);
            if($val!=1)
            {
                $message .= getMessage($val,"Email");
                $isValid = false;
            }

    $new_home_address = $_POST['home_address'];
    if(!isset($new_home_address) || empty($new_home_address)){
                $isValid = false;
                $message .= "Home Address can not be empty";
            }


    $new_postcode = $_POST['postcode'];
    if(!isset($new_postcode) || empty($new_postcode)){
                $isValid = false;
                $message .= "Postcode can not be empty";
            }

    
    $new_home_phone = $_POST['home_phone'];
    $val = isOnlyNumber($new_home_phone);
            if($val!=1)
            {
                $message .= getMessage($val,"Home Phone");
                $isValid = false;
            }

    $new_mobile_phone = $_POST['mobile_phone'];
    $val = isOnlyNumber($new_mobile_phone);
            if($val!=1)
            {
                $message .= getMessage($val,"Mobile Phone");
                $isValid = false;
            }
    $new_gp_address = $_POST['gp_address'];
            if(!isset($new_gp_address) || empty($new_gp_address)){
                $isValid = false;
                $message .= "Gp Address can not be empty";
            }

    $new_gp_phone = $_POST['gp_phone'];
    $val = isOnlyNumber($new_gp_phone);
            if($val!=1)
            {
                $message .= getMessage($val,"GP Phone");
                $isValid = false;
            }

    $new_accessCode = $_POST['accessCode'];
    $val = isOnlyNumber($new_accessCode);
            if($val!=1)
            {
                $message .= getMessage($val,"Access Code");
                $isValid = false;
            }
            if(isValid){

    edit_patient($id, $new_nhs_number, $new_first_name, $new_last_name, $new_date_of_birth, $new_sex, $new_email, $new_home_address, $new_postcode, $new_home_phone, $new_mobile_phone, $new_gp_address,$new_gp_phone, $new_accessCode);
    header('Location: patients.php');
    exit;
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

                    <tr><td>Email:</td><td> <textarea required="" id="email" onfocusout="ValidateEmail()" name="new_email" rows="1" cols="10"><?php echo $email; ?></textarea></td></tr>

                    <tr><td>DOB:</td><td> <input value="<?php echo $date_of_birth; ?>" type="date" name="date_of_birth" required="" id="date_of_birth" onfocusout="isEmpty(this,'DOB')" name="date_of_birth" rows="1" cols="10"></input></td></tr>

                    <tr><td>Sex:</td><td> <textarea required="" name="sex" onfocusout="isOnlyCharacter(this,'Sex')" id="sex" rows="1" cols="10"><?php echo $sex; ?></textarea></td></tr>

                    <tr><td>Home address:</td><td> <textarea required="" onfocusout="isEmpty(this,'Home address')" id="home_address" name="home_address" rows="1" cols="10"><?php echo $home_address; ?></textarea></td></tr>
                    
                    <tr><td>Postcode:</td><td> <textarea required="" onfocusout="isEmpty(this,'Postcode')" id="postcode" name="postcode" rows="1" cols="10"><?php echo $postcode; ?></textarea></td></tr>

                    <tr><td>Home Phone:</td><td> <textarea value="<?php echo $home_phone; ?>" type="number" onfocusout="isOnlyNumber(this,'Home Phone')" required="" id="home_phone" name="home_phone" rows="1" cols="10"></textarea></td></tr>

                    <tr><td>Mobile Phone:</td><td> <textarea value="<?php echo $mobile_phone; ?>" type="number" onfocusout="isOnlyNumber(this,'Mobile Phone')" required="" id="mobile_phone" name="mobile_phone" rows="1" cols="10"></textarea></td></tr>

                    <tr><td>HP Address:</td><td> <textarea required="" onfocusout="isEmpty(this,'HP Address')" id="gp_address" name="gp_address" rows="1" cols="10"><?php echo $gp_address; ?></textarea></td></tr>

                    <tr><td>GP Phone:</td><td> <input value="<?php echo $gp_phone; ?>" type="number" onfocusout="isOnlyNumber(this,'GP Phone')" required="" id="gp_phone" name="gp_phone" rows="1" cols="10"></input></td></tr>
                    
                    <tr><td>Access Code</td><td> <input value="<?php echo $accessCode; ?>" type="number" onfocusout="isOnlyNumber(this,'Access Code')" required="" id="accessCode" name="accessCode" rows="1" cols="10"></input></td></tr>

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
            if(r.value.length<1){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have more than equal to 1 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have more than equal to 1 characters";
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
        if(!isOnlyNumber(nhs_number,"NHS Number") || isNHS(nhs_number, "NHS number")){
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
        if(!ValidateEmail()){
            isOkay = false;
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
  <script type="text/javascript">
function isNHS(r,e) {
    if(r.value.length !== 10 && r.value.length !== 0){
            if(append)
                document.getElementById("alert_message").innerHTML += e+" must have 10 digits</br>";
            else
                document.getElementById("alert_message").innerHTML =e+" must have 10 digits";
            return true;
       }
}
</script>
