<template>
  <AdminNavbar/>
  <div class="container">
    <div class="sub-heading">
      <div class="row">
        <div class="col-md-12">
          <h4>{{ isEditing ? 'Edit/Delete Sponsor' : 'Create Sponsor' }}</h4>
        </div>
      </div>
    </div>

    <!-- Button to switch between creating and editing sponsors -->
    <div class="mb-3">
      <button @click="toggleEditMode" class="btn btn-secondary">
        {{ isEditing ? 'Switch to Create Mode' : 'Edit/Delete Existing Sponsor' }}
      </button>
    </div>

    <!-- Select dropdown to edit existing sponsor -->
    <div v-if="isEditing" class="mt-5">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Select Sponsor to Edit</h4>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="existing_sponsor_id">Select Sponsor</label>
        <select v-model="selectedSponsorId" class="form-control" @change="fetchSponsorDetails">
          <option value="" disabled>Select a sponsor</option>
          <option v-for="sponsor in sponsors" :key="sponsor.id" :value="sponsor.id">{{ sponsor.name }}</option>
        </select>
      </div>
    </div>

    <!-- Form for creating/editing a sponsor -->
    <form @submit.prevent="isEditing ? updateSponsor() : createSponsor()">
      <div class="form-group">
        <label for="name">Sponsor Name</label>
        <input type="text" v-model="sponsor.name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" v-model="sponsor.email" class="form-control" id="email" required>
      </div>
<!--      <div class="form-group">-->
<!--        <label for="phone">Phone</label>-->
<!--        <input type="tel" v-model="sponsor.phone" class="form-control" id="phone" >-->
<!--      </div>-->
      <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" v-model="sponsor.company_name" class="form-control" id="company_name" required>
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" v-model="sponsor.position" class="form-control" id="position" required>
      </div>
      <div class="form-group">
        <label for="website_url">Website URL</label>
        <input type="url" v-model="sponsor.website_url" class="form-control" id="website_url" required>
      </div>
      <div class="form-group">
        <label for="sponsorship_type">Sponsorship Type</label>
        <select v-model="sponsor.sponsorship_type" class="form-control" id="sponsorship_type" required>
          <option value="gold">Gold</option>
          <option value="silver">Silver</option>
          <option value="bronze">Bronze</option>
        </select>
      </div>
      <div class="form-group">
        <label for="about_company">About Company</label>
        <textarea v-model="sponsor.about_company" class="form-control" id="about_company" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <div v-if="sponsor.imageUrl">
          <img :src="sponsor.imageUrl" alt="Current Image" class="img-thumbnail mb-3" style="max-width: 200px;">
        </div>
        <input type="file" class="form-control" id="image" accept="image/*" @change="handleImageUpload">
      </div>
      <button type="submit" class="btn btn-primary">{{ isEditing ? 'Update Sponsor' : 'Create Sponsor' }}</button>
      <button v-if="isEditing" @click="deleteSponsor" class="btn btn-danger ml-2">Delete Sponsor</button>
    </form>

    <!-- List of sponsors -->
    <div v-if="!isEditing" class="mt-5">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>List of Sponsors</h4>
          </div>
        </div>
      </div>
      <ul class="list-group">
        <li v-for="sponsor in sponsors" :key="sponsor.id" class="list-group-item">
          {{ sponsor.name }} - {{ sponsor.company_name }}
          <button @click="editSponsor(sponsor.id)" class="btn btn-link">Edit</button>
          <button @click="deleteSponsor(sponsor.id)" class="btn btn-link text-danger">Delete</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import AdminNavbar from "@/components/AdminNavbar.vue";

