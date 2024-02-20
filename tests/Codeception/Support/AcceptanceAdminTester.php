<?php

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Tests\Codeception\Support;

use Codeception\Util\Fixtures;
use OxidEsales\Codeception\Admin\AdminLoginPage;
use OxidEsales\Codeception\Admin\AdminPanel;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceAdminTester extends \Codeception\Actor
{
    use _generated\AcceptanceAdminTesterActions;

    /**
     * Define custom actions here
     */

    public function openAdmin(): AdminLoginPage
    {
        $I = $this;
        $adminLogin = new AdminLoginPage($I);
        $I->amOnPage($adminLogin->URL);
        return $adminLogin;
    }

    public function loginAdmin(): AdminPanel
    {
        $adminPage = $this->openAdmin();
        $admin = Fixtures::get('adminUser');
        return $adminPage->login($admin['userLoginName'], $admin['userPassword']);
    }
}
