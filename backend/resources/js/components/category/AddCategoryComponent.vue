<template>
  <LayoutComponent>
    <div class="container">
      <h3>Add Category</h3>
      <router-link to="/admin/category" class="btn btn-sm btn-success">Back</router-link>

      <div class="card w-50 mx-auto">
        <div class="card-body">
          <form action class="mt-3" @submit.prevent="addCategory">
            <div class="form-group mb-3">
              <label for class="form-label">Category Name</label>
              <input
                type="text"
                name
                id
                :class="error ? errorStyle : normalStyle"
                placeholder="Enter Category Name"
                :value="name"
                @input="name = $event.target.value"
                @focus="error = false"
              />
              <small v-if="error" class="text-danger">Enter Category</small>
            </div>
            <button type="submit" class="btn btn-success w-100">Create</button>
          </form>
        </div>
      </div>
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import ApiCalls from "../../api/index.js";
import router from "../../routes";

export default {
  name: "AddCategoryComponent",
  components: {
    LayoutComponent
  },
  data() {
    return {
      name: "",
      normalStyle: "form-control",
      error: false,
      errorStyle: "form-control border-danger",
    };
  },
  methods: {
    async addCategory() {
      if (this.name == "") {
        this.error = true;
        console.log(this.error);
      } else {
        ApiCalls.post("admin/category", { name: this.name });

        router.push('/admin/category');
      }
    }
  }
};
</script>

<style scoped>
.form-control:focus {
  border-color: #14a44d !important;
}
</style>
