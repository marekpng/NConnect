<template>
  <div>
    <AdminDashboardView />
    <h1>Gallery Manager</h1>
    <form @submit.prevent="handleSubmit" class="gallery-form">
      <div class="form-group wide-input">
        <label for="image_link">Image Link:</label>
        <input type="text" id="image_link" v-model="form.image_link" required />
      </div>
      <div class="form-group wide-input">
        <label for="description">Description:</label>
        <textarea id="description" v-model="form.description" rows="3" class="wide-textarea"></textarea>
      </div>
      <div class="form-group year-input">
        <label for="year">Year:</label>
        <input type="number" id="year" v-model="form.year" required />
      </div>
      <div class="form-buttons">
        <button type="submit">{{ editing ? 'Update' : 'Create' }}</button>
        <button type="button" @click="resetForm">Cancel</button>
      </div>
    </form>

    <hr class="divider" />

    <h2>Gallery Items</h2>
    <div v-for="(items, year) in groupedGallery" :key="year" class="year-group">
      <h3>{{ year }}</h3>
      <div class="gallery-container">
        <div class="gallery-item" v-for="item in items" :key="item.id">
          <img :src="item.image_link" :alt="item.description" />
          <div class="gallery-item-info">
            <p>{{ item.description }}</p>
            <button @click="editItem(item)">Edit</button>
            <button @click="deleteItem(item.id)">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AdminDashboardView from '../views/AdminDashboardView.vue';

export default {
  components: {
    AdminDashboardView,
  },
  data() {
    return {
      gallery: [],
      form: {
        image_link: '',
        description: '',
        year: ''
      },
      editing: false,
      editingId: null
    };
  },
  computed: {
    groupedGallery() {
      return this.gallery.reduce((groups, item) => {
        const year = item.year;
        if (!groups[year]) {
          groups[year] = [];
        }
        groups[year].push(item);
        return groups;
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
    },
    handleSubmit() {
      if (this.editing) {
        this.updateItem();
      } else {
        this.createItem();
      }
    },
    createItem() {
      fetch('http://127.0.0.1:8000/api/gallery', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.form)
      })
          .then(response => response.json())
          .then(data => {
            this.gallery.push(data);
            this.resetForm();
          });
    },
    editItem(item) {
      this.form = { ...item };
      this.editing = true;
      this.editingId = item.id;
    },
    updateItem() {
      fetch(`http://127.0.0.1:8000/api/gallery/${this.editingId}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.form)
      })
          .then(response => response.json())
          .then(data => {
            const index = this.gallery.findIndex(item => item.id === this.editingId);
            if (index !== -1) {
              this.gallery.splice(index, 1, data);
            }
            this.resetForm();
          });
    },
    deleteItem(id) {
      fetch(`http://127.0.0.1:8000/api/gallery/${id}`, {
        method: 'DELETE'
      })
          .then(() => {
            this.gallery = this.gallery.filter(item => item.id !== id);
          });
    },
    resetForm() {
      this.form = {
        image_link: '',
        description: '',
        year: ''
      };
      this.editing = false;
      this.editingId = null;
    }
  },
  created() {
    this.fetchGallery();
  }
};
</script>

<style scoped>
.gallery-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  max-width: 600px;
  margin: 0 auto 24px;
}

.form-group {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.wide-input input,
.wide-textarea {
  width: 100%;
  padding: 8px;
}

.wide-textarea {
  width: 100%;
  padding: 8px;
  height: auto;
}

.year-input input {
  width: auto;
  padding: 8px;
}

.form-buttons {
  display: flex;
  gap: 12px;
}

.divider {
  width: 100%;
  margin: 24px 0;
  border: 0;
  border-top: 1px solid #ccc;
}

.year-group {
  margin-bottom: 24px;
}

.gallery-container {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
}

.gallery-item {
  border: 1px solid #ccc;
  border-radius: 8px;
  overflow: hidden;
  width: 100%;
  max-width: 200px;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.3s ease;
}

.gallery-item:hover {
  transform: scale(1.05);
}

.gallery-item img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.gallery-item-info {
  padding: 8px;
  text-align: center;
}

.gallery-item-info button {
  margin: 4px;
}

@media (min-width: 576px) {
  .gallery-item {
    max-width: 45%;
  }
}

@media (min-width: 768px) {
  .gallery-item {
    max-width: 30%;
  }
}

@media (min-width: 992px) {
  .gallery-item {
    max-width: 22%;
  }
}

@media (min-width: 1200px) {
  .gallery-item {
    max-width: 18%;
  }
}
</style>
