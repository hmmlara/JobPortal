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
          v-for="(category, index) in categories.data"
          :key="index"
          :category="category"
          :index="categories.from + index"
          @deleteCate="deleteCategory(category.id)"
        />
      </tbody>
    </table>
    <div class="fixed-bottom">
      <PaginationComponent :data="categories" @paginate="getCategories" />
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../Layouts/LayoutComponent.vue";
import CategoryComponent from "./CategoryComponent.vue";
import ApiCalls from "../../api/index.js";
import PaginationComponent from "../Layouts/Partials/PaginationComponent.vue";

export default {
  name: "CategoriesComponent",
  components: {
    LayoutComponent,
    CategoryComponent,
    PaginationComponent
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
    async getCategories(page = 1) {
      let data = await ApiCalls.get(`admin/category?page=${page}`);

      this.categories = data.categories;
      //   console.log(this.categories);

      //   console.log(data);
    },
    deleteCategory(id) {
      ApiCalls.delete(`admin/category/${id}`)
        .then(response => {
          if (response.data.status == 200) {
            this.getCategories();
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
