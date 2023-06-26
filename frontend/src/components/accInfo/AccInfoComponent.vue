<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-4 p-5">
          <div class="row">
            <div class="col-md-3">
              <img src="../../image/banner.png" width="100%" height="100%" />
            </div>
            <div class="col-md-9 mt-3">
              <h4>Arkar Nyein</h4>
              <button @click.prevent="addInfo" class="btn btn-success">
                <i class="fas fa-plus text-light me-2"></i>Add profile Section
              </button>
            </div>
          </div>
          <hr class="d-lg-none" />
          <div class="row">
            <div class="col-md-3 d-none d-md-block"></div>
            <div class="col-md-9">
            </div>
          </div>
        </div>
        <div class="card mt-4 p-5">
          <div class="d-flex justify-content-between">
            <h4>Personal Profile</h4>
            <div>
              <a data-mdb-toggle="modal" data-mdb-target="#editPersonalprofile">
                <i class="fa-solid fa-plus me-5"></i>
              </a>
              <a data-mdb-toggle="modal" data-mdb-target="#editPersonalprofile">
                <i class="fa-solid fa-pencil"></i>
              </a>
            </div>
          </div>
          <div class="">
            <p><i class="fas fa-user me-2 mt-3"></i>Male</p>
            <hr />
            <p><i class="fa-solid me-2 fa-cake-candles"></i>August 4, 2000</p>
            <hr />
            <p><i class="fas fa-id-card me-1"></i>9/KhaMaSa(N)009312</p>
            <hr />
            <p><i class="fas fa-id-card me-1"></i>9/KhaMaSa(N)009312</p>
            <hr />
            <p><i class="fa-solid me-2 fa-person"></i> Myanmar(Burma)</p>
          </div>
        </div>
        <div class="card mt-4 p-5">
          <div class="d-flex justify-content-between">
            <h4>Education</h4>
            <div>
              <a data-mdb-toggle="modal" data-mdb-target="#editEducation">
                <i class="fa-solid fa-pencil"></i>
              </a>
            </div>
          </div>
          <div class="">
            <p>
              <i class="fas fa-graduation-cap me-2 mt-3"></i>Mandalay
              Technological University
            </p>
            <hr />
            <p><i class="fas me-2 fa-school"></i>No(1).Basic Education</p>
          </div>
        </div>
        <div
          class="modal fade"
          id="editInfo"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit info</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-mdb-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="" class="form-label">Name</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>
                <div class="form-group mt-2">
                  <label for="" class="form-label">Address</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-mdb-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-success">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          class="modal p-3 fade"
          id="contactInfo"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Arkar Nyein</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-mdb-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="d-flex justify-content-between">
                  <h5>Contact Info</h5>
                  <a data-mdb-toggle="modal" data-mdb-target="#editContact"
                    ><i class="fas fa-pencil"></i
                  ></a>
                </div>
                <h6><i class="fas fa-envelope me-2"></i>Email</h6>
                <small style="font-size: medium"> arkarnyein@gmail.com </small>
                <h6 class="mt-3"><i class="fas fa-phone me-2"></i>Phone</h6>
                <small style="font-size: medium"> arkarnyein@gmail.com </small>
              </div>
            </div>
          </div>
        </div>
        <div
          class="modal fade"
          id="editContact"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-mdb-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">...</div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-mdb-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          class="modal fade"
          id="editPersonalprofile"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Edit Personal Profile
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-mdb-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="" class="form-label">Gender</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>
                <div class="form-group mt-2">
                  <label for="" class="form-label">Date of birth</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>
                <div class="form-group mt-2">
                  <label for="" class="form-label">NRC</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-mdb-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-success">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import router from '@/router';
export default {
  name: "AccInfoComponent",
  data(){
    return{
      img: "https://img.freepik.com/free-icon/user_318-159711.jpg"
    }
  },
  computed: {
    navigateToAddInfo() {
      // Perform any necessary logic here before navigating

      // Navigate to the "/Addinfo" route
      this.$router.push('/Addinfo');
    },
    addInfo(){
      router.push('/Addinfo');
    }
  }
};
</script>

<style scoped>
</style>