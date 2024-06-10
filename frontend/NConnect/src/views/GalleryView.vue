<!-- src/views/GalleryView.vue -->
<template>
  <div>
    <h1>Gallery</h1>
    <div v-for="(images, year) in groupedImages" :key="year" class="gallery-year-group">
      <h2>{{ year }}</h2>
      <div class="gallery-images">
        <img v-for="image in images" :key="image.id" :src="image.image_link" :alt="image.description" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      gallery: []
    };
  },
  computed: {
    groupedImages() {
      return this.gallery.reduce((acc, image) => {
        const year = image.year;
        if (!acc[year]) {
          acc[year] = [];
        }
        acc[year].push(image);
        return acc;
      }, {});
    }
  },
  methods: {
    fetchGallery() {
      fetch('http://127.0.0.1:8000/api/gallery')
          .then(response => response.json())
          .then(data => {
            this.gallery = data;
          });
    }
  },
  created() {
    this.fetchGallery();
  }
};
</script>

<style scoped>
.gallery-year-group {
  margin-bottom: 2rem;
}
.gallery-images {
  display: flex;
  flex-wrap: wrap;
}
.gallery-images img {
  margin: 0.5rem;
  max-width: 100px;
  max-height: 100px;
}
</style>
