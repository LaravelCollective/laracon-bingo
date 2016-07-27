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

  'github' => [
    'client_id'     => env('GITHUB_CLIENT_ID', 'b66d4b3b7b911202cdbd'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect'      => env('GITHUB_REDIRECT_URL', 'https://bingo.laravelcollective.com/auth/github'),
  ],

  'facebook' => [
    'client_id'     => env('FACEBOOK_CLIENT_ID', '1568380853465231'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect'      => env('FACEBOOK_REDIRECT_URL', 'https://bingo.laravelcollective.com/auth/github'),
  ],

  'mailgun' => [
    'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
  ],

  'mandrill' => [
    'secret' => env('MANDRILL_SECRET'),
  ],

  'ses' => [
    'key'    => env('SES_KEY'),
    'secret' => env('SES_SECRET'),
    'region' => 'us-east-1',
  ],

  'sparkpost' => [
    'secret' => env('SPARKPOST_SECRET'),
  ],

  'stripe' => [
    'model'  => App\User::class,
    'key'    => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
  ],

];
