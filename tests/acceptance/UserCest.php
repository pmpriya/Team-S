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
        $I->amOnPage('/user/new.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/user/new.php');
    }

    public function addUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("add a user and i expect it to succeed");
        $I->amOnPage('/user/new.php');
        $I->fillField('username','hashim12');
        $I->fillField('name','hashim');
        $I->fillField('surname','amla');
        $I->fillField('email','hashim@nhs.net');
        $I->fillField('userLevel','1');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/user/show.php');
    }

    public function addEmptyUser(AcceptanceTester $I)
    {
        $I->wantTo("verify that adding an empty user doesn't work");
        $I->amOnPage('/user/new.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->canSeeInCurrentUrl('/user/new.php');
    }
    

    public function addUserTestThree(AcceptanceTester $I)
    {
        $I->wantTo("add a user that works");
        $I->amOnPage('/user/new.php');
        $I->fillField('username','73829');
        $I->fillField('name','testit');
        $I->fillField('surname','testing');
        $I->fillField('email','test@yahoo.com');
        $I->fillField('userLevel','60');
        $I->click('Submit Changes');
        $I->canSeeInCurrentURL('/user/show.php');
    }

    public function editUserEmpty(AcceptanceTester $I)
    {
        $I->wantTo("verify that editing a staff member with empty fields doesn't work");
        $I->amOnPage('/user/edit.php?id=83');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->canSeeInCurrentURL('/user/edit.php');
    }

    public function editUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("verify that editing a staff member works");
        $I->amOnPage('/editUser.php?id=83');
        $I->fillField('username','testingyo');
        $I->fillField('name','again');
        $I->fillField('surname','testing');
        $I->fillField('email','nbaakza@kings.nhs.uk');
        $I->fillField('userLevel','3');
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/user/show.php');
        $I->see('testingyo');
       
    }

     public function editUserTestTwo(AcceptanceTester $I)
    {
        $I->wantTo("editing a user");
        $I->amOnPage('/user/edit.php?id=83');
        $I->fillField('username','xchkvk');
        $I->fillField('name','9909w9');
        $I->fillField('surname','238398');
        $I->fillField('email','nooriebaakza@yahoo.com');
        $I->fillField('userLevel','2');
        $I->click('Submit');
        $I->seeCurrentUrlEquals('/Team-S/public/user/edit.php?id=83');
    }

}

?>
