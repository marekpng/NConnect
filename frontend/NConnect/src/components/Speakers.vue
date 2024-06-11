<template>
  <div class="speakers-area white-bg">
    <div class="container">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Our Speakers</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div v-for="speaker in speakers" :key="speaker.id" class="col-md-3 col-sm-6 mb30">
          <div class="single-speaker primary-shadow white-bg">
            <div class="speaker-cover">

              <img :src="getImageUrl(speaker.image)" :alt="speaker.name" class="speaker-img"/>
              <div class="sperker-cover-over">
                <div class="speakers-thought">
                  <p>{{ speaker.short_description }}</p>
                  <a href="#" @click.prevent="openModal(speaker)">More About Me</a>
                </div>
              </div>
              <ul class="speaker-social">
                <li v-for="(link, index) in speaker.social_media_links" :key="index"><a :href="link" target="_blank"><i :class="getSocialIcon(link)"></i></a></li>

              </ul>
              <h6>{{ speaker.name }} at <a href="#">{{ speaker.company_name }}</a></h6>
            </div>
            <div class="speaker-name">
              <h5 title="speaker.name">{{ speaker.name }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div v-if="showModal" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ selectedSpeaker.name }}</h5>
            <button type="button" class="close" @click="closeModal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <img :src="getImageUrl(selectedSpeaker.image)" :alt="selectedSpeaker.name" class="img-fluid mb-3" />
            <h6>{{ selectedSpeaker.company_name }}</h6>
            <p>{{ selectedSpeaker.long_description }}</p>
            <ul class="speaker-social">
              <li v-for="(link, index) in selectedSpeaker.social_media_links" :key="index"><a :href="link" target="_blank"><i :class="getSocialIcon(link)"></i></a></li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="modal-backdrop fade show"></div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Speakers",
  data() {
    return {
      speakers: [],
      selectedSpeaker: {},
      showModal: false // Boolean to control modal visibility
    };
  },
  mounted() {
    this.fetchSpeakers();
  },
  methods: {
    getImageUrl(imagePath) {
      return imagePath ? `http://127.0.0.1:8000/storage/${imagePath}` : '';
    },
    fetchSpeakers() {
      axios.get('http://127.0.0.1:8000/api/speakers')
          .then(response => {
            this.speakers = response.data;
          })
          .catch(error => {
            console.error('Error fetching speakers:', error);
          });
    },
    getSocialIcon(link) {
      if (link.includes('facebook.com')) return 'fa fa-facebook';
      if (link.includes('twitter.com')) return 'fa fa-twitter';
      if (link.includes('linkedin.com')) return 'fa fa-linkedin';
      if (link.includes('instagram.com')) return 'fa fa-instagram';
      if (link.includes('youtube.com')) return 'fa fa-youtube';
      return 'fa fa-link';
    },
    openModal(speaker) {
      this.selectedSpeaker = speaker;
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    }
  }
}
</script>

<style scoped>
.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1040;
}
.modal.fade.show {
  display: block;
  opacity: 1;
}

.speaker-cover {
  position: relative;
  width: 100%;
  padding-bottom: 75%; /* This ratio keeps the aspect ratio of the cover */
  overflow: hidden;
}
.speaker-img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

</style>
