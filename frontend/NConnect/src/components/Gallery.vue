<template>
  <div class="gallery-component">
    <h1 class="gallery-heading">Gallery Throughout the Years</h1>
    <div class="gallery-grid">
      <div
          v-for="(images, year) in groupedImages"
          :key="year"
          class="gallery-year-box"
          @click="openSlideshow(year)"
      >
        <img :src="images[0].image_link" alt="Gallery Image" class="gallery-background-image" />
        <div class="gallery-year-overlay">
          <div class="gallery-year">{{ year }}</div>
        </div>
      </div>
    </div>

    <div v-if="showSlideshow" class="gallery-slideshow-overlay">
      <div class="gallery-slideshow">
        <div class="gallery-slideshow-header">
          <span>{{ activeYear }}</span>
          <span>{{ currentIndex + 1 }} / {{ groupedImages[activeYear].length }}</span>
          <button @click="closeSlideshow" class="gallery-close-button">X</button>
        </div>
        <div class="gallery-slideshow-content">
          <button @click="prevImage" class="gallery-nav-button gallery-nav-button-left">Previous</button>
          <img :src="groupedImages[activeYear][currentIndex].image_link" :alt="groupedImages[activeYear][currentIndex].description" />
          <button @click="nextImage" class="gallery-nav-button gallery-nav-button-right">Next</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      images: [],
      groupedImages: {},
      showSlideshow: false,
      activeYear: null,
      currentIndex: 0,
    };
  },
  methods: {
    fetchImages() {
      axios.get('http://127.0.0.1:8000/api/gallery')
          .then(response => {
            this.images = response.data;
            this.groupImagesByYear();
          })
          .catch(error => {
            console.error('Error fetching images:', error);
          });
    },
    groupImagesByYear() {
      this.groupedImages = this.images.reduce((acc, image) => {
        if (!acc[image.year]) {
          acc[image.year] = [];
        }
        acc[image.year].push(image);
        return acc;
      }, {});
    },
    openSlideshow(year) {
      this.activeYear = year;
      this.currentIndex = 0;
      this.showSlideshow = true;
      document.body.style.overflow = 'hidden';  // Prevent scrolling
    },
    closeSlideshow() {
      this.showSlideshow = false;
      this.activeYear = null;
      document.body.style.overflow = 'auto';  // Enable scrolling
    },
    nextImage() {
      if (this.currentIndex < this.groupedImages[this.activeYear].length - 1) {
        this.currentIndex += 1;
      }
    },
    prevImage() {
      if (this.currentIndex > 0) {
        this.currentIndex -= 1;
      }
    },
  },
  mounted() {
    this.fetchImages();
  },
};
</script>

<style scoped>
.gallery-component {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.gallery-heading {
  font-size: 2em;
  margin-bottom: 20px;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  width: 100%;
  max-width: 1200px;
}

.gallery-year-box {
  position: relative;
  width: 100%;
  padding-bottom: 75%; /* Aspect ratio 4:3 */
  overflow: hidden;
  cursor: pointer;
}

.gallery-background-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.7);
}

.gallery-year-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.gallery-year {
  color: white;
  font-size: 24px;
  font-weight: bold;
  text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.gallery-slideshow-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 1000;
}

.gallery-slideshow {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 90%;
  max-width: 1000px;
  height: 80%;
}

.gallery-slideshow-header {
  position: absolute;
  top: 20px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  padding: 0 20px;
  color: white;
  font-size: 24px;
  font-weight: bold;
}

.gallery-slideshow-content {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  gap: 20px;
}

.gallery-slideshow-content img {
  max-height: 100%;
  max-width: 100%;
  object-fit: contain;
}

.gallery-nav-button {
  background: none;
  border: 2px solid white;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  cursor: pointer;
  z-index: 1001;
}

.gallery-nav-button:hover {
  background: white;
  color: black;
}

.gallery-nav-button-left {
  position: absolute;
  left: 10px;
}

.gallery-nav-button-right {
  position: absolute;
  right: 10px;
}

.gallery-close-button {
  background: none;
  border: none;
  color: white;
  font-size: 24px;
  cursor: pointer;
  z-index: 1001;
}

.gallery-close-button:hover {
  color: red;
}

@media (max-width: 600px) {
  .gallery-year-box {
    width: 100%;
  }

  .gallery-slideshow-header {
    font-size: 18px;
  }

  .gallery-nav-button {
    font-size: 14px;
    padding: 5px 10px;
  }

  .gallery-close-button {
    font-size: 20px;
  }
}
</style>
