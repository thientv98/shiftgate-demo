<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'login' => [
        'false' => 'Email or password are incorrect!',
        'true' => 'Logged in successfully!',
        'locked' => "You're been locked out",
        'withdrawal' => "You've been withdrawal",
    ],
    'register' => [
        'duplicate_email' => "Duplicate Email!"
    ],
    'token' => [
        'expired' => 'Token is expired!',
        'valid' => 'The token is not valid!'
    ]
];
