<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'

</script>

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

    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--          <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Site Logo" /></a>-->
        </div>

        <!-- Collect the nav links and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="ml15"><a class="button alt" href="price-table.html">Reserve Your Seat</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="current"><a href="index.html">Home</a></li>
            <li><a href="speakers.html">Speakers</a></li>
            <li><a href="schedule.html">Schedule</a></li>
            <li><a href="sponsors.html">Sponsors</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="about.html">About</a></li>
                <li><a href="accommodation.html">Accommodation</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="price-table.html">Price Table</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
                <li><a href="404.html">404 Error</a></li>
              </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </div><!-- /.navigation-area -->


<!--  <RouterView />-->
</template>

<style >
@import 'css/style.css';
@import 'css/font.css';
@import 'css/color.css';
/*header {*/
/*  line-height: 1.5;*/
/*  max-height: 100vh;*/
/*}*/

/*.logo {*/
/*  display: block;*/
/*  margin: 0 auto 2rem;*/
/*}*/

/*nav {*/
/*  width: 100%;*/
/*  font-size: 12px;*/
/*  text-align: center;*/
/*  margin-top: 2rem;*/
/*}*/

/*nav a.router-link-exact-active {*/
/*  color: var(--color-text);*/
/*}*/

/*nav a.router-link-exact-active:hover {*/
/*  background-color: transparent;*/
/*}*/

/*nav a {*/
/*  display: inline-block;*/
/*  padding: 0 1rem;*/
/*  border-left: 1px solid var(--color-border);*/
/*}*/

/*nav a:first-of-type {*/
/*  border: 0;*/
/*}*/

/*@media (min-width: 1024px) {*/
/*  header {*/
/*    display: flex;*/
/*    place-items: center;*/
/*    padding-right: calc(var(--section-gap) / 2);*/
/*  }*/

/*  .logo {*/
/*    margin: 0 2rem 0 0;*/
/*  }*/

/*  header .wrapper {*/
/*    display: flex;*/
/*    place-items: flex-start;*/
/*    flex-wrap: wrap;*/
/*  }*/

/*  nav {*/
/*    text-align: left;*/
/*    margin-left: -1rem;*/
/*    font-size: 1rem;*/

/*    padding: 1rem 0;*/
/*    margin-top: 1rem;*/
/*  }*/
/*}*/
</style>
