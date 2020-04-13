<?php

class AppointmentsCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');

    }
    
        public function appointmentEmpty(AcceptanceTester $I)
        {   

            $I->amOnPage('/add_appointment.php');
            $I->fillField('date','');
            $I->fillField('time','');
            $I->click('Submit');
            $I->cantSee('Appointment has been created');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }

        public function appointmentSuccessful(AcceptanceTester $I)
        {
            $I->amOnPage('/add_appointment.php');
            $I->fillField('date','2020-04-11');
            $I->fillField('time','2-3pm');
            $I->click('Submit');
            $I->amOnPage('/add_appointment.php?patient_id=150&date=2020-04-15&option_admission=daycase&time=2-3pm&submit=');
            $I->click('Submit');
            $I->canSee('Appointment has been created');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }



}