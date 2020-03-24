<?php require_once('../private/initialise.php'); ?>
<div class="public">
<?php $page_title = 'Log in'; ?>
  <?php include(SHARED_PATH . '/validation.php'); ?>


<?php include(SHARED_PATH . '/header.php'); ?>

<?php
 $message = "";
        $isValid = true;
if(is_post_request()) {

  $username = $_POST["username"]; 
  if(!isset($username) || empty($username)){
                $isValid = false;
                $message += "Username can not be empty";
            }
  $password = $_POST["password"];
if(!isset($password) || empty($password)){
                $isValid = false;
                $message += "Password can not be empty";
            }
  if(isset($username) && isset($password)) {

    $user = find_user_by_username($username);

    // User exists
    if($user) {
    
      if(password_verify($password, $user['password'])) {
      
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

  } 
  else {
    echo "Please check your username and password.";
  }
    
}
?>

<h1>LOG IN</h1>
   <form name="frmRegistration" id="form" method="post" action="<?php url_for("/login.php?")?>" >
              <div class="form-group" align="center">
              <span id="alert_message" style="color:red"></span>

                
        <div class="field-column">
            <label>Username</label>
            <input type="text" class="demo-input-box"  required="" onfocusout="isEmpty(this,'Username')" id="username" name="username" value="">
        </div>
        
        <div class="field-column">
            <label>Password</label>
            <input type="password" class="demo-input-box" onfocusout="isEmpty(this,'Password')" required="" id="password" name="password" value="">
        </div><br>
        <div class="field-column">
            <input type="button" onclick="validateForm()" name="register-user" value="Sign in" class="btnRegister">
        </div>
      </div>

       </div>
    </form>
</div>

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
    function validateForm(){
        document.getElementById("alert_message").innerHTML = ""
        append = true;
        var username = document.getElementById("username");
        var password = document.getElementById("password");
        
        var isOkay = true;
        if(isEmpty(username,"Username")){
            isOkay =false;
        }
        if(isEmpty(password,"Password")){
            isOkay = false;
        }

        if(isOkay){
            document.getElementById("form").submit();

            return true;
        }
        return false;
    }
</script>
