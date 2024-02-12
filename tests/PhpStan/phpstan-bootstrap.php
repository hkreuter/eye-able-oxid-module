<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

class_alias(
    \OxidEsales\Eshop\Application\Model\User::class,
    \EyeAble\EyeAbleAssist\Model\User_parent::class
);

class_alias(
    \OxidEsales\Eshop\Application\Controller\StartController::class,
    \EyeAble\EyeAbleAssist\Controller\StartController_parent::class
);

class_alias(
    \OxidEsales\Eshop\Application\Model\Basket::class,
    \EyeAble\EyeAbleAssist\Model\Basket_parent::class
);
