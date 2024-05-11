<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="loginData.email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="loginData.password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
import axios from 'axios';
import router from "@/router/index.js";
// import { router } from '@/router';

export default {
  name: 'Login',
  data() {
    return {
      loginData: {
        email: '',
        password: ''
      }
    };
  },
  methods: {
    login() {
      axios.post('http://127.0.0.1:8000/api/login', this.loginData)
          .then(response => {
            // Handle successful login response here
            console.log('Login successful:', response.data);

            // Store the token in localStorage
            const token = response.data.token;
            localStorage.setItem('adminToken', token);

            // Optionally, you can redirect the user to another page after successful login
            // window.location.href = '/dashboard';
            router.push({ name: 'Admin' }); // Assuming the name of the route for admin view is 'Admin'
          })
          .catch(error => {
            // Handle login error here
            console.error('Error logging in:', error.response.data);
          });
    },
    logout() {
      axios.post('http://127.0.0.1:8000/api/logout', {}, { headers: { Authorization: `Bearer ${localStorage.getItem('adminToken')}` } })
          .then(response => {
            console.log(response.data);
            // Clear the token from localStorage
            localStorage.removeItem('adminToken');
            // Optionally, redirect to login page or perform any other action after logout
          })
          .catch(error => {
            console.error('Error logging out:', error);
          });
    }

  }
}
</script>
<style>

</style>