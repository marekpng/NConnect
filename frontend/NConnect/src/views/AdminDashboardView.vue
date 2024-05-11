<template>
<h5>Admin dash</h5>
  <div>
    <nav>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/admin/crud-stages">CRUD Stages</router-link></li>
        <li><router-link to="/admin/register">Register new admin</router-link></li>

      </ul>
    </nav>
    <router-view></router-view>
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
import axios from "axios";
import router from "@/router/index.js";

export default {
  name: "AdminDashboardView",
  data() {
    return {}
  },
  methods: {
    logout() {
      axios.post('http://127.0.0.1:8000/api/logout', {}, { headers: { Authorization: `Bearer ${localStorage.getItem('adminToken')}` } })
          .then(response => {
            console.log(response.data);
            // Clear the token from localStorage
            localStorage.removeItem('adminToken');
            router.push({ name: 'index' });
            // Optionally, redirect to login page or perform any other action after logout
          })
          .catch(error => {
            console.error('Error logging out:', error);
          });
    }
  }
}

</script>

<style scoped>

</style>