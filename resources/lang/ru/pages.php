<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Настройки',
    'title' => 'Настройки Google Tag Manager',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Настройте идентификатор контейнера Google Tag Manager.',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'ID контейнера GTM',
            'helper' => 'Введите идентификатор контейнера Google Tag Manager (например, GTM-XXXXXXX).',
        ],
    ],
];
