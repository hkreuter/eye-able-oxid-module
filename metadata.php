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
        'en' => 'Discover the Eye-Able® Assist Module: Your solution for an accessible website or eShop. With Eye-Able® Assist, you give your customers the freedom to tailor your online offerings to their exact needs. Make access easier and open your digital door to a wider audience. Because every customer matters. Contact us for a full licence and adaptation of the software to your website.  You will also receive a short report on accessibility errors according to WCAG 2.2 - you can view this on the start page in the admin area.',
        'de' => 'Entdecken Sie das Eye-Able® Assist Modul: Ihre Lösung für eine barrierefreie Website oder eShop. Mit Eye-Able® Assist geben Sie Ihren Kunden die Freiheit, Ihr Online-Angebot genau auf ihre Bedürfnisse abzustimmen. Erleichtern Sie den Zugang und öffnen Sie Ihre digitale Tür für ein breiteres Publikum. Denn jeder Kunde zählt. Kontaktieren Sie uns für eine Vollizenz und die Anpassung der Software an Ihre Webseite. Außerdem erhalten Sie einen Kurzreport zu Barrierefreiheitsfehler nach WCAG 2.2 - diesen können Sie auf der Startseite im Admin Bereich einsehen.'
    ],
    'thumbnail'   => 'pictures/logo.png',
    'version'     => '3.0.2',
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
