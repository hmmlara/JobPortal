<template>
  <div class="container">
    <div class="card mt-4 p-3">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active"
            id="ex3-tab-1"
            data-mdb-toggle="tab"
            href="#ex3-tabs-1"
            role="tab"
            aria-controls="ex3-tabs-1"
            aria-selected="true"
            @click="showdot1"
            >Saved Jobs</a
          >
        </li>
        <li class="mt-1 me-2">
          <div class="dropdown" v-show="show1">
            <a
              class=""
              href="#"
              id="dropdownMenuLink"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="badge badge-success" style="font-size: small;"><i class="fas fa-ellipsis-vertical text-success text-large"></i></span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Not Applied</a></li>
              <li><a class="dropdown-item" href="#">Applied</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="ex3-tab-2"
            data-mdb-toggle="tab"
            href="#ex3-tabs-2"
            role="tab"
            aria-controls="ex3-tabs-2"
            aria-selected="false"
            @click="showdot2"
            >Applied Jobs</a
          >
        </li>
        <li class="mt-1 me-2">
          <div class="dropdown" v-show="show2">
            <a
              class=""
              href="#"
              id="dropdownMenuLink"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="badge badge-success" style="font-size: small;"><i class="fas fa-ellipsis-vertical text-success text-large"></i></span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Pending</a></li>
              <li><a class="dropdown-item" href="#">Confirmed</a></li>
              <li><a class="dropdown-item" href="#">Rejected</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="ex3-tabs-1"
          role="tabpanel"
          aria-labelledby="ex3-tab-1"
        >
          <div v-for="(job, index) in jobposts.data"
              :key="index">
            <div class=" d-flex content-item justify-content-between p-2 mt-1">
              <img :src="`data:image/*;base64,${job.company.company_logo}`" class="rounded-circle" width="100" height="100">
              <div class="mt-3  content-detail">
                <span><small class="text-muted text-center mb-1">{{ job.company.name }}</small></span>
                <h6 class="">{{ job.job_position }}</h6>
                <div class="text-truncate text-muted" style="max-width: 100px;"><small><i class="fas fa-map-marker-alt me-2"></i>{{ job.company.address }}</small></div>
              </div>
              <div class="status">
                <h5><span class="badge badge-success">saved</span></h5>
                <h5><span class="badge badge-danger">rejected</span></h5>
                <router-link :to="`/jobs/jobDetail/${job.id}`" class="text-secondary ms-4">
                   <i class="fa-solid fa-arrow-right"></i>
                </router-link>
              </div>
          </div>
          </div>
          <div class="text-center mt-2" v-show="moreExists">
            <button class="btn btn-success"  @click.prevent="loadMore">
              <i class="fas fa-arrow-down"></i> Load More
            </button>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="ex3-tabs-2"
          role="tabpanel"
          aria-labelledby="ex3-tab-2"
        >
          Tab 2 content
        </div>
      </div>
      <!-- Tabs content -->
    </div>
  </div>
</template>

<script>
import ApiCalls from "@/api/index.js";
export default {
  name: "AppliedJobsComponent",
  data() {
    return {
      jobposts: [],
      show1: false,
      moreExists: true,
      currentPage: 1,
      show2 : false
    };
  },
  mounted(){
    this.show1 = true;
    this.show2 = false;
    this.getJobPosts();
  },
  methods:{
    showdot1(){
      this.show1= true;
      this.show2 = false;
    },
    showdot2(){
      this.show1= false;
      this.show2 = true;
    },
    getJobPosts() {
      ApiCalls.get("frontend/jobPost").then((response) => {
        if (response.status == 200) {
          this.jobposts = response.data.jobPosts;
          console.log(this.jobposts);
        }
      });
    },
    loadMore() {
      this.currentPage++;
      ApiCalls.get(`frontend/jobPost?page=${this.currentPage}`).then(
          (response) => {
            if (response.status === 200) {
              console.log(response.data.jobPosts.data);
              console.log(this.jobposts);
              response.data.jobPosts.data.forEach((data) => {
                this.jobposts.data.push(data);
              });

              // Update the current page and check if there are more job posts to load

              if (this.currentPage < response.data.jobPosts.last_page) {
                this.moreExists = true; // No more job posts to load
              } else {
                this.moreExists = false;
              }
            }
          }
        );
    },
  }
};
</script>

<style scoped>
.nav-tabs .nav-link.active {
  border-color: #14a44d;
  color: rgb(102, 101, 101);
}
@media (min-width: 992.98px) {
  .container {
    width: 60% !important;
  }
  img{
    margin-left: 80px;
  }
  .status{
    margin-right: 80px;
  }
  .content-detail{
    margin-left: 60px;
  }
}
.content-item{
  border-radius: 5px;
  box-shadow: var(--mdb-card-box-shadow);
  border: 2px solid transparent;
  transition: .3s all ease-in-out;
}

.content-item:hover{
  border-color:#13b95552 !important;
}

.dropdown-item:hover {
  background-color: #13b955;
}
.fa-arrow-right{
  cursor: pointer;
}
</style>