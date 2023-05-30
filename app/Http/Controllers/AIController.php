<?php

namespace App\Http\Controllers;

use App\Services\AIService;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function __construct(protected AIService $service) {}

    public function index(Request $request)
    {
        return $this->service->suggest($request);
    }
    
}
