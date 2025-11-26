<?php

return [
    'test' => env('DGT_TEST', false),
    'certificate' => [
        'path' => env('DGT_CERTIFICATE_PATH'),
        'password' => env('DGT_CERTIFICATE_PASSWORD'),
    ],
    'auth' => [
        'username' => env('DGT_AUTH_USERNAME'),
        'password' => env('DGT_AUTH_PASSWORD'),
    ],
    'path' => env('DGT_PATH'),
    'callback_url' => env('DGT_CALLBACK_URL'),
];
