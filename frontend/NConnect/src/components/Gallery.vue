<!--<template>-->
<!--&lt;!&ndash;TU PRIDAT SEKCIU GALERIA&ndash;&gt;-->
<!--&lt;!&ndash;  KLIKNUT NA NEJAKY ROK napr2021 a ked na to kliknes tak ti zobrazi pod tym popis a fotku&ndash;&gt;-->
<!--</template>-->

<!--<script>-->
<!--export default {-->
<!--  name: "Gallery"-->
<!--}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->
<template>
  <div>
    <div class="gallery-header">
      <h1>Gallery</h1>
    </div>
    <div class="gallery-container">
      <div v-for="yearGroup in groupedGalleryItems" :key="yearGroup.year" class="year-group">
        <h2>{{ yearGroup.year }}</h2>
        <div class="gallery-year-group">
          <div class="gallery-item" v-for="item in yearGroup.items" :key="item.id">
            <img :src="item.image_link" :alt="item.description" />
            <p>{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Gallery",
  data() {
    return {
      galleryItems: [],
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
  },
  created() {
    this.fetchGalleryItems();
  },
};
</script>

<style scoped>
.gallery-header {
  text-align: center;
  margin: 20px 0;
}

.gallery-container {
  padding: 20px;
}

.year-group {
  margin-bottom: 40px;
}

.gallery-year-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.gallery-item {
  flex: 1 1 calc(33.333% - 40px);
  max-width: calc(33.333% - 40px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  overflow: hidden;
  transition: transform 0.3s;
}

.gallery-item:hover {
  transform: translateY(-10px);
}

.gallery-item img {
  width: 100%;
  height: auto;
  display: block;
}

.gallery-item p {
  padding: 10px;
  text-align: center;
}

@media (max-width: 1200px) {
  .gallery-item {
    flex: 1 1 calc(50% - 40px);
    max-width: calc(50% - 40px);
  }
}

@media (max-width: 768px) {
  .gallery-item {
    flex: 1 1 calc(100% - 40px);
    max-width: calc(100% - 40px);
  }
}
</style>
