<script>
  import axios from 'axios';

  export default {
    name: 'App',
    data() {
      return {
        quoteId: '',
        quotes: [],
        randomQuote: null,
        selectedQuote: null
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
      async fetchRandomQuote() {
        try {
          const response = await axios.get('/api/quotes/random');
          this.randomQuote = response.data;
        } catch (error) {
          console.error('Error fetching random quote:', error);
          this.randomQuote = null;
        }
      },
      async fetchQuoteById() {
        if (!this.quoteId) {
          alert('Please enter a quote ID');
          return;
        }
        try {
          const response = await axios.get(`/api/quotes/${this.quoteId}`);
          this.selectedQuote = response.data;
        } catch (error) {
          console.error('Error fetching quote by ID:', error);
          this.selectedQuote = null;
        }
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

    <h2>All Quotes</h2>
    <ul v-if="quotes.length">
      <li v-for="quote in quotes" :key="quote.id">
        {{ quote.quote }} - {{ quote.author }}
      </li>
    </ul>
    <p v-else>No quotes yet.</p>

    <h2>Random Quote</h2>
    <p v-if="randomQuote">{{ randomQuote.quote }} - {{ randomQuote.author }}</p>
    <p v-else>No random quote yet.</p>

    <h2>Quote by ID</h2>
    <p v-if="selectedQuote">{{ selectedQuote.quote }} - {{ selectedQuote.author }}</p>
    <p v-else>No quote selected.</p>
  </div>
</template>

<style>
  div {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  h1 {
    color: #333;
  }
  button {
    padding: 10px;
    margin: 5px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }
  input {
    padding: 10px;
    margin: 5px;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }
  h2 {
    margin-top: 20px;
    color: #666;
  }
</style>
