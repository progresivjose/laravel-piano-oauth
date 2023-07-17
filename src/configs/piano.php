<?php

return [
    'aid' => env('PIANO_AID', null),
    'api_token' => env('PIANO_API_TOKEN', null),
    'oauth_client_secret' => env('PIANO_OAUTH_CLIENT_SECRET', null),
    'redirect_url' => 'https://sandbox.piano.io/id/',
    'guard' => env('PIANO_AUTH_GUARD', 'web'),
];
