<template>
  <LayoutComponent>
    <div class="container p-3">
      <h3>Categories List</h3>
      <router-link to="/admin/category/add" class="btn btn-sm btn-success">Add Category</router-link>
    </div>
    <table class="table text-center mt-3">
      <thead class="table-success">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <CategoryComponent
          v-for="(category, index) in categories"
          :key="index"
          :category="category"
          :index="index"
          @deleteCate="deleteCategory(category.id)"
        />
      </tbody>
    </table>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import CategoryComponent from "./CategoryComponent.vue";
import ApiCalls from "../../api/index.js";

export default {
  name: "CategoriesComponent",
  components: {
    LayoutComponent,
    CategoryComponent
  },
  data() {
    return {
      categories: []
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    async getCategories() {
      let data = await ApiCalls.get("admin/category");

      this.categories = data.categories.data;

      //   console.log(data);
    },
    deleteCategory(id) {
      ApiCalls.delete(`admin/category/${id}`);
      console.log(id);
      this.getCategories();
    }
  }
};
</script>

<style>
</style>
