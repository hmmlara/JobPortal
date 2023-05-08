<template>
  <div class="">
    <form action="">
      <div class="form-group">
        <label for="" class="form-label">Email</label>
        <input
          type="email"
          name=""
        
          class="form-control"
          placeholder="Enter your Email"
        />
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-2">Password</label>
        <input
          type="password"
          name=""
        
          class="form-control"
          placeholder="Enter your Password"
        />
      </div>
      <div class="form-group mt-2">
        <input type="checkbox" name="rember" class="form-check-control">
        <label for="" class="form-check-label">Remember Me</label>
      </div>
      <div class="mt-3 submit d-flex justify-content-between">
        <a @click="goBack" class="mt-1"><i class="fa-solid fa-arrow-left"></i> back</a>
        <button class="btn btn-success">Login</button>
      </div>
    </form>
    <!-- <h4>Login</h4> -->
  </div>
</template>

<script>
import router from '@/router';
export default {
  name: "LoginComponent",
  methods:{
    goBack(){
      router.go(-1);
    }
  }
};
</script>

<style scoped>
  .form-control:focus{
    border-color: #14a44d !important;
  }
  
</style>