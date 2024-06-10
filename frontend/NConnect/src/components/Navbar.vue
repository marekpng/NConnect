<template>
  <div class="navigation-area primary-shadow">
    <div class="top-info-bar">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contact-info-bar">
              <ul>
                <li><i class="fa fa-map-marker"></i> 49 West 32nd Street, New York</li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 text-right mobile-left">
            <div class="contact-info-bar">
              <ul>
                <li><i class="fa fa-phone"></i> +02 525 486 232</li>
                <li><i class="fa fa-envelope"></i> eelias.cse@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div><!-- /.container -->
    </div><!-- /.top-info-bar -->
  </div>
  <div>
    <nav class="navbar">
      <div class="navbar-brand">
        <a class="navbar-item" href="#">
          MyBrand
        </a>
        <div class="navbar-burger" @click="toggleMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="navbar-menu" :class="{ 'is-active': isActive }">
        <div class="navbar-start">
          <a class="navbar-item" href="#">Home</a>
          <a class="navbar-item" href="#">About</a>
          <a class="navbar-item" href="#">Contact</a>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isActive: false
    };
  },
  methods: {
    toggleMenu() {
      this.isActive = !this.isActive;
    }
  }
};
</script>

<style>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  background-color: #333;
  color: white;
}
.navbar-item {
  color: white;
  text-decoration: none;
  padding: 0.5rem 1rem;
}
.navbar-burger {
  display: none;
  cursor: pointer;
}
.navbar-burger span {
  display: block;
  width: 25px;
  height: 3px;
  margin: 4px;
  background-color: white;
}
.navbar-menu {
  display: flex;
}
.navbar-menu.is-active {
  display: block;
}
.navbar-start {
  display: flex;
}

@media (max-width: 768px) {
  .navbar-burger {
    display: block;
  }
  .navbar-menu {
    display: none;
    flex-direction: column;
    width: 100%;
  }
  .navbar-menu.is-active {
    display: flex;
  }
  .navbar-start {
    flex-direction: column;
    width: 100%;
  }
  .navbar-item {
    padding: 1rem;
    text-align: center;
    width: 100%;
  }
}
</style>
