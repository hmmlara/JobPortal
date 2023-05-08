<template>
  <div class="register">
    <form action="">
      <div class="form-group">
        <label for="" class="form-label">Name</label>
        <input
          type="text"
          name=""
          class="form-control"
          placeholder="Enter your Email"
        />
      </div>
      <div class="form-group mt-2">
        <label for="" class="form-label">Email</label>
        <input
          type="email"
          name=""
          class="form-control"
          placeholder="Enter your Email"
        />
      </div>
      <div class="form-group mt-2">
        <label for="" class="form-label">Phone Number</label>
        <input
          type="tel"
          name=""
          class="form-control"
          placeholder="Enter your Email"
        />
      </div>
      <div class="form-group mt-2">
        <label for="" class="form-label">Password</label>
        <input
          type="password"
          name=""
          class="form-control"
          placeholder="Enter your Password"
        />
      </div>
      <div class="mt-3 submit d-flex justify-content-between">
        <router-link to="/" class="mt-1"
          ><i class="fa-solid fa-arrow-left"></i> back</router-link
        >
        <button class="btn btn-success">Register</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "RegisterComponent",
};
</script>

<style scoped>
</style>