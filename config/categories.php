<?php

return [
    'url_prefix' => 'app',
    'defaults' => [
        'per-page' => 5,
        'order-by' => 'created_at',
        'order-in' => 'DESC',
    ],
    'middleware' => ['auth:sanctum'],
    'model' => Iyngaran\Advertiser\Tests\Models\User::class,
];
