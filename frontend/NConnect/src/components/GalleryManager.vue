<!-- src/components/GalleryManager.vue -->
<template>
  <div>
    <h1>Gallery Manager</h1>
    <form @submit.prevent="handleSubmit">
      <div>
        <label for="image_link">Image Link:</label>
        <input type="text" id="image_link" v-model="form.image_link" required />
      </div>
      <div>
        <label for="description">Description:</label>
        <input type="text" id="description" v-model="form.description" />
      </div>
      <div>
        <label for="year">Year:</label>
        <input type="number" id="year" v-model="form.year" required />
      </div>
      <button type="submit">{{ editing ? 'Update' : 'Create' }}</button>
      <button type="button" @click="resetForm">Cancel</button>
    </form>

    <h2>Gallery Items</h2>
    <ul>
      <li v-for="item in gallery" :key="item.id">
        <img :src="item.image_link" :alt="item.description" />
        <p>{{ item.description }}</p>
        <p>{{ item.year }}</p>
        <button @click="editItem(item)">Edit</button>
        <button @click="deleteItem(item.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
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
/* Add your styles here */
</style>
