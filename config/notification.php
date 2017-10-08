<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Notification Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'slack' => [
        'webhook_url' => env('SLACK_WEBHOOK_URL'),
    ],

];
