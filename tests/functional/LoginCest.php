<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToLogin(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Login');
        $I->fillField('email', 'jarret.minkler@gmail.com');
        $I->fillField('password', 'testing');
        $I->click('Login');
        $I->see('Jarret');
        $I->see('Dashboard');
    }
}
