<template>
  <div class="container">
    <div class="sub-heading">
      <div class="row">
        <div class="col-md-12">
          <h4>{{ isEditing ? 'Edit Speaker Profile' : 'Create Speaker Profile' }}</h4>
        </div>
      </div>
    </div>




    <!-- Button to switch between creating and editing speakers -->
    <div class="mb-3">
      <button @click="toggleEditMode" class="btn btn-secondary">
        {{ isEditing ? 'Switch to Create Mode' : 'Edit/Delete Existing Speaker' }}
      </button>
    </div>


    <!-- Select dropdown to edit existing speaker -->
    <div v-if="isEditing" class="mt-5">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Select Speaker to Edit</h4>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="existing_speaker_id">Select Speaker</label>
        <select v-model="selectedSpeakerId" class="form-control" @change="fetchSpeakerDetails">
          <option value="" disabled>Select a speaker</option>
          <option v-for="speaker in speakers" :key="speaker.id" :value="speaker.id">{{ speaker.name }}</option>
        </select>
      </div>
    </div>

    <!-- Form for creating/editing a speaker -->
    <form @submit.prevent="isEditing ? updateSpeaker() : createSpeaker()">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" v-model="speaker.name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" v-model="speaker.company_name" class="form-control" id="company_name" required>
      </div>
      <div class="form-group">
        <label for="image">Image URL</label>
        <input type="text" v-model="speaker.image" class="form-control" id="image" required>
      </div>
      <div class="form-group">
        <label for="short_description">Short Description</label>
        <textarea v-model="speaker.short_description" class="form-control" id="short_description" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="long_description">Long Description</label>
        <textarea v-model="speaker.long_description" class="form-control" id="long_description" rows="6" required></textarea>
      </div>
      <div class="form-group">
        <label for="social_media_links">Social Media Links (one per line)</label>
        <textarea v-model="socialMediaLinks" class="form-control" id="social_media_links" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ isEditing ? 'Update Speaker' : 'Create Speaker' }}</button>
      <button v-if="isEditing" @click="deleteSpeaker" class="btn btn-danger ml-2">Delete Speaker</button>
    </form>


  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "ManageSpeakers",
  data() {
    return {
      speaker: {
        name: '',
        company_name: '',
        image: '',
        short_description: '',
        long_description: '',
        social_media_links: []
      },
      socialMediaLinks: '', // To store social media links as a multiline string
      isEditing: false,
      speakers: [],
      selectedSpeakerId: ''
    };
  },
  mounted() {
    this.fetchAllSpeakers();
  },
  methods: {
    // Method to fetch all speakers for the select dropdown
    fetchAllSpeakers() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.get('http://127.0.0.1:8000/api/speakers', { headers })
          .then(response => {
            this.speakers = response.data;
          })
          .catch(error => {
            console.error('Error fetching speakers:', error);
          });
    },
    // Method to fetch details of the selected speaker
    fetchSpeakerDetails() {
      if (!this.selectedSpeakerId) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.get(`http://127.0.0.1:8000/api/speakers/${this.selectedSpeakerId}`, { headers })
          .then(response => {
            this.speaker = response.data;
            this.socialMediaLinks = this.speaker.social_media_links.join('\n');
          })
          .catch(error => {
            console.error('Error fetching speaker details:', error);
          });
    },
    // Method to create a new speaker
    createSpeaker() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      this.speaker.social_media_links = this.socialMediaLinks.split('\n').map(link => link.trim());

      axios.post('http://127.0.0.1:8000/api/speakers', this.speaker, { headers })
          .then(response => {
            alert('Speaker profile created successfully!');
            this.resetForm();
            this.fetchAllSpeakers(); // Refresh the list of speakers
          })
          .catch(error => {
            console.error('Error creating speaker profile:', error);
            alert('Failed to create speaker profile. Please try again.');
          });
    },
    // Method to update an existing speaker
    updateSpeaker() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      this.speaker.social_media_links = this.socialMediaLinks.split('\n').map(link => link.trim());

      axios.put(`http://127.0.0.1:8000/api/speakers/${this.selectedSpeakerId}`, this.speaker, { headers })
          .then(response => {
            alert('Speaker profile updated successfully!');
            this.resetForm();
            this.isEditing = false;
            this.fetchAllSpeakers(); // Refresh the list of speakers
          })
          .catch(error => {
            console.error('Error updating speaker profile:', error);
            alert('Failed to update speaker profile. Please try again.');
          });
    },
    // Method to delete a speaker
    deleteSpeaker() {
      if (!confirm('Are you sure you want to delete this speaker?')) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.delete(`http://127.0.0.1:8000/api/speakers/${this.selectedSpeakerId}`, { headers })
          .then(response => {
            alert('Speaker profile deleted successfully!');
            this.resetForm();
            this.isEditing = false;
            this.fetchAllSpeakers(); // Refresh the list of speakers
          })
          .catch(error => {
            console.error('Error deleting speaker profile:', error);
            alert('Failed to delete speaker profile. Please try again.');
          });
    },
    // Method to toggle between create and edit mode
    toggleEditMode() {
      this.isEditing = !this.isEditing;
      if (!this.isEditing) {
        this.resetForm();
      }
    },
    // Method to reset the form fields
    resetForm() {
      this.speaker = {
        name: '',
        company_name: '',
        image: '',
        short_description: '',
        long_description: '',
        social_media_links: []
      };
      this.socialMediaLinks = '';
      this.selectedSpeakerId = '';
    }
  }
}
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}
.sub-heading {
  margin-bottom: 20px;
}
.mb-3 {
  margin-bottom: 1rem;
}
.mt-5 {
  margin-top: 50px;
}
.ml-2 {
  margin-left: 0.5rem;
}
</style>
