<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Module\Service;

use OxidEsales\EshopCommunity\Internal\Framework\Module\Facade\ModuleSettingServiceInterface;
use Symfony\Component\String\UnicodeString;

final class Settings
{
    private const MODULE_ID = 'eyeable_assist';

    private const API_KEY = 'eyeableassist_apikey';

    private const REPORT_API_URL = 'eyeableassist_apiurl';

    private array $constraintsMap = [
        '1d' => 86400,
        '7d' => 604800,
        '14d' => 1209600
    ];

    public function __construct(
        private ModuleSettingServiceInterface $moduleSettingService
    ) {
    }

    public function getApiKey(): UnicodeString
    {
        return $this->moduleSettingService
            ->getString(self::API_KEY, self::MODULE_ID);
    }

    public function getApiUrl(): UnicodeString
    {
        return $this->moduleSettingService
            ->getString(self::REPORT_API_URL, self::MODULE_ID);
    }


    public function getRefreshOnlyAfter(): int
    {
        return 300;
    }
}
