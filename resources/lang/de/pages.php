<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Einstellungen',
    'title' => 'Google Tag Manager-Einstellungen',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Konfigurieren Sie Ihre Google Tag Manager-Container-ID.',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'GTM-Container-ID',
            'helper' => 'Geben Sie Ihre Google Tag Manager-Container-ID ein (z. B. GTM-XXXXXXX).',
        ],
    ],
];
