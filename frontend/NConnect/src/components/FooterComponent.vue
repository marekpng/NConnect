<template>
  <div>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="single-footer-widget">
              <a href="index.html" class="footer-logo">
                <img src="/images/footer-logo.png" alt="logo" />
              </a>
              <p>Spájame IT komunity.</p>
              <ul class="footer-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-footer-widget">
              <h4>Študentské centrum UKF Dražovská 2, Nitra</h4>
<!--              <form action="subscribe.php" class="subscription-form">-->
<!--                <input type="text" placeholder="Your Email" />-->
<!--                <input type="submit" value="go" />-->
<!--              </form>-->
              <p>info@nconnect.sk</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="single-footer-widget">
              <h4>Fakulta prírodných vied a informatiky UKF v Nitre</h4>
<!--              <ul class="gallery-list">-->
<!--                <li><img src="/images/gallery/thumb/1.jpg" alt="gallery" /></li>-->
<!--                <li><img src="/images/gallery/thumb/2.jpg" alt="gallery" /></li>-->
<!--                <li><img src="/images/gallery/thumb/3.jpg" alt="gallery" /></li>-->
<!--                <li><img src="/images/gallery/thumb/4.jpg" alt="gallery" /></li>-->
<!--                <li><img src="/images/gallery/thumb/2.jpg" alt="gallery" /></li>-->
<!--                <li><img src="/images/gallery/thumb/1.jpg" alt="gallery" /></li>-->
<!--              </ul>-->
<!--              <a href="#" class="more-image">More /images</a>-->
            </div>
            <div class="single-footer-widget">
              <h4>Custom Sites</h4>
              <ul class="custom-sites-list">
                <li v-for="site in customSites" :key="site.id">
                  <router-link :to="'/path/' + site.path">{{ site.name }}</router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bar-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Copyright 2015. Designed By <a href="#">BestPixels</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
  name: 'FooterComponent',
  setup() {
    const customSites = ref([]);

    const fetchCustomSites = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/custom-sites');
        if (response.ok) {
          const data = await response.json();
          customSites.value = data;
        } else {
          console.error('Failed to fetch custom sites:', response.status, await response.text());
        }
      } catch (error) {
        console.error('Error fetching custom sites:', error);
      }
    };

    onMounted(fetchCustomSites);

    return {
      customSites,
    };
  },
};
</script>

<style scoped>
/* Add any necessary styling here */
.custom-sites-list {
  list-style: none;
  padding: 0;
}

.custom-sites-list li {
  margin-bottom: 5px;
}
</style>
