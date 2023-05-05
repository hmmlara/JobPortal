<template>
  <div class="container text-center">
    <div class="text-center">
      <h1 class="">Featured Jobs</h1>
      <p class="">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim ipsum
        perspiciatis sequi provident, praesentium corrupti officiis atque. Fugit
        provident voluptates iure eveniet non rerum iusto fuga ut. Harum, iste
        impedit?
      </p>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">Hi</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">Hi</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">Hi</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">Hi</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "JobsComponent",
  data() {
    return {
      categories: [],
    };
  },
  created() {
    axios.get("http://fakestoreapi.com/products/categories")
        .then((response) => (this.categories = response.data));
        // console.log(this.categories);
  },
};
</script>

<style scoped>
</style>