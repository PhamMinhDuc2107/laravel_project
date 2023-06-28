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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => "248268501257959",
        'client_secret' => "7e48fe28749b602fce78d950a8cb5638",
        'redirect' => 'http://127.0.0.1:8000/login/callback/facebook',
    ],
    'google' => [
        'client_id' => "929838680450-vibjji1egk5d26gt5evojqonsp257p4q.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => 'http://127.0.0.1:8000/login/callback/google',
    ],

];