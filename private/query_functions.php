<?php
 function find_member_by_nhsno($nhs_number) {
  global $db;

  $sql = "SELECT * FROM Patient ";
  $sql .= "WHERE nhs_number='" . $nhs_number . "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $member = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $member;
}
function insert_member($firstname, $lastname, $dob,$nhsnumber, $mobilephone,$homephone, $address, $gender,$nhs_number,$gp_address,$gp_number) {
    global $db;

    $sql = "INSERT INTO Patient ";
    $sql .= "(firstname, lastname, dob, phone, address, gender, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $firstname . "', ";
    $sql .= "'" . $lastname . "', ";
    $sql .= "'" . $dob . "', ";
    $sql .= "'" . $nhsnumber . "', ";
    $sql .= "'" . $mobilephone . "', ";
    $sql .= "'" . $homephone . "', ";
    $sql .= "'" . $address . "', ";
    $sql .= "'" . $gender . "', ";
    $sql .= "'" . $nhs_number . "', ";
    $sql .= "'" . $gp_address . "', ";
    $sql .= "'" . $gp_number . "', ";
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

  ?>