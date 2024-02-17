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
    public const MODULE_ID= 'eyeable_assist';

    public const API_KEY = 'eyeableassist_apikey';

    public const REPORT_API_URL = 'eyeableassist_apiurl';

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
}
