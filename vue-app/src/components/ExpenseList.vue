<template>
  <div>
    <h1>Expenses</h1>
    <ul>
      <li v-for="expense in expenses" :key="expense.id">
        {{ expense.description }}: {{ expense.amount }} €
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      expenses: []
    }
  },
  created() {
    this.fetchExpenses();
  },
  methods: {
    fetchExpenses() {
      this.$http.get('http://localhost:8000/api/expenses')
          .then(response => {
            this.expenses = response.data;
          })
          .catch(error => {
            console.error('Error fetching expenses:', error);
          });
    }
  }
}
</script>
