<template>
  <LayoutComponent>
    <div class="container p-3">
      <h3>Locations List</h3>
      <router-link to="/admin/location/add" class="btn btn-sm btn-success">Add Location</router-link>
    </div>
    <table class="table text-center mt-3">
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">City</th>
          <th scope="col">Country</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <LocationComponent
          v-for="(location, index) in locations.data"
          :key="index"
          :location="location"
          :index="locations.from + index"
          @deleteLocation="deleteLocation(location.id)"
        />
      </tbody>
    </table>
    <div class="fixed-bottom">
      <PaginationComponent :data="locations" @paginate="getLocations" />
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import LocationComponent from "./LocationComponent.vue";
import ApiCalls from "../../api/index.js";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";

export default {
  name: "JobTypesComponent",
  components: {
    LayoutComponent,
    PaginationComponent,
    LocationComponent
},
  data() {
    return {
      locations: []
    };
  },
  mounted() {
    this.getLocations();
  },
  methods: {
    async getLocations(page = 1) {
      let data = await ApiCalls.get(`admin/location?page=${page}`);

      this.locations = data.locations;
      //   console.log(this.categories);

        console.log(data);
    },
    deleteLocation(id) {
      ApiCalls.delete(`admin/location/${id}`)
        .then(response => {
          if (response.data.status == 200) {
            this.getLocations();
          }
        })
        .catch(error => {
          alert("Sorry");
        });
    }
  }
};
</script>

<style>
</style>
