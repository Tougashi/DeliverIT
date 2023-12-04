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

    'firebase' => [
        'api_key' => env('AIzaSyDPaBgt_oedAQiUxlApwiPc9LCsx7W96pQ'),
        'auth_domain' => env('deliverit-394707.firebaseapp.com'),
        'database_url' => env('https://deliverit-394707-default-rtdb.asia-southeast1.firebasedatabase.app'),
        'project_id' => env('deliverit-394707'),
        'storage_bucket' => env('deliverit-394707.appspot.com'),
        'messaging_sender_id' => env('416813571494'),
        'app_id' => env('1:416813571494:web:f43cadc45a0388780e8367'),
        'measurement_id' => env('G-HSGLDLQM38'),    
    ],

];
