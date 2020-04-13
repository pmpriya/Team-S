<?php 

class AppointmentsPastTableCest
{


    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }

    public function pastAppointmentsCheckPage(AcceptanceTester $I)
    {

            $I->amOnPage('/appointments_past.php');
            $I->see('LOGOUT');

    }
    public function pastAppointmentsCheckTable(AcceptanceTester $I){

            $I->seeElement("#searchinput");
            $I->seeElement("#searchbutton");
            $I->seeElement("table");
            $I->see('Manage');

    }

    public function _after(AcceptanceTester $I)
    {
        $I->click('LOGOUT');
    }



}