<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }
    
        public function frontpageWorks(AcceptanceTester $I)
        {
            $I->amOnPage('/');
            $I->see(' Paediatric liver service');
            $I->see('ABOUT US');
            $I->see('liver disease');
            $I->seeLink('STAFF LOGIN');
            $I->seeLink('REGISTER PATIENT');
            $I->seeLink('STAFF LOGIN');
            $I->seeLink('MAIN');
                 
        }
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
