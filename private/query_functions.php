<?php
 function find_member_by_nhsno($nhs_number) {
  global $db;

  $sql = "SELECT * FROM Patient ";
  $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
  $result = mysqli_query($db, $sql);
 
  return $result;
}
function insert_member($nhs_number, $first_name, $last_name, $dob, $sex, $home_address, $postcode, $home_phone, $mobile_phone, $gp_address, $gp_number) {
    global $db;

    $sql = "INSERT INTO Patient ";
    $sql .= "(nhs_number, first_name, last_name, date_of_birth, sex, home_address, postcode, home_phone, mobile_phone, gp_address, gp_phone) ";
    $sql .= "VALUES (";
    $sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $first_name . "', ";
    $sql .= "'" . $last_name . "', ";
    $sql .= "'" . $dob . "', ";
    $sql .= "'" . $sex . "', ";
 
    $sql .= "'" . $home_address . "', ";
    $sql .= "'" . $postcode . "', ";
    $sql .= "'" . $home_phone . "', ";
    $sql .= "'" . $mobile_phone . "', ";
    //$sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $gp_address . "', ";
    $sql .= "'" . $gp_number . "'";
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


function add_user($username,$name,$surname,$email,$password, $userLevel) {
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

function find_all_patients() {
    global $db;
    $sql = "SELECT * FROM Patient ";
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


function edit_patient($id, $new_nhs_number, $new_first_name, $new_last_name, $new_date_of_birth,$new_sex,$new_home_address,$new_postcode,$new_home_phone,$new_mobile_phone,$new_gp_address,$new_gp_phone) {
    global $db;
    $sql = "UPDATE `Patient` SET `nhs_number`='$new_nhs_number',`first_name`='$new_first_name',`last_name`='$new_last_name',`date_of_birth`='$new_date_of_birth',`sex`='$new_sex',`home_address`='$new_home_address',`postcode`='$new_postcode',`home_phone`='$new_home_phone',`mobile_phone`='$new_mobile_phone',`gp_address`='$new_gp_address',`gp_phone`='$new_gp_phone' WHERE ID=$id";
    echo($sql);
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
        echo '<script>window.location.replace("patients.php"); </script>';
        header('users.php');
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
     
     

    function insert_referral($patient_ID,$consultant_name, $consultant_specialty, $organisation_hospital_name, $organisation_hospital_number, 
                                    $bleep_number,  $interpreter_language, $kch_doc_name, $current_issue, 
                                    $history_of_present_complaint, $family_history, $current_feeds, $medications, $other_investigations) {
                global $db;
            
                $sql = "INSERT INTO Referral ";
                $sql .= "(patient_ID, consultant_name, consultant_specialty, organisation_hospital_name, organisation_hospital_no, 
                bleep_number, is_patient_aware, is_interpreter_needed, interpreter_language, kch_doc_name, current_issue, 
                        history_of_present_complaint, family_history, current_feeds, medications, other_investigations) ";
                $sql .= "VALUES (";
                //$sql .= "'" . $ID . "', ";
                $sql .= "'" . $patient_ID . "', ";
                $sql .= "'" . $consultant_name . "', ";
                $sql .= "'" . $consultant_specialty . "', ";
                $sql .= "'" . $organisation_hospital_name . "', ";
             
                $sql .= "'" . $organisation_hospital_number . "', ";
                $sql .= "'" . $bleep_number . "', ";
               // $sql .= "'" . $is_patient_aware . "', ";
               // $sql .= "'" . $is_interpreter_needed . "', ";
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
                $result = mysqli_query($db, $sql);
                if($result) {
                  return true;
                } else {
                  echo mysqli_error($db);
                  db_disconnect($db);
                  exit;
                }
          }
        
        function find_all_referrals(){
            global $db;
            $sql = "SELECT * FROM Referral ";
            $sql .= "ORDER BY id ASC";
            $result = mysqli_query($db, $sql);
            confirm_result_set($result);
            return $result;     
        }
        function edit_referral($ID, $new_consultant_name, $new_consultant_speciality, $new_organisation_name, $new_organisation_hospital_no, 
        $new_bleepnumber, $new_parent_aware, $new_interpreter_needed, $new_kch_doctor_name, $new_date_time, $new_current_issue, 
        $new_history_of_present_complaint, $new_family_history, $new_medications, $new_other_investigations) {
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
            if($result) {
                return true;
            echo '<script>window.location.replace("referral_page.php"); </script>';
            header('users.php');
        } else {
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
                if ($result) {
                    return true;
                } else {
                    // DELETE failed
                    echo mysqli_error($db);
                    db_disconnect($db);
                    exit;
                }
            }
            
}
  ?>


