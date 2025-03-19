<?php
namespace Jjmartinezf\Quotes;

use Illuminate\Support\Facades\Http;

class QuotesApiService
{
    protected $baseUrl;
    protected $cache = [];

    public function __construct()
    {
        $this->baseUrl = config('quotes.api_url');
    }

    public function getAllQuotes()
    {
        $response = Http::get("{$this->baseUrl}/quotes");
        $quotes = $response->successful() ? $response->json()['quotes'] : [];
        $this->cache = $quotes;
        return $quotes;
    }

    public function getRandomQuote()
    {
        $response = Http::get("{$this->baseUrl}/quotes/random");
        return $response->successful() ? $response->json() : null;
    }

    public function getQuote($id)
    {
        $response = Http::get("{$this->baseUrl}/quotes/{$id}");
        $quote = $response->successful() ? $response->json() : null;
        if ($quote) {
            $this->cache[] = $quote;
        }
        return $quote;
    }
}
