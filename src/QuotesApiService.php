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

    protected function attemptRequest($key, callable $callback)
    {
        return RateLimiter::attempt(
            $key,
            config('quotes.rate_limit', 100),
            $callback,
            config('quotes.rate_window', 60)
        );
    }

    public function getAllQuotes()
    {
        return $this->attemptRequest('quotes:all', function () {
            $response = Http::get("{$this->baseUrl}/quotes");
            $quotes = $response->successful() ? $response->json()['quotes'] : [];
            $this->cache = $quotes;
            return $quotes;
        });
    }

    public function getRandomQuote()
    {
        return $this->attemptRequest('quotes:random', function () {
            $response = Http::get("{$this->baseUrl}/quotes/random");
            return $response->successful() ? $response->json() : null;
        });
    }

    public function getQuote($id)
    {
        return $this->attemptRequest("quotes:{$id}", function () use ($id) {
            $response = Http::get("{$this->baseUrl}/quotes/{$id}");
            $quote = $response->successful() ? $response->json() : null;
            if ($quote) {
                $this->cache[] = $quote;
            }
            return $quote;
        });
    }
}
