<!--<template>-->
<!--  <div>-->
<!--    <h2>CRUD Operations for Stages</h2>-->
<!--    <button @click="showCreateForm">Create Stage</button>-->
<!--    &lt;!&ndash; Form to create a new stage &ndash;&gt;-->
<!--    <div v-if="createFormVisible">-->
<!--      <h3>Create New Stage</h3>-->
<!--      <form @submit.prevent="createStage">-->
<!--        <div>-->
<!--          <label for="date">Date:</label>-->
<!--          <input type="date" id="date" v-model="stage.date" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="time">Time:</label>-->
<!--          <input type="text" id="time" v-model="stage.time" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="title">Title:</label>-->
<!--          <input type="text" id="title" v-model="stage.title" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="description">Description:</label>-->
<!--          <textarea id="description" v-model="stage.description" required></textarea>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="presenter">Presenter:</label>-->
<!--          <input type="text" id="presenter" v-model="stage.presenter" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="organization">Organization:</label>-->
<!--          <input type="text" id="organization" v-model="stage.organization" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="image">Image:</label>-->
<!--          <input type="file" id="image" accept="image/*" @change="handleImageChange">-->
<!--        </div>-->
<!--        <button type="submit">Create</button>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--import axios from 'axios';-->

<!--export default {-->
<!--  name: "CrudStagesView",-->
<!--  data() {-->
<!--    return {-->
<!--      createFormVisible: false,-->
<!--      stage: {-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null-->
<!--      }-->
<!--    };-->
<!--  },-->
<!--  methods: {-->
<!--    showCreateForm() {-->
<!--      this.createFormVisible = true;-->
<!--    },-->
<!--    async createStage() {-->
<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers-->
<!--      };-->

<!--      // Prepare form data-->
<!--      const formData = new FormData();-->
<!--      formData.append('date', this.stage.date);-->
<!--      formData.append('time', this.stage.time);-->
<!--      formData.append('title', this.stage.title);-->
<!--      formData.append('description', this.stage.description);-->
<!--      formData.append('presenter', this.stage.presenter);-->
<!--      formData.append('organization', this.stage.organization);-->
<!--      if (this.stage.image) {-->
<!--        formData.append('image', this.stage.image);-->
<!--      }-->

<!--      try {-->
<!--        const response = await axios.post('http://127.0.0.1:8000/api/stages/', formData, { headers });-->
<!--        console.log('Stage created:', response.data);-->
<!--        // Reset form and hide-->
<!--        this.resetForm();-->
<!--      } catch (error) {-->
<!--        console.error('Error creating stage:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    handleImageChange(event) {-->
<!--      this.stage.image = event.target.files[0];-->
<!--    },-->
<!--    resetForm() {-->
<!--      this.createFormVisible = false;-->
<!--      // Reset form fields-->
<!--      this.stage = {-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null-->
<!--      };-->
<!--    }-->
<!--  }-->
<!--};-->
<!--</script>-->

<!--<style scoped>-->
<!--/* Add your component styles here */-->
<!--</style>-->
<!--<template>-->
<!--  <div>-->
<!--    <h2>CRUD Operations for Stages</h2>-->
<!--    &lt;!&ndash; Create Stage Button &ndash;&gt;-->
<!--    <button @click="showCreateForm">Create Stage</button>-->

<!--    &lt;!&ndash; Update Stage Button and Dropdown &ndash;&gt;-->
<!--    <div>-->
<!--      <select v-model="selectedStage" @change="loadStageData">-->
<!--        <option value="">Select Stage to Update</option>-->
<!--        <option v-for="stage in stages" :key="stage.id" :value="stage.id">{{ stage.title }}</option>-->
<!--      </select>-->
<!--      <button v-if="selectedStage" @click="showUpdateForm">Update Stage</button>-->
<!--    </div>-->

<!--    &lt;!&ndash; Form for creating/updating stages &ndash;&gt;-->
<!--    <div v-if="createFormVisible || updateFormVisible">-->
<!--      <h3>{{ updateFormVisible ? 'Update' : 'Create' }} Stage</h3>-->
<!--      <form @submit.prevent="submitForm">-->
<!--        <div>-->
<!--          <label for="date">Date:</label>-->
<!--          <input type="date" id="date" v-model="stage.date" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="time">Time:</label>-->
<!--          <input type="text" id="time" v-model="stage.time" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="title">Title:</label>-->
<!--          <input type="text" id="title" v-model="stage.title" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="description">Description:</label>-->
<!--          <textarea id="description" v-model="stage.description" required></textarea>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="presenter">Presenter:</label>-->
<!--          <input type="text" id="presenter" v-model="stage.presenter" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="organization">Organization:</label>-->
<!--          <input type="text" id="organization" v-model="stage.organization" required>-->
<!--        </div>-->
<!--        <div>-->
<!--          <label for="image">Image:</label>-->
<!--          <input type="file" id="image" accept="image/*" @change="handleImageChange">-->
<!--        </div>-->
<!--        <button type="submit">{{ updateFormVisible ? 'Update' : 'Create' }}</button>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--import axios from 'axios';-->

<!--export default {-->
<!--  name: "CrudStagesView",-->
<!--  data() {-->
<!--    return {-->
<!--      stages: [], // Store all stages-->
<!--      selectedStage: '', // Selected stage ID for updating-->
<!--      createFormVisible: false,-->
<!--      updateFormVisible: false,-->
<!--      stage: {-->
<!--        id: '',-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null-->
<!--      }-->
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
<!--    showCreateForm() {-->
<!--      this.createFormVisible = true;-->
<!--    },-->
<!--    showUpdateForm() {-->
<!--      // Find selected stage by ID-->
<!--      const selectedStage = this.stages.find(stage => stage.id === this.selectedStage);-->
<!--      if (selectedStage) {-->
<!--        // Populate form fields with selected stage data-->
<!--        this.stage = { ...selectedStage };-->
<!--        this.updateFormVisible = true;-->
<!--      }-->
<!--    },-->
<!--    async submitForm() {-->
<!--      const headers = {-->
<!--        'Accept': 'application/json',-->
<!--        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers-->
<!--      };-->

<!--      try {-->
<!--        if (this.updateFormVisible) {-->
<!--          // Update stage-->
<!--          await axios.put(`http://127.0.0.1:8000/api/stages/${this.stage.id}`, this.stage, { headers });-->
<!--          console.log('Stage updated successfully');-->
<!--        } else {-->
<!--          // Create stage-->
<!--          await axios.post('http://127.0.0.1:8000/api/stages', this.stage, { headers });-->
<!--          console.log('Stage created successfully');-->
<!--        }-->
<!--        // Reset form and hide-->
<!--        this.resetForm();-->
<!--        this.fetchStages(); // Refresh stage list-->
<!--      } catch (error) {-->
<!--        console.error('Error:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    loadStageData() {-->
<!--      // Reset form visibility when selecting a stage from dropdown-->
<!--      this.updateFormVisible = false;-->
<!--    },-->
<!--    resetForm() {-->
<!--      this.createFormVisible = false;-->
<!--      this.updateFormVisible = false;-->
<!--      // Reset form fields-->
<!--      this.stage = {-->
<!--        id: '',-->
<!--        date: '',-->
<!--        time: '',-->
<!--        title: '',-->
<!--        description: '',-->
<!--        presenter: '',-->
<!--        organization: '',-->
<!--        image: null-->
<!--      };-->
<!--    }-->
<!--  }-->
<!--};-->
<!--</script>-->

<!--<style scoped>-->
<!--/* Add your component styles here */-->
<!--</style>-->




























<template>
  <div>
    <h2>CRUD Operations for Stages</h2>
    <!-- Create Stage Button -->
    <button @click="showCreateForm">Create Stage</button>

    <!-- Update Stage Button, Dropdown, and Delete Button -->
    <div>
      <select v-model="selectedStage" @change="loadStageData">
        <option value="">Select Stage to Update</option>
        <option v-for="stage in stages" :key="stage.id" :value="stage.id">{{ stage.title }}</option>
      </select>
      <button v-if="selectedStage" @click="showUpdateForm">Update Stage</button>
      <button v-if="selectedStage" @click="deleteStage">Delete Stage</button>
    </div>

    <!-- Form for creating/updating stages -->
    <div v-if="createFormVisible || updateFormVisible">
      <h3>{{ updateFormVisible ? 'Update' : 'Create' }} Stage</h3>
      <form @submit.prevent="submitForm">
        <div>
          <label for="date">Date:</label>
          <input type="date" id="date" v-model="stage.date" required>
        </div>
        <div>
          <label for="time">Time:</label>
          <input type="text" id="time" v-model="stage.time" required>
        </div>
        <div>
          <label for="title">Title:</label>
          <input type="text" id="title" v-model="stage.title" required>
        </div>
        <div>
          <label for="description">Description:</label>
          <textarea id="description" v-model="stage.description" required></textarea>
        </div>
        <div>
          <label for="presenter">Presenter:</label>
          <input type="text" id="presenter" v-model="stage.presenter" required>
        </div>
        <div>
          <label for="organization">Organization:</label>
          <input type="text" id="organization" v-model="stage.organization" required>
        </div>
        <div>
          <label for="image">Image:</label>
          <input type="file" id="image" accept="image/*" @change="handleImageChange">
        </div>
        <button type="submit">{{ updateFormVisible ? 'Update' : 'Create' }}</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "CrudStagesView",
  data() {
    return {
      stages: [], // Store all stages
      selectedStage: '', // Selected stage ID for updating/deletion
      createFormVisible: false,
      updateFormVisible: false,
      stage: {
        id: '',
        date: '',
        time: '',
        title: '',
        description: '',
        presenter: '',
        organization: '',
        image: null
      }
    };
  },
  mounted() {
    this.fetchStages();
  },
  methods: {
    async fetchStages() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/stages');
        this.stages = response.data;
      } catch (error) {
        console.error('Error fetching stages:', error.response.data);
      }
    },
    showCreateForm() {
      this.createFormVisible = true;
    },
    showUpdateForm() {
      // Find selected stage by ID
      const selectedStage = this.stages.find(stage => stage.id === this.selectedStage);
      if (selectedStage) {
        // Populate form fields with selected stage data
        this.stage = { ...selectedStage };
        this.updateFormVisible = true;
      }
    },
    async submitForm() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers
      };

      try {
        if (this.updateFormVisible) {
          // Update stage
          await axios.put(`http://127.0.0.1:8000/api/stages/${this.stage.id}`, this.stage, { headers });
          console.log('Stage updated successfully');
        } else {
          // Create stage
          await axios.post('http://127.0.0.1:8000/api/stages', this.stage, { headers });
          console.log('Stage created successfully');
        }
        // Reset form and hide
        this.resetForm();
        this.fetchStages(); // Refresh stage list
      } catch (error) {
        console.error('Error:', error.response.data);
      }
    },
    async deleteStage() {
      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('adminToken')}` // Include token in headers
      };

      try {
        await axios.delete(`http://127.0.0.1:8000/api/stages/${this.selectedStage}`, { headers });
        console.log('Stage deleted successfully');
        this.resetForm();
        this.fetchStages(); // Refresh stage list
      } catch (error) {
        console.error('Error deleting stage:', error.response.data);
      }
    },
    loadStageData() {
      // Reset form visibility when selecting a stage from dropdown
      this.updateFormVisible = false;
    },
    handleImageChange(event) {
      this.stage.image = event.target.files[0];
    },
    resetForm() {
      this.createFormVisible = false;
      this.updateFormVisible = false;
      // Reset form fields
      this.stage = {
        id: '',
        date: '',
        time: '',
        title: '',
        description: '',
        presenter: '',
        organization: '',
        image: null
      };
    }
  }
};
</script>

<style scoped>
/* Add your component styles here */
</style>
