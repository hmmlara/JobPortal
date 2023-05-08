<template>
  <div class="card mb-3">
    <div class="card-title p-3">
      <div class="badge badge-success badge-sm float-end mt-3">Fulltime</div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6 col-md-12 d-flex justify-content-center mb-3">
          <img
            :src="`data:image/*;base64,${company.company_logo}`"
            alt=""
            class="rounded-circle"
            width="100"
            height="100"
          />
        </div>
        <div class="col-6 col-md-12 mb-3" style="display: grid; place-items: center">
          <small style="font-size: smaller" class="text-muted">{{
            company.name
          }}</small>
          <h5 class="text-center">Php,Laravel</h5>
          <small style="font-size: smaller" class="text-muted"
            ><i class="fas fa-map-marker-alt me-2"></i
            >{{ company.address }}</small
          >
        </div>
        <div class="col-12 mb-2">
          <div class="d-flex justify-content-between mt-3">
            <p class="">Salary</p>
            <a class="text-success"
              >View details <i class="fa-solid fa-arrow-right"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "JobCardComponent",
  props: ["company"],
};
</script>

<style scoped>
.card:hover {
  border: 1px solid #13b955;
}
</style>