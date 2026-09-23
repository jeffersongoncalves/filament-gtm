<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Paramètres',
    'title' => 'Paramètres de Google Tag Manager',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Configurez l\'ID de votre conteneur Google Tag Manager.',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'ID du conteneur GTM',
            'helper' => 'Saisissez l\'ID de votre conteneur Google Tag Manager (par ex. GTM-XXXXXXX).',
        ],
    ],
];
