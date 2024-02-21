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
    private const MODULE_ID= 'eyeable_assist';

    private const REPORT_FREQUENCY = 'eyeableassist_frequence';

    private array $constraintsMap = [
        '1d' => 86400,
        '7d' =>  604800,
        '14d' => 1209600
    ];

    public function __construct(
        private ModuleSettingServiceInterface $moduleSettingService
    ) {
    }

    public function getApiKey(): UnicodeString
    {
        return new UnicodeString('VZNJG65cb2fce4q5');
    }

    public function getApiUrl(): UnicodeString
    {
        return new UnicodeString("http://audit-api.eye-able.com/auditStats");
    }

    public function getFrequency(): int
    {
        $value = (string) $this->moduleSettingService
            ->getString(self::REPORT_FREQUENCY, self::MODULE_ID);

        return isset($this->constraintsMap[$value]) ? $this->constraintsMap[$value] : $this->constraintsMap['7d'];
    }
}
