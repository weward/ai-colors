<?php 

namespace App\Services;

class AIService 
{
    protected $config;
    protected $service;

    public function __construct()
    {
        $this->config = $this->loadService();
    }

    public function suggest($request)
    {
        return $this->service->suggest($request);
    }

    public function loadService()
    {
        $connection = config('ai.connection');
        $service = config("ai.{$connection}");

        $this->service = new $service['service_class']($service);
    }

}