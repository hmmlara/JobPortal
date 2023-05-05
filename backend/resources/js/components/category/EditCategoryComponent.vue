<template>
  <LayoutComponentVue>
    <div class="container">
      <h3>Add Category</h3>
      <router-link to="/admin/category" class="btn btn-sm btn-success">Back</router-link>

      <div class="card w-50 mx-auto">
        <div class="card-body">
          <form action class="mt-3" @submit.prevent="updatCategory">
            <div class="form-group mb-3">
              <label for class="form-label">Category Name</label>
              <input
                type="text"
                name
                id
                :class="error ? errorStyle : normalStyle"
                placeholder="Enter Category Name"
                :value="category.name"
                @input="category.name = $event.target.value"
                @focus="error = false"
              />
              <small v-if="error" class="text-danger">Enter Category</small>
            </div>
            <button type="submit" class="btn btn-success w-100">UPdate</button>
          </form>
        </div>
      </div>
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "../Layouts/LayoutComponent.vue";
import ApiCalls from "../../api/index.js";
import { useRoute } from "vue-router";
import router from "../../routes";

export default {
  name: "EditCategoryComponent",
  components: {
    LayoutComponentVue
  },
  data() {
    return {
      category: [],
      normalStyle: "form-control",
      error: false,
      errorStyle: "form-control border-danger",
      route: useRoute()
    };
  },
  mounted() {
    this.getCategoryDetail();
  },
  methods: {
    async getCategoryDetail() {
      let data = await ApiCalls.getById(
        `admin/category/${this.route.params.id}/edit`
      );

        this.category = data.category;
    //   console.log(data);
    },
    updatCategory() {
      if (this.category.name == "") {
        this.error = true;
      } else {
        ApiCalls.update(`admin/category/${this.category.id}`, this.category);

        router.push("/admin/category");
      }
    //   console.log(category.id);
    }
  }
};
</script>

<style>
</style>
