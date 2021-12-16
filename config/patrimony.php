<?php 

return [
    'filters' => [
        ['label' => 'Patrimônio', 'value' => 'patrimonio'],
        ['label' => 'Componente', 'value' => 'componente'],
        ['label' => 'Modelo', 'value' => 'modelo'],
        ['label' => 'IP', 'value' => 'ip'],
        ['label' => 'Local', 'value' => 'local'],
        ['label' => 'Setor', 'value' => 'setor'],
    ],

    'counters' => [
        [
            'icon' => 'desktop',
            'label' => 'Patrimônios',
            'model' => '\App\Models\Patrimony'
        ],
        [
            'icon' => 'building',
            'label' => 'Locais',
            'model' => '\App\Models\Place'
        ],
        [
            'icon' => 'laptop-house',
            'label' => 'Setores',
            'model' => '\App\Models\Sector'
        ],
        [
            'icon' => 'users',
            'label' => 'Usuarios',
            'model' => '\App\Models\User'
        ]
    ]
];