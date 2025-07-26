<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'shopify' => [
        'store' => env('SHOPIFY_STORE_NAME'),
        'password' => env('SHOPIFY_ACCESS_TOKEN'),
        'url' => env('SHOPIFY_APP_URL'),
        'key' => env('SHOPIFY_API_KEY'),
        'secret' => env('SHOPIFY_API_SECRET'),
        'scopes' => env('SHOPIFY_API_SCOPES'),
        'redirect_url' => env('SHOPIFY_APP_REDIRECT_URL'),
        'api_version' => env('SHOPIFY_APP_VERSION', '2022-07'),
    ],
    'saasbox' => [
        'key' => env('SAAS_BOX_API_KEY'),
        'url' => env('SAAS_BOX_API_URL'),
    ]
];
