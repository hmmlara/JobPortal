<template>
  <div class="main-head text-center">
    <div
      class="mt-4 font-semibold font-display text-[40px] lg:text-7xl xl:text-7xl !leading-tight d-none d-md-block"
    >
      HMM Project<br class="" />
      for the Job<span class="high_light">Portal</span> System
    </div>
    <div class="search-box mt-2 d-flex justify-content-center">
      <div class="card border-secondary mb-3 filter-box w-75">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <select name="" id="" class="form-select">
                <option value="" hidden selected>Choose Position</option>
                <option value="">All</option>
                <option value="">Frontend</option>
                <option value="">Backend</option>
              </select>
            </div>
            <div class="col-sm-4">
              <select name="" id="" class="form-select">
                <option value="" hidden selected>Choose Position</option>
                <option value="">All</option>
                <option value="">Frontend</option>
                <option value="">Backend</option>
              </select>
            </div>
            <div class="col-sm-4">
              <button class="btn btn-success w-100">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <img src="../assets/banner2.jpg" alt="" srcset="" class="img-fluid" > -->
  </div>
</template>

<script>
export default {
  name: "BannerComponent",
};
</script>

<style scoped>
/* .main-head{
    width: 100%;
    height: 200vh;
    background: url(../assets/banner2.jpg);
    background-size: contain;
    background-repeat: no-repeat;
} */
.font-display {
  font-size: 70px;
  font-weight: 600;
  margin-left: 100px;
  margin-bottom: 50px;
}
.high_light {
  color: #13b955;
}
@media screen and (min-width: 375px) {
  .col-sm-4{
    margin-top: 5px;
  }

}
</style>