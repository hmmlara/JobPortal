<template>
  <LayoutComponentVue>
    <div
      class="container-fluid d-flex align-items-center justify-content-center"
      style="height: 250px; background: #016551"
    >
      <div class="w-25 d-none d-md-block d-lg-none"></div>
      <div class="row p-3 w-100">
        <div class="col-12 col-lg-9 mb-3 d-flex">
          <div class="d-none d-lg-block" style="width: 8rem"></div>
          <img
            :src="`data:image/*;base64,${company.company_logo}`"
            alt=""
            class="rounded-circle"
            width="80"
            height="80"
          />
          <div class="" style="width: 20px"></div>
          <div>
            <div class="badge badge-success">
              {{ jobtypes.job_type }}
            </div>
            <br />
            <small class="text-light" style="font-size: medium">
              <strong>{{ jobposts.job_position }}</strong>
            </small>
            <br />
            <small class="text-light" style="font-size: x-small"
              ><i class="fas fa-map-marker-alt me-2"></i
              >{{ company.address }}</small
            >
          </div>
        </div>
        <div class="col-12 col-lg-3 d-flex align-items-center">
          <div>
            <button
              class="btn btn-success mb-2"
              @click.prevent="applyJob"
              :disabled="this.jobposts.applied"
            >
              {{ this.jobposts.applied ? "Applied" : "Quick apply" }}
            </button>
            <br />
            <small class="text-light"
              >{{ applicants.length }}
              {{
                  applicants.length == 1 ? "applicant" : "applicants"
              }}</small
            >
          </div>
          <div>
            <button class="btn btn-dark mb-2">Save Job</button>
            <br />
            <small class="text-success">{{ posted }}</small>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-9 mb-3">
              <h5><strong>Job Description</strong></h5>
              <p v-html="jobposts.description"></p>
              <h5><strong>Skills</strong></h5>
              <p v-html="jobposts.skill"></p>
              <h5><strong>Salary</strong></h5>
              <p v-html="jobposts.salary"></p>
              <h5><strong>Company</strong></h5>
              <ul style="list-style: none">
                <li><i class="fas fa-building me-2"></i>{{ company.name }}</li>
                <li><i class="fas fa-envelope me-2"></i>{{ company.email }}</li>
                <li><i class="fas fa-phone me-2"></i>{{ company.phone }}</li>
                <li>
                  <i class="fas fa-map-marker-alt me-2"></i
                  >{{ company.address }}
                </li>
              </ul>
            </div>
            <div class="col-12 col-md-3">
              <div class="d-flex justify-content-end">
                <form action="" @submit.prevent="applyJob">
                  <button
                    class="btn btn-success ms-auto"
                    :disabled="this.jobposts.applied"
                  >
                    {{ this.jobposts.applied ? "Applied" : "Apply Now" }}
                  </button>
                  <br />
                  <small v-if="this.jobposts.applied" class="text-muted">{{
                    this.jobposts.status
                  }}</small>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "../layout/LayoutComponent.vue";
import ApiCalls from "../../api/index";
import { useRoute } from "vue-router";
import router from "@/router";

export default {
  name: "jobdetailComponent",
  components: {
    LayoutComponentVue,
  },
  data() {
    return {
      jobposts: [],
      route: useRoute(),
      user_id: this.auth.user.id,
      posted: "",
      jobtypes: [],
      company: [],
      applicants: [],
    };
  },
  mounted() {
    this.getJobDetails();
  },
  created() {
    window.onpopstate = () => this.goBack();
  },
  methods: {
    goBack() {
      router.go(0);
    },
    getJobDetails() {
      ApiCalls.get(
        `frontend/jobPost/jobDetails/${this.route.params.id}/${this.user_id}`
      ).then((response) => {
        if (response.status == 200) {
          this.jobposts = response.data.jobPost;
          this.company = this.jobposts.company;
          this.jobtypes = this.jobposts.job_type;
          this.applicants = this.jobposts.applicants;
          this.posted = this.getTimeDifference(this.jobposts.created_at);
        }
      });
    },
    getTimeDifference(createdDate) {
      let date = new Date(createdDate);
      console.log(date);

      let seconds = Math.floor((Date.now() - date.getTime()) / 1000);
      let unit = "second";
      let direction = "ago";
      if (seconds < 0) {
        seconds = -seconds;
        direction = "from now";
      }
      let value = seconds;
      if (seconds >= 31536000) {
        value = Math.floor(seconds / 31536000);
        unit = "year";
      } else if (seconds >= 86400) {
        value = Math.floor(seconds / 86400);
        unit = "day";
      } else if (seconds >= 3600) {
        value = Math.floor(seconds / 3600);
        unit = "hour";
      } else if (seconds >= 60) {
        value = Math.floor(seconds / 60);
        unit = "minute";
      }
      if (value != 1) unit = unit + "s";
      return `${value} ${unit} ${direction}`;
    },
    applyJob() {
      let formData = {
        user_id: this.user_id,
        job_post_id: this.jobposts.id,
      };
      ApiCalls.post("frontend/jobPost/applyJobPost", formData)
        .then((response) => {
          console.log(response);
          if (response.status == 201) {
            this.getJobDetails();
          }
        })
        .catch((error) => alert("You need to fill your information first!"));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>