export default {
  name: "CreateSponsorView",
  components: { AdminNavbar },
  data() {
    return {
      sponsors: [], // Existing sponsors
      sponsor: {  // New sponsor object to be created/edited
        name: '',
        email: '',
        phone: null,
        company_name: '',
        position: '',
        website_url: '',
        sponsorship_type: 'gold', // Default value
        about_company: '',
        image: null, // Image file
        imageUrl: '' // URL for the current image
      },
      selectedSponsorId: '', // ID of the selected sponsor
      isEditing: false // Flag to switch between create and edit mode
    };
  },
  mounted() {
    this.fetchSponsors();
  },
  methods: {
    fetchSponsors() {
      axios.get('http://127.0.0.1:8000/api/sponsors')
          .then(response => {
            this.sponsors = response.data;
          })
          .catch(error => {
            console.error('Error fetching sponsors:', error);
          });
    },
    handleImageUpload(event) {
      this.sponsor.image = event.target.files[0];
    },
    createSponsor() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers
      };

      // Create FormData object to send file along with other data
      let formData = new FormData();
      for (const key in this.sponsor) {
        if (key !== 'imageUrl') { // Exclude imageUrl from FormData
          formData.append(key, this.sponsor[key]);
        }
      }

      axios.post('http://127.0.0.1:8000/api/sponsors', formData, { headers })
          .then(response => {
            alert('Sponsor created successfully!');
            this.resetForm();
            this.fetchSponsors();
          })
          .catch(error => {
            console.error('Error creating sponsor:', error);
          });
    },
    updateSponsor() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      // Check if the image has been changed
      if (this.sponsor.image instanceof File) {
        // Use POST request to handle the image upload and update the sponsor details
        const formData = new FormData();
        for (const key in this.sponsor) {
          if (key !== 'imageUrl') { // Exclude imageUrl from FormData
            formData.append(key, this.sponsor[key]);
          }
        }

        axios.post(`http://127.0.0.1:8000/api/sponsors/${this.selectedSponsorId}`, formData, { headers })
            .then(response => {
              alert('Sponsor updated successfully!');
              this.resetForm();
              this.isEditing = false;
              this.fetchSponsors();
            })
            .catch(error => {
              console.error('Error updating sponsor:', error);
            });
      } else {
        // Use PUT request to update the sponsor details without the image
        const sponsorData = { ...this.sponsor };
        delete sponsorData.image; // Remove image property

        axios.put(`http://127.0.0.1:8000/api/sponsors/${this.selectedSponsorId}`, sponsorData, { headers })
            .then(response => {
              alert('Sponsor updated successfully!');
              this.resetForm();
              this.isEditing = false;
              this.fetchSponsors();
            })
            .catch(error => {
              console.error('Error updating sponsor:', error);
            });
      }
    },
    deleteSponsor(id) {
      if (!confirm('Are you sure you want to delete this sponsor?')) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.delete(`http://127.0.0.1:8000/api/sponsors/${id}`, { headers })
          .then(response => {
            alert('Sponsor deleted successfully!');
            this.fetchSponsors();
          })
          .catch(error => {
            console.error('Error deleting sponsor:', error);
          });
    },
    fetchSponsorDetails() {
      if (!this.selectedSponsorId) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.get(`http://127.0.0.1:8000/api/sponsors/${this.selectedSponsorId}`, { headers })
          .then(response => {
            this.sponsor = response.data;
            this.sponsor.imageUrl = `http://127.0.0.1:8000/storage/${this.sponsor.image}`;
          })
          .catch(error => {
            console.error('Error fetching sponsor details:', error);
          });
    },
    editSponsor(id) {
      this.isEditing = true;
      this.selectedSponsorId = id;
      this.fetchSponsorDetails();
    },
    toggleEditMode() {
      this.isEditing = !this.isEditing;
      if (!this.isEditing) {
        this.resetForm();
      }
    },
    resetForm() {
      this.sponsor = {
        name: '',
        email: '',
        phone: '',
        company_name: '',
        position: '',
        website_url: '',
        sponsorship_type: 'gold',
        about_company: '',
        image: null,
        imageUrl: '' // Reset imageUrl
      };
      this.selectedSponsorId = '';
    }
  }
};
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
