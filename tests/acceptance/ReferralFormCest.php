<?php 

class ReferralFormCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
        
        $randomNumber = mt_rand(1111111111,9999999999);
        
        $I->wantTo("add a patient");
        $I->amOnPage('/patient/new.php');
        $I->fillField('lastname2','testreg');
        $I->fillField('firstname2','testreg');
        $I->fillField('mail2','testing@nhs.net');
        $I->fillField('lastname','test');
        $I->fillField('firstname','reg');
        $I->fillField('nhsnumber',$randomNumber);
        $I->fillField('dob',10/10/1999);
        $I->fillField('refname','Test');
        $I->fillField('ref_mail','tes'. $randomNumber .'@nhs.com');
        $I->fillField('refhospital','Royal Free Test Hospital');
   
        $I->fillField('email','hash4im53' . $randomNumber .'@gmail.com');
        $I->fillField('address','Test Lane 5');
        $I->fillField('postcode',39460);
        $I->fillField('homenumber',07245163);
        $I->fillField('mobilenumber',072565163);
        $I->fillField('gpaddress','Test Street');
        $I->fillField('gpnumber',07245166);
        $I->click('Submit');
    }
    
    public function referralIncompleteSubmitTest(AcceptanceTester $I)
    {
                 $I->canSeeInCurrentUrl('/referral_page.php');
                
                $I->click('Submit');
                $I->see("REFERRAL FORM for reg test");
                $I->canSeeInCurrentUrl('/referral/new.php');
                $I->cantSee("new investigation");
                
             
    }
    public function referralSuccessfulSubmitTest(AcceptanceTester $I)
    {
                $I->canSeeInCurrentUrl('/referral/new.php');
                $I->fillField('consultant_name','testname');
                $I->fillField('consultant_specialty','testspecialty');
                $I->fillField('organisation_hospital_name','testhosname');
                $I->fillField('organisation_hospital_no', 1421);
                $I->fillField('referring_name','testreferring');
                $I->fillField('bleep_number', 14214);
                $I->fillField('interpreter_language','testlang');
                $I->fillField('kch_doc_name','testname');
                $I->fillField('date',10/10/2014);
                $I->fillField('current_issue','testissue');
                $I->fillField('history_of_present_complaint','testhistory');
                $I->fillField('family_history','testfamily');
                $I->fillField('current_feeds','testfeeds');
                $I->fillField('medications','testmedications');
                $I->fillField('other_investigations','testinvestigations');
                
                $I->click('Submit');

                $I->cantSeeInCurrentUrl('/referral/show.php');
                $I->see('Investigation');
                

             
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
