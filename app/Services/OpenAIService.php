<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $connection;
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    public function suggest($request)
    {
        $content = $this->composeContent($request);

        return $this->connection
            ->post($this->config['url'], [
                'model' => $request['model'] ?? $this->config['model'],
                'prompt' => $content,
                'max_tokens' => $request['max_tokens'] ?? $this->config['max_tokens'],
                'temperature' => $this->config['temperature'] ?? $this->config['temperature'],
            ])
            // like try/catch
            ->throw(function (Response $response, RequestException $e) {
                // Log Error here
                info($e->getMessage());
            })
            // ->json()['choices'][0]['text'] ?? $this->failed();            
            ->json();
    }

    public function composeContent($request)
    {
        return "Give {$request['count']} samples of a color palette 
            using {$request['color_theory_type']} 
            color theory with {$request['base_color']} being the base color 
            with number of colors being {$request['colors_count']}";
    }

    private function connect()
    {
        $this->connection = Http::withoutVerifying()
            ->withHeaders($this->config['headers']);
    }

    private function failed()
    {
        return response()->json('Failed', 500);
    }
}
