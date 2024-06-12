<template>
  <div>
    <nav>
      <ul class="navbar">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/admin/crud-stages">CRUD Stages</router-link></li>
        <li><router-link to="/admin/register">Register new admin</router-link></li>
        <li><router-link to="/admin/create-sponsor">CRUD Sponsor</router-link></li>
        <li><router-link to="/admin/create-speaker">CRUD Speaker profile</router-link></li>
        <li><router-link to="/admin/show-registered-users">Zobrazenie prihlasenych uzivatelov na prednasky</router-link></li>
        <li><router-link to="/admin/about-us">CRUD said about us</router-link></li>
        <li><router-link to="/admin/gallery">CRUD Gallery</router-link></li>
        <li><router-link to="/admin/editor">Custom sites</router-link></li>

      </ul>
    </nav>
    <router-view></router-view>
    <button @click="logout" class="logout-button">Logout</button>
  </div>
</template>

<script>
import axios from "axios";
import router from "@/router/index.js";

export default {
  name: "AdminNavbar",
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
nav {
  background-color: #333;
  padding: 1rem;
}

.navbar {
  list-style: none;
  display: flex;
  gap: 1rem;
  justify-content: center;
  margin: 0;
  padding: 0;
  flex-wrap: wrap;
}

.navbar li {
  margin: 0;
}

.navbar a {
  color: white;
  text-decoration: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.navbar a:hover {
  background-color: #555;
}

.logout-button {
  display: block;
  margin: 1rem auto;
  padding: 0.5rem 1rem;
  color: white;
  background-color: #ff5e57;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.logout-button:hover {
  background-color: #ff3b30;
}

@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    align-items: center;
  }

  .navbar li {
    margin-bottom: 0.5rem;
  }
}
</style>