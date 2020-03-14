<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];

    $dob = strtotime($_POST["dob"]);
    $dob = date('Y-m-d', $dob);
    $home_phone = $_POST["homenumber"];
    $mobile_phone = $_POST["mobilenumber"];
    $postcode = $_POST["postcode"];
    $home_address = $_POST["address"];
    $sex = $_POST["gender"];
    $email = $_POST["email"];
    $nhs_number = $_POST["nhsnumber"];
    $gp_address = $_POST["gpaddress"];
    $gp_number = $_POST["gpnumber"];

    if ($first_name=="" || $last_name=="" || $nhs_number=="" || $dob=="" || $mobile_phone==""|| $home_phone=="" || $postcode=="" || $home_address=="" || $sex=="" || $email=="" || $gp_address==""|| $gp_number=="")

             echo '<label class="text-danger">Please fill in all required fields</label>';
        
    else{
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
                     
                        $result1 = insert_member($nhs_number, $first_name, $last_name, $dob,$sex, $email, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number);
                    
                        redirect_to(url_for('referring_organisation.php'));
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

<h2> <div>Details of the person registering the patient(Please complete all fields) </div></h3>
    <br>

    <form action="<?php echo url_for("/register_patient.php"); ?>" method="post">
        <!-- porforma -->

        <div class="field-column">
            <label>Surname </label>
            <input type="text" name="lastname2" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
        </div>

        <!--  forename -->

        <div class="field-column">
            <label>Forename</label>
            <input type="text" name="firstname2" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
        </div>


        <div class="field-column">
            <label>Email</label>
            <input type="text" name="mail2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Required" required>
        </div>



        <h2> <div>Patient Details(Please complete all fields) </div></h3>

            <br>
            <!--<form class = "form" action="contactform.php" method="post">  -->

            <!-- patient details form -->

            <!-- Patient's Surname -->
            <div class="field-column">
                <label>Surname</label>
                <input type="text" name="lastname" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
            </div>

            <!-- Patient's forename -->

            <div class="field-column">
                <label>Forename</label>
                <input type="text" name="firstname" pattern="[A-Za-z]{1,32}" placeholder="Required" required>
            </div>

            <!-- NHS number -->

            <div class="field-column">
                <label>NHS number</label>
                <input type="number" name="nhsnumber" placeholder="Required" required>
            </div>
            <!-- date of birth -->

            <div class="field-column">
                <label>Date of birth</label>
                <input type = "date" name = "dob" placeholder="Required" required>
            </div>

            <div class="field-column">
                <label>Full Name of Referring Doctor</label>
                <input type="text" name="refname" pattern="^(\w\w+)\s(\w+)$" placeholder="Required" required>
            </div>

            <div class="field-column">
                <label>Referring Hospital</label>
                <input type="text" name="refhospital" placeholder="Required" required>
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
                <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Required" required>

            </div>

            <!-- home address -->

            <div class="field-column">
                <label>Home address</label>
                <input type = "textarea" name = "address" placeholder="Required" required>
            </div>

            <!-- post code -->

            <div class="field-column">
                <label>Postcode</label>
                <input type="text" name="postcode" placeholder="Required" required>
            </div>

            <!-- Home telephone number -->

            <div class="field-column">
                <label>Home Phone Number</label>
                <input type="number" name="homenumber" placeholder="Required" required>
            </div>

            <!-- Mobile telephone number -->

            <div class="field-column">
                <label>Mobile Phone Number</label>
                <input type="number" name="mobilenumber" placeholder="Required" required>
            </div>

            <!-- Patient's GP address -->

            <div class="field-column">
                <label>GP address</label>
                <input type="text" name="gpaddress" placeholder="Required" required>
            </div>

            <!-- GP telephone number -->

            <div class="field-column">
                <label>GP phone number</label> <input type="number" name="gpnumber" placeholder="Required" required>
            </div>
            <!-- submit -->
            <!--<input type ="submit" name="submit"> -->
            <div class="field-column">
                <button type = "submit" name="submit">Submit</button>

            </div>
            <!-- reset button -->
            <div class="field-column">
                <button type = "reset" name="reset">Reset</button>
            </div>
    </form>


<?php include(SHARED_PATH . '/footer.php'); ?>
