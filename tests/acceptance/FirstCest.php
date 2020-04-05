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
                 
        }
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
