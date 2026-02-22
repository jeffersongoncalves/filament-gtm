<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Settings',
    'title' => 'Google Tag Manager Settings',

    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Configure your Google Tag Manager container ID.',
        ],
    ],

    'fields' => [
        'gtm_id' => [
            'label' => 'GTM Container ID',
            'helper' => 'Enter your Google Tag Manager container ID (e.g., GTM-XXXXXXX).',
        ],
    ],
];
