<?php
return [
    'api_url' => env('QUOTES_API_URL', 'https://dummyjson.com'),
    'rate_limit' => env('QUOTES_RATE_LIMIT', 100),
    'rate_window' => env('QUOTES_RATE_WINDOW', 60),
];
