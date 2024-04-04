<?php

/**
 * Copyright © Webinclusion GmbH. All rights reserved.
 * See LICENSE file for license details.
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'eyeable_assist',
    'title'       => 'Eye-Able® Assist',
    'description' => [
        'en' => 'Discover the Eye-Able® Assist Module: Your solution for an accessible website or eShop. With Eye-Able® Assist, you give your customers the freedom to tailor your online offerings to their exact needs. Make access easier and open your digital door to a wider audience. Because every customer matters.',
        'de' => 'Entdecken Sie das Eye-Able® Assist Modul: Ihre Lösung für eine barrierefreie Website oder eShop. Mit Eye-Able® Assist geben Sie Ihren Kunden die Freiheit, Ihr Online-Angebot genau auf ihre Bedürfnisse abzustimmen. Erleichtern Sie den Zugang und öffnen Sie Ihre digitale Tür für ein breiteres Publikum. Denn jeder Kunde zählt.'
    ],
    'thumbnail'   => 'pictures/logo.png',
    'version'     => '3.0.0',
    'author'      => 'Webinclusion GmbH, OXID eSales AG',
    'url'         => 'https://eye-able.com/',
    'email'       => 'info@eye-able.com',
    'extend'      => [
        \OxidEsales\Eshop\Core\ViewConfig::class => \EyeAble\EyeAbleAssist\Shop\ViewConfig::class
    ],
    'controllers' => [
        'eyeabletrigger' => \EyeAble\EyeAbleAssist\Shop\Controller\ReportController::class
    ],
    'events' => [
        'onActivate' => '\EyeAble\EyeAbleAssist\Core\ModuleEvents::onActivate',
        'onDeactivate' => '\EyeAble\EyeAbleAssist\Core\ModuleEvents::onDeactivate'
    ],
    'settings' => [
        /** Main */
        [
            'group'       => 'eyeableassist_main',
            'name'        => 'eyeableassist_apiurl',
            'type'        => 'str',
            'value'       => 'https://audit-api.eye-able.com/auditStats'
        ],
        [
            'group' => 'eyeableassist_main',
            'name'  => 'eyeableassist_apikey',
            'type'  => 'str',
            'value' => 'VZNJG65cb2fce4q5'
        ],
    ]
];
