<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
  <?php include(SHARED_PATH . '/validation.php'); ?>

    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
 $message = "";
        $isValid = true;
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first_name = $_POST["firstname"];
     $val = isOnlyCharacter($first_name);
            if($val!=1)
            {
                $message += getMessage($val,"First Name");
                $isValid = false;
            }
    
    $last_name = $_POST["lastname"];
     $val = isOnlyCharacter($last_name);
            if($val!=1)
            {
                $message += getMessage($val,"Last Name");
                $isValid = false;
            }

    $dob = strtotime($_POST["dob"]);
    if(!isset($dob) || empty($dob)){
                $isValid = false;
                $message += "Date Of birth can not be empty";
            }

    $dob = date('Y-m-d', $dob);


    $home_phone = $_POST["homenumber"];
$val = isOnlyNumber($home_phone);
            if($val!=1)
            {
                $message += getMessage($val,"Home Phone");
                $isValid = false;
            }




    $mobile_phone = $_POST["mobilenumber"];

$val = isOnlyNumber($mobile_phone);
            if($val!=1)
            {
                $message += getMessage($val,"Mobile Number");
                $isValid = false;
            }


    $postcode = $_POST["postcode"];
      if(!isset($new_postcode) || empty($postcode)){
                $isValid = false;
                $message += "Postcode can not be empty";
            }

    $home_address = $_POST["address"];
      if(!isset($new_home_address) || empty($home_address)){
                $isValid = false;
                $message += "Home Address can not be empty";
            }

    $sex = $_POST["gender"];
     $val = isOnlyCharacter($sex);
            if($val!=1)
            {
                $message += getMessage($val,"Sex");
                $isValid = false;
            }

    $email = $_POST["email"];
    $val = validateClientEmail($email);
            if($val!=1)
            {
                $message += getMessage($val,"Email");
                $isValid = false;
            }

    $nhs_number = $_POST["nhsnumber"];
     $val = isOnlyNumber($nhs_number);
            if($val!=1)
            {
                $message += getMessage($val,"NHS Number");
                $isValid = false;
            }

    $gp_address = $_POST["gpaddress"];
    if(!isset($new_gp_address) || empty($gp_address)){
                $isValid = false;
                $message += "Gp Address can not be empty";
            }

    $gp_number = $_POST["gpnumber"];
     $val = isOnlyNumber($gp_number);
            if($val!=1)
            {
                $message += getMessage($val,"GP Phone");
                $isValid = false;
            }



    $accessCode = rand(0,9999);
    $val = isOnlyNumber($accessCode);
            if($val!=1)
            {
                $message += getMessage($val,"Access Code");
                $isValid = false;
            }


    if ($first_name=="" || $last_name=="" || $nhs_number=="" || $dob=="" || $mobile_phone==""|| $home_phone=="" || $postcode=="" || $home_address=="" || $sex=="" || $email=="" || $gp_address==""|| $gp_number=="")

             echo '<label class="text-danger">Please fill in all required fields</label>';
        
    else{
            $result = find_member_by_nhsno($nhs_number);
           
                if(mysqli_num_rows($result) > 0) {
                  $mes = '<label class="text-danger">Patient is already registered with us</label>';
                       echo $mes;
                 } 
                else {
                    /*
                  $result2 = find_patient_by_email($email);
                                
                   if(mysqli_num_rows($result2) > 0) {
                     
                       $mes = '<label class="text-danger">Email Already Exits</label>';
                       echo $mes;

                    else { */
                        if($isValid){
                          $result1 = insert_member($nhs_number, $first_name, $last_name, $dob,$sex, $email, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number, $accessCode);
                    
                        redirect_to(url_for('patients.php'));
                        }
                        
                   }
               }
      
       }


?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Patient registration</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
<body>
    <h1><b>PATIENT REGISTRATION</b></h1>

