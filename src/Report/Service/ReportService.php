<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Report\Service;

use EyeAble\EyeAbleAssist\Caller\Service\CallerServiceInterface;
use EyeAble\EyeAbleAssist\Report\Infrastructure\ReportProviderInterface;
use EyeAble\EyeAbleAssist\Report\Model\Report;
use EyeAble\EyeAbleAssist\Report\Model\ReportData;
use EyeAble\EyeAbleAssist\Report\Model\ReportDataInterface;

final class ReportService implements ReportServiceInterface
{
    public function __construct(
        private ReportProviderInterface $reportProvider
    ) {
    }

    public function getLatestReportData(): ?ReportDataInterface
    {
        $model = $this->reportProvider->getLatestReport();
        $reportData = null;

        if ($model->isLoaded() && $model->getIssuedAt()) {
            $raw = $model->getReport();
            $reportData = new ReportData(
                isset($raw['page']) ? $raw['page'] : '',
                isset($raw['errorcount']) ? (int) $raw['errorcount'] : -1,
                $model->getIssuedAt()->format('Y-m-d h:i:s')
            );
        }

        return $reportData;
    }
}
