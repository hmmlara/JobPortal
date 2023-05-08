<template>
  <div class="container">
    <div class="text-center mt-5">
      <h1 class="">Latest Jobs</h1>
      <p class="">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim ipsum
        perspiciatis sequi provident,<br>praesentium corrupti officiis atque. Fugit
        provident voluptates iure eveniet non rerum iusto fuga ut. Harum, iste
        impedit?
      </p>
    </div>
    <div class="row mt-5">
      <div class="col-md-3" v-for="com,index in companies" :key="index">
        <JobCardComponentVue :company="com"/>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
      <router-link to="/jobs" class="btn btn-success">See more</router-link>
    </div>
  </div>
</template>

<script>
import ApiCalls from '@/api/index.js';
import JobCardComponentVue from './JobCardComponent.vue';

export default {
  name: "JobsComponent",
  data() {
    return {
      companies:[]
    };
  },
  components:{
    JobCardComponentVue
  }
  ,
  mounted(){
    this.getCompanies();
  },
  methods:{
    async getCompanies(){
        let data = await ApiCalls.get('frontend/company')

        this.companies=data.companies.data;

        console.log(data);
    },
  }
};
</script>

<style scoped>

  @media screen and (max-width: 768px) {
  .col-md-3{
    margin-top: 5px;
  }

}
</style>