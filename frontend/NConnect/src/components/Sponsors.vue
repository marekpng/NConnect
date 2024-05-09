<template>
  <div class="sponsors-area gray-bg">
    <div class="container">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Our Sponsors</h4>
          </div>
        </div>
      </div>

      <div class="sponsors-nav">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#SilverSponsors" data-toggle="tab">Silver Sponsors</a></li>
          <li><a href="#GoldSponsors" data-toggle="tab">Gold Sponsors</a></li>
          <li><a href="#PlatinumSponsors" data-toggle="tab">Platinum Sponsors</a></li>
        </ul>
      </div>

      <div class="tab-content sponsors-contents text-center">
        <div role="tabpanel" class="tab-pane active" id="SilverSponsors">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/1.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/2.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/3.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/4.png" alt="sponsor" />
              </div>
            </div>
          </div>
        </div><!-- /.tabpanel -->
        <div role="tabpanel" class="tab-pane" id="GoldSponsors">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/4.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/3.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/2.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/1.png" alt="sponsor" />
              </div>
            </div>
          </div>
        </div><!-- /.tabpanel -->
        <div role="tabpanel" class="tab-pane" id="PlatinumSponsors">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/2.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/1.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/4.png" alt="sponsor" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb30">
              <div class="single-sponsor primary-shadow white-bg">
                <img src="/images/sponsor/3.png" alt="sponsor" />
              </div>
            </div>
          </div>
        </div><!-- /.tabpanel -->
      </div><!-- /.tab-content -->

      <div class="become-sponsor text-center">
        <a href="" class="button alt"  data-toggle="modal" data-target="#sponsor-form">Become a Sponsor</a>
      </div>

      <div class="modal fade" id="sponsor-form" tabindex="-1">
        <div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="sponsor-form-area white-bg primary-shadow">
                <div class="sub-heading small">
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Become a Sponsor</h4>
                    </div>
                  </div>
                </div>
                <form action="sponsor.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Your-name" id="Your-name" placeholder="Your Name" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Email-address" id="Email-address" placeholder="Email address" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Phone-No" id="Phone-No" placeholder="Phone No" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Company-name" id="Company-name" placeholder="Company name" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Position" id="Position" placeholder="Position" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box-underline">
                        <input class="input" type="text" name="Website-Url" id="Website-Url" placeholder="Website Url" />
                      </div>
                    </div>
                  </div><!-- /.row -->
                  <ul class="row text-center">
                    <li class="col-sm-4">
                      <div class="single-package-select">
                        <input name="sps" value="Silver" id="Silver" checked type="radio">
                        <label for="Silver">
                          <span class="h5-like">Silver</span>
                          <span class="h6-like">$2000.00</span>
                        </label>
                      </div>
                    </li>
                    <li class="col-sm-4">
                      <div class="single-package-select">
                        <input name="sps" value="Gold" id="Gold" type="radio">
                        <label for="Gold">
                          <span class="h5-like">Gold</span>
                          <span class="h6-like">$5000.00</span>
                        </label>
                      </div>
                    </li>
                    <li class="col-sm-4">
                      <div class="single-package-select">
                        <input name="sps" value="Platinum" id="Platinum" type="radio">
                        <label for="Platinum">
                          <span class="h5-like">Platinum</span>
                          <span class="h6-like">$10000.00</span>
                        </label>
                      </div>
                    </li>
                  </ul><!-- /.row -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-box-underline">
                        <textarea class="input" name="some-text" id="some-text" placeholder="Tell more about you or your company"></textarea>
                      </div>
                    </div>
                  </div><!-- /.row -->
                  <div class="row">
                    <div class="col-sm-12">
                      <ul class="buttons">
                        <li><input type="submit" value="submit" class="button alt" /></li>
                        <li><a href="" class="button alt" data-dismiss="modal">Close</a></li>
                      </ul>
                    </div>
                  </div><!-- /.row -->
                </form><!-- /form -->
              </div><!-- /.sponsor-form-area -->
            </div>
            <div class="col-md-3"></div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.modal -->

    </div><!-- /.container -->
  </div><!-- /.sponsors-area -->


  <!--  TESTOVANIE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
  <div>
    <h4>Our Sponsors</h4>
    <div v-for="sponsor in sponsors" :key="sponsor.id" class="sponsor">
      <img :src="'/images/sponsors/' + sponsor.image" :alt="sponsor.name" class="sponsor-image">
      <div class="sponsor-details">
        <h5>{{ sponsor.name }}</h5>
        <p><strong>Job:</strong> {{ sponsor.job }}</p>
        <p><strong>About:</strong> {{ sponsor.about }}</p>
        <p><strong>Social Media:</strong> <a :href="sponsor.socialmedia">{{ sponsor.socialmedia }}</a></p>
      </div>
    </div>
  </div>










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
          <option value="bronze">Bronze</option>
        </select>
      </div>
      <div>
        <label for="about_company">About Company:</label>
        <textarea id="about_company" v-model="newSponsor.about_company" required></textarea>
      </div>
      <div>
        <label for="image_url">Image URL:</label>
        <input type="url" id="image_url" v-model="newSponsor.image_url" required>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>

  <!-- Display existing sponsors -->
  <div v-for="sponsor in sponsors" :key="sponsor.id" class="sponsor">
    <!-- Sponsor details -->
  </div>






</template>

<script>
import axios from 'axios';
export default {
  name: "Sponsors",
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
        image_url: ''
      },
      showForm: false // Flag to show/hide the form
    };
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/sponsors')
        .then(response => {
          console.log(response.data);
          this.sponsors = response.data;
        })
        .catch(error => {
          console.error('Error fetching sponsors:', error);
        });
  },
  methods: {
    // Method to create a new sponsor
    // createSponsor() {
    //   const headers = {
    //     'Accept': 'application/json',
    //     'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
    //   };
    //   // Create FormData object to send file along with other data
    //   let formData = new FormData();
    //   formData.append('name', this.newSponsor.name);
    //   formData.append('email', this.newSponsor.email);
    //   formData.append('phone', this.newSponsor.phone);
    //   formData.append('company_name', this.newSponsor.company_name);
    //   formData.append('position', this.newSponsor.position);
    //   formData.append('website_url', this.newSponsor.website_url);
    //   formData.append('sponsorship_type', this.newSponsor.sponsorship_type);
    //   formData.append('about_company', this.newSponsor.about_company);
    //   formData.append('image', this.newSponsor.image); // Append image file
    //
    //   axios.post('http://127.0.0.1:8000/api/create-sponsor', formData, {headers})
    //       .then(response => {
    //         // Log the response or handle it as needed
    //         console.log(response.data);
    //         // Optionally, reset the form and hide it after successful creation
    //         this.newSponsor = {
    //           name: '',
    //           email: '',
    //           phone: '',
    //           company_name: '',
    //           position: '',
    //           website_url: '',
    //           sponsorship_type: 'gold',
    //           about_company: '',
    //           image_url: ''
    //         };
    //         this.showForm = false; // Hide the form
    //       })
    //       .catch(error => {
    //         // Check for unauthorized error
    //         if (error.response && error.response.status === 401) {
    //           console.error('Unauthorized. Please log in.');
    //         } else {
    //           console.error('Error creating sponsor:', error);
    //         }
    //       });
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
              image_url: ''
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
    },

  }
}
</script>

<style scoped>

</style>