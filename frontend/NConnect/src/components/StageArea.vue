<!--&lt;!&ndash;BASED ON STAGE NAME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!&ndash;&gt;-->

<!--<template>-->
<!--  <div class="schedule-area gray-bg">-->
<!--    <div class="container">-->
<!--      <div class="sub-heading">-->
<!--        <div class="row">-->
<!--          <div class="col-md-12">-->
<!--            <h4>Our Schedule</h4>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="schedules">-->
<!--        <div class="row no-margin">-->
<!--          <div class="col-md-3 no-padding">-->
<!--            <div class="schedule-title">-->
<!--              <h5>Date</h5>-->
<!--            </div>-->
<!--            <div class="schedule-date">-->
<!--              <ul class="nav nav-tabs" role="tablist">-->
<!--                <li v-for="(stage, index) in stages" :key="index" :class="{ 'active': activeStageIndex === index }">-->
<!--                  <a href="#" @click="setActiveStage(index, $event)">-->
<!--                    <h4>{{ stage.name }}</h4>-->
<!--                  </a>-->
<!--                </li>-->
<!--              </ul>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="col-md-9 no-padding">-->
<!--            <div class="schedule-details">-->
<!--              <div class="schedule-title">-->
<!--                <div class="row no-margin">-->
<!--                  <div class="col-sm-3 no-padding">-->
<!--                    <h5>Time</h5>-->
<!--                  </div>-->
<!--                  <div class="col-sm-9 no-padding">-->
<!--                    <h5>SESSION TITLE</h5>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="tab-content">-->
<!--                <div v-for="(stage, index) in stages" :key="index">-->
<!--                  <div v-if="activeStageIndex === index">-->
<!--                    <div v-for="(session, sessionIndex) in stage.sessions" :key="sessionIndex">-->
<!--                      <div class="single-schedule panel panel-default">-->
<!--                        <div class="panel-heading" role="tab">-->
<!--                          <div class="panel-title single-schedule-title">-->
<!--                            <a class="collapsed" data-toggle="collapse" :href="'#schedule-' + (index + 1) + '-' + (sessionIndex + 1)">-->
<!--                              <div class="row no-margin">-->
<!--                                <div class="col-sm-3 no-padding">-->
<!--                                  <h5>{{ session.time }}</h5>-->
<!--                                </div>-->
<!--                                <div class="col-sm-9 no-padding">-->
<!--                                  <h5 @click="selectSession(session)">{{ session.title }}</h5>-->
<!--                                </div>-->
<!--                              </div>-->
<!--                            </a>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                        <div :id="'schedule-' + (index + 1) + '-' + (sessionIndex + 1)" class="panel-collapse collapse" role="tabpanel">-->
<!--                          <div class="panel-body">-->
<!--                            <div class="row no-margin">-->
<!--                              <div class="col-sm-3 no-padding">-->
<!--                                <div class="schedule-img">-->
<!--                                  <img :src="session.image" alt="schedule" />-->
<!--                                </div>-->
<!--                              </div>-->
<!--                              <div class="col-sm-9 no-padding">-->
<!--                                <div class="schedule-info">-->
<!--                                  <p>{{ session.description }}</p>-->
<!--                                  <h5><span>With</span> : {{ session.presenter }} <small>Designer at <a href="">{{ session.organization }}</a></small></h5>-->
<!--                                </div>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>&lt;!&ndash; /.single-schedule &ndash;&gt;-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>&lt;!&ndash; /.tab-content &ndash;&gt;-->
<!--            </div>&lt;!&ndash; /.schedule-details &ndash;&gt;-->
<!--          </div>&lt;!&ndash; /.col &ndash;&gt;-->
<!--        </div>&lt;!&ndash; /.row &ndash;&gt;-->
<!--      </div>&lt;!&ndash; /.schedules &ndash;&gt;-->

