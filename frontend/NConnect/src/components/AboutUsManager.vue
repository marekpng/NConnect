<!-- src/components/AboutUsManager.vue -->
<template>
  <div>
    <h1>About Us Manager</h1>
    <div>
      <h2>Add New Entry</h2>
      <form @submit.prevent="addEntry">
        <input v-model="newEntry.image_link" placeholder="Image Link" required />
        <input v-model="newEntry.quote" placeholder="Quote" required />
        <button type="submit">Add</button>
      </form>
    </div>
    <div>
      <h2>About Us Entries</h2>
      <div v-for="entry in aboutUsEntries" :key="entry.id">
        <img :src="entry.image_link" alt="Image" width="100" />
        <p>{{ entry.quote }}</p>
        <button @click="editEntry(entry)">Edit</button>
        <button @click="deleteEntry(entry.id)">Delete</button>
      </div>
    </div>
    <div v-if="editingEntry">
      <h2>Edit Entry</h2>
      <form @submit.prevent="updateEntry">
        <input v-model="editingEntry.image_link" placeholder="Image Link" required />
        <input v-model="editingEntry.quote" placeholder="Quote" required />
        <button type="submit">Update</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      aboutUsEntries: [],
      newEntry: {
        image_link: '',
        quote: ''
      },
      editingEntry: null
    };
  },
  methods: {
    fetchEntries() {
      fetch('http://localhost:8000/api/about-us')
          .then(response => response.json())
          .then(data => {
            this.aboutUsEntries = data;
          });
    },
    addEntry() {
      fetch('http://localhost:8000/api/about-us', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.newEntry)
      })
          .then(response => response.json())
          .then(data => {
            this.aboutUsEntries.push(data);
            this.newEntry.image_link = '';
            this.newEntry.quote = '';
          });
    },
    editEntry(entry) {
      this.editingEntry = { ...entry };
    },
    updateEntry() {
      fetch(`http://localhost:8000/api/about-us/${this.editingEntry.id}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.editingEntry)
      })
          .then(response => response.json())
          .then(data => {
            const index = this.aboutUsEntries.findIndex(entry => entry.id === data.id);
            this.aboutUsEntries.splice(index, 1, data);
            this.editingEntry = null;
          });
    },
    deleteEntry(id) {
      fetch(`http://localhost:8000/api/about-us/${id}`, {
        method: 'DELETE'
      }).then(() => {
        this.aboutUsEntries = this.aboutUsEntries.filter(entry => entry.id !== id);
      });
    }
  },
  created() {
    this.fetchEntries();
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
