<template>
  <body>

<Navbar />
  <div class="header-area" id="home-header">
    <div class="header-slide header-slide-1">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3>14 - 26 december 2016 , <span>New York</span></h3>
              <h1><small>Material Designer</small>Conference</h1>
              <ul class="buttons">
                <li><a href="#" class="line-button">REGister Now</a></li>
                <li><a href="#" class="line-button">Learn More</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.header-area -->

  <div class="about-area gray-bg" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb30">
          <div class="video-intro primary-shadow">
            <img src="/images/about/video-intro.jpg" alt="video-intro" />
            <a class="video-play embedded-popup" href="https://www.youtube.com/watch?v=SZEflIVnhH8">
              <i class="fa fa-play"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-text">
            <h4>PÁR SLOV O KONFERENCII NCONNECT</h4>
            <p>Po mnohých rokoch premýšľania a plánovania sme vytvorili nConnect, jedinečnú udalosť v Nitre, ktorá spája študentov IT a popredné firmy z tohto dynamického odvetvia. Konferencia nConnect nadväzuje na dlhoročnú tradíciu formátu "IT v praxi" Fakulty prírodných vied a informatiky UKF v Nitre. Táto iniciatíva je mostom medzi novou generáciou talentov a skúsenými profesionálmi, ktorý poskytuje fórum pre vzájomnú výmenu myšlienok a inšpirácií. Naše poslanie bolo jasné: vyplniť medzeru v regionálnej komunikácii a spolupráci v IT a nConnect je hrdým výsledkom tejto vízie.</p>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="single-about primary-shadow white-bg">
                <h5>KTO SME ?</h5>
                <p>Sme skupina nadšencov pre IT z akademického a súkromného sektora.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single-about primary-shadow white-bg">
                <h5>ČO CHCEME DOSIAHNUŤ ?</h5>
                <p>Vytvoriť udalosť, ktorá bude na pravidelnej báze spájať IT komunitu v Nitre.</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.about-area -->



  <Speakers />

  <StageArea />
<Gallery />

  <Sponsors />

<Testimonials />

<FooterComponent />

<!--  <div class="footer-area">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-md-4 col-sm-6">-->
<!--          <div class="single-footer-widget">-->
<!--            <a href="index.html" class="footer-logo">-->
<!--              <img src="/images/footer-logo.png" alt="logo" />-->
<!--            </a>-->
<!--            <p>Spájame IT komunity</p>-->
<!--            <ul class="footer-social">-->
<!--              <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--              <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--              <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>-->
<!--              <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
<!--              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--              <li><a href="#"><i class="fa fa-tumblr"></i></a></li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>&lt;!&ndash; /.col &ndash;&gt;-->
<!--        <div class="col-md-4 col-sm-6">-->
<!--          <div class="single-footer-widget">-->
<!--            <h4>-->


<!--              Študentské centrum UKF Dražovská 2, Nitra</h4>-->
<!--&lt;!&ndash;            <form action="subscribe.php" class="subscription-form">&ndash;&gt;-->
<!--&lt;!&ndash;              <input type="text" placeholder="Your Email" />&ndash;&gt;-->
<!--&lt;!&ndash;              <input type="submit" value="go" />&ndash;&gt;-->
<!--&lt;!&ndash;            </form>&ndash;&gt;-->
<!--            <h4>Fakulta prírodných vied a informatiky UKF v Nitre</h4>-->
<!--          </div>-->
<!--        </div>&lt;!&ndash; /.col &ndash;&gt;-->
<!--        <div class="col-md-4 col-sm-12">-->
<!--          <div class="single-footer-widget">-->
<!--            <h4>Fakulta prírodných vied a informatiky UKF v Nitre</h4>-->
<!--&lt;!&ndash;            <ul class="gallery-list">&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/1.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/2.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/3.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/4.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/2.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;              <li><img src="/images/gallery/thumb/1.jpg" alt="gallery" /></li>&ndash;&gt;-->
<!--&lt;!&ndash;            </ul>&ndash;&gt;-->
<!--&lt;!&ndash;            <a href="#" class="more-image">More /images</a>&ndash;&gt;-->
<!--          </div>-->
<!--        </div>&lt;!&ndash; /.col &ndash;&gt;-->
<!--      </div>&lt;!&ndash; /.row &ndash;&gt;-->
<!--    </div>&lt;!&ndash; /.container &ndash;&gt;-->
<!--  </div>&lt;!&ndash; /.footer-area &ndash;&gt;-->

<!--  <div class="footer-bar-area">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-md-12">-->
<!--          <span>Copyright 2015 . Designed By <a href="#">BestPixels</a></span>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>&lt;!&ndash; /.footer-bar-area &ndash;&gt;-->




  </body>

</template>


<style>


</style>
<script setup>

import Speakers from "@/components/Speakers.vue";
import Sponsors from "@/components/Sponsors.vue";
import StageArea from "@/components/StageArea.vue";
import Gallery from "@/components/Gallery.vue";
import Testimonials from "@/components/Testimonials.vue";
import Navbar from "@/components/Navbar.vue";
import FooterComponent from '@/components/FooterComponent.vue';

</script>