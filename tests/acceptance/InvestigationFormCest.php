<?php 

class InvestigationFormCest
{
    public function _before(AcceptanceTester $I)
    {
        //sets the starting point of the test to the /login test
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }
    
    public function addInvestigationFromShowInvestigations(AcceptanceTester $I)
    {
        $I->amOnPage('/InvestigationsShow.php?id=150');
        $I->see("Results overview for James Bond");       
        $I->click('ADD INVESTIGATION');
        $I->canSeeInCurrentUrl('/InvestigationsNew.php?patient_ID=150');
                
             
    }
    public function investigationSuccessfulSubmitTest(AcceptanceTester $I)
    {
        $I->amOnPage('/InvestigationsNew..php?patient_ID=150');
        $I->fillField('date',10/01/2020);
        $I->fillField('BiliTD','3');
        $I->fillField('AST','4');
        $I->fillField('ALT', '4');
        $I->fillField('ALP','5');
        $I->fillField('GGT', '4');
        $I->fillField('Prot','4');
        $I->fillField('Alb','4');
        $I->fillField('CK','4');
        $I->fillField('HbHct','5');
        $I->fillField('WCC','5');
        $I->fillField('Neutro','2');
        $I->fillField('Platelets','2');
        $I->fillField('CRP','3');
        $I->fillField('ESR','4');
        $I->fillField('PTINR','22');
        $I->fillField('APTR','3');
        $I->fillField('Fibrinogen','2');
        $I->fillField('Cortisol','3');
        $I->fillField('Urea','3');
        $I->fillField('Creatinine','2');
        $I->fillField('Notes','It is an emergency');
        
        $I->click('Add Investigation');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');

             
    }

    public function investigationSubmitTestWithEmptyFields(AcceptanceTester $I)
    {
        $I->amOnPage('/InvestigationsNew.php?patient_ID=150');
        $I->fillField('date',10/01/2020);
        $I->fillField('ALT', '4');
        $I->fillField('ALP','5');
        $I->fillField('GGT', '4');
        $I->fillField('Prot','4');
        $I->fillField('Alb','4');
        $I->fillField('CK','4');
        $I->fillField('HbHct','5');
        $I->fillField('Neutro','2');
        $I->fillField('Platelets','2');
        $I->fillField('CRP','3');
        $I->fillField('ESR','4');
        $I->fillField('Fibrinogen','2');
        $I->fillField('Cortisol','3');
        $I->fillField('Urea','3');
        
        $I->click('Add Investigation');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationWithWrongDateFormatTest(AcceptanceTester $I)
    {
        $I->amOnPage('/InvestigationsNew.php?patient_ID=150');
        $I->fillField('date',1);
        $I->fillField('ALP','5');
        $I->fillField('HbHct','1');
        $I->fillField('Neutro','2');
        $I->fillField('ESR','9');
        $I->fillField('Fibrinogen','1');
        $I->fillField('Cortisol','1');
        $I->fillField('Urea','2');
        $I->click('Add Investigation');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationWithEmptyDateTest(AcceptanceTester $I)
    {
        //should fail
        $I->amOnPage('/InvestigationsNew.php?patient_ID=150');
        $I->fillField('ALP','5');
        $I->fillField('HbHct','1');
        $I->fillField('Neutro','2');
        $I->fillField('ESR','9');
        $I->fillField('Fibrinogen','1');
        $I->fillField('Cortisol','1');
        $I->fillField('Urea','2');
        $I->click('Add Investigation');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationFromNewToDisplayTest(AcceptanceTester $I)
    {
        $I->amOnPage('/InvestigationsNew.php?patient_ID=150');
        $I->see("Create Investigation");       
        $I->click('BACK TO DISPLAY OF INVESTIGATIONS');
        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationEditTest(AcceptanceTester $I)
    {
        $I->click('2020-01-02', \Codeception\Util\Locator::elementAt('//table/tr',-1));
        $I->canSeeInCurrentUrl('InvestigationEdit.php?id=116');
        $I->see("Edit Investigation");    
        $I->fillField('BiliTD','3');
        $I->fillField('AST','4');
        $I->fillField('Urea','3');
        $I->fillField('Creatinine','2');
        $I->fillField('Notes','It is an emergency');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationEditTest2(AcceptanceTester $I)
    {
        $I->amOnPage('InvestigationEdit.php?id=115');
        $I->see("Edit Investigation");    
        $I->fillField('ALT', '4');
        $I->fillField('ALP','5');
        $I->fillField('GGT', '1');
        $I->fillField('Prot','1');
        $I->fillField('Alb','4');
        $I->fillField('CK','4');
        $I->fillField('Neutro','2');
        $I->fillField('Platelets','2');
        $I->fillField('CRP','8');
        $I->fillField('ESR','4');
        $I->fillField('Fibrinogen','10');
        $I->fillField('Cortisol','19');
        $I->fillField('Urea','3');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationDeleteTest(AcceptanceTester $I)
    {
        $I->click('2020-01-02', \Codeception\Util\Locator::elementAt('//InvestigationsTable/tr',-1));
        $I->canSeeInCurrentUrl('InvestigationEdit.php?id=116');
        $I->see("Edit Investigation");    
        $I->click('DELETE');
        $I->see("Are you sure you want to delete this investigation?");
        $I->click('Yes');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }

    public function investigationAdditionalNotesTest(AcceptanceTester $I)
    {
        $I->click('2020-01-02', \Codeception\Util\Locator::elementAt('//InvestigationsTable2/tr',-1));
        $I->canSeeInCurrentUrl('InvestigationEdit.php?id=116');
        $I->see("Edit Investigation");    
        $I->fillField('date',10/01/2020);
        $I->fillField('ALT', '4');
        $I->fillField('ALP','5');
        $I->fillField('GGT', '4');
        $I->fillField('Prot','4');
        $I->fillField('Alb','4');
        $I->fillField('CK','4');
        $I->fillField('HbHct','5');
        $I->fillField('Neutro','2');
        $I->fillField('Platelets','2');
        $I->fillField('CRP','3');
        $I->fillField('ESR','4');
        $I->fillField('Fibrinogen','2');
        $I->fillField('Cortisol','3');
        $I->fillField('Urea','3');
        $I->fillField('Notes','The patient needs to be immediately admitted to the hospital and this sentence should test how long the notes can be');

        $I->see('Results overview for James Bond');
        $I->canSeeInCurrentUrl('/InvestigationsShow.php?id=150');
             
    }


    // tests
    public function tryToTest(AcceptanceTester $I)
    {

    }
}
