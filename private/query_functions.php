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

// Retrieves all User information
function find_all_users() {
    global $db;
    $sql = "SELECT * FROM User ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
  

  ?>