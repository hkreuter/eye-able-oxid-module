<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Tests\Integration\Caller\Service;

use EyeAble\EyeAbleAssist\Caller\Infrastructure\CallerInterface;
use EyeAble\EyeAbleAssist\Caller\Service\CallerServiceInterface;
use EyeAble\EyeAbleAssist\Report\Model\Report;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Tests\Integration\IntegrationTestCase;

final class CallerServiceTest extends IntegrationTestCase
{
    public function testFetchReport(): void
    {
        $service = ContainerFactory::getInstance()
            ->getContainer()
            ->get(CallerServiceInterface::class);

        $reportId = $service->createReport();

        $this->assertNotEmpty($reportId);

        $report = oxNew(Report::class);
        $report->load($reportId);

        $this->assertTrue($report->isLoaded());
    }
}
