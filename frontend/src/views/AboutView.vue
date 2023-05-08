<template>
  <div class="about">
    <NavComponent />
    <BannerComponentVue />
    <h1 class="text-center mt-5">This is an about page</h1>
    <FooterComponent />
  </div>
</template>
<script>
import NavComponent from "../components/Partials/NavComponent.vue";
import FooterComponent from "../components/Partials/FooterComponent.vue";
import BannerComponentVue from "../components/BannerComponent.vue";

export default {
  name: "HomeView",
  components: {
    NavComponent,
    FooterComponent,
    BannerComponentVue,
  },
};
</script>