<template>
  <div class="testimonials-area image-bg">
    <div class="overlay">
      <div class="container">
        <div class="sub-heading">
          <div class="row">
            <div class="col-md-12">
              <h4>Povedali o nás</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="client-pagination clearfix" id="testimonial-pager">
              <a
                  v-for="(testimonial, index) in testimonials"
                  :key="index"
                  :data-slide-index="index"
                  href="#"
                  @click.prevent="displayTestimonial(index)"
              >
                <img  :src="testimonial.image_link"  class="client-thumbnail" alt="client" @error="onImageError" />
              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div id="testimonials">
              <div class="single-testimonial" v-if="selectedTestimonial !== null && testimonials[selectedTestimonial]">
                <div class="row">
                  <div class="col-sm-7 mb30">
                    <blockquote>{{ testimonials[selectedTestimonial].quote }}</blockquote>
                    <ul class="customer-rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <h4>Povedali o nás</h4>
                  </div>
                  <div class="col-sm-5">
                    <div class="client-image primary-shadow">
                      <img :src="testimonials[selectedTestimonial].image_link" alt="client" @error="onImageError" />
                    </div>
                  </div>
                </div>
              </div>
              <div v-else class="placeholder">
                <p>Loading testimonials...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { API_BASE_URL } from '@/config';

export default {
  name: 'Testimonials',
  setup() {
    const testimonials = ref([]);
    const selectedTestimonial = ref(0); // Initialize to the first testimonial

    const fetchTestimonials = async () => {
      try {
        const response = await fetch(`${API_BASE_URL}/about-us`);
        if (response.ok) {
          testimonials.value = await response.json();
          console.log('Fetched testimonials:', testimonials.value); // Debugging log
        } else {
          console.error('Failed to fetch testimonials:', response.status);
        }
      } catch (error) {
        console.error('Error fetching testimonials:', error);
      }
    };

    const displayTestimonial = (index) => {
      selectedTestimonial.value = index;
    };

    const onImageError = (event) => {
      console.error('Image load error:', event.target.src); // Debugging log
      event.target.src = '/images/default.jpg'; // Fallback image
    };

    onMounted(fetchTestimonials);

    return {
      testimonials,
      selectedTestimonial,
      displayTestimonial,
      onImageError,
    };
  },
};
</script>

<style scoped>
.placeholder {
  text-align: center;
  margin-top: 20px;
  font-size: 1.2em;
  color: #aaa;
}


.client-thumbnail {
  width: 100px;
  height: 100px;
  object-fit: cover;

  margin: 5px;
  cursor: pointer;
}

.client-image img {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 5px;
  cursor: pointer;
}
</style>
