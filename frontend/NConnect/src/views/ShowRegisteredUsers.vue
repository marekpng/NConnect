<template>
  <AdminNavbar />
  <div class="about">
    <h1>Registered users</h1>
    <div v-if="stageUsers.length">
      <table>
        <thead>
        <tr>
          <th>Stage Name</th>
          <th>User Name</th>
          <th>User Email</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in stageUsers" :key="user.user_id">
          <td>{{ user.stage_name }}</td>
          <td>{{ user.user_name }}</td>
          <td>{{ user.user_email }}</td>
        </tr>
        </tbody>
      </table>
    </div>
    <div v-else>
      <p>No users registered yet.</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import AdminNavbar from "@/components/AdminNavbar.vue";

export default {
  name: 'AboutPage',
  components: {AdminNavbar},
  data() {
    return {
      stageUsers: []
    };
  },
  mounted() {
    this.fetchStageUsers();
  },
  methods: {
    async fetchStageUsers() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/stage-users', {headers});
        this.stageUsers = response.data;
      } catch (error) {
        console.error('Error fetching stage users:', error);
        alert('Failed to fetch stage users.');
      }
    }
  }
};
</script>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
    flex-direction: column;
  }
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: left;
}
thead {
  background-color: #f4f4f4;
}
</style>
