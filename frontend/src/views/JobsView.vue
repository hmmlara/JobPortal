<template>
  <LayoutComponentVue>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-lg-3 mb-3">
          <JobsFilterComponent />
        </div>
        <div class="col-12 col-lg-9">
          <div class="row">
            <div
              class="col-12 col-lg-4"
              v-for="(job, index) in jobposts.data"
              :key="index"
            >
              <JobCardComponent :job="job" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "@/components/layout/LayoutComponent.vue";
import JobCardComponent from "@/components/Jobs/JobCardComponent.vue";
import JobsFilterComponent from "@/components/Jobs/JobsFilterComponent.vue";
import ApiCalls from "@/api/index.js";
export default {
  name: "JobsView",
  data() {
    return {
      jobposts: [],
    };
  },
  components: {
    LayoutComponentVue,
    JobCardComponent,
    JobsFilterComponent,
  },
  mounted() {
    this.getJobPosts();
  },
  methods: {
    getJobPosts(page = 1) {
      ApiCalls.get(`frontend/jobPost?page=${page}`).then((response) => {
        if (response.status == 200) {
          this.jobposts = response.data.jobPosts;
        }
      });
    },
    getCategories() {
      ApiCalls.get("frontend/category").then((response) => {
        if (response.status == 200) {
          this.categories = response.data.categories;
        }
      });
    },
    getJobTypes() {
      ApiCalls.get("frontend/jobType").then((response) => {
        if (response.status == 200) {
          this.jobtypes = response.data.jobTypes;
        }
      });
    },
  },
};
</script>

<style scoped>
</style>