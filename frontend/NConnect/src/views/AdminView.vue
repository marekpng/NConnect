<template>
  <form @submit.prevent="login">
    <div>
      <label for="email">Email</label>
      <input type="email" v-model="email" required>
    </div>

    <div>
      <label for="password">Password</label>
      <input type="password" v-model="password" required>
    </div>

    <button type="submit">Login</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async login() {
      try {
        // Retrieve CSRF token from cookie
        const csrfToken = this.getCookie('XSRF-TOKEN');

        // Set CSRF token in Axios headers
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

        // Send login request
        const response = await axios.post('http://127.0.0.1:8000/admin/login', {
          email: this.email,
          password: this.password
        });

        // Handle successful login
        console.log(response.data);
        // Redirect to admin dashboard if authentication successful
        this.$router.push('/admin/dashboard');
      } catch (error) {
        // Handle login error
        console.error(error);
        // Stay on login page if authentication fails
      }
    },
    getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    }
  }
}

</script>
