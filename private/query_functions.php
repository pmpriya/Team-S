<?php
function get_all_userIds(){
    global $db;
  
    $sql = "SELECT id FROM Patient ";
    
    $result = mysqli_query($db, $sql);
    return $result;
  }
  
  
  function find_all_investigations(){
    global $db;
  
    $sql = "SELECT * FROM Investigations ";
    $sql = "ORDER BY patient_ID ASC";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
  
  function find_investigations_by_id($patient_ID){
    global $db;
  
    $sql = "SELECT * FROM Investigations ";
    $sql = "WhHERE patient_ID =' " . db_escape($db, $patient_ID);
    $sql = "ORDER BY patient_ID ASC";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $investigation = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    return $investigation;
  }
  
  function find_investigation_dates_of_id($patient_ID){
    global $db;
  
    $sql = "SELECT date FROM Investigations ";
    $sql = "WhHERE patient_ID =' " . db_escape($db, $patient_ID);
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $investigation = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    return $investigation;
  }
  
  function validate_investigation($investigation){
    global $db;
  
    $errors = [];
  
    if (is_blank($investigation['date'])){
      $errors[] = "Date cannot be empty!";
    }
    //validate type of rest AST...
    return $errors;
  }
  
  function insert_investigation($investigation){
    global $db;
  
    $errors = validate_investigation($investigation);
    if(!empty($errors)){
      return $errors;
    }
  
    $sql = "INSERT INTO Investigations ";
    $sql .= "(id, patient_ID, date, Bili T/D, AST, ALT, ALP, GGT, Prot, Alb, CK, Hb/Hct, WCC, Neutro, Platelets, CRP, ESR, PT/INR, APTR, Fibrinogen, Cortisol, Urea, Creatinine) ";
    $sql .= "VALUES (";
    $sql .= " ' " . db_escape($db, $investigation['id']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['patient_ID']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['date']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Bili T/D']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['AST']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['ALT']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['ALP']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['GGT']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Prot']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Alb']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['CK']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Hb/Hct']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['WCC']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Neutro']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Platelets']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['CRP']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['ESR']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['PT/INR']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['APTR']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Fibrinogen']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Cortisol']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Urea']) . "', ";
    $sql .= " ' " . db_escape($db, $investigation['Creatinine']) . "'";
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
  
  function update_investigation($investigation){
    global $db;
  
    $errors = validate_investigation($investigation);
    if(!empty($errors)){
      return $errors;
    }
  
    $sql = "UPDATE Investigations SET ";
    $sql .= "patient_ID= ' " . db_escape($db, $investigation['patient_ID']) . "', ";
    $sql .= "date= ' " . db_escape($db, $investigation['date']) . "', ";
    $sql .= "Bili T/D= ' " . db_escape($db, $investigation['Bili T/D']) . "', ";
    $sql .= "AST= ' " . db_escape($db, $investigation['AST']) . "', ";
    $sql .= "ALT= ' " . db_escape($db, $investigation['ALT']) . "', ";
    $sql .= "ALP= ' " . db_escape($db, $investigation['ALP']) . "', ";
    $sql .= "GGT= ' " . db_escape($db, $investigation['GGT']) . "', ";
    $sql .= "Prot= ' " . db_escape($db, $investigation['Prot']) . "', ";
    $sql .= "Alb= ' " . db_escape($db, $investigation['Alb']) . "', ";
    $sql .= "CK= ' " . db_escape($db, $investigation['CK']) . "', ";
    $sql .= "Hb/Hct= ' " . db_escape($db, $investigation['Hb/Hct']) . "', ";
    $sql .= "WCC= ' " . db_escape($db, $investigation['WCC']) . "', ";
    $sql .= "Neutro= ' " . db_escape($db, $investigation['Neutro']) . "', ";
    $sql .= "Platelets= ' " . db_escape($db, $investigation['Platelets']) . "', ";
    $sql .= "CRP= ' " . db_escape($db, $investigation['CRP']) . "', ";
    $sql .= "ESR= ' " . db_escape($db, $investigation['ESR']) . "', ";
    $sql .= "PT/INR= ' " . db_escape($db, $investigation['PT/INR']) . "', ";
    $sql .= "APTR= ' " . db_escape($db, $investigation['APTR']) . "', ";
    $sql .= "Fibrinogen= ' " . db_escape($db, $investigation['Fibrinogen']) . "', ";
    $sql .= "Cortisol= ' " . db_escape($db, $investigation['Cortisol']) . "', ";
    $sql .= "Urea= ' " . db_escape($db, $investigation['Urea']) . "', ";
    $sql .= "Creatinine= ' " . db_escape($db, $investigation['Creatinine']) . "' ";
    $sql .= "WHERE id= ' " . db_escape($db, $investigation['id']) . " AND " ."date= ' " . db_escape($db, $investigation['date']) . "' ";
    
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  
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


}
  ?>