<!--      &lt;!&ndash; Add a new section to display selected session details &ndash;&gt;-->
<!--      <div v-if="selectedSession" class="selected-session-details">-->
<!--        <h4>{{ selectedSession.title }}</h4>-->
<!--        <p>{{ selectedSession.description }}</p>-->
<!--        <p><strong>Presenter:</strong> {{ selectedSession.presenter }}</p>-->
<!--        <p><strong>Organization:</strong> <a href="">{{ selectedSession.organization }}</a></p>-->
<!--        <button @click="selectedSession = null">Close</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>&lt;!&ndash; /.schedule-area &ndash;&gt;-->
<!--</template>-->

<!--<script>-->
<!--import axios from 'axios';-->

<!--export default {-->
<!--  name: "StageArea",-->
<!--  data() {-->
<!--    return {-->
<!--      activeStageIndex: 0, // Initially set to show the first stage-->
<!--      stages: [],-->
<!--      selectedSession: null // Property to store the selected session-->
<!--    };-->
<!--  },-->
<!--  mounted() {-->
<!--    this.fetchStages();-->
<!--  },-->
<!--  methods: {-->
<!--    async fetchStages() {-->
<!--      try {-->
<!--        const response = await axios.get('http://127.0.0.1:8000/api/stages');-->

<!--        // Group sessions by stage name (case-insensitive)-->
<!--        const groupedByStage = {};-->
<!--        response.data.forEach(stage => {-->
<!--          const stageName = stage.name.toLowerCase(); // Convert stage name to lowercase-->
<!--          if (!groupedByStage[stageName]) {-->
<!--            groupedByStage[stageName] = [];-->
<!--          }-->
<!--          groupedByStage[stageName].push({-->
<!--            time: stage.time,-->
<!--            title: stage.title,-->
<!--            description: stage.description,-->
<!--            presenter: stage.presenter,-->
<!--            organization: stage.organization,-->
<!--            image: stage.image-->
<!--          });-->
<!--        });-->

<!--        // Convert grouped sessions to the stages array structure-->
<!--        this.stages = Object.keys(groupedByStage).map(stageName => ({-->
<!--          name: stageName,-->
<!--          sessions: groupedByStage[stageName]-->
<!--        }));-->
<!--      } catch (error) {-->
<!--        console.error('Error fetching stages:', error.response.data);-->
<!--      }-->
<!--    },-->
<!--    setActiveStage(index, event) {-->
<!--      event.preventDefault();-->
<!--      this.activeStageIndex = index;-->
<!--    },-->
<!--    selectSession(session) {-->
<!--      this.selectedSession = session;-->
<!--    }-->
<!--  }-->
<!--};-->
<!--</script>-->

<!--<style scoped>-->
<!--/* Your existing styles */-->
<!--.selected-session-details {-->
<!--  margin-top: 20px;-->
<!--  padding: 10px;-->
<!--  border: 1px solid #ccc;-->
<!--  background-color: #f9f9f9;-->
<!--}-->
<!--.schedule-area .sub-heading {-->
<!--  margin-bottom: 20px;-->
<!--}-->
<!--.schedule-area .schedule-date {-->
<!--  margin-bottom: 20px;-->
<!--}-->
<!--.schedule-area .schedule-details .schedule-title {-->
<!--  margin-bottom: 20px;-->
<!--}-->
<!--.schedule-area .single-schedule {-->
<!--  margin-bottom: 20px;-->
<!--}-->
<!--</style>-->







