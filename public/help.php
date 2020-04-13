<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'KCL Paedriatic Liver Service'; ?>

<center>
    <div class="helppage" style="width: 50%">


 <h1 id="aboutus">Frequently Asked Questions </h1>


        <h2>1.	Introduction</h2>


       <h3>What is the system for?</h3>
       Paediatric Liver Service Ticketing System has been created by King’s College London students for King’s College Hospital Paediatric Liver Service in order to improve their in-house practices and allow them to manage ongoing referrals to the clinic more effectively.<br>
        System allows King’s College Hospital’s (KCH) Doctors to create, track, edit and manage referrals sent from other hospitals.<br>
         Crucial benefit from implementing this solution is ability for both, KCH as well as referring doctor to be able to complete the admission process for the patient without having to manually submit/review documents like blood tests results or referrals.<br>
     Referees are able to track their case with by logging into the portal with patient’s NHS number and uniquely created access code provided to them during the registration in order to ensure that patients’ data is protected against unauthorised access.<br>


        <h4>  Who can use the ticketing system?  </h4>

        Ticketing system is intended to be used by KCH staff, which includes Clinic Manager, Doctors and Registrars, as well as external Doctors wanting to refer their patients to the Clinic.<br>
        System is not intended to be used by the patients themselves, any concerns in regard to the referral and results within included should be presented first to the referring Doctor.<br><br>


        <?php
        if (isset($_SESSION['userLevel'])) {

            ?>



        <h2> 2.	Administrator Guide </h2>


        <h3> Account description</h3>
        Account dedicated for Clinic Management, which allows them to manage staff, as well perform all the operations accessible for the lower levels.<br><br>
        <h3>  Categories of users  </h3>

        <h4>System has the following categories of Users:</h4>
        <h4>Level 3: Administrator</h4>
        Account dedicated for Clinic Management, which allows them to manage staff, as well perform all the operations accessible for the lower levels.<br>
        <h4>Level 2: Doctor</h4>
        Doctors are able track and manage cases, view and edit all referrals and all tests results, schedule appointments, delete patients as well perform all the operations accessible for the lower levels.<br>
        <h4>Level 1: Registrar</h4>
        Registrars are able to view patients’ personal details and referrals, with limited options of modifying them.<br>
        It is at Clinic Management’s discretion whether staff will be classified as Level 1 or Level 2 user – in some cases employees might be require to perform operations requiring higher level of permissions,  which can be granted by the Administrator.<br>
        <h4> Level 0: Unregistered user</h4>
        Unregistered user is able to create a new patient in the system and complete his personal details, referral and tests.<br>
        After completing the initial registration user can access the portal using NHS number of the patient and an uniquely  generated access code to track the case, update patient’s details, update the referral, add results, view and confirm scheduled appointments for the patient.

        <h3> FAQ</h3>


        <h3>How do I create new account for staff members?</h3>
        In order to create a new account for staff member you need to select Staff from the menu and go to Add User located on the bottom of the page, them complete all the relevant details, including user level for the new user.

        <h3>How do I delete account of the staff member?</h3>
        In order to delete account for the staff member you need to select Staff from the menu and click Delete next to the user you would like to delete, then confirm the deletion by clicking yes.

        <h3>How do I update user’s details, like username or e-mail address?</h3>
        In order to update user’s details, you need to go to select Staff from the menu and click Edit next to the user you would like to edit, modify the details and click Submit Changes.

        <h3>How do I reset password for the staff member?</h3>
        In order to reset password for the staff member you need to select Staff from the menu and click Edit next to the user you would like to reset password for. On the edit page select Update Password and confirm the submission.

        <h3> How can I promote staff member to a higher user level?</h3>
        In order to promote staff member to a higher user level you need to select Staff from the menu and click Edit next to the user you’d like to promote, then update the User Level field according to the new preferences.

        Administrator is capable of performing all the operations accessible for the lower levels, so please review the guide accordingly.<br><br>



        <h2> 3.	Doctor Guide </h2>


        <h3> Account Description</h3>
        Doctors are able track and manage cases, view and edit all referrals and all tests results, schedule appointments, delete and edit patients as well perform all the operations accessible for the lower levels.
        <br>

        FAQ


        <h3> How does a typical progress of the case look like?</h3>
        Every case starts from a referral – it can be created either during registration of a new patient, or as a new referral for the existing one by both, KCH Doctor as well as external referee.
        Once the referral and results are completed, KCH Doctor reviews the case and makes appropriate decision – either books an appointment to see/admit the patient, or request further results to be completed by the referee.
        Once results are sufficient for the KCH Doctor to make a decision, he will either book an appointment to see or admit the patient, or close the case if no further action is required.
        All notes in regards doctor’s decisions will be saved in current KCH system as a part of patient’s documentation, to avoid data duplication.

        <h3>What is a case?</h3>
        Case is a set consist of appointments, tests results, and notes related to particular referral assigned to a specific case.

        <h3> How do I open or close the case?</h3>
        Depending on the status, case can be either Resolved or Active.
        Case is being created as soon as new referral for the patient comes into the system. All investigations and appointments related to this referral will be combined into a case.
        Case can be closed only by Doctors, once the patient has been seen or a decision has been made that there is no need to see the patient.
        To close the case select Active Cases in the menu and select Close next to the case you’d like to close.

        <h3>Can single patient have more than one case in progress?</h3>
        No, as patient is allowed to have only one referral in progress at the time, there will be only one case which is active.
        Once the previous case is closed Doctor or the Referee can open another referral, which will also create a new case and link all new appointments and tests results accordingly.

        <h3> How can I view a referral, investigations or appointments for particular case?</h3>
        To view referral, investigations or appointments go to Active Cases and select option from the View menu accordingly.

        <h3>  How can I edit a referral?</h3>
        To edit a referral, go to Active Cases, select Referral, then Details and click on Edit Referral.

        <h3> How can I edit investigation?</h3>
        To edit an investigation, go to Active Cases, select Investigations and click on the investigation you’d like to edit.

        <h3> How can I edit or delete the patient?</h3>
        To edit or delete the patient go to Patients and then choose Edit or Delete accordingly.

        <h3> How can I view previous investigations, which are not part of the active case?</h3>
        If the patient had already a case opened in the past which has been completed, you can access his historical results by going to Patients, selecting Investigations and then View past investigations.
        <h3> How can I view past referrals?</h3>
        If the patient had already a case opened in the past which has been completed, you can view his past Referrals by going to Patients, and selecting Referrals.

        <h3> How can I create an appointment to see the patient?</h3>
        To book an appointment go to Appointments, select Add appointment and complete the details, including selecting patient, location of the appointment and time.

        <h3>  How can I view booked appointments?</h3>
        In order to view booked appointments, select Appointments tab from the menu, which will show you list of all appointments booked, including these confirmed by the patient and these awaiting confirmation.

        <h3>What’s the difference between Confirmed Appointments those Awaiting Confirmation?</h3>
        Once the appointment is booked, referee as well as the patient receive an e-mail notification about this fact. They then need to confirm the appointment, either by referee logging into the portal and confirming it, or by calling the Clinic.

        <h3> Can I confirm an appointment if referee or patient call the Clinic?</h3>
        Yes, some patients might be unable to confirm the appointment by using the e-mail link or calling their Doctor, so they’ll call you clinic.
        To do so, go to Appointments and click Confirm next to the appointment you would like to confirm.

        <h3> How can I delete an appointment?</h3>
        In order to delete the appointment, go to Appointments tab and click Delete next to the appointment you would like to delete.

        <h3> Can I view past appointments?</h3>
        Yes. Appointments become past, once the case they’re assigned to is closed.
        To view these appointments please go to Appointments tab and select View Past Appointments.

        <h3> Referee called the Clinic, he cannot find his access code in order to update patient’s investigations – what should I do?</h3>
        After confirming his identity, you can retrieve the access code by going into Patients and selecting View – access code will be visible on the bottom

        <h3>  How can I update access code for the patient?</h3>
        To update patient’s access code go to Patients, select Edit and update the relevant fields.

        <h3>  Can I complete the referral or investigation on behalf of the referee?</h3>
        System is designed to allow external referees to complete all the documentation required, however there might be instances where it is either difficult or just more convenient for the referee to do it over the phone with KCH Doctor.
        To create an investigation for the existing case, go to Active Cases, select Investigations and click Add new investigation.
        To create a new referral for existing patient, which will also open a new case, go to Patients, select Referrals and click Create Referral. Please note that this option will be not available if patient will already have an ongoing referral, as only one active referral per patient is allowed at the time.
        To create a new referral for new patient, click on Register Patient and complete all the required details, which will then automatically take you to the referral screen.

        <h3> Can I register a patient?</h3>
        Yes. To register a patient on behalf of the referee go to Register Patient tab and complete the process as per instructions.<br><br>
         


        <h2>  4.	Registrar Guide </h2>



        <h3> Account Description</h3>
        Registrars are able to view patients’ personal details and referrals, with limited options of modifying them.
        It is at Clinic Management’s discretion whether staff will be classified as Level 1 or Level 2 user – in some cases employees might be require to perform operations requiring higher level of permissions,  which can be granted by the Administrator.
        <br>

        <h3> FAQ</h3>


        <h3>  How can view details of the patient?</h3>
        To view details of the patient go to Patients tab and select Details next to the patient you’d like to view.

        <h3> How can I view the referral?</h3>
        To view a referral for particular patient, go to Patients and click on Referral.

        <h3>  Can I edit patient’s details?</h3>
        No, as a registrar you don’t have an option to edit the patient for the security reasons.
        If your supervisor will determine that this ability is required and appropriate for your position he’ll award you with a higher user level providing you with these functionalities.

        <h3> How can I view booked appointments?</h3>
        In order to view booked appointments, select Appointments tab from the menu, which will show you list of all appointments booked, including these confirmed by the patient and these awaiting confirmation.

        <h3> Can I view past appointments?</h3>
        Yes. Appointments become past, once the case they’re assigned to is closed.
        To view these appointments please go to Appointments tab and select View Past Appointments.<br><br>
         <?php } ?>


        <h2>    5.	External Referee Guide </h2>


        <h3>  Account description</h3>
        Unregistered user is able to create a new patient in the system and complete his personal details, referral and tests.
        After completing the initial registration user can access the portal using NHS number of the patient and an uniquely  generated access code to track the case, update patient’s details, update the referral, add results, view and confirm scheduled appointments for the patient.<br>
        <br>


        <h3> FAQ</h3>
         <h3>  How to I register the patient?</h3>
        In order to register the patient select Register Patient from the menu and follow the on-screen instructions.
        After registering the patient you’ll automatically be walked through completing the referral as well as the investigation.

        <h3>  How do I create a referral? </h3>
        In order to create a referral you’ll have to register the patient first, which will then walk you through creating the referral and investigations automatically.
        If the patient is already registered, you’ll need to log into the system with his details and click Create Referral on the My Case page.

        <h3> What is access code and what is it for? </h3>
        Access code is a security code generated during patient’s registration.
        System will send access code along with the patient’s NHS number to referee’s e-mail provided during the registration.
        Using the combination of access code and the NHS number referring Doctor will be able to track the case and provided Clinic with relevant updates.

        <h3>  I’ve lost e-mail with my access code, what should I do? </h3>
        Please contact the clinic, after confirming your identity we’ll be able to provide you with it.

        <h3> When I’m trying to register my patient I get an error that this patient is registered with us – what should I do? </h3>
        This means that either you, one of your colleagues, or another Doctor registered this patient with us already.
        If you’re unable to identify who could it be, contact the Clinic – we’ll be able to provide with these details as well as with the access code.

        <h3> How do I submit new test results for my patient? </h3>
        Log into the case tracker click on Referee Login, and complete the form with patient’s NHS number and the access code, then click on Update My Investigation to add a new one.

        <h3> Can I edit my referral? </h3>
        Yes, you can. In order to edit the referral log into the case tracker by clicking on Referee Login and complete the form with patient’s NHS number and the access code, then click On Referral, next View the details and Edit to modify it.


    </div>

</center>



<?php include(SHARED_PATH . '/footer.php'); ?>
