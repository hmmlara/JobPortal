<template>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <router-link to :class="(path.includes('dashboard')? active : inactive)">
            <i class="fas fa-tachometer-alt fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Dashboard</span>
          </router-link>
          <router-link to="/admin/category" :class="path.includes('category')? active : inactive">
            <i class="fas fa-list-alt fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Category</span>
          </router-link>
          <router-link to="/admin/company" :class="path.includes('company')? active : inactive">
            <i class="fas fa-building fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Company</span>
          </router-link>

          <router-link to="/admin/location" :class="path.includes('location')? active : inactive">
            <i class="fas fa-map-marker-alt fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Location</span>
          </router-link>

          <router-link to="/admin/jobtype" :class="path.includes('jobtype')? active : inactive">
            <i class="fas fa-stream fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Job Type</span>
          </router-link>

          <router-link to="/admin/jobpost" :class="path.includes('jobpost')? active : inactive">
            <i class="fas fa-signs-post fa-fw me-3 nav-icon"></i>
            <span class="nav-text">Job Post</span>
          </router-link>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand fs-4" href="#">
          <strong class="me-1">Job</strong>
          <span class="text-success">
            <strong>Portal</strong>
          </span>
        </a>
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <small class="me-2">Admin</small>
              <img
                src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                class="rounded-circle"
                height="22"
                alt
                loading="lazy"
              />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Settings</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
</template>

<script>
export default {
  name: "NavbarComponent",
  data() {
    return {
      path: "",
      active: "list-group-item list-group-item-action py-2 ripple active",
      inactive: "list-group-item list-group-item-action py-2 ripple"
    };
  },
  mounted() {
    this.path = window.location.pathname;
  }
};
</script>

<style scoped>
/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}

.sidebar .active {
  border-radius: 5px !important;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%) !important;
  background: rgb(20, 164, 77, 0.3) !important;
  color: #14a44d !important;
}

/* .nav-text,.nav-icon{
    color: #111 !important;
} */
@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
/* .sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
} */

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>
