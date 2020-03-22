<?php

function find_member_by_nhsno($nhs_number) {
    global $db;

    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
    $result = mysqli_query($db, $sql);

    return $result;
}
function insert_member($nhs_number, $first_name, $last_name, $dob, $sex,$email, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number, $accessCode,
 $ref_dr_name,$ref_hospital_name,$reg_surname,$reg_forename,$reg_email) {
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
    if($result) {
        return $result;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_users() {
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_user_by_id($userID) {
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE id='" . $userID . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

function edit_user($id, $new_username,$new_name,$new_surname,$new_email, $new_userLevel) {
    global $db;
    $sql = "UPDATE User SET username='$new_username', name='$new_name',surname='$new_surname',email='$new_email',userLevel='$new_userLevel' WHERE id=$id";
    //$sql = "UPDATE User SET username='$new_username', email='$new_email',userLevel='$new_userLevel' WHERE id=$id";
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

function insert_referral($patient_ID, $consultant_name, $consultant_specialty, $organisation_hospital_name, $organisation_hospital_no,
                         $bleep_number, $is_patient_aware, $is_interpreter_needed,  $interpreter_language, $kch_doc_name, $current_issue,
                         $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations) {
    global $db;
    $sql = "INSERT INTO Referral ";
    $sql .= "(patient_ID, consultant_name, organisation_hospital_name, organisation_hospital_no, 
    bleep_number, is_patient_aware, is_interpreter_needed, interpreter_language, kch_doc_name, current_issue, 
    history_of_present_complaint, family_history, current_feeds, medications, other_investigations) ";
    $sql .= "VALUES (";
    //$sql .= "'" . $ID . "', ";
    $sql .= "'" . $patient_ID . "', ";
    $sql .= "'" . $consultant_name . "', ";
    //$sql .= "'" . $consultant_specialty . "', ";
    $sql .= "'" . $organisation_hospital_name . "', ";

    $sql .= "'" . $organisation_hospital_no . "', ";
    $sql .= "'" . $bleep_number . "', ";
    $sql .= "'" . $is_patient_aware . "', ";
    $sql .= "'" . $is_interpreter_needed . "', ";
    $sql .= "'" . $interpreter_language . "', ";
    //$sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $kch_doc_name . "', ";
    $sql .= "'" . $current_issue . "', ";
    $sql .= "'" . $history_of_present_complaint . "', ";
    $sql .= "'" . $family_history . "', ";
    $sql .= "'" . $current_feeds . "', ";
    $sql .= "'" . $medications . "', ";
    $sql .= "'" . $other_investigations . "'";
    // $sql .= "'" . $datetime . "'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_user_by_username($username) {
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
    if ($result) {
        return true;
        echo '<script>window.location.replace("users.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }}
function delete_user($userID)
{
    global $db;
    $sql = "DELETE FROM User ";
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


function delete_investigation($userID)
{
    global $db;
    $sql = "DELETE FROM Investigations ";
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


function add_user($username,$name,$surname,$email,$password, $userLevel) {
    global $db;
    $MD5Pass = md5($password);
    $sql = "INSERT INTO User VALUES (null, '$username','$MD5Pass','$name','$surname','$email', '$userLevel')";
    echo $sql;
    //$sql = "INSERT INTO User VALUES (null, '$email','$MD5Pass','$username','$userLevel')";
    
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

function find_all_patients() {
    global $db;
    $sql = "SELECT * FROM Patient ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_patient_by_id($ID) {
    global $db;

    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE ID='" . $ID . "'";
    $query = mysqli_query($db, "SELECT * FROM Patient WHERE id = '$ID'") or die(mysqli_error());


    return $query;


}
function find_patient_by_nhsno($nhs_number) {
    global $db;

    $sql = "SELECT * FROM Patient ";
    $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
    $result = mysqli_query($db, $sql);

    return $result;
}
