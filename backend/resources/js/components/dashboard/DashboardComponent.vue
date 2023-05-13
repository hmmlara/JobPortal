<template>
  <LayoutComponentVue>
    <div class="container">
      <h3>Dashboard</h3>

      <div class="card p-3">
        <div class="card-content">
          <div class="row">
            <div class="col-12 col-md-4 col-lg-3" v-for="(item, index) in 5" :key="index">
              <div class="card-box bg-danger">
                <div class="inner">
                  <h3>10</h3>
                  <p>Job Posts</p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper" aria-hidden="true"></i>
                </div>
                <router-link to="/admin/jobpost" class="card-box-footer">
                  View More
                  <i class="fa fa-arrow-circle-right"></i>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "../Layouts/LayoutComponent.vue";

export default {
  name: "DashboardComponent",
  components: {
    LayoutComponentVue
  }
};
</script>
<style scoped>
.card-box {
  position: relative;
  color: #fff;
  padding: 20px 10px 40px;
  margin: 20px 0px;
}
.card-box:hover {
  text-decoration: none;
  color: #f1f1f1;
}
.card-box:hover .icon i {
  font-size: 100px;
  transition: 1s;
  -webkit-transition: 1s;
}
.card-box .inner {
  padding: 5px 10px 0 10px;
}
.card-box h3 {
  font-size: 27px;
  font-weight: bold;
  margin: 0 0 8px 0;
  white-space: nowrap;
  padding: 0;
  text-align: left;
}
.card-box p {
  font-size: 15px;
}
.card-box .icon {
  position: absolute;
  top: auto;
  bottom: 5px;
  right: 5px;
  z-index: 0;
  font-size: 72px;
  color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
  position: absolute;
  left: 0px;
  bottom: 0px;
  text-align: center;
  padding: 3px 0;
  color: rgba(255, 255, 255, 0.8);
  background: rgba(0, 0, 0, 0.1);
  width: 100%;
  text-decoration: none;
}
.card-box:hover .card-box-footer {
  background: rgba(0, 0, 0, 0.3);
}
</style>
