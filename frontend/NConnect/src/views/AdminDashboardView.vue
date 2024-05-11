<template>
<h5>Admin dash</h5>
  <div>
    <nav>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/admin/crud-stages">CRUD Stages</router-link></li>
      </ul>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "AdminDashboardView"
}
</script>

<style scoped>

</style>