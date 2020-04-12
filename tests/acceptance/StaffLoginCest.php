<?php 

class StaffLoginCest


{

    public function adminLoginWorks(AcceptanceTester $I)
    {   
       
        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
        $I->canSee('PATIENTS');
        $I->cantSeeInCurrentUrl('/user_login.php');
        $I->canSeeInCurrentUrl('/patients.php');
        $I->canSee('LOGOUT');
        $I->canSee('STAFF');
        $I->canSee('APPOINTMENTS');
        $I->canSee('INVESTIGATIONS');
        $I->canSee('REFERRALS');
    }

    public function doctorLoginWorks(AcceptanceTester $I)
    {   
       
        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','doctor');
        $I->fillField('password','doctor');
        $I->click('Sign in');
        $I->canSee('PATIENTS');
        $I->cantSeeInCurrentUrl('/user_login.php');
        $I->canSeeInCurrentUrl('/patients.php');
        $I->canSee('LOGOUT');
        $I->cantSee('STAFF');
        $I->canSee('APPOINTMENTS');
        $I->canSee('INVESTIGATIONS');
        $I->canSee('REFERRALS');
    }

    public function registrarLoginWorks(AcceptanceTester $I)
    {   
       
        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','registrar');
        $I->fillField('password','registrar');
        $I->click('Sign in');
        $I->canSee('PATIENTS');
        $I->cantSeeInCurrentUrl('/user_login.php');
        $I->canSeeInCurrentUrl('/patients.php');
        $I->canSee('LOGOUT');
        $I->cantSee('STAFF');
        $I->cantSee('INVESTIGATIONS');
        $I->canSee('APPOINTMENTS');
    }


    public function nonexistentUsername(AcceptanceTester $I)
    {

        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','Jacques');
        $I->fillField('password','Jacques123');
        $I->click('Sign in');
        $I->canSee('Incorrect username');
        $I->canSeeInCurrentUrl('/user_login.php');
        $I->cantSee('PATIENTS');
    }

    public function incorrectPassword(AcceptanceTester $I)
    {

        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','Jacques123');
        $I->click('Sign in');
        $I->canSee('Incorrect password');
        $I->canSeeInCurrentUrl('/user_login.php');
        $I->cantSee('PATIENTS');

    }

    public function emptyUsername(AcceptanceTester $I){

        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','');
        $I->fillField('password','Jacques123');
        $I->click('Sign in');
        $I->canSeeInCurrentUrl('/user_login.php');
        $I->seeElement('span',['id' => 'alert_message'],['style' => 'color:red']);
        $I->cantSee('PATIENTS');
    }

    public function emptyPassword(AcceptanceTester $I){

        $I->wantTo('Log In');
        $I->amOnPage('/user_login.php');
        $I->fillField('username','Jacques');
        $I->fillField('password','');
        $I->click('Sign in');
        $I->canSeeInCurrentUrl('/user_login.php');
        $I->seeElement('span',['id' => 'alert_message'],['style' => 'color:red']);
        $I->cantSee('PATIENTS');
    }

    // public function emptyUsernamePassword(AcceptanceTester $I){

    //     $I->wantTo('Log In');
    //     $I->amOnPage('/user_login.php');
    //     $I->fillField('username','');
    //     $I->fillField('password','');
    //     $I->click('Sign in');
    //     $I->canSeeInCurrentUrl('/user_login.php');
    //     $I->seeElement('span',['id' => 'alert_message'],['style' => 'color:red']);
    //     $I->cantSee('PATIENTS');
    // }

    
}      