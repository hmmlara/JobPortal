<template>
  <div class="login_register">
    <ul class="nav nav-tabs mb-3 text-center text-success" id="ex-with-icons" role="tablist">
      <li class="nav-item" role="presentation">
        <a
          class="nav-link active"
          id="ex-with-icons-tab-2"
          data-mdb-toggle="tab"
          href="#ex-with-icons-tabs-2"
          role="tab"
          aria-controls="ex-with-icons-tabs-2"
          aria-selected="false"
          ><i class="fa-sharp fa-solid fa-right-to-bracket me-2"></i>Login</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link"
          id="ex-with-icons-tab-3"
          data-mdb-toggle="tab"
          href="#ex-with-icons-tabs-3"
          role="tab"
          aria-controls="ex-with-icons-tabs-3"
          aria-selected="false"
          ><i class="fa-sharp fa-solid fa-file-pen"></i> Register</a
        >
      </li>
    </ul>
    <div class="tab-content" id="ex-with-icons-content">
      <div
        class="tab-pane show active fade"
        id="ex-with-icons-tabs-2"
        role="tabpanel"
        aria-labelledby="ex-with-icons-tab-2"
      >
        <LoginComponent/>
      </div>
      <div
        class="tab-pane fade"
        id="ex-with-icons-tabs-3"
        role="tabpanel"
        aria-labelledby="ex-with-icons-tab-3"
      >
        <RegisterComponent/>
      </div>
    </div>
  </div>
</template>

<script>
import LoginComponent from '../components/LoginComponent.vue';
import RegisterComponent from '../components/RegisterComponent.vue';
export default {
  name: "LoginRegister",
  components:{
    LoginComponent,RegisterComponent
  }
};
</script>

<style scoped>
.login_register {
  position: absolute;
  width: 25%;
  top: 40%;
  left: 50%;
  transform: translate(-60%, -50%);
}
.nav-link:visted{
    color: #14a44d
}
.nav-link{
    color: #14a44d;
}
</style>