<template>
<!--<AdminNavbar />-->








<!--  &lt;!&ndash; Button to toggle the display of the form &ndash;&gt;-->
<!--  <button @click="showForm = true">Create Sponsor</button>-->

<!--  &lt;!&ndash; Form to create a new sponsor (initially hidden) &ndash;&gt;-->
<!--  <div v-if="showForm">-->
<!--    <h5>Create New Sponsor</h5>-->
<!--    <form @submit.prevent="createSponsor">-->
<!--      <div>-->
<!--        <label for="name">Name:</label>-->
<!--        <input type="text" id="name" v-model="newSponsor.name" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="email">Email:</label>-->
<!--        <input type="email" id="email" v-model="newSponsor.email" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="phone">Phone:</label>-->
<!--        <input type="text" id="phone" v-model="newSponsor.phone" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="company_name">Company Name:</label>-->
<!--        <input type="text" id="company_name" v-model="newSponsor.company_name" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="position">Position:</label>-->
<!--        <input type="text" id="position" v-model="newSponsor.position" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="website_url">Website URL:</label>-->
<!--        <input type="url" id="website_url" v-model="newSponsor.website_url" required>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="sponsorship_type">Sponsorship Type:</label>-->
<!--        <select id="sponsorship_type" v-model="newSponsor.sponsorship_type" required>-->
<!--          <option value="gold">Gold</option>-->
<!--          <option value="silver">Silver</option>-->
<!--          <option value="bronze">Bronze</option>-->
<!--        </select>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="about_company">About Company:</label>-->
<!--        <textarea id="about_company" v-model="newSponsor.about_company" required></textarea>-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="image_url">Image URL:</label>-->
<!--        <input type="url" id="image_url" v-model="newSponsor.image_url" required>-->
<!--      </div>-->

<!--      <button type="submit">Submit</button>-->
<!--    </form>-->
<!--  </div>-->

<!--  &lt;!&ndash; Display existing sponsors &ndash;&gt;-->
<!--  <div v-for="sponsor in sponsors" :key="sponsor.id" class="sponsor">-->
<!--    &lt;!&ndash; Sponsor details &ndash;&gt;-->
<!--  </div>-->
  <AdminNavbar />

  <!-- Button to toggle the display of the form -->
  <button @click="showForm = true">Create Sponsor</button>

  <!-- Form to create a new sponsor (initially hidden) -->
  <div v-if="showForm">
    <h5>Create New Sponsor</h5>
    <form @submit.prevent="createSponsor">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="newSponsor.name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="newSponsor.email" required>
      </div>
      <div>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" v-model="newSponsor.phone" required>
      </div>
      <div>
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" v-model="newSponsor.company_name" required>
      </div>
      <div>
        <label for="position">Position:</label>
        <input type="text" id="position" v-model="newSponsor.position" required>
      </div>
      <div>
        <label for="website_url">Website URL:</label>
        <input type="url" id="website_url" v-model="newSponsor.website_url" required>
      </div>
      <div>
        <label for="sponsorship_type">Sponsorship Type:</label>
        <select id="sponsorship_type" v-model="newSponsor.sponsorship_type" required>
          <option value="gold">Gold</option>
          <option value="silver">Silver</option>
          <option value="platinum">Platinum</option>
        </select>
      </div>
      <div>
        <label for="about_company">About Company:</label>
        <textarea id="about_company" v-model="newSponsor.about_company" required></textarea>
      </div>
      <div>
        <label for="image">Image:</label>
        <input type="file" id="image" @change="handleImageUpload" required>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>





</template>

