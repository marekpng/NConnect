
<template>
  <div class="sponsors-area gray-bg">
    <div class="container">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Our Sponsors</h4>
          </div>
        </div>
      </div>

      <!-- Sponsors Navigation -->
      <div class="sponsors-nav">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#allSponsors" data-toggle="tab">All Sponsors</a></li>
        </ul>
      </div>

      <!-- Sponsors Content -->
      <div class="tab-content sponsors-contents text-center">
        <!-- All Sponsors -->
        <div role="tabpanel" class="tab-pane active" id="allSponsors">
          <div class="row">
            <div v-for="sponsor in sponsors" :key="sponsor.id" class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <a :href="sponsor.website_url" target="_blank">
                  <img :src="getImageUrl(sponsor.image)" :alt="sponsor.name" class="sponsor-image" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Sponsors",
  data() {
    return {
      sponsors: [], // Array to store all sponsors data
    };
  },
  mounted() {
    this.fetchSponsors();
  },
  methods: {
    // Method to fetch sponsors data from the backend
    fetchSponsors() {
      axios.get('http://127.0.0.1:8000/api/sponsors')
          .then(response => {
            this.sponsors = response.data;
            console.log(response.data);
          })
          .catch(error => {
            console.error('Error fetching sponsors:', error);
          });
    },
    // Method to construct full image URL
    getImageUrl(imagePath) {
      return imagePath ? `http://127.0.0.1:8000/storage/${imagePath}` : '';
    }
  }
}
</script>

<style scoped>
.sponsor-image {
  width: 100%;
  height: 300px; /* Set a fixed height */
  object-fit: contain; /* Scale the image to cover the entire box */

}
</style>
