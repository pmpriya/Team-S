<?php 

class AppointmentsTableCest

{ 

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }
    
    public function checkPage(AcceptanceTester $I)
    {

            $I->amOnPage('/appointments.php');
            $I->see('LOGOUT');

    }

    public function checkTable(AcceptanceTester $I){

            
            $I->seeElement("table");
            $I->see('Manage');
            $I->seeElement("table");
            $I->see('Manage');

    }

    public function _after(AcceptanceTester $I)
    {
        $I->click('LOGOUT');
    }

}