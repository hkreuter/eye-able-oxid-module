<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Caller\Infrastructure;

use OxidEsales\EshopCommunity\Internal\Transition\Utility\ContextInterface;

final class Caller implements CallerInterface
{
    public function __construct(private ContextInterface $context)
    {
    }

    public function fetchReport(): array
    {
        //TODO: this is a dummy implementation, we need the real thing here

        //call  to eyeable starts here
        $shopUrl = $this->context
            ->getFacts()
            ->getShopUrl();
        $shopId = $this->context->getCurrentShopId();

        //not sure how this will tick, but it might be that creating report takes some time,
        //so maybe data can only be fetched on a later call.
        //TBD: as soon as we have a report in db, only call eye-able api again after a specified time.
        // is 7 days ok?

        //we should also put some exception handling here

        //TODO: we need some contract for returned data
        return
            [
                'url' => 'http://myoxidehop.local',
                'page' => 'startpage',
                'errorcount' => '21',
                'shopurl' => $shopUrl,
                'shopid' => $shopId
            ];
    }
}
