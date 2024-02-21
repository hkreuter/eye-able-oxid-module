<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Module\Service;

use Symfony\Component\String\UnicodeString;

final class Settings
{
    public function getApiKey(): UnicodeString
    {
        return new UnicodeString('VZNJG65cb2fce4q5');
    }

    public function getApiUrl(): UnicodeString
    {
        return new UnicodeString("http://audit-api.eye-able.com/auditStats");
    }
}
