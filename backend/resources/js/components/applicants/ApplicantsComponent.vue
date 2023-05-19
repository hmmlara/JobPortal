<template>
  <LayoutComponentVue>
    <div class="container p-3">
      <div class="row">
        <div class="col-12">
          <h3>Active Job Posts</h3>

          <FilterBoxComponentVue :placeholder="'Search Job Position or Company'" />
        </div>
        <div class="col-12">
          <div
            class="d-flex justify-content-center align-items-center w-100"
            v-if="isLoading"
            style="height: 500px;"
          >
            <div class="spinner-border text-success" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
          <div v-else-if="fetchError" style="height: 500px;display:grid;place-items:center;">
            <div>
              <i class="fas fa-exclamation-triangle me-2 text-danger"></i>
              <span class="text-uppercase">Error</span>
              <br />
              <button class="btn btn-sm btn-danger mt-2" @click="retry">
                <i class="fas fa-rotate-right me-2"></i>Retry
              </button>
            </div>
          </div>

          <div class="container" v-else>
            <div class="row">
              <div class="col-12 col-md-3" v-for="(jobpost, index) in jobposts.data" :key="index">
                <router-link :to="`/admin/applicants/jobPosts/${jobpost.id}/applicants`">
                  <JobPostCardComponent :jobpost="jobpost" />
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fixed-bottom">
      <PaginationComponent :data="jobposts" @paginate="getJobPosts" />
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "../Layouts/LayoutComponent.vue";
import FilterBoxComponentVue from "../Layouts/Partials/FilterBoxComponent.vue";
import JobPostCardComponent from "./JobPostCardComponent.vue";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";
import ApiCalls from "../../api/index";

export default {
  name: "ApplicantsComponent",
  components: {
    LayoutComponentVue,
    FilterBoxComponentVue,
    JobPostCardComponent,
    PaginationComponent
  },
  data() {
    return {
      isLoading: true,
      fetchError: false,
      jobposts: []
    };
  },
  mounted() {
    this.getJobPosts();
  },
  methods: {
    getJobPosts() {
      setTimeout(() => {
        ApiCalls.get("admin/jobPost")
          .then(response => {
            if (response.status == 200) {
              this.isLoading = false;
              this.jobposts = response.data.jobPosts;
            }
          })
          .catch(error => {
            this.fetchError = true;
            this.isLoading = false;
          });
      }, 1000);
    //   console.log(this.jobposts);
    },
    retry() {
      this.fetchError = false;
      this.isLoading = true;
    }
  }
};
</script>

<style>
</style>
