<?php

class PatientCest

{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }

    public function registerPatientEmpty(AcceptanceTester $I) 
    {
        $I->wantTo("add an empty patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','');
        $I->fillField('firstname2','');
        $I->fillField('mail2','');
        $I->fillField('lastname','');
        $I->fillField('firstname','');
        $I->fillField('nhsnumber','');
        $I->fillField('dob','');
        $I->fillField('refname','');
        $I->fillField('ref_mail','');
        $I->fillField('refhospital','');
    
        $I->fillField('email','');
        $I->fillField('address','');
        $I->fillField('postcode','');
        $I->fillField('homenumber','');
        $I->fillField('mobilenumber','');
        $I->fillField('gpaddress','');
        $I->fillField('gpnumber','');
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/register_patient.php');
        
        $I->seeElement('span',['id' => 'alert_message'],['style' => 'color:red']);
    }

    public function registerPatientWorks(AcceptanceTester $I)
    {
        
            $randomNumber = mt_rand(1111111111,9999999999);
        
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2','testreg');
        $I->fillField('mail2','testing@nhs.net');
        $I->fillField('lastname','test');
        $I->fillField('firstname','reg');
        $I->fillField('nhsnumber',$randomNumber);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','tes'. $randomNumber .'@nhs.com');
        $I->fillField('refhospital','Royal Free Hospital');
   
        $I->fillField('email','hash4im53' . $randomNumber .'@gmail.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber',07245163);
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
       $I->canSeeInCurrentUrl('/referral_page.php');
        $I->see('test');
        $I->see('reg');
        $I->see('Referral for');

    }

    
    public function nameWrongFormat(AcceptanceTester $I)
    {
        
           
        
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2',4567890);
        $I->fillField('mail2','testing@nhs.net');
        $I->fillField('lastname','test');
        $I->fillField('firstname',34567890);
        $I->fillField('nhsnumber',9876543219);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','testingw@nhs.com');
        $I->fillField('refhospital','Royal Free Hospital');
   
        $I->fillField('email','testing@gmailtest.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber',07245163);
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/register_patient.php');
       
        $I->cantSee('Referral for');

    }

       
    public function emailWrongFormatForNHS(AcceptanceTester $I)
    {
        
           
        
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2','testing');
        $I->fillField('mail2','testing@yahoo.com');
        $I->fillField('lastname','test');
        $I->fillField('firstname','tests21');
        $I->fillField('nhsnumber',9876543219);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','testingw@yahoo.com');
        $I->fillField('refhospital','Royal Free Hospital');
   
        $I->fillField('email','testing@gmailtest.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber',07245163);
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/register_patient.php');
       
        $I->cantSee('Referral for');

    }

    public function emailWrongFormatForUser(AcceptanceTester $I)
    {
        
           
        
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2','testing');
        $I->fillField('mail2','testing@nhs.net');
        $I->fillField('lastname','test');
        $I->fillField('firstname','tests');
        $I->fillField('nhsnumber',9876543219);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','testing@nhs.net');
        $I->fillField('refhospital','Royal Free Hospital');
   
        $I->fillField('email','testing.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber',07245163);
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/register_patient.php');
       
        $I->cantSee('Referral for');

    }

    public function phoneNoWrongFormat(AcceptanceTester $I)
    {
        
           
        
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2','testing');
        $I->fillField('mail2','testing@nhs.net');
        $I->fillField('lastname','test');
        $I->fillField('firstname','tests');
        $I->fillField('nhsnumber',9876543219);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','testing@nhs.net');
        $I->fillField('refhospital','Royal Free Hospital');
   
        $I->fillField('email','testing.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber','notworking');
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/register_patient.php');
       
        $I->cantSee('Referral for');

    }




   
}

?>
