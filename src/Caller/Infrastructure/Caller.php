<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace EyeAble\EyeAbleAssist\Caller\Infrastructure;

use EyeAble\EyeAbleAssist\Module\Service\Settings;
use OxidEsales\EshopCommunity\Internal\Transition\Utility\ContextInterface;
use CurlHandle;

class Caller implements CallerInterface
{
    private const CURL_TIMEOUT = '240';

    public function __construct(
        private ContextInterface $context,
        private Settings $moduleSettings
    )
    {
        ini_set('max_execution_time', self::CURL_TIMEOUT);
    }

    public function fetchReport(): Page
    {
        //call  to eyeable starts here
        $shopUrl = $this->context
            ->getFacts()
            ->getShopUrl();
        $shopId = $this->context->getCurrentShopId();
        
        if ($this->context->getFacts()->isEnterprise()) {
            $shopUrl .= '?shp=' . $shopId;
        }

        $curlHandle = $this->initializeCurl($this->getUrl($shopUrl));
        $content = (string) curl_exec($curlHandle);
        $curlInfo = (array) curl_getinfo($curlHandle);
        $errorMessage = curl_error($curlHandle);
        curl_close($curlHandle);

        //not sure how this will tick, but it might be that creating report takes some time,
        //so maybe data can only be fetched on a later call.
        //TBD: as soon as we have a report in db, only call eye-able api again after a specified time.
        // is 7 days ok?

        return new Page(
             $content,
             $errorMessage,
             $curlInfo
        );
    }

    private function getUrl(
        string $shopUrl
    ): string
    {
        $apiUrl = $this->moduleSettings->getApiUrl();
        $apiKey = $this->moduleSettings->getApiKey();        

        return $apiUrl . '?apiKey=' . $apiKey . '&url=' . urlencode($shopUrl);
    }

    private function initializeCurl(
        string $url
    ): CurlHandle
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::CURL_TIMEOUT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'EYEABLE-OXID-MODULE ' . $url);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        return $ch;
    }
}
