<?php 

class ReferralFormCest
{
    public function _before(AcceptanceTester $I)
    {
    }
    public function referralSubmitTest(AcceptanceTester $I)
        {
            $I->amOnPage('/referral_page.php?id=96');
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

                    $I->see('Referrals for Test Test');
                    $I->see('testname');
                    

                 
        }
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
