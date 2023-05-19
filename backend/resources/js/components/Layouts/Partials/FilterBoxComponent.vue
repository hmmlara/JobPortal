<template>
  <div class="container w-50 float-end mb-2">
    <div class="row searchFilter">
      <div class="col-sm-12">
        <div class="input-group">
          <!-- <button
            type="button"
            class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
            data-mdb-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-filter"></i>
            <span class="caret">&nbsp;</span>
          </button> -->
          <input
            id="table_filter"
            type="text"
            class="form-control"
            aria-label="Text input with segmented button dropdown"
            :placeholder="placeholder"
            style="border-radius: 0px;height: 20px;"
            v-model="searchData"
          />
          <div class="input-group-btn">
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="category_filters">
                <li>
                  <input
                    class="cat_type category-input"
                    data-label="All"
                    id="all"
                    value
                    name="radios"
                    type="radio"
                  />
                  <label for="all">All</label>
                </li>
                <li>
                  <label class="category-label" for="Design">Design</label>
                </li>
                <li>
                  <label class="category-label" for="Marketing">Marketing</label>
                </li>
                <li>
                  <label class="category-label" for="Programming">Programming</label>
                </li>
                <li>
                  <label class="category-label" for="Sales">Sales</label>
                </li>
                <li>
                  <label class="category-label" for="Support">Support</label>
                </li>
              </ul>
            </div>
            <button id="searchBtn" type="button" class="btn btn-sm btn-success" @click="search">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FilterBoxComponent",
  props: ['placeholder'],
  data() {
    return {
      searchData: ""
    };
  },
  methods: {
    search() {
      this.$emit("search", this.searchData);
    }
  }
};
</script>

<style scoped>
button {
  border-radius: 0px !important;
  height: 35px !important;
}
.searchFilter {
  margin-bottom: 20px;
}

.searchFilter .dropdown-menu .category_filters {
  min-width: 178px;
  width: 100%;
  margin: 15px 0 0 -25px;
}
.searchFilter .dropdown-menu-right {
  right: 170px;
  min-width: 175px;
  top: 90%;
}
.searchFilter .dropdown-menu .category_filters li {
  list-style-type: none;
  padding: 2px 10px;
  font-size: 18px;
}
.searchFilter .dropdown-menu .category_filters label {
  margin-left: 15px;
}
</style>
