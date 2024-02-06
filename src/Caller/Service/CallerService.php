<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Caller\Service;

use EyeAble\EyeAbleAssist\Caller\Infrastructure\CallerInterface;
use EyeAble\EyeAbleAssist\Report\Model\Report;
use DateTime;

final class CallerService implements CallerServiceInterface
{
    public function __construct(private CallerInterface $caller)
    {
    }

    public function createReport(): ?string
    {
        $rawData = $this->caller->fetchReport();
        $report = oxNew(Report::class);

        if ($rawData) {
            $report->setReport($rawData);
            $report->setIssuedAt(new DateTime('now'));
            $report->save();
        }

        return $report->getId();
    }
}
