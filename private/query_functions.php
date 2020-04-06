<?php
 
function find_member_by_nhsno($nhs_number) 
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_referral_by_id($id){

    global $db;
    $sql = "SELECT * FROM Referral ";
    $sql .="WHERE ID='" . $id . "' ";
    $result = mysqli_query($db, $sql);
    return $result;
} 

function get_all_patients()
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_referrals_by_id($patient_ID)
{
    global $db;  
    $sql = "SELECT * FROM Referral ";
    $sql .= "WHERE patient_ID ='" . $patient_ID . "'";
  
    $result = mysqli_query($db, $sql);
 
    return $result;
   
}

function insert_member($nhs_number, $first_name, $last_name, $dob, $sex,$email, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number, $accessCode,
$ref_dr_name,$ref_hospital_name,$reg_surname,$reg_forename,$reg_email) 
{
    global $db;
    $sql = "INSERT INTO Patient ";
    $sql .= "(nhs_number, first_name, last_name, date_of_birth, email, sex, home_address, postcode, home_phone, mobile_phone, gp_address,
    gp_phone, accessCode, referring_doctor_name, referring_hospital, person_registering_surname, person_registering_forename, person_registering_email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $first_name . "', ";
    $sql .= "'" . $last_name . "', ";
    $sql .= "'" . $dob . "', ";
    $sql .= "'" . $email . "', ";
    $sql .= "'" . $sex . "', ";
    $sql .= "'" . $home_address . "', ";
    $sql .= "'" . $postcode . "', ";
    $sql .= "'" . $home_phone . "', ";
    $sql .= "'" . $mobile_phone . "', ";
    $sql .= "'" . $gp_address . "', ";
    $sql .= "'" . $gp_number . "', ";
    $sql .= "'" . $accessCode . "', ";
    $sql .= "'" . $ref_dr_name . "', ";
    $sql .= "'" . $ref_hospital_name . "', ";
    $sql .= "'" . $reg_surname . "', ";
    $sql .= "'" . $reg_forename . "', ";
    $sql .= "'" . $reg_email . "'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db, $sql);
   

    $subject = 'Signup verification'; 
    $message = '
     
    Thanks for signing up!
    Your account has been created, you can now login with your username and password with the credentials below:
     
    ------------------------
    Username: '.$first_name.'
    Password: '.$accessCode.'
    ------------------------
     
    Please log in to your account:
    http://kingshospitallondon.herokuapp.com/login.php
     
    ';
    echo $message;
    send_email($email,$subject,$message);
    
    if($result) {
        return $result;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function find_all_users() 
{
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_user_by_id($userID) 
{
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE id='" . $userID . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function edit_user($id, $new_username,$new_name,$new_surname,$new_email, $new_userLevel) 
{
    global $db;
    $sql = "UPDATE User SET username='$new_username', name='$new_name',surname='$new_surname',email='$new_email',userLevel='$new_userLevel' WHERE id=$id";
    //$sql = "UPDATE User SET username='$new_username', email='$new_email',userLevel='$new_userLevel' WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if($result) 
    {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } 
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_referral($patient_ID, $consultant_name, $consultant_specialty, $organisation_hospital_name, $organisation_hospital_no, $referring_name, 
$bleep_number, $is_patient_aware, $is_interpreter_needed, $interpreter_language, $kch_doc_name, $current_issue, 
$history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations,$date) 
{
    global $db;
    $sql = "INSERT INTO Referral ";
    $sql .= "(patient_ID, consultant_name,consultant_specialty, organisation_hospital_name, organisation_hospital_no, referring_name,
             bleep_number, is_patient_aware, is_interpreter_needed, interpreter_language, kch_doc_name, current_issue, 
             history_of_present_complaint, family_history, current_feeds, medications, other_investigations,date) ";
    $sql .= "VALUES (";
    $sql .= "'" . $patient_ID . "', ";
    $sql .= "'" . $consultant_name . "', ";
    $sql .= "'" . $consultant_specialty . "', ";
    $sql .= "'" . $organisation_hospital_name . "', ";
    $sql .= "'" . $organisation_hospital_no . "', ";
    $sql .= "'" . $referring_name . "', ";
    $sql .= "'" . $bleep_number . "', ";
    $sql .= "'" . $is_patient_aware . "', ";
    $sql .= "'" . $is_interpreter_needed . "', ";
    $sql .= "'" . $interpreter_language . "', ";
    $sql .= "'" . $kch_doc_name . "', ";
    $sql .= "'" . $current_issue . "', ";
    $sql .= "'" . $history_of_present_complaint . "', ";
    $sql .= "'" . $family_history . "', ";
    $sql .= "'" . $current_feeds . "', ";
    $sql .= "'" . $medications . "', ";
    $sql .= "'" . $other_investigations . "', ";
    $sql .= "'" . $date . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_user_by_username($username) 
{
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE username='" . $username . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;
}

function edit_password($id, $new_password)
{
    global $db;
    $MD5Pass = md5($new_password);
    $sql = "UPDATE User SET password='$MD5Pass' WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if ($result) 
    {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    }
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
    
function delete_user($userID)
{
    global $db;
    $sql = "DELETE FROM User ";
    $sql .= "WHERE id='" . db_escape($db, $userID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) 
    {
        return true;
    } 
    else 
    {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_investigation($userID)
{
    global $db;
    $sql = "DELETE FROM Investigations ";
    $sql .= "WHERE id='" . db_escape($db, $userID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) 
    {
        return true;
    } 
    else 
    {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_patient_by_id($ID) 
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE ID='" . $ID . "'";
    $query = mysqli_query($db, "SELECT * FROM Patient WHERE id = '$ID'") or die(mysqli_error());
    return $query;
}

function find_patient_by_nhsno($nhs_number) 
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_patient_by_email($email) 
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE '" . $email . "' ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_patient_by_nhsno_and_accesscode($nhsno, $accessCode) 
{
    global $db;
    $sql = "SELECT * FROM Patient";
    $sql .= " WHERE nhs_number='" . $nhsno . "'";
    $sql .= " AND accessCode='" . $accessCode . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_all_referrals() 
{
    global $db;
    $sql = "SELECT * FROM Referral ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function delete_patient($userID)
{
    global $db;
    $sql = "DELETE FROM Patient ";
    $sql .= "WHERE id='" . db_escape($db, $userID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
    
function add_user($username,$name,$surname,$email,$password, $userLevel) 
{
    global $db;
    $MD5Pass = md5($password);
    $sql = "INSERT INTO User VALUES (null, '$username','$MD5Pass','$name','$surname','$email', '$userLevel')";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_patients() 
{
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function edit_patient($id, $new_nhs_number, $new_first_name, $new_last_name, $new_date_of_birth,$new_sex,$new_email,$new_home_address,$new_postcode,$new_home_phone,$new_mobile_phone,$new_gp_address,$new_gp_phone,$new_accessCode)
{
    global $db;
    $sql = "UPDATE `Patient` SET `nhs_number`='$new_nhs_number',`first_name`='$new_first_name',`last_name`='$new_last_name',`date_of_birth`='$new_date_of_birth',`sex`='$new_sex',`email`='$new_email',`home_address`='$new_home_address',`postcode`='$new_postcode',`home_phone`='$new_home_phone',`mobile_phone`='$new_mobile_phone',`gp_address`='$new_gp_address',`gp_phone`='$new_gp_phone',`accessCode`='$new_accessCode' WHERE ID=$id";
    echo($sql);
    $result = mysqli_query($db, $sql);
    if ($result) 
    {
        return true;
        echo '<script>window.location.replace("patients.php"); </script>';
        header('users.php');
    } 
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function edit_referral($ID, $new_consultant_name, $new_consultant_speciality, $new_organisation_name, $new_organisation_hospital_no, 
$new_bleepnumber, $new_parent_aware, $new_interpreter_needed, $new_kch_doctor_name, $new_date_time, $new_current_issue, 
$new_history_of_present_complaint, $new_family_history, $new_medications, $new_other_investigations) 
{
    global $db;
    $sql = "UPDATE `Referral` SET `consultant_name`='$new_consultant_name',
    `consultant_speciality`='$new_consultant_speciality',`organisation_name`='$new_organisation_name',
    `organisation_hospital_no`='$new_organisation_hospital_no',`bleepnumber`='$new_bleepnumber',
    `parent_aware`='$new_parent_aware',`interpreter_needed`='$new_interpreter_needed',`kch_doctor_name`='$new_kch_doctor_name',
    `date_time`='$new_date_time', `current_issue` = '$new_current_issue', `history_of_present_complain` = '$new_history_of_present_complaint',
    `family_history`='$new_family_history', `current_issue` = '$new_current_issue',`medications` = '$new_medications', `other_investigations` = '$new_other_investigations',
    WHERE ID=$ID";
    echo($sql);
    $result = mysqli_query($db, $sql);
    if($result) 
    {
        return true;
        echo '<script>window.location.replace("referral_page.php"); </script>';
        header('users.php');
    } 
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
        
function delete_referral($referralID)
{
    global $db;
    $sql = "DELETE FROM Referral ";
    $sql .= "WHERE ID='" . db_escape($db, $referralID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) 
    {
        return true;
    } 
    else 
    {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
        

function insert_investigation($patient_ID, $date, $BiliTD, $AST, $ALT, $ALP, $GGT, $Prot, $Alb, $CK, $HbHct, $WCC, $Neutro, $Platelets, $CRP, $ESR, $PTINR, $APTR, $Fibrinogen, $Cortisol, $Urea, $Creatinine)
{
    global $db;
    // $errors = validate_investigation($investigation);
    // if(!empty($errors)){
    //   return $errors;
    // }
    $sql = "INSERT INTO Investigations (patient_ID, `date`, BiliTD, AST, ALT, ALP, GGT, Prot, Alb, CK, HbHct, WCC, Neutro, Platelets, CRP, ESR, PTINR, APTR, Fibrinogen, Cortisol, Urea, Creatinine) VALUES ('$patient_ID', '$date', '$BiliTD', '$AST', '$ALT', '$ALP', '$GGT', '$Prot', '$Alb', '$CK','$HbHct','$WCC','$Neutro','$Platelets', '$CRP', '$ESR', '$PTINR', '$APTR', '$Fibrinogen', '$Cortisol', '$Urea', '$Creatinine')";
    //remove spaces
    $result = mysqli_query($db, $sql);
    if($result) 
    {

        return true;
    } 
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
    
function edit_investigation($id, $new_date, $new_BiliTD, $new_AST, $new_ALT, $new_ALP, $new_GGT, $new_Prot, $new_Alb, $new_CK, $new_HbHct, $new_WCC, $new_Neutro, $new_Platelets, $new_CRP, $new_ESR, $new_PTINR, $new_APTR, $new_Fibrinogen, $new_Cortisol, $new_Urea, $new_Creatinine) 
{
    global $db;
    $sql = "UPDATE Investigations SET date='$new_date', BiliTD='$new_BiliTD',AST='$new_AST',ALT='$new_ALT',ALP='$new_ALP',GGT='$new_GGT', Prot='$new_Prot',Alb='$new_Alb',CK='$new_CK',HbHct='$new_HbHct',WCC='$new_WCC', Neutro='$new_Neutro',Platelets='$new_Platelets',CRP='$new_CRP',ESR='$new_ESR',PTINR='$new_PTINR', APTR='$new_APTR',Fibrinogen='$new_Fibrinogen',Cortisol='$new_Cortisol',Urea='$new_Urea',Creatinine='$new_Creatinine' WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if($result) 
    {
        return true;
        echo '<script>window.location.replace("index.php"); </script>';
        header('users.php');
    } 
    else 
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function access_investigation($ID) 
{
    global $db;
    $sql = "SELECT * FROM Investigations WHERE patient_ID='$ID'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function access_referral($ID) 
{
    global $db;
    $sql = "SELECT * FROM Referral WHERE patient_ID='$ID'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_all_investigations()
{
    global $db;
    $sql = "SELECT * FROM Investigations ";
    $sql .= "ORDER BY patient_ID ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_investigations_by_id($id) 
{
    global $db;
    $sql = "SELECT * FROM Investigations ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_investigations_by_date($patient_ID, $date) 
{
    global $db;
    $sql = "SELECT * FROM Investigations ";
    $sql .= "WHERE patient_ID='" . $patient_ID . "' AND date='" . $date . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_investigations_by_patientid($patient_ID)
{
    global $db;
    $sql = "SELECT * FROM Investigations ";
    $sql .= "WHERE patient_id='" . $patient_ID . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_investigation_dates_of_id($patient_ID)
{
    global $db;
    $sql = "SELECT date FROM Investigations ";
    $sql .= "WHERE patient_ID =' " . db_escape($db, $patient_ID) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $investigation = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    echo $sql;
    return $investigation;
}

function validate_investigation($investigation)
{
    global $db;
    $errors = [];
    if (is_blank($investigation['date']))
    {
        $errors[] = "Date cannot be empty!";
    }
    //validate type of rest AST...
    return $errors;
}

function search_by_username($user_name) 
{
    global $db;
    $sql = "SELECT * FROM User WHERE username LIKE '%".$user_name."%'";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function search_by_dob($date_of_birth) 
{
    global $db;
    $sql = "SELECT * FROM Patient WHERE date_of_birth LIKE '%".$date_of_birth."%'";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
?>
