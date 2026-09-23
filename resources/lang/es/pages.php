<?php

return [
    'navigation_label' => 'Google Tag Manager',
    'navigation_group' => 'Configuración',
    'title' => 'Configuración de Google Tag Manager',
    'sections' => [
        'gtm' => [
            'heading' => 'Google Tag Manager',
            'description' => 'Configura el ID de contenedor de Google Tag Manager.',
        ],
    ],
    'fields' => [
        'gtm_id' => [
            'label' => 'ID de contenedor GTM',
            'helper' => 'Introduce el ID de contenedor de Google Tag Manager (p. ej., GTM-XXXXXXX).',
        ],
    ],
];