<template>
  <div class="schedule-area gray-bg">
    <div class="container">
      <div class="sub-heading">
        <div class="row">
          <div class="col-md-12">
            <h4>Our Schedule</h4>
          </div>
        </div>
      </div>
      <div class="schedules">
        <div class="row no-margin">
          <div class="col-md-3 no-padding">
            <div class="schedule-title">
              <h5>Date</h5>
            </div>
            <div class="schedule-date">
              <ul class="nav nav-tabs" role="tablist">
                <li v-for="(stage, index) in stages" :key="index" :class="{ 'active': activeStageIndex === index }">
                  <a href="#" @click="setActiveStage(index, $event)">
                    <h4>{{ stage.name }}</h4>
                    <h5>{{ stage.date }}</h5> <!-- Added stage.date here -->
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 no-padding">
            <div class="schedule-details">
              <div class="schedule-title">
                <div class="row no-margin">
                  <div class="col-sm-3 no-padding">
                    <h5>Time</h5>
                  </div>
                  <div class="col-sm-9 no-padding">
                    <h5>SESSION TITLE</h5>
                  </div>
                </div>
              </div>
              <div class="tab-content">
                <div v-for="(stage, index) in stages" :key="index">
                  <div v-if="activeStageIndex === index">
                    <div v-for="(session, sessionIndex) in stage.sessions" :key="sessionIndex">
                      <div class="single-schedule panel panel-default">
                        <div class="panel-heading" role="tab">
                          <div class="panel-title single-schedule-title">
                            <a class="collapsed" data-toggle="collapse" :href="'#schedule-' + (index + 1) + '-' + (sessionIndex + 1)">
                              <div class="row no-margin">
                                <div class="col-sm-3 no-padding">
                                  <h5>{{ session.time }}</h5>
                                </div>
                                <div class="col-sm-9 no-padding">
                                  <h5 @click="selectSession(session)">{{ session.title }}</h5>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div :id="'schedule-' + (index + 1) + '-' + (sessionIndex + 1)" class="panel-collapse collapse" role="tabpanel">
                          <div class="panel-body">
                            <div class="row no-margin">
                              <div class="col-sm-3 no-padding">
                                <div class="schedule-img">
                                  <img :src="session.image" alt="schedule" />
                                </div>
                              </div>
                              <div class="col-sm-9 no-padding">
                                <div class="schedule-info">
                                  <p>{{ session.description }}</p>
                                  <h5><span>With</span> : {{ session.presenter }} <small>Designer at <a href="">{{ session.organization }}</a></small></h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.single-schedule -->
                    </div>
                  </div>
                </div>
              </div><!-- /.tab-content -->
            </div><!-- /.schedule-details -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.schedules -->

      <!-- Add a new section to display selected session details -->
      <div v-if="selectedSession" class="selected-session-details">
        <h4>{{ selectedSession.title }}</h4>
        <p>{{ selectedSession.description }}</p>
        <p><strong>Presenter:</strong> {{ selectedSession.presenter }}</p>
        <p><strong>Organization:</strong> <a href="">{{ selectedSession.organization }}</a></p>
        <button @click="selectedSession = null">Close</button>
      </div>
    </div>
  </div><!-- /.schedule-area -->
</template>

<script>
import axios from 'axios';

export default {
  name: "StageArea",
  data() {
    return {
      activeStageIndex: 0, // Initially set to show the first stage
      stages: [],
      selectedSession: null // Property to store the selected session
    };
  },
  mounted() {
    this.fetchStages();
  },
  methods: {
    async fetchStages() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/stages');

        // Group sessions by stage name and date (case-insensitive)
        const groupedByStageAndDate = {};
        response.data.forEach(stage => {
          const stageKey = `${stage.name.toLowerCase()}_${stage.date}`; // Combine stage name and date as key
          if (!groupedByStageAndDate[stageKey]) {
            groupedByStageAndDate[stageKey] = {
              name: stage.name,
              date: stage.date,
              sessions: []
            };
          }
          groupedByStageAndDate[stageKey].sessions.push({
            time: stage.time,
            title: stage.title,
            description: stage.description,
            presenter: stage.presenter,
            organization: stage.organization,
            image: stage.image
          });
        });

        // Convert grouped sessions to the stages array structure
        this.stages = Object.values(groupedByStageAndDate);
      } catch (error) {
        console.error('Error fetching stages:', error.response.data);
      }
    },
    setActiveStage(index, event) {
      event.preventDefault();
      this.activeStageIndex = index;
    },
    selectSession(session) {
      this.selectedSession = session;
    }
  }
};
</script>

<style scoped>
/* Your existing styles */
.selected-session-details {
  margin-top: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  background-color: #f9f9f9;
}
.schedule-area .sub-heading {
  margin-bottom: 20px;
}
.schedule-area .schedule-date {
  margin-bottom: 20px;
}
.schedule-area .schedule-details .schedule-title {
  margin-bottom: 20px;
}
.schedule-area .single-schedule {
  margin-bottom: 20px;
}
</style>
