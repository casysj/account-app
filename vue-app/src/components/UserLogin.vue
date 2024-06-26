<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="login">
      <div>
        <label for="email">Email</label>
        <input type="email" v-model="email" id="email" required>
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" v-model="password" id="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'UserLogin',
  data() {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    ...mapActions(['login']),
    async submitLogin() {
      try {
        await this.login({ email: this.email, password: this.password })
        this.$router.push('/')
      } catch (error) {
        console.error('Error logging in:', error)
      }
    }
  }
}
</script>
