<template>
  <LayoutComponent>
    <div class="container p-3">
      <h3>Job Posts List</h3>
      <router-link to="/admin/jobtype/add" class="btn btn-sm btn-success">Post a job</router-link>
    </div>
    <table class="table text-center mt-3">
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Job Position</th>
          <th scope="col">Skill</th>
          <th scope="col">Deadline</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <JobPostComponent
          v-for="(jobpost, index) in jobposts.data"
          :key="index"
          :jobpost="jobpost"
          :index="jobposts.from + index"
          @deleteJP="deleteJobPost(jobpost.id)"
        />
      </tbody>
    </table>
    <div class="fixed-bottom">
      <PaginationComponent :data="jobposts" @paginate="getJobPosts" />
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import JobPostComponent from "./JobPostComponent.vue";
import ApiCalls from "../../api/index.js";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";

export default {
  name: "JobTypesComponent",
  components: {
    LayoutComponent,
    PaginationComponent,
    JobPostComponent
  },
  data() {
    return {
      jobposts: []
    };
  },
  mounted() {
    this.getJobPosts();
  },
  methods: {
    async getJobPosts(page = 1) {
      let data = await ApiCalls.get(`admin/jobPost?page=${page}`);

      this.jobposts = data.jobPosts;
      //   console.log(this.categories);

      // console.log(data);
    },
    deleteJobPost(id) {
      ApiCalls.delete(`admin/jobPost/${id}`)
        .then(response => {
          if (response.data.status == 200) {
            this.getJobPosts();
          }
        })
        .catch(error => {
          alert("Sorry");
        });
    }
  }
};
</script>

<style>
</style>
