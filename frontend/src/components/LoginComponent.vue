<template>
  <div class="">
    <form action="">
      <div class="form-group">
        <label for="" class="form-label">Email</label>
        <input
          type="email"
          name=""
          id=""
          class="form-control"
          placeholder="Enter your Email"
        />
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-2">Password</label>
        <input
          type="password"
          name=""
          id=""
          class="form-control"
          placeholder="Enter your Password"
        />
      </div>
      <div class="form-group mt-2">
        <input type="checkbox" name="rember" id="" class="form-check-control">
        <label for="" class="form-check-label">Remember Me</label>
      </div>
      <div class="mt-3 submit d-flex justify-content-between">
        <router-link to="/" class="mt-1"><i class="fa-solid fa-arrow-left"></i> back</router-link>
        <button class="btn btn-success">Login</button>
      </div>
    </form>
    <!-- <h4>Login</h4> -->
  </div>
</template>

<script>
export default {
  name: "LoginComponent",
};
</script>

<style scoped>
  .form-control:focus{
    border-color: #14a44d !important;
  }
  
</style>