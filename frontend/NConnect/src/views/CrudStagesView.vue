<!--<template>-->
<!--  <AdminNavbar />-->
<!--  <div class="container">-->
<!--    <div class="sub-heading">-->
<!--      <div class="row">-->
<!--        <div class="col-md-12">-->
<!--          <h4>{{ isEditing ? 'Edit/Delete Stage' : 'Create Stage' }}</h4>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

<!--    &lt;!&ndash; Button to switch between creating and editing stages &ndash;&gt;-->
<!--    <div class="mb-3">-->
<!--      <button @click="toggleEditMode" class="btn btn-secondary">-->
<!--        {{ isEditing ? 'Switch to Create Mode' : 'Edit/Delete Existing Stage' }}-->
<!--      </button>-->
<!--    </div>-->

<!--    &lt;!&ndash; Select dropdown to edit existing stage &ndash;&gt;-->
<!--    <div v-if="isEditing" class="mt-5">-->
<!--      <div class="sub-heading">-->
<!--        <div class="row">-->
<!--          <div class="col-md-12">-->
<!--            <h4>Select Stage to Edit</h4>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="existing_stage_id">Select Stage</label>-->
<!--        <select v-model="selectedStageId" class="form-control" @change="fetchStageDetails">-->
<!--          <option value="" disabled>Select a stage</option>-->
<!--          <option v-for="stage in stages" :key="stage.id" :value="stage.id">{{ stage.title }}</option>-->
<!--        </select>-->
<!--      </div>-->
<!--    </div>-->

<!--    &lt;!&ndash; Form for creating/editing a stage &ndash;&gt;-->
<!--    <form @submit.prevent="submitForm">-->
<!--      <div class="form-group">-->
<!--        <label for="name">Stage Name</label>-->
<!--        <input type="text" v-model="stage.name" class="form-control" id="name" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="date">Date</label>-->
<!--        <input type="date" v-model="stage.date" class="form-control" id="date" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="time">Time</label>-->
<!--        <input type="text" v-model="stage.time" class="form-control" id="time" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="title">Title</label>-->
<!--        <input type="text" v-model="stage.title" class="form-control" id="title" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="description">Description</label>-->
<!--        <textarea v-model="stage.description" class="form-control" id="description" rows="3" required></textarea>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="presenter">Presenter</label>-->
<!--        <input type="text" v-model="stage.presenter" class="form-control" id="presenter" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="organization">Organization</label>-->
<!--        <input type="text" v-model="stage.organization" class="form-control" id="organization" required>-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="image">Image</label>-->
<!--        <input type="file" class="form-control" id="image" accept="image/*" @change="handleImageChange">-->
<!--      </div>-->
<!--      <div class="form-group">-->
<!--        <label for="capacity">Capacity</label>-->
<!--        <input type="number" v-model="stage.capacity" class="form-control" id="capacity" required>-->
<!--      </div>-->
<!--      <button type="submit" class="btn btn-primary">{{ isEditing ? 'Update Stage' : 'Create Stage' }}</button>-->
<!--      <button v-if="isEditing" @click="deleteStage" class="btn btn-danger ml-2">Delete Stage</button>-->
<!--    </form>-->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--import axios from 'axios';-->
<!--import AdminNavbar from "@/components/AdminNavbar.vue";-->

