# Laravel Quotes Package
Package for interacting with the dummyjson.com quotes API.

## Progress
- Hour 1: Initial package setup with Composer, QuotesServiceProvider, config, and Vue.js with Vite.
- Hour 2: Implemented QuotesApiService with getAllQuotes, getRandomQuote, getQuote, and basic caching.
- Hour 3: Added rate limiting and binary search to QuotesApiService.
- Hour 4: Added API routes and QuotesController.
- Hour 5: Setup Vue.js UI with fetch all quotes functionality.
- Hour 6: Completed Vue.js UI with random quote and quote by ID.
- Hour 7: Made assets publishable, added view, and successfully tested package in Laravel 11 app.

## Documentation

## Installation
1. Install the package via Composer:
   ```bash
   composer require jjmartinezf/quotes

2. Publish the package assets (config, assets, and views):
   ```bash
php artisan vendor:publish --tag=config
php artisan vendor:publish --tag=assets
php artisan vendor:publish --tag=views

3. Run the package migrations:
   ```bash
