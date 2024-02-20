<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Report\Service;

use EyeAble\EyeAbleAssist\Caller\Exception\Caller as CallerException;
use EyeAble\EyeAbleAssist\Caller\Service\CallerServiceInterface;
use EyeAble\EyeAbleAssist\Report\Infrastructure\ReportProviderInterface;
use OxidEsales\EshopCommunity\Core\Registry;

class ReportTrigger
{
    private const REPORT_TIMEOUT_AFTER = 604800; //7 days

    public function __construct(
        private ReportProviderInterface $reportProvider,
        private CallerServiceInterface $caller
    ) {
    }

    public function triggerReport(): void
    {
        $reportModel = $this->reportProvider->getLatestReport();
        
        if (
            !$reportModel->isLoaded() ||
            !$reportModel->getIssuedAt() ||
            ($reportModel->getIssuedAt()->getTimestamp() + self::REPORT_TIMEOUT_AFTER < microtime(true))
        ) {
            try {
                $this->caller->createReport();
            } catch (CallerException $exception) {
                Registry::getLogger()->debug($exception->getMessage());
            }
        }
    }
}