<!--export default {-->
<!--  name: "CrudStagesView",-->
<!--  components: {AdminNavbar},-->
<!--  data() {-->
<!--    return {-->
<!--      stage: {-->
<!--        id: '',-->
<!--        name: '',-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null,-->
<!--        capacity: '' // Added capacity field-->
<!--      },-->
<!--      isEditing: false,-->
<!--      stages: [],-->
<!--      selectedStageId: ''-->
<!--    };-->
<!--  },-->
<!--  mounted() {-->
<!--    this.fetchStages();-->
<!--  },-->
<!--  methods: {-->
<!--    async fetchStages() {-->
<!--      try {-->
<!--        const response = await axios.get('http://127.0.0.1:8000/api/stages');-->
<!--        this.stages = response.data;-->
<!--      } catch (error) {-->
<!--        console.error('Error fetching stages:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    toggleEditMode() {-->
<!--      this.isEditing = !this.isEditing;-->
<!--      if (!this.isEditing) {-->
<!--        this.resetForm();-->
<!--      }-->
<!--    },-->
<!--    async submitForm() {-->
<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`-->
<!--      };-->

<!--      try {-->
<!--        if (this.isEditing) {-->
<!--          // Update stage-->
<!--          const response = await axios.put(`http://127.0.0.1:8000/api/stages/${this.stage.id}`, this.stage, { headers });-->
<!--          console.log('Stage updated successfully', response.data);-->
<!--        } else {-->
<!--          // Create stage-->
<!--          const formData = new FormData();-->
<!--          for (const key in this.stage) {-->
<!--            formData.append(key, this.stage[key]);-->
<!--          }-->
<!--          const response = await axios.post('http://127.0.0.1:8000/api/stages', formData, { headers });-->
<!--          console.log('Stage created successfully', response.data);-->
<!--        }-->
<!--        this.resetForm();-->
<!--        this.fetchStages();-->
<!--      } catch (error) {-->
<!--        console.error('Error:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    async deleteStage() {-->
<!--      if (!confirm('Are you sure you want to delete this stage?')) return;-->

<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`-->
<!--      };-->

<!--      try {-->
<!--        const response = await axios.delete(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, { headers });-->
<!--        console.log('Stage deleted successfully', response.data);-->
<!--        this.resetForm();-->
<!--        this.fetchStages();-->
<!--      } catch (error) {-->
<!--        console.error('Error deleting stage:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    async fetchStageDetails() {-->
<!--      if (!this.selectedStageId) return;-->

<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`-->
<!--      };-->

<!--      try {-->
<!--        const response = await axios.get(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, { headers });-->
<!--        this.stage = response.data;-->
<!--      } catch (error) {-->
<!--        console.error('Error fetching stage details:', error);-->
<!--      }-->
<!--    },-->
<!--    handleImageChange(event) {-->
<!--      this.stage.image = event.target.files[0];-->
<!--    },-->
<!--    resetForm() {-->
<!--      this.createFormVisible = false;-->
<!--      this.updateFormVisible = false;-->
<!--      this.stage = {-->
<!--        id: '',-->
<!--        name: '',-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null,-->
<!--        capacity: '' // Reset capacity field-->
<!--      };-->
<!--      this.selectedStageId = '';-->
<!--    }-->
<!--  }-->
<!--};-->
<!--</script>-->

<!--<style scoped>-->
<!--.container {-->
<!--  max-width: 600px;-->
<!--  margin: 0 auto;-->
<!--  padding: 20px;-->
<!--}-->
<!--.sub-heading {-->
<!--  margin-bottom: 20px;-->
<!--}-->
<!--.mb-3 {-->
<!--  margin-bottom: 1rem;-->
<!--}-->
<!--.mt-5 {-->
<!--  margin-top: 50px;-->
<!--}-->
<!--.ml-2 {-->
<!--  margin-left: 0.5rem;-->
<!--}-->
<!--</style>-->






<!--ZATIAL NAJELPSIE-->
<template>
  <AdminNavbar/>
  <div class="container">
    <div class="sub-heading">
      <div class="row">
        <div class="col-md-12">
          <h4>{{ isEditing ? 'Edit/Delete Stage' : 'Create Stage' }}</h4>
        </div>
      </div>
    </div>

    <!-- Button to switch between creating and editing stages -->
    <div class="mb-3">
      <button @click="toggleEditMode" class="btn btn-secondary">
        {{ isEditing ? 'Switch to Create Mode' : 'Edit/Delete Existing Stage' }}
      </button>
    </div>

    <!-- Select dropdown to edit existing stage -->
    <div v-if="isEditing" class="mt-5">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Select Stage to Edit</h4>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="existing_stage_id">Select Stage</label>
        <select v-model="selectedStageId" class="form-control" @change="fetchStageDetails">
          <option value="" disabled>Select a stage</option>
          <option v-for="stage in stages" :key="stage.id" :value="stage.id">{{ stage.title }}</option>
        </select>
      </div>
    </div>

    <!-- Form for creating/editing a stage -->
    <form @submit.prevent="isEditing ? updateStage() : createStage()">
      <div class="form-group">
        <label for="name">Stage Name</label>
        <input type="text" v-model="stage.name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" v-model="stage.date" class="form-control" id="date" required>
      </div>
      <div class="form-group">
        <label for="time">Time</label>
        <input type="text" v-model="stage.time" class="form-control" id="time" required>
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" v-model="stage.title" class="form-control" id="title" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea v-model="stage.description" class="form-control" id="description" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="presenter">Presenter</label>
        <input type="text" v-model="stage.presenter" class="form-control" id="presenter" required>
      </div>
      <div class="form-group">
        <label for="organization">Organization</label>
        <input type="text" v-model="stage.organization" class="form-control" id="organization" required>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" accept="image/*" @change="handleImageChange">
      </div>
      <div class="form-group">
        <label for="capacity">Capacity</label>
        <input type="number" v-model="stage.capacity" class="form-control" id="capacity" required>
      </div>
      <button type="submit" class="btn btn-primary">{{ isEditing ? 'Update Stage' : 'Create Stage' }}</button>
      <button v-if="isEditing" @click="deleteStage" class="btn btn-danger ml-2">Delete Stage</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import AdminNavbar from "@/components/AdminNavbar.vue";

export default {
  name: "CrudStagesView",
  components: {AdminNavbar},
  data() {
    return {
      stage: {
        name: '',
        date: '',
        time: '',
        title: '',
        description: '',
        presenter: '',
        organization: '',
        image: null,
        capacity: '' // Added capacity field
      },
      isEditing: false,
      stages: [],
      selectedStageId: ''
    };
  },
  mounted() {
    this.fetchAllStages();
  },
  methods: {
    // Method to fetch all stages for the select dropdown
    fetchAllStages() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.get('http://127.0.0.1:8000/api/stages', { headers })
          .then(response => {
            this.stages = response.data;
          })
          .catch(error => {
            console.error('Error fetching stages:', error);
          });
    },
    // Method to fetch details of the selected stage
    fetchStageDetails() {
      if (!this.selectedStageId) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.get(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, { headers })
          .then(response => {
            this.stage = response.data;
          })
          .catch(error => {
            console.error('Error fetching stage details:', error);
          });
    },
    // Method to create a new stage
    createStage() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      const formData = new FormData();
      for (const key in this.stage) {
        formData.append(key, this.stage[key]);
      }

      axios.post('http://127.0.0.1:8000/api/stages', formData, { headers })
          .then(response => {
            alert('Stage created successfully!');
            this.resetForm();
            this.fetchAllStages(); // Refresh the list of stages
          })
          .catch(error => {
            console.error('Error creating stage:', error);
            alert('Failed to create stage. Please try again.');
          });
    },
    // Method to update an existing stage
    updateStage() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      const stageData = { ...this.stage };
      if (stageData.image instanceof File) {
        const formData = new FormData();
        for (const key in stageData) {
          formData.append(key, stageData[key]);
        }

        axios.put(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, formData, { headers })
            .then(response => {
              alert('Stage updated successfully!');
              this.resetForm();
              this.isEditing = false;
              this.fetchAllStages(); // Refresh the list of stages
            })
            .catch(error => {
              console.error('Error updating stage:', error);
              alert('Failed to update stage. Please try again.');
            });
      } else {
        delete stageData.image;
        axios.put(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, stageData, { headers })
            .then(response => {
              alert('Stage updated successfully!');
              this.resetForm();
              this.isEditing = false;
              this.fetchAllStages(); // Refresh the list of stages
            })
            .catch(error => {
              console.error('Error updating stage:', error);
              alert('Failed to update stage. Please try again.');
            });
      }
    },
    // Method to delete a stage
    deleteStage() {
      if (!confirm('Are you sure you want to delete this stage?')) return;

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}`
      };

      axios.delete(`http://127.0.0.1:8000/api/stages/${this.selectedStageId}`, { headers })
          .then(response => {
            alert('Stage deleted successfully!');
            this.resetForm();
            this.isEditing = false;
            this.fetchAllStages(); // Refresh the list of stages
          })
          .catch(error => {
            console.error('Error deleting stage:', error);
            alert('Failed to delete stage. Please try again.');
          });
    },
    // Method to toggle between create and edit mode
    toggleEditMode() {
      this.isEditing = !this.isEditing;
      if (!this.isEditing) {
        this.resetForm();
      }
    },
    // Method to handle image file selection
    handleImageChange(event) {
      this.stage.image = event.target.files[0];
    },
    // Method to reset the form fields
    resetForm() {
      this.stage = {
        name: '',
        date: '',
        time: '',
        title: '',
        description: '',
        presenter: '',
        organization: '',
        image: null,
        capacity: '' // Reset capacity field
      };
      this.selectedStageId = '';
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
















