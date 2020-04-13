<?php

class UserCest

{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }
    public function addUserEmpty(AcceptanceTester $I)
    {
        $I->wantTo("add an empty user");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/addUser.php');
    }

    public function addUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("add a user and i expect it to succeed");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','hashim12');
        $I->fillField('name','hashim');
        $I->fillField('surname','amla');
        $I->fillField('email','hashim@nhs.net');
        $I->fillField('userLevel','1');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/users.php');
    }

    public function addEmptyUser(AcceptanceTester $I)
    {
        $I->wantTo("verify that adding an empty user doesn't work");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/addUser.php');
    }
    

    public function addUserTestThree(AcceptanceTester $I)
    {
        $I->wantTo("add a user that works");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','73829');
        $I->fillField('name','testit');
        $I->fillField('surname','testing');
        $I->fillField('email','test@yahoo.com');
        $I->fillField('userLevel','60');
        $I->click('Submit Changes');
        $I->canSeeInCurrentURL('/users.php');
    }

   


}

?>