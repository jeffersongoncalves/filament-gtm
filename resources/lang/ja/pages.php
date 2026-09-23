<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => '設定',
    'title' => 'Google Tag Manager 設定',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Google Tag Manager のコンテナ ID を設定します。',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'GTM コンテナ ID',
            'helper' => 'Google Tag Manager のコンテナ ID を入力してください（例: GTM-XXXXXXX）。',
        ],
    ],
];
