<template>
  <div class="home">
    <NavComponent  />
    <BannerComponentVue />
    <JobsComponent/>
    <FooterComponent />
  </div>
</template>

<script>
import NavComponent from "../components/Partials/NavComponent.vue";
import BannerComponentVue from "../components/BannerComponent.vue";
import FooterComponent from "../components/Partials/FooterComponent.vue";
import JobsComponent from "@/components/JobsComponent.vue";

export default {
  name: "HomeView",
  data() {
    return {
    };
  },
  components: {
    NavComponent,
    BannerComponentVue,
    FooterComponent,
    JobsComponent
  },
  created(){
    
  }
};
</script>

<style scoped>
  .home{
    position: relative;
    height: 3000px;
  }
</style>