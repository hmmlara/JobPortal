<template>
  <LayoutComponentVue>
    <div class="container p-3">
      <h3>Companies List</h3>
      <router-link to="/admin/company/add" class="btn btn-sm btn-success">Add Company</router-link>
    </div>
    <table class="table text-center mt-3">
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Company Logo</th>
          <th scope="col">Company Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody v-for="(company, index) in companies.data" :key="index">
        <CompanyComponent
          :company="company"
          :index="companies.from + index"
          @deleteCom="deleteCompany(company.id)"
        />
      </tbody>
    </table>
    <div class="fixed-bottom">
      <PaginationComponent :data="companies" @paginate="getCompanies" />
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "../Layouts/LayoutComponent.vue";
import CompanyComponent from "./CompanyComponent.vue";
import ApiCalls from "../../api/index";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";

export default {
  name: "CompaniesComponent",
  data() {
    return {
      companies: []
    };
  },
  components: {
    LayoutComponentVue,
    CompanyComponent,
    PaginationComponent
  },
  mounted() {
    this.getCompanies();
  },
  methods: {
    async getCompanies(page = 1) {
      let data = await ApiCalls.get(`admin/company?page=${page}`);

      // console.log( );
      this.companies = data.companies;
      //   console.log(this.companies);
    },
    deleteCompany(id) {
      ApiCalls.delete(`admin/company/${id}`)
        .then(response => {
          if (response.data.status == 200) {
            this.getCompanies();
          }
        })
        .catch(error => {
          alert(error.response.data.message);
          // console.log(error);
        });
    }
  }
};
</script>

<style>
</style>
