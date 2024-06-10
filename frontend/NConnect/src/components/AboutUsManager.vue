<template>
  <div>
    <AdminDashboardView />
    <h1>About Us Manager</h1>
    <form @submit.prevent="handleSubmit" class="about-us-form">
      <div class="form-group wide-input">
        <label for="image_link">Image Link:</label>
        <input type="text" id="image_link" v-model="form.image_link" required />
      </div>
      <div class="form-group wide-input">
        <label for="quote">Quote:</label>
        <textarea id="quote" v-model="form.quote" rows="3" class="wide-textarea"></textarea>
      </div>
      <div class="form-buttons">
        <button type="submit">{{ editing ? 'Update' : 'Create' }}</button>
        <button type="button" @click="resetForm">Cancel</button>
      </div>
    </form>

    <hr class="divider" />

    <h2>About Us Items</h2>
    <div class="about-us-container">
      <div class="about-us-item" v-for="item in aboutUsItems" :key="item.id">
        <img :src="item.image_link" :alt="item.quote" />
        <div class="about-us-item-info">
          <p>{{ item.quote }}</p>
          <button @click="editItem(item)">Edit</button>
          <button @click="deleteItem(item.id)">Delete</button>
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
      aboutUsItems: [],
      form: {
        image_link: '',
        quote: ''
      },
      editing: false,
      editingId: null
    };
  },
  methods: {
    fetchAboutUsItems() {
      fetch('http://127.0.0.1:8000/api/about-us')
          .then(response => response.json())
          .then(data => {
            this.aboutUsItems = data;
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
      fetch('http://127.0.0.1:8000/api/about-us', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.form)
      })
          .then(response => response.json())
          .then(data => {
            this.aboutUsItems.push(data);
            this.resetForm();
          });
    },
    editItem(item) {
      this.form = { ...item };
      this.editing = true;
      this.editingId = item.id;
    },
    updateItem() {
      fetch(`http://127.0.0.1:8000/api/about-us/${this.editingId}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.form)
      })
          .then(response => response.json())
          .then(data => {
            const index = this.aboutUsItems.findIndex(item => item.id === this.editingId);
            if (index !== -1) {
              this.aboutUsItems.splice(index, 1, data);
            }
            this.resetForm();
          });
    },
    deleteItem(id) {
      fetch(`http://127.0.0.1:8000/api/about-us/${id}`, {
        method: 'DELETE'
      })
          .then(() => {
            this.aboutUsItems = this.aboutUsItems.filter(item => item.id !== id);
          });
    },
    resetForm() {
      this.form = {
        image_link: '',
        quote: ''
      };
      this.editing = false;
      this.editingId = null;
    }
  },
  created() {
    this.fetchAboutUsItems();
  }
};
</script>

<style scoped>
.about-us-form {
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

.about-us-container {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
}

.about-us-item {
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

.about-us-item:hover {
  transform: scale(1.05);
}

.about-us-item img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.about-us-item-info {
  padding: 8px;
  text-align: center;
}

.about-us-item-info button {
  margin: 4px;
}

@media (min-width: 576px) {
  .about-us-item {
    max-width: 45%;
  }
}

@media (min-width: 768px) {
  .about-us-item {
    max-width: 30%;
  }
}

@media (min-width: 992px) {
  .about-us-item {
    max-width: 22%;
  }
}

@media (min-width: 1200px) {
  .about-us-item {
    max-width: 18%;
  }
}
</style>
