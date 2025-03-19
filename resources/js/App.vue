<script>
  export default {
    name: 'App',
    data() {
      return {
        quoteId: ''
      };
    },
    methods: {
      fetchAllQuotes() {
        console.log('Fetching all quotes...');
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
  </div>
</template>
