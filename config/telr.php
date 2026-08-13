<?php

return [
    'store_id' => env('TELR_STORE_ID'),
    'auth_key' => env('TELR_AUTH_KEY'),
    'test_mode' => env('TELR_TEST_MODE', true),
    'currency' => env('TELR_CURRENCY', 'USD'),
    'return_url' => env('TELR_RETURN_URL'), 
    'cancel_url' => env('TELR_CANCEL_URL'),
    'decline_url' => env('TELR_DECLINE_URL'),
];
