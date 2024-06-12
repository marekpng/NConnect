

<template>
  <div>
    <div class="gallery-header">
      <h1>Gallery</h1>
    </div>
    <div class="gallery-container">
      <div v-for="yearGroup in groupedGalleryItems" :key="yearGroup.year" class="year-group" @click="openModal(yearGroup)">
        <div class="year-box" :style="{ backgroundImage: 'url(' + yearGroup.items[0].image_link + ')' }">
          <h2>{{ yearGroup.year }}</h2>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div v-if="showModal" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ currentYear }}</h5>
            <button type="button" class="close" @click="closeModal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div v-if="currentGalleryItems.length" class="slideshow-container">
              <div v-for="(item, index) in currentGalleryItems" :key="index" class="mySlides" v-show="index === currentSlideIndex">
                <img :src="item.image_link" class="img-fluid" :alt="item.description">
                <div class="text">{{ item.description }}</div>
              </div>
              <a class="prev" @click="changeSlide(-1)">&#10094;</a>
              <a class="next" @click="changeSlide(1)">&#10095;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="modal-backdrop fade show"></div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      galleryItems: [],
      showModal: false,
      currentYear: '',
      currentGalleryItems: [],
      currentSlideIndex: 0,
    };
  },
  computed: {
    groupedGalleryItems() {
      const grouped = {};
      this.galleryItems.forEach((item) => {
        const year = item.year;
        if (!grouped[year]) {
          grouped[year] = [];
        }
        grouped[year].push(item);
      });
      return Object.keys(grouped).map((year) => ({
        year,
        items: grouped[year],
      }));
    },
  },
  methods: {
    fetchGalleryItems() {
      fetch('http://127.0.0.1:8000/api/gallery')
          .then((response) => response.json())
          .then((data) => {
            this.galleryItems = data;
          });
    },
    openModal(yearGroup) {
      this.currentYear = yearGroup.year;
      this.currentGalleryItems = yearGroup.items;
      this.currentSlideIndex = 0;
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    changeSlide(direction) {
      this.currentSlideIndex += direction;
      if (this.currentSlideIndex < 0) {
        this.currentSlideIndex = this.currentGalleryItems.length - 1;
      } else if (this.currentSlideIndex >= this.currentGalleryItems.length) {
        this.currentSlideIndex = 0;
      }
    },
  },
  created() {
    this.fetchGalleryItems();
  },
};
</script>
<style scoped>
.gallery-header {
  text-align: center;
  margin-bottom: 20px;
}

.gallery-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.year-group {
  width: 30%;
  margin: 20px;
  cursor: pointer;
  position: relative;
}

.year-box {
  width: 100%;
  padding-bottom: 75%;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 2rem;
  font-weight: bold;
  text-shadow: 2px 2px 4px #000;
  transition: transform 0.3s;
}

.year-box:hover {
  transform: scale(1.05);
}

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

.slideshow-container {
  position: relative;
  max-width: 100%;
  margin: auto;
}

.mySlides {
  display: none;
  text-align: center;
}

.mySlides img {
  width: 100%;
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
</style>
