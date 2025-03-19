<?php
namespace Jjmartinezf\Quotes;

use Illuminate\Support\Facades\Http;

class QuotesApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('quotes.api_url');
    }

    public function getAllQuotes()
    {
        $response = Http::get("{$this->baseUrl}/quotes");
        return $response->successful() ? $response->json()['quotes'] : [];
    }

    public function getRandomQuote()
    {
        $response = Http::get("{$this->baseUrl}/quotes/random");
        return $response->successful() ? $response->json() : null;
    }
}
