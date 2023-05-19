<template>
  <LayoutComponentVue>
    <div class="container p-3">
      <div class="row">
        <div class="col-12">
          <h3>Applicants</h3>

          <router-link to="/admin/applicants" class="btn btn-sm btn-success">back</router-link>
          <br />
          <FilterBoxComponent :placeholder="'Search Applicant'" />
        </div>
        <div class="col-12">
          <table class="table text-center">
            <thead class="table-success">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Applicant Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Applied Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <ApplicantComponent
                v-for="(applicant, index) in applicants.data"
                :key="index"
                :applicant="applicant"
                :index ="applicants.from + index"
              />
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </LayoutComponentVue>
</template>

<script>
import ApiCalls from "../../api/index";
import LayoutComponentVue from "../Layouts/LayoutComponent.vue";
import FilterBoxComponent from "../Layouts/Partials/FilterBoxComponent.vue";
import ApplicantComponent from "./ApplicantComponent.vue";
import { useRoute } from "vue-router";

export default {
  name: "JobApplicantsComponent",
  components: {
    LayoutComponentVue,
    FilterBoxComponent,
    ApplicantComponent
  },
  data() {
    return {
      applicants: [],
      isLoading: true,
      fetchError: false,
      route: useRoute()
    };
  },
  mounted() {
    this.getApplicants();
  },
  methods: {
    getApplicants() {
      ApiCalls.get(`admin/applicants/${this.route.params.id}`)
        .then(response => {
          if (response.status == 200) {
            this.isLoading = false;
            this.applicants = response.data.applicants;
            console.log(response.data);
          }
        })
        .catch(error => {
          this.isLoading = false;
          this.fetchError = true;
        });
      console.log(this.applicants);
    }
  }
};
</script>

<style>
</style>
