<template>
  <LayoutComponent>
    <div class="container p-3">
      <h3>Job Type List</h3>
      <router-link to="/admin/jobtype/add" class="btn btn-sm btn-success">Add Job Type</router-link>
    </div>
    <table class="table text-center mt-3">
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Job Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <JobTypeComponent
          v-for="(jobtype, index) in jobtypes.data"
          :key="index"
          :jobtype="jobtype"
          :index="jobtypes.from + index"
          @deleteJT="deleteJobType(jobtype.id)"
        />
      </tbody>
    </table>
    <div class="fixed-bottom">
      <PaginationComponent :data="jobtypes" @paginate="getJobTypes" />
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import JobTypeComponent from "./JobTypeComponent.vue";
import ApiCalls from "../../api/index.js";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";

export default {
  name: "JobTypesComponent",
  components: {
    LayoutComponent,
    PaginationComponent,
    JobTypeComponent
},
  data() {
    return {
      jobtypes: []
    };
  },
  mounted() {
    this.getJobTypes();
  },
  methods: {
    async getJobTypes(page = 1) {
      let data = await ApiCalls.get(`admin/jobType?page=${page}`);

      this.jobtypes = data.jobTypes;
      //   console.log(this.categories);

        // console.log(data);
    },
    deleteJobType(id) {
      ApiCalls.delete(`admin/jobType/${id}`)
        .then(response => {
          if (response.data.status == 200) {
            this.getJobTypes();
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
