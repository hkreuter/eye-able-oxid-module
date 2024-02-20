<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Tests\Integration\Module\Service;

use EyeAble\EyeAbleAssist\Module\Service\Settings;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Tests\Integration\IntegrationTestCase;

final class ServiceTest extends IntegrationTestCase
{
     public function testSomething(): void
     {
         $service = ContainerFactory::getInstance()
             ->getContainer()
             ->get(Settings::class);

         $this->assertNotEmpty($service->getApiKey());
         $this->assertNotEmpty($service->getApiUrl());
     }
}
