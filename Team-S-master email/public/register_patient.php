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
                $message .= getMessage($val,"First Name");
                $isValid = false;
            }
        
    $last_name = $_POST["lastname"];
    
     $val = isOnlyCharacter($last_name);
            if($val!=1)
            {
                $message .= getMessage($val,"Last Name");
                $isValid = false;
            }
    
    $date_of_birth = strtotime($_POST["dob"]);
    
    if(!isset($date_of_birth) || empty($date_of_birth)){
                $isValid = false;
                $message .= "Date Of birth can not be empty";
            }

    $dob = date('Y-m-d', $dob);
        
    $home_phone = $_POST["homenumber"];
    
    $val = isOnlyNumber($home_phone);
            if($val!=1)
            {
                $message .= getMessage($val,"Home Phone");
                $isValid = false;
            }

    


    $mobile_phone = $_POST["mobilenumber"];
    $val = isOnlyNumber($mobile_phone);
            if($val!=1)
            {
                $message .= getMessage($val,"Mobile Number");
                $isValid = false;
            }
    

    $postcode = $_POST["postcode"];
    
      if(!isset($postcode) || empty($postcode)){
                $isValid = false;
                $message .= "Postcode can not be empty";
            }
    
    $home_address = $_POST["address"];
      if(!isset($home_address) || empty($home_address)){
                $isValid = false;
                $message .= "Home Address can not be empty";
            }
                
            
    $sex = $_POST["gender"];
      if(!isset($sex) || empty($sex)){
  
                $isValid = false;
                $message .= "sex must mark";
            }
        
    $email = $_POST["email"];
    
    $email = trim($email," ");
    $val = ValidateClientEmail($email);

    if($val!=1)
            {
                echo "not valid email 456";
                $message .= getMessage($val,"Email");
                $isValid = false;
            }
               
    $nhs_number = $_POST["nhsnumber"];
     $val = isOnlyNumber($nhs_number);
            if($val!=1)
            {
                $message .= getMessage($val,"NHS Number");
                $isValid = false;
            }
    
    $gp_address = $_POST["gpaddress"];
    if(!isset($gp_address) || empty($gp_address)){
                $isValid = false;
                $message .= "Gp Address can not be empty";
            }
    
    $gp_number = $_POST["gpnumber"];
     $val = isOnlyNumber($gp_number);
            if($val!=1)
            {
                $message .= getMessage($val,"GP Phone");
                $isValid = false;
            }

    

    $accessCode = rand(0,9999);
    $val = isOnlyNumber($accessCode);
            if($val!=1)
            {
                $message .= getMessage($val,"Access Code");
                $isValid = false;
            }

            
    $reg_surname = $_POST["lastname2"];
     $val = isOnlyCharacter($reg_surname);
        if($val!=1)
        {
            $message .= getMessage($val,"Surname");
            $isValid = false;
        }

    $reg_forename = $_POST["firstname2"];
     $val = isOnlyCharacter($reg_forename);
        if($val!=1)
        {
            $message .= getMessage($val,"Forename");
            $isValid = false;
        }
    
    $reg_email = $_POST["mail2"];
     $val = validateUserEmail($reg_email);
        if($val!=1)
        {
            echo "not valid email 123";
            $message .= getMessage($val,"Email");
            $isValid = false;
        }
    
    $ref_dr_name = $_POST["refname"];
     $val = isOnlyCharacter($ref_dr_name);
        if($val!=1)
        {
            $message .= getMessage($val,"Doctor name");
            $isValid = false;
        }
    
    $ref_hospital_name = $_POST["refhospital"];
     $val = isOnlyCharacter($ref_hospital_name);
        if($val!=1)
        {
            $message .= getMessage($val,"Hospital name");
            $isValid = false;
        }
    

       if ($first_name=="" || $last_name=="" || $nhs_number=="" || $dob=="" || $mobile_phone==""|| $home_phone=="" || $postcode=="" 
            || $home_address=="" || $sex=="" || $email=="" || $gp_address==""|| $gp_number==""
            || $reg_surname=="" || $reg_forename=="" || $reg_email=="" || $ref_dr_name=="" || $ref_hospital_name=="")

            echo '<label class="text-danger">Please fill in all required fields</label>';
   
        else {
            $result = find_member_by_nhsno($nhs_number);
           
                if(mysqli_num_rows($result) > 0) {
                  $mes = '<label class="text-danger">Patient is already registered with us</label>';
                       echo $mes;
                 } 
                else {
                    
                  $result2 = find_patient_by_email($email);
                                
                   if(mysqli_num_rows($result2) > 0) {
                     
                       $mes = '<label class="text-danger">Email Already Exits</label>';
                       echo $mes;
                   }  

                    else { 
                      
                        if($isValid){
                          
                          $result1 = insert_member($nhs_number, $first_name, $last_name, $dob, $sex,$email, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number, $accessCode,
                          $ref_dr_name,$ref_hospital_name,$reg_surname,$reg_forename,$reg_email);

                          $new_id = mysqli_insert_id($db);

                          redirect_to(url_for('InvestigationsNew.php?patient_ID=' . $new_id));
                           
                        }
                        else {
                            echo $message;
                        }
                        
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

    <!-- porforma -->

    <div class="field-column">
      <label>Surname </label>
         <input type="text" onfocusout="isOnlyCharacter(this,'Surname')" id="lastname2" name="lastname2" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
        </div>

    <div class="field-column">
      <label>Forename</label>
       <input type="text" onfocusout="isOnlyCharacter(this,'Forename')" id="firstname2" name="firstname2" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
    </div>

   <div class="field-column">
      <label>Email (@nhs.net)</label> </div>
      <input type="text" id="email" onfocusout="ValidateNHSEmail()" name="mail2" pattern="[a-z0-9._%+-]+@nhs\.net" placeholder="Required" required>

   </div>
   
    <h2> <div>Patient Details(Please complete all fields) </div></h2>

    <div class="field-column">
      <label>Surname</label>
         <input type="text"  onfocusout="isOnlyCharacter(this,'Surname')" id="lastname" name="lastname" placeholder="Required" required>
        </div>

    <!-- Patient's forename -->

    <div class="field-column">
      <label>Forename</label>
       <input type="text"  onfocusout="isOnlyCharacter(this,'Forename')" id="firstname" name="firstname" placeholder="Required"  required>

    </div>

     <!-- NHS number -->

     <div class="field-column">
      <label>NHS number</label>
       <input type="number" onfocusout="isOnlyNumber(this,'NHS number')"   id="nhsnumber" name="nhsnumber" pattern="^\d{10}$" placeholder="Required" required>
    </div>
     <!-- date of birth -->

     <div class="field-column">
      <label>Date of birth</label>
       <input type = "date" onfocusout="isEmpty(this,'Date of birth')"  id="dob" name = "dob" required>

    </div>
     

    <div class="field-column">
      <label>Full Name of Referring Doctor</label>
       <input type="text" onfocusout="isOnlyCharacter(this,'Doctor Name')" id="refname" name="refname" pattern="^[a-z ,.'-]+$" placeholder="Required" required>
    </div>
     
    <div class="field-column">
      <label>Referring Hospital</label>
       <input type="text" onfocusout="isOnlyCharacter(this,'Hospital Name')" id="refhospital" name="refhospital" placeholder="Required" required>
    </div>

     <!-- sex -->

     <div class="field-column">
            <label>Gender</label>
                <input id="gender" type="radio" name="gender" value="m" checked><label id="genderOption">Male</label>
                <input id="gender" type="radio" name="gender" value="f"> <label id="genderOption">Female</label>
               
        </div>
 
    <!-- email -->

   
  <div class="field-column">
      <label>Email</label>
       <input type="text" name="email" onfocusout="ValidateEmail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Required" id="email" required>
    </div>


     <!-- home address -->

     <div class="field-column">
      <label>Home address</label>
     <input name = "address" onfocusout="isEmpty(this,'Home address')" placeholder="Required" id="address" required> </input>

    </div>

     <!-- post code -->

     <div class="field-column">
      <label>Postcode</label>
      <input name = "postcode"  id="postcode" onfocusout="isOnlyNumber(this,'Postcode')" placeholder="Required"    required> </input>

    </div>


     <!-- Home telephone number -->

     <div class="field-column">
      <label>Home Phone Number</label>
      <input type="number" name="homenumber" id="homenumber" placeholder="Required" onfocusout="isOnlyNumber(this,'Home Phone Number')" required>

    </div>
    
     <!-- Mobile telephone number -->
   
     <div class="field-column">
      <label>Mobile Phone Number</label>

      <input type="number" name="mobilenumber" id="mobilenumber" onfocusout="isOnlyNumber(this,'Mobile Phone Number')" placeholder="Required" required>

    </div>

     <!-- Patient's GP address -->

     <div class="field-column">
      <label>GP address</label>
       <input name = "gpaddress" onfocusout="isEmpty(this,'GP address')" id="gpaddress"  placeholder="Required" required> </input>

    </div>


     <!-- GP telephone number -->

     <div class="field-column">

      <label>GP phone number</label> <input type="number" name="gpnumber" id="gpnumber" onfocusout="isOnlyNumber(this,'GP phone number')" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Required" required>
    </div>
     <!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">

     <button type = "button" onclick="validateForm()" name="btnsubmit">Submit</button>
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
            if(r.value.length>30){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have less than equal to 30 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have less than equal to 30 characters";
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
        var regSurname = document.getElementById("lastname2");
        var regForename = document.getElementById("firstname2");
        var regEmail = document.getElementById("mail2");

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
        var gpnumber = document.getElementById("gpnumber");
        var refDoctor = document.getElementById("refname");
        var refHospital = document.getElementById("refhospital");
        
        var isOkay = true;
        if(!isOnlyCharacter(regSurname,"Registering Person Surname")){
            isOkay = false;
        }
        if(!isOnlyCharacter(regForename,"Registering Person Forename")){
            isOkay = false;
        }
        if(!ValidateNHSEmail()){
            isOkay = false;
        }

        if(!isOnlyCharacter(lastname,"Surname")){
            isOkay = false;
        }
        if(!isOnlyCharacter(firstname,"Forename")){
            isOkay = false;
        }
        if(!isOnlyNumber(nhsnumber,"NHS Number") || isNHS(nhsnumber, "NHS number")){
            isOkay = false;
        }
        if(isEmpty(dob,"DOB")){
            isOkay = false;
        }
        if(!isOnlyCharacter(refDoctor,"Referring Doctor Name")){
            isOkay = false;
        }
        if(!isOnlyCharacter(refHospital,"Referring Hospital Name")){
            isOkay = false;
        }
        if(isEmpty(address,"Home Address")){
            isOkay = false;
        }
        if(isEmpty(postcode,"Post Code")){
            isOkay = false;
        }
        if(!ValidateEmail()){
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
          //alert("all good");
            document.getElementById("form").submit();
            return true;
        }
        append = false;
        return false;
    }
</script>
<script type="text/javascript">
    function ValidateNHSEmail() 
    {
        var mail = document.getElementById("email");
        if(!isEmpty(mail,"Registering Person Mail")){
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
