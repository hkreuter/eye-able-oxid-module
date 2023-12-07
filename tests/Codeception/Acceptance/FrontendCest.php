<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\EyeAble\Tests\Tests\Codeception;

use OxidEsales\EyeAble\Tests\Codeception\AcceptanceTester;

/**
 * @group eyeable_assist
 * @group eyeable_assist_frontend
 */
final class FrontendCest
{
    public function testEyeAbleAssistIsVisibleOnStartPage(AcceptanceTester $I): void
    {
        $I->wantToTest('that the eye able assist is visible on the start page');

        $I->openShop();
        $I->waitForPageLoad();

        $source = $I->grabPageSource();
        $I->assertStringContainsString('eye-able', $source);
        $I->assertStringContainsString('eyeAbleWebsitePlugin', $source);
    }

    public function testEyeAbleAssistIsVisibleOnContact(AcceptanceTester $I): void
    {
        $I->wantToTest('that the eye able assist is visible on the contact page');

        $I->openShop()
            ->openUserAccountPage()
            ->seePageOpened();

        $source = $I->grabPageSource();
        $I->assertStringContainsString('eye-able', $source);
        $I->assertStringContainsString('eyeAbleWebsitePlugin', $source);
    }
}
