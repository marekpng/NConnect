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
                <li v-for="(day, index) in days" :key="index" :class="{ 'active': activeDayIndex === index }">
                  <a href="#" @click="setActiveDay(index, $event)">
                    <h4>Day {{ index + 1 }}</h4>
                    <h5>{{ day.date }}</h5>
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
                <div v-for="(day, index) in days" :key="index">
                  <div v-if="activeDayIndex === index">
                    <div v-for="(session, sessionIndex) in day.sessions" :key="sessionIndex">
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
export default {
  name: "StageArea",
  data() {
    return {
      activeDayIndex: 0, // Initially set to show Day 1
      days: [
        // Your existing data structure
        {
          date: "24 DECEMBER",
          sessions: [
            {
              time: "09:00 Am - 02:00PM",
              title: "Introducing Material Design",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "02:00 Pm - 05:00PM",
              title: "Where to start with Material Design",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "05:00 Pm - 08:00PM",
              title: "Material Design for website",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            }
          ]
        },
        {
          date: "25 DECEMBER",
          sessions: [
            // Add sessions for Day 2
            {
              time: "09:00 Am - 02:00PM",
              title: "Introducing Material BBBBBBBBBBBBB",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "02:00 Pm - 05:00PM",
              title: "Where to start with Material Design",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "05:00 Pm - 08:00PM",
              title: "Material Design for website",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            }
          ]
        },
        {
          date: "26 DECEMBER",
          sessions: [
            // Add sessions for Day 3
            {
              time: "09:00 Am - 02:00PM",
              title: "Introducing Material DDDDDDDDDDDDDD",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "02:00 Pm - 05:00PM",
              title: "Where to start with Material Design",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            },
            {
              time: "05:00 Pm - 08:00PM",
              title: "Material Design for website",
              description: "Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.",
              presenter: "Zarina Kame",
              organization: "Google",
              image: "/images/schedule/1.jpg"
            }
          ]
        }
      ],
      selectedSession: null // Property to store the selected session
    };
  },
  methods: {
    setActiveDay(index, event) {
      event.preventDefault();
      this.activeDayIndex = index;
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
</style>
