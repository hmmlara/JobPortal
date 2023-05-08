<template>
  <div>
    <NavComponent />
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4">
          <JobsFilterComponent/>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4" v-for="(com, index) in companies.data" :key="index">
              <JobCardComponent :company="com" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <FooterComponent />
  </div>
</template>

<script>
import NavComponent from "@/components/Partials/NavComponent.vue";
import FooterComponent from "@/components/Partials/FooterComponent.vue";
import JobCardComponent from "@/components/JobCardComponent.vue";
import JobsFilterComponent from "@/components/JobsFilterComponent.vue";
import ApiCalls from "@/api/index.js";
export default {
  name: "JobsView",
  data() {
    return {
      companies: [],
    };
  },
  components: {
    NavComponent,
    FooterComponent,
    JobCardComponent,
    JobsFilterComponent
  },
  mounted() {
    this.getCompanies();
  },
  methods: {
    async getCompanies() {
      let data = await ApiCalls.get("frontend/company");

      this.companies = data.companies;

      console.log(this.companies);
    },
  },
};
</script>

<style scoped>
</style>