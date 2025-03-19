<script>
  import axios from 'axios';

  export default {
    name: 'App',
    data() {
      return {
        quoteId: '',
        quotes: []
      };
    },
    methods: {
      async fetchAllQuotes() {
        try {
          const response = await axios.get('/api/quotes');
          this.quotes = response.data;
        } catch (error) {
          console.error('Error fetching quotes:', error);
          this.quotes = [];
        }
      },
      fetchRandomQuote() {
        console.log('Fetching random quote...');
      },
      fetchQuoteById() {
        console.log('Fetching quote with ID:', this.quoteId);
      }
    }
  };
</script>

<template>
  <div>
    <h1>Quotes UI</h1>
    <button @click="fetchAllQuotes">Get All Quotes</button>
    <button @click="fetchRandomQuote">Get Random Quote</button>
    <input v-model="quoteId" placeholder="Enter quote ID" />
    <button @click="fetchQuoteById">Get Quote by ID</button>

    <ul v-if="quotes.length">
      <li v-for="quote in quotes" :key="quote.id">
        {{ quote.quote }} - {{ quote.author }}
      </li>
    </ul>
    <p v-else>No quotes yet.</p>
  </div>
</template>
