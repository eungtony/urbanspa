<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
        'client_id' => 'AR6vmgQQmcyoLqh0OYd5AOQ251_9smSe0n5rIkZ2yrUsSmHCj3mwUOW6EFj7yLliQLWhaolg60Mynk2M',
        'secret' => 'EMGssR-flO7mL-iPyKJXjivtEV1aWuaD00S-zbRG00O5X6fYY4EFoOqOj7mUB55ucPFkc9_WsF47EMRH'
    ],


];