<!--<script>-->
<!--import axios from 'axios';-->
<!--import AdminNavbar from "@/components/AdminNavbar.vue";-->
<!--export default {-->
<!--  name: "CreateSponsorView",-->
<!--  components: {AdminNavbar},-->
<!--  data() {-->
<!--    return {-->
<!--      sponsors: [], // Existing sponsors-->
<!--      newSponsor: {  // New sponsor object to be created-->
<!--        name: '',-->
<!--        email: '',-->
<!--        phone: '',-->
<!--        company_name: '',-->
<!--        position: '',-->
<!--        website_url: '',-->
<!--        sponsorship_type: 'gold', // Default value-->
<!--        about_company: '',-->
<!--        image_url: ''-->
<!--      },-->
<!--      showForm: false // Flag to show/hide the form-->
<!--    };-->
<!--  },-->
<!--  mounted() {-->
<!--    axios.get('http://127.0.0.1:8000/api/sponsors')-->
<!--        .then(response => {-->
<!--          console.log(response.data);-->
<!--          this.sponsors = response.data;-->
<!--        })-->
<!--        .catch(error => {-->
<!--          console.error('Error fetching sponsors:', error);-->
<!--        });-->
<!--  },-->
<!--  methods: {-->
<!--    // Method to create a new sponsor-->
<!--    // createSponsor() {-->
<!--    //   const headers = {-->
<!--    //     'Accept': 'application/json',-->
<!--    //     'Authorization': `Bearer ${localStorage.getItem('adminToken')}`-->
<!--    //   };-->
<!--    //   // Create FormData object to send file along with other data-->
<!--    //   let formData = new FormData();-->
<!--    //   formData.append('name', this.newSponsor.name);-->
<!--    //   formData.append('email', this.newSponsor.email);-->
<!--    //   formData.append('phone', this.newSponsor.phone);-->
<!--    //   formData.append('company_name', this.newSponsor.company_name);-->
<!--    //   formData.append('position', this.newSponsor.position);-->
<!--    //   formData.append('website_url', this.newSponsor.website_url);-->
<!--    //   formData.append('sponsorship_type', this.newSponsor.sponsorship_type);-->
<!--    //   formData.append('about_company', this.newSponsor.about_company);-->
<!--    //   formData.append('image', this.newSponsor.image); // Append image file-->
<!--    //-->
<!--    //   axios.post('http://127.0.0.1:8000/api/create-sponsor', formData, {headers})-->
<!--    //       .then(response => {-->
<!--    //         // Log the response or handle it as needed-->
<!--    //         console.log(response.data);-->
<!--    //         // Optionally, reset the form and hide it after successful creation-->
<!--    //         this.newSponsor = {-->
<!--    //           name: '',-->
<!--    //           email: '',-->
<!--    //           phone: '',-->
<!--    //           company_name: '',-->
<!--    //           position: '',-->
<!--    //           website_url: '',-->
<!--    //           sponsorship_type: 'gold',-->
<!--    //           about_company: '',-->
<!--    //           image_url: ''-->
<!--    //         };-->
<!--    //         this.showForm = false; // Hide the form-->
<!--    //       })-->
<!--    //       .catch(error => {-->
<!--    //         // Check for unauthorized error-->
<!--    //         if (error.response && error.response.status === 401) {-->
<!--    //           console.error('Unauthorized. Please log in.');-->
<!--    //         } else {-->
<!--    //           console.error('Error creating sponsor:', error);-->
<!--    //         }-->
<!--    //       });-->
<!--    createSponsor() {-->
<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers-->
<!--      };-->
<!--      // Create FormData object to send file along with other data-->
<!--      let formData = new FormData();-->
<!--      formData.append('name', this.newSponsor.name);-->
<!--      formData.append('email', this.newSponsor.email);-->
<!--      formData.append('phone', this.newSponsor.phone);-->
<!--      formData.append('company_name', this.newSponsor.company_name);-->
<!--      formData.append('position', this.newSponsor.position);-->
<!--      formData.append('website_url', this.newSponsor.website_url);-->
<!--      formData.append('sponsorship_type', this.newSponsor.sponsorship_type);-->
<!--      formData.append('about_company', this.newSponsor.about_company);-->
<!--      formData.append('image', this.newSponsor.image); // Append image file-->

<!--      axios.post('http://127.0.0.1:8000/api/create-sponsor', formData, { headers })-->
<!--          .then(response => {-->
<!--            // Log the response or handle it as needed-->
<!--            console.log(response.data);-->
<!--            // Optionally, reset the form and hide it after successful creation-->
<!--            this.newSponsor = {-->
<!--              name: '',-->
<!--              email: '',-->
<!--              phone: '',-->
<!--              company_name: '',-->
<!--              position: '',-->
<!--              website_url: '',-->
<!--              sponsorship_type: 'gold',-->
<!--              about_company: '',-->
<!--              image_url: ''-->
<!--            };-->
<!--            this.showForm = false; // Hide the form-->
<!--            // Fetch sponsors again to update the list after creating a new one-->
<!--            this.fetchSponsors();-->
<!--          })-->
<!--          .catch(error => {-->
<!--            // Check for unauthorized error-->
<!--            if (error.response && error.response.status === 401) {-->
<!--              console.error('Unauthorized. Please log in.');-->
<!--            } else {-->
<!--              console.error('Error creating sponsor:', error);-->
<!--            }-->
<!--          });-->
<!--    },-->

<!--  }-->
<!--}-->
<!--</script>-->


<script>
import axios from 'axios';
import AdminNavbar from "@/components/AdminNavbar.vue";

export default {
  name: "CreateSponsorView",
  components: { AdminNavbar },
  data() {
    return {
      sponsors: [], // Existing sponsors
      newSponsor: {  // New sponsor object to be created
        name: '',
        email: '',
        phone: '',
        company_name: '',
        position: '',
        website_url: '',
        sponsorship_type: 'gold', // Default value
        about_company: '',
        image: null // Image file
      },
      showForm: false // Flag to show/hide the form
    };
  },
  mounted() {
    this.fetchSponsors();
  },
  methods: {
    fetchSponsors() {
      axios.get('http://127.0.0.1:8000/api/sponsors')
          .then(response => {
            console.log(response.data);
            this.sponsors = response.data;
          })
          .catch(error => {
            console.error('Error fetching sponsors:', error);
          });
    },
    handleImageUpload(event) {
      this.newSponsor.image = event.target.files[0];
    },
    createSponsor() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers
      };

      // Create FormData object to send file along with other data
      let formData = new FormData();
      formData.append('name', this.newSponsor.name);
      formData.append('email', this.newSponsor.email);
      formData.append('phone', this.newSponsor.phone);
      formData.append('company_name', this.newSponsor.company_name);
      formData.append('position', this.newSponsor.position);
      formData.append('website_url', this.newSponsor.website_url);
      formData.append('sponsorship_type', this.newSponsor.sponsorship_type);
      formData.append('about_company', this.newSponsor.about_company);
      formData.append('image', this.newSponsor.image); // Append image file

      axios.post('http://127.0.0.1:8000/api/create-sponsor', formData, { headers })
          .then(response => {
            // Log the response or handle it as needed
            console.log(response.data);
            // Optionally, reset the form and hide it after successful creation
            this.newSponsor = {
              name: '',
              email: '',
              phone: '',
              company_name: '',
              position: '',
              website_url: '',
              sponsorship_type: 'gold',
              about_company: '',
              image: null
            };
            this.showForm = false; // Hide the form
            // Fetch sponsors again to update the list after creating a new one
            this.fetchSponsors();
          })
          .catch(error => {
            // Check for unauthorized error
            if (error.response && error.response.status === 401) {
              console.error('Unauthorized. Please log in.');
            } else {
              console.error('Error creating sponsor:', error);
            }
          });
    }
  }
};
</script>

<style scoped>

</style>