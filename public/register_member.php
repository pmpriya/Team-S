<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {
    
    $firstname = $_POST["firstname"]; 
    $lastname = $_POST["lastname"];
    
    $dob = strtotime($_POST["dob"]);
    $dob = date('Y-m-d', $dob);
    $home_phone = $_POST["homenumber"];
    $mobile_phone = $_POST["mobilenumber"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $nhs_number = $_POST["nhsnumber"];
    $gp_address = $_POST["gpaddress"];
    $gp_number = $_POST["gpnumber"];

   // if(email_blacklisted($email)) {

      //  echo '<label class="text-danger">You are not allowed to sign-up!</label>';

   // } else {
    
        if(count(array_filter($_POST))!=count($_POST)){
            
            echo '<label class="text-danger">Please fill in all required fields</label>';
        }
           
        
        else {
           // $resulte = find_member_by_email($email);
           // list($usr, $domain) = explode('@', $email);

           // if (!($domain == 'kcl.ac.uk')) {
                // use gmail
              //  echo '<label class="text-danger">This is not a valid Kings College London email (@kcl.ac.uk domain)</label>';
           // } else {
                
                //if(mysqli_num_rows($resulte) > 0) {
                 //   $mes = '<label class="text-danger">Email Already Exits</label>';
                 //   echo $mes;
              //  } else { 
                    //$result = insert_member($firstname, $lastname, $dob, $phone, $address, $gender, $email);
                    //$new_id = mysqli_insert_id($db);
                    redirect_to(url_for('referring_organisation.php?id=' . $new_id));
                }
            
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Referral Form</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
<body>
    <h1><b>PATIENT REGISTRATION</b></h1>

<h3> <div>Patient Details(Please complete all fields) </div></h3>
<h3><b><div> Referral is NOT accepted without filling ALL Fields in this page </div></b></h3>
<br>
<!--<form class = "form" action="contactform.php" method="post">  -->
    <!-- patient details form -->
    <form action="<?php echo url_for("/register_member.php"); ?>" method="post">    <!-- Patient's Surname -->
      <div class="field-column">
      <label>Surname</label>
         <input type="text" name="lastname" placeholder="Required" required>
        </div>
    <!-- Patient's forename -->
    <div class="field-column">
      <label>Forename</label>
       <input type="text" name="firstname" >
    </div>
     <!-- NHS number -->
     <div class="field-column">
      <label>NHS number</label>
       <input type="number" name="nhsnumber" required>
    </div>
     <!-- date of birth -->
     <div class="field-column">
      <label>Date of birth</label>
       <input type = "date" name = "dob" required>
    </div>
     
     <!-- sex -->
     <div class="field-column">
      <label>Gender</label>
     Male : <input type = "radio" name="gender" value="Male">
     Female : <input type = "radio" name="gender" value="Female">
     </div>
 
     <!-- home address -->
     <div class="field-column">
      <label>Home address</label>
     <textarea name = "address"> </textarea>
    </div>
     <!-- post code -->
     <div class="field-column">
      <label>Postcode</label>
      <textarea name = "address"> </textarea>
    </div>
     <!-- Home telephone number -->
     <div class="field-column">
      <label>Home Phone Number</label>
      <input type="number" name="homenumber">
    </div>
    
     <!-- Mobile telephone number -->
   
     <div class="field-column">
      <label>Postcode</label>
      <input type="number" name="mobilenumber" required>
    </div>
     <!-- Patient's GP address -->
     <div class="field-column">
      <label>GP address</label>
       <textarea name = "gpaddress"> </textarea>
    </div>
     <!-- GP telephone number -->
     <div class="field-column">
      <label>GP phone number</label> <input type="number" name="gpnumber">
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

