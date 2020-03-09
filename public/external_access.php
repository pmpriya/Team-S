<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php $page_title = 'Log in'; ?>
        <?php include(SHARED_PATH . '/header.php'); ?>

        <?php
        if(is_post_request()) {

            $dob = $_POST["dob"];
            $postcode = $_POST["postcode"];

            if (isset($dob) && isset($postcode)) {

                $patient = access_investigation($dob, $postcode);

                // User exists
                if ($patient) {


                    grant_external_access($dob, $postcode);
                    redirect_to(url_for('external_investigation.php?id='));

                } else {
                    echo "Please check your details";
                }

            }
        }
        ?>

        <h1>LOG IN</h1>
       <?php $patient = access_investigation2("2020-03-27", "SE14XA");?>
        <form name="frmRegistration" method="post" action="<?php url_for("/login.php?")?>">

            <div class="field-column">
                <label>DOB: </label>
                <input type="text" class="demo-input-box" name="dob" value="">
            </div>

            <div class="field-column">
                <label>Postcode</label>
                <input type="password" class="demo-input-box" name="postcode" value="">
            </div><br>
            <div class="field-column">
                <input type="submit" name="register-user" value="Access" class="btnRegister">
            </div>

    </div>
    </form>
    </div>

            <?php include(SHARED_PATH . '/footer.php'); ?>