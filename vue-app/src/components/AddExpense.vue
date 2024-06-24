<template>
  <div>
    <h1>Add Expense</h1>
    <form @submit.prevent="addExpense">
      <div>
        <label for="description">Description</label>
        <input type="text" v-model="description" id="description" required>
      </div>
      <div>
        <label for="amount">Amount</label>
        <input type="number" v-model="amount" id="amount" required>
      </div>
      <button type="submit">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      description: '',
      amount: 0
    }
  },
  methods: {
    addExpense() {
      const newExpense = {
        description: this.description,
        amount: this.amount,
        date: new Date().toISOString(),
        user: 1  // 예시로 사용자 ID를 하드코딩
      }
      this.$http.post('http://localhost:8000/api/expenses', newExpense)
          .then(response => {
            console.log('Expense added:', response.data)
            // 폼 초기화
            this.description = ''
            this.amount = 0
          })
          .catch(error => {
            console.error('Error adding expense:', error)
          })
    }
  }
}
</script>
