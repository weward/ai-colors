<?php 

return [
    'connection' => env('AI_CONNECTION', 'openai'),

    # OPEN AI
    'openai' => [
        'service_class' => 'App\\Services\\OpenAIService',
        'headers' => [
            'Authorization' => 'Bearer ' . env('OPEN_AI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ],
        'url' => env('OPEN_AI_URL'),
        'model' => env('OPEN_AI_MODEL', 'text-davinci-003'),
        'max_tokens' => 1000,
        'temperature' => 0.2,
    ],

    // some other ai provider
];