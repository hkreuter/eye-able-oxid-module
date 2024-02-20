<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Tests\Integration\Report\Service;

use DateTime;
use EyeAble\EyeAbleAssist\Caller\Service\CallerService;
use EyeAble\EyeAbleAssist\Report\Infrastructure\ReportProvider;
use EyeAble\EyeAbleAssist\Report\Model\Report;
use EyeAble\EyeAbleAssist\Report\Model\ReportDataInterface;
use EyeAble\EyeAbleAssist\Report\Service\ReportService;
use EyeAble\EyeAbleAssist\Report\Service\ReportServiceInterface;
use EyeAble\EyeAbleAssist\Report\Service\ReportTrigger;
use EyeAble\EyeAbleAssist\Tests\Integration\TestHelperTrait;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Tests\Integration\IntegrationTestCase;

final class ReportTriggerTest extends IntegrationTestCase
{
    use TestHelperTrait;

    public function setUp(): void
    {
        parent::setUp();

        $this->prepareTestData();
    }

    public function testTriggerReportNotNeeded(): void
    {
        $report = $this->createPartialMock(
            Report::class,
            ['isLoaded', 'getIssuedAt']
        );
        $report->method('isLoaded')->willReturn(true);
        $report->method('getIssuedAt')->willReturn(new DateTime('now'));

        $reportProvider = $this->createPartialMock(
            ReportProvider::class,
            ['getLatestReport']
        );
        $reportProvider->method('getLatestReport')
            ->willReturn($report);

        $callerService = $this->createPartialMock(CallerService::class, ['createReport']);
        $callerService->expects($this->never())->method('createReport');

        $service = new ReportTrigger(
            $reportProvider,
            $callerService
        );

        $service->triggerReport();
    }

    public function testTriggerReportFirstCall(): void
    {
        $report = $this->createPartialMock(
            Report::class,
            ['isLoaded', 'getIssuedAt']
        );
        $report->method('isLoaded')->willReturn(false);
        $report->method('getIssuedAt')->willReturn(null);

        $reportProvider = $this->createPartialMock(
            ReportProvider::class,
            ['getLatestReport']
        );
        $reportProvider->method('getLatestReport')
            ->willReturn($report);

        $callerService = $this->createPartialMock(CallerService::class, ['createReport']);
        $callerService->expects($this->once())->method('createReport');

        $service = new ReportTrigger(
            $reportProvider,
            $callerService
        );

        $service->triggerReport();
    }

    public function testTriggerReportRenew(): void
    {
        $report = $this->createPartialMock(
            Report::class,
            ['isLoaded', 'getIssuedAt']
        );
        $report->method('isLoaded')->willReturn(true);
        $report->method('getIssuedAt')->willReturn(new DateTime('2024-01-01 12:12:12'));

        $reportProvider = $this->createPartialMock(
            ReportProvider::class,
            ['getLatestReport']
        );
        $reportProvider->method('getLatestReport')
            ->willReturn($report);

        $callerService = $this->createPartialMock(CallerService::class, ['createReport']);
        $callerService->expects($this->once())->method('createReport');

        $service = new ReportTrigger(
            $reportProvider,
            $callerService
        );

        $service->triggerReport();
    }
}
