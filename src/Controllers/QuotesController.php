<?php
namespace Jjmartinezf\Quotes\Controllers;

use Jjmartinezf\Quotes\QuotesApiService;
use Illuminate\Http\Request;

class QuotesController
{
    protected $apiService;

    public function __construct(QuotesApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        return response()->json($this->apiService->getAllQuotes());
    }

    public function random()
    {
        return response()->json($this->apiService->getRandomQuote());
    }

    public function show($id)
    {
        return response()->json($this->apiService->getQuote($id));
    }
}
