<template>
  <div>
    <NavbarComponent />
    <!--Main layout-->
    <main style="margin-top: 58px">
      <div class="container pt-4">
        <slot/>
        <!-- Section: Main chart -->
        <!-- <section class="mb-4">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="mb-0 text-center">
                <strong>Sales</strong>
              </h5>
            </div>
            <div class="card-body">
              <canvas class="my-4 w-100" id="myChart" height="380"></canvas>
            </div>
          </div>
        </section> -->
        <!-- Section: Main chart -->
      </div>
    </main>
    <!--Main layout-->
  </div>
</template>

<script>
import NavbarComponent from "./Partials/NavbarComponent.vue";

export default {
  name: "LayoutComponent",
  components: {
    NavbarComponent
  }
};
</script>

<style>
</style>
