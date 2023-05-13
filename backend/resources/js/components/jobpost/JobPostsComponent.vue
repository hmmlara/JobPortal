<template>
  <LayoutComponent>
    <div class="container p-3">
      <h3>Job Posts List</h3>
      <router-link to="/admin/jobpost/add" class="btn btn-sm btn-success">Post a job</router-link>
    </div>

    <!-- <div class="form-group w-25 float-end mb-3 d-flex">
      <div class="dropdown">
        <button
          class="btn btn-success btn-sm dropdown-toggle"
          type="button"
          id="filter-menu"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        ><i class="fas fa-filter"></i></button>
        <ul class="dropdown-menu" aria-labelledby="filter-menu">
          <li>
            <button class="dropdown-item" type="button">Action</button>
          </li>
          <li>
            <button class="dropdown-item" type="button">Another action</button>
          </li>
          <li>
            <button class="dropdown-item" type="button">Something else here</button>
          </li>
        </ul>
      </div>
      <input
        type="search"
        id="form1"
        class="form-control"
        style="border: 1px solid #909090;height: 30px;font-size:small;"
        placeholder="Search"
      />
    </div> -->

    <div
      class="d-flex justify-content-center align-items-center"
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
    <table class="table text-center mt-3" v-else>
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Job Position</th>
          <th scope="col">Skill</th>
          <th scope="col">Deadline</th>
          <th scope="col">Action</th>
          <th scope="col">Active</th>
        </tr>
      </thead>
      <tbody>
        <JobPostComponent
          v-for="(jobpost, index) in jobposts.data"
          :key="index"
          :jobpost="jobpost"
          :index="jobposts.from + index"
          @statusChange="updateStatus($event,jobpost.id)"
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
import router from "../../routes";

export default {
  name: "JobTypesComponent",
  components: {
    LayoutComponent,
    PaginationComponent,
    JobPostComponent
  },
  data() {
    return {
      jobposts: [],
      isLoading: true,
      fetchError: false
    };
  },
  mounted() {
    this.getJobPosts();
  },
  methods: {
    getJobPosts(page = 1) {
      if (this.isLoading) {
        setTimeout(() => {
          ApiCalls.get(`admin/jobPost?page=${page}`)
            .then(response => {
              if (response.status == 200) {
                this.isLoading = false;
                this.jobposts = response.data.jobPosts;
              }
            })
            .catch(error => {
              this.isLoading = false;
              this.fetchError = true;

              if (error.response.status == 401) {
                this.auth.logout();

                alert("Session timeout");

                router.push("/login");
              }
            });
        }, 1000);
      } else {
        ApiCalls.get(`admin/jobPost?page=${page}`)
          .then(response => {
            if (response.status == 200) {
              this.jobposts = response.data.jobPosts;
            }
          })
          .catch(error => {
            this.isLoading = false;
            this.fetchError = true;

            if (error.response.status == 401) {
              this.auth.logout();

              alert("Session timeout");

              router.push("/login");
            }
          });
      }
    },
    updateStatus(checked, id) {
      let status = checked ? "Active" : "Inactive";
      ApiCalls.update(`admin/jobPost/${id}`, { status: status }).catch(
        error => {
          console.log(error);
        }
      );
    },
    retry() {
      this.isLoading = true;
      this.fetchError = false;
      this.getJobPosts();
    }
  }
};
</script>

<style>
</style>
