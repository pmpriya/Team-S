<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php $page_title = 'Log in'; ?>
        <?php include(SHARED_PATH . '/header.php'); ?>

        <?php
        if(is_post_request()) {

            $nhsno = $_POST["nhsno"];
            $accessCode = $_POST["accessCode"];

            if (isset($nhsno) && isset($accessCode)) {

                $patient = access_investigation($nhsno, $accessCode);

                // User exists
                if ($patient) {


                    grant_external_access($nhsno, $accessCode);
                    redirect_to(url_for('externalOverview.php'));

                } else {
                    echo "Please check your details";
                }

            }
        }
        ?>

        <h1>LOG IN</h1>
        <form name="frmRegistration" method="post" action="<?php url_for("/external_access.php")?>">

            <div class="field-column">
                <label>NHS Number: </label>
                <input type="text" class="demo-input-box" name="nhsno" value="">
            </div>

            <div class="field-column">
                <label>Access Code</label>
                <input type="password" class="demo-input-box" name="accessCode" value="">
            </div><br>
            <div class="field-column">
                <input type="submit" name="register-user" value="Access" class="btnRegister">
            </div>

    </div>
    </form>
    </div>

            <?php include(SHARED_PATH . '/footer.php'); ?>