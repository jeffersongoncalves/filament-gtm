<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Configurações',
    'title' => 'Configurações do Google Tag Manager',

    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Configure o ID do contêiner do Google Tag Manager.',
        ],
    ],

    'fields' => [
        'gtm_id' => [
            'label' => 'ID do Contêiner GTM',
            'helper' => 'Insira o ID do contêiner do Google Tag Manager (ex: GTM-XXXXXXX).',
        ],
    ],
];
