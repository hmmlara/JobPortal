<template>
  <div>
    <h2>Jobs Filter</h2>
    <input
      type="text"
      name=""
      id=""
      placeholder="Location"
      class="form-control"
    />
    <div class="accordion mt-3" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button
            class="accordion-button"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#collapseOne"
            aria-expanded="true"
            aria-controls="collapseOne"
          >
            Job Type
          </button>
        </h2>
        <div
          id="collapseOne"
          class="accordion-collapse collapse show"
          aria-labelledby="headingOne"
          data-mdb-parent="#accordionExample"
        >
          <div class="accordion-body">
            <div v-for="jobType in jobTypes" :key="jobType.index" class="mt-2">
              <input
                type="radio"
                name="jobtype"
                id=""
                :value="jobType.job_type"
                class="form-check-control"
              />
              <label for="" class="form-label">{{ jobType.job_type }}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button
            class="accordion-button collapsed"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo"
          >
            Category
          </button>
        </h2>
        <div
          id="collapseTwo"
          class="accordion-collapse collapse"
          aria-labelledby="headingTwo"
          data-mdb-parent="#accordionExample"
        >
          <div class="accordion-body">
            <div v-for="category in categories" :key="category.index" class="mt-2">
              <input
                type="checkbox"
                :name="category.name"
                id=""
                class="form-check-control"
                :value="category.name"
              />
              <label for="" class="form-label">{{ category.name }}</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-success">Search job</button>
    </div>
  </div>
</template>

<script>
import ApiCalls from "@/api/index.js";
export default {
  name: "JobsFilter",
  data() {
    return {
      categories: [],
      jobTypes: [],
    }
  },
  mounted() {
    this.getCategories();
    this.getJobTypes();
    
    
  },
  methods: {
    async getCategories() {
      let data = await ApiCalls.get("frontend/category");
      this.categories = data.categories;
      console.log(this.categories);
    },
    async getJobTypes() {
      let data = await ApiCalls.get("frontend/jobType");
      this.jobTypes = data.jobTypes;
    },
  },
};
</script>

<style>
.form-control:focus {
  border-color: #14a44d !important;
}
.accordion-header:not(.collapsed)::after{
  color: #13b955 !important;
}

</style>