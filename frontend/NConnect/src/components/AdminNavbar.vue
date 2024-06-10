<template>
  <div>
    <nav>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/admin/crud-stages">CRUD Stages</router-link></li>
        <li><router-link to="/admin/register">Register new admin</router-link></li>
        <li><router-link to="/admin/create-sponsor">Create Sponsor</router-link></li>
        <li><router-link to="/admin/create-speaker">CRUD Speaker profile</router-link></li>
        <li><router-link to="/admin/show-registered-users">Zobrazenie prihlasenych uzivatelov na prednasky</router-link></li>
        <li><router-link to="/admin/about-us">CRUD said about us</router-link></li>
        <li><router-link to="/admin/gallery">CRUD Gallery</router-link></li>
      </ul>
    </nav>
    <router-view></router-view>
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
export default {
  name: "AdminNavbar"
}
</script>

<style scoped>

</style>