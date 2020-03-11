<?php require_once('../private/initialise.php'); ?>
<div class="public">
<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {

  $username = $_POST["username"]; 
  $password = $_POST["password"];

  if(isset($username) && isset($password)) {

    $user = find_user_by_username($username);

    // User exists
    if($user) {
    
      if(md5($password)===$user['password']) {
      
        log_in_user($user);
        redirect_to(url_for('patients.php'));
      }
      else {
        echo "Incorrect password.";
      }
    }
    else {
      echo "Incorrect username.";
    }

  } else {
    echo "Please check your username and password.";
  }
    
}
?>

<h1>LOG IN</h1>
    <form name="frmRegistration" method="post" action="<?php url_for("/login.php?")?>">
                
        <div class="field-column">
            <label>Username</label>
            <input type="text" class="demo-input-box" name="username" value="">
        </div>
        
        <div class="field-column">
            <label>Password</label>
            <input type="password" class="demo-input-box" name="password" value="">
        </div><br>
        <div class="field-column">
            <input type="submit" name="register-user" value="Sign in" class="btnRegister">
        </div>

       </div>
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