<h2> <div>Details of the person registering the patient(Please complete all fields) </div></h2>
    <br>

   <form method="post" id="form">    <!-- Patient's Surname -->

      <div class="field-column">
        <span id="alert_message" style="color:red"></span>

      <label>Surname</label>
         <input type="text"  onfocusout="isOnlyCharacter(this,'Surname')" id="lastname" name="lastname" placeholder="Required" required>
        </div>

    <!-- Patient's forename -->

    <div class="field-column">
      <label>Forename</label>
       <input type="text"  onfocusout="isOnlyCharacter(this,'Forename')" id="firstname" name="firstname" required>

    </div>

     <!-- NHS number -->

     <div class="field-column">
      <label>NHS number</label>
       <input type="number" onfocusout="isOnlyNumber(this,'NHS number')"  required="" id="nhsnumber" name="nhsnumber" required>

    </div>
     <!-- date of birth -->

     <div class="field-column">
      <label>Date of birth</label>
       <input type = "date" onfocusout="isEmpty(this,'Date of birth')"  id="dob" name = "dob" required>

    </div>
     
     <!-- sex -->

     <div class="field-column">
            <label>Gender</label>
                <input id="gender" type="radio" name="gender" value="m" checked><label id="genderOption">Male</label>
                <input id="gender" type="radio" name="gender" value="f"> <label id="genderOption">Female</label>
               
        </div>
 
     <!-- home address -->

     <div class="field-column">
      <label>Home address</label>
     <textarea name = "address" onfocusout="isEmpty(this,'Home address')" id="address"> </textarea>

    </div>

     <!-- post code -->

     <div class="field-column">
      <label>Postcode</label>
      <textarea name = "postcode" onfocusout="isOnlyNumber(this,'Postcode')"  id="postcode"> </textarea>

    </div>

     <!-- Home telephone number -->

     <div class="field-column">
      <label>Home Phone Number</label>
      <textarea type="number" onfocusout="isOnlyNumber(this,'Home Phone Number')" name="homenumber" id="homenumber"> </textarea>

    </div>
    
     <!-- Mobile telephone number -->
   
     <div class="field-column">
      <label>Mobile Phone Number</label>
      <textarea type="number" onfocusout="isOnlyNumber(this,'Mobile Phone Number')" name="mobilenumber" id="mobilenumber" required> </textarea>

    </div>

     <!-- Patient's GP address -->

     <div class="field-column">
      <label>GP address</label>
       <textarea name = "gpaddress" onfocusout="isEmpty(this,'GP address')" id="gpaddress"> </textarea>

    </div>

     <!-- GP telephone number -->

     <div class="field-column">
      <label>GP phone number</label> <textarea type="number" id="gpnumber" onfocusout="isOnlyNumber(this,'GP phone number')" name="gpnumber"></textarea>

    </div>
     <!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">

     <button type = "button" onclick="validateForm()" name="submit">Submit</button>
</div>

     <!-- reset button -->
     <div class="field-column">
     <button type = "reset" name="reset">Reset</button>
    </div>
</form>


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
        append = true;
        document.getElementById("alert_message").innerHTML = "";
        var lastname = document.getElementById("lastname");

        var firstname = document.getElementById("firstname");
        var nhsnumber = document.getElementById("nhsnumber");
        var dob = document.getElementById("dob");
        var gender = document.getElementById("gender");
        var address = document.getElementById("address");
        var postcode = document.getElementById("postcode");
        var homenumber = document.getElementById("homenumber");
        var mobilenumber = document.getElementById("mobilenumber");
        var gpaddress = document.getElementById("gpaddress");
        var gpnumber= document.getElementById("gpnumber");

        var isOkay = false;
        if(!isOnlyCharacter(lastname,"Surname")){
            isOkay = false;
        }
        if(!isOnlyCharacter(firstname,"Forename")){
            isOkay = false;
        }
        if(!isOnlyNumber(nhsnumber,"NHS Number")){
            isOkay = false;
        }
        if(isEmpty(dob,"DOB")){
            isOkay = false;
        }
        if(isEmpty(address,"Home Address")){
            isOkay = false;
        }
        if(isEmpty(postcode,"Post Code")){
            isOkay = false;
        }
        if(!isOnlyNumber(homenumber,"Home Phone")){
            isOkay = false;
        }
        if(!isOnlyNumber(mobilenumber,"Mobile Phone")){
            isOkay = false;
        }
        if(isEmpty(gpaddress,"GP Address")){
            isOkay = false;
        }
        if(!isOnlyNumber(gpnumber,"GP Phone")){
            isOkay = false;
        }



        if(isOkay){
            document.getElementById("form").submit();
            return true;
        }

        // if(isOnlyCharacter(lastname,"Surname")&&isOnlyCharacter(firstname,"Forename")&&isOnlyNumber(nhsnumber,"NHS Number") &&!isEmpty(dob,"DOB")&&!isEmpty(address,"Home Address") &&!isEmpty(postcode,"Post Code") &&isOnlyNumber(homenumber,"Home Phone") &&isOnlyNumber(mobilenumber,"Mobile Phone") &&!isEmpty(gpaddress,"GP Address") &&isOnlyNumber(gpnumber,"GP Phone") ){
        //     document.getElementById("form").submit();

        //     return true;
        // }
        append = false;
        return false;
    }
</script>
