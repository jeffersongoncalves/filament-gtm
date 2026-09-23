<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => '设置',
    'title' => 'Google Tag Manager 设置',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => '配置你的 Google Tag Manager 容器 ID。',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'GTM 容器 ID',
            'helper' => '输入你的 Google Tag Manager 容器 ID（例如 GTM-XXXXXXX）。',
        ],
    ],
];
