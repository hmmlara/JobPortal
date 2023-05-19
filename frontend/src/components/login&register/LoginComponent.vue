<template>
  <div class="">
    <form action="" @submit.prevent="login">
      <div class="form-group">
        <label for="" class="form-label">Email</label>
        <input
          type="email"
          name=""
          :class="errorMessages.email == '' ? normalStyle : errorStyle"
          placeholder="Enter your Email"
          @input="credential.email = $event.target.value"
        />
        <small v-if="errorMessages.email != ''" class="text-danger">{{ errorMessages.email }}</small>
      </div>
      <div class="form-group">
        <label for="" class="form-label mt-2">Password</label>
        <input
          type="password"
          name=""
          :class="errorMessages.password == '' ? normalStyle : errorStyle"
          placeholder="Enter your Password"
          @input="credential.password = $event.target.value"
        />
        <small v-if="errorMessages.password != ''" class="text-danger">{{ errorMessages.password }}</small>
      </div>
      <div class="mt-3 submit d-flex justify-content-between">
        <a @click="goBack" class="mt-1"><i class="fa-solid fa-arrow-left"></i> back</a>
        <button class="btn btn-success" type="submit">Login</button>
      </div>
    </form>
    <!-- <h4>Login</h4> -->
  </div>
</template>

<script>
import router from '@/router';
import Apicalls from "@/api/index";
export default {
  name: "LoginComponent",
  data(){
    return{
      credential:{
        email:'',
        password:''
      },

      errorMessages: {
        email: "",
        password: "",
      },
      normalStyle: 'form-control',
      errorStyle: 'form-control border border-danger',
    }
  },
  methods:{
    goBack(){
      router.go(-1);
    },
    login(){
      var formData = new FormData();

      formData.append("email", this.credential.email);
      formData.append("password", this.credential.password);
      formData.append("role","user");
      Apicalls.post("login", formData)
        .then((response) => {
          if (response.status == 200) {
            this.credential = {
              email: "",
              password: "",
            };
            let data = response.data;
            this.auth.login(data.authorization.access_token,data.user,data.userInfo);
            this.goBack();
          }
        })
        .catch((error) => {
            let err = error.response.data.message;

            // console.log(error);
            if(err.hasOwnProperty('email')){
              this.errorMessages.email = err.email[0];
            }
            if(err.hasOwnProperty('password')){
              this.errorMessages.password = err.password[0];
            }
        });
    }
  }
};
</script>

<style scoped>
  .form-control:focus{
    border-color: #14a44d !important;
  }
  
</style>