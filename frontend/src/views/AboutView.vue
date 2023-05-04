<template>
  <div class="about">
    <NavComponent/>
    <h1>This is an about page</h1>
    <FooterComponent/>
  </div>
</template>
<script>
import NavComponent from "../components/Partials/NavComponent.vue";
import FooterComponent from "../components/Partials/FooterComponent.vue";

export default {
  name: 'HomeView',
  components: {
    NavComponent,FooterComponent
  }
}
</script>