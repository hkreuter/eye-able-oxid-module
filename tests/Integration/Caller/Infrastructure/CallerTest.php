<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Tests\Integration\Caller\Infrastructure;

use EyeAble\EyeAbleAssist\Caller\Infrastructure\Caller;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Transition\Utility\ContextInterface;
use OxidEsales\EshopCommunity\Tests\Integration\IntegrationTestCase;

final class CallerTest extends IntegrationTestCase
{
    public function testFetchReport(): void
    {
        $context = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ContextInterface::class);

        $caller = new Caller($context);

        $this->assertNotEmpty($caller->fetchReport());
    }
}
