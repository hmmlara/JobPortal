<template>
  <div>
    <nav :class="navFixed">
      <div class="container">
        <a class="navbar-brand" href="#"><strong class="me-1">Job</strong><span class="text-success"><strong>Portal</strong></span></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarColor01"
          aria-controls="navbarColor01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mx-5 me-auto">
            <li class="nav-item mx-3">
              <router-link class="nav-link" to="/"
                >Home
                <span class="visually-hidden">(current)</span>
              </router-link>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item mx-3">
              <router-link class="nav-link" to="/about">About</router-link>
            </li>
            <li class="nav-item dropdown">
              <a
                class="dropdown-toggle nav-link"
                href="#"
                id="dropdownMenuLink"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
          </ul>
          <router-link
            type="button"
            class="btn btn-outline-success"
            data-mdb-ripple-color="dark"
            to="/login&register"
          >
            <i class="fa-sharp fa-solid fa-right-to-bracket me-2"></i>login
          </router-link>
        </div>
      </div>
    </nav>

    <div
      class="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">Login</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            
            
            <div class="mt-2 d-flex">
              <p>Don't have an account? </p> <span class="mx-2"><router-link href="" class="registerLink text-info" to="/register">Register</router-link></span>
            </div>
            <div class="d-flex justify-content-end mt-2">
              <button
              type="button"
              class="btn btn-outline-danger mx-2"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-outline-success">
              Understood
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NavComponent",
  data() {
    return {
      path: "",
      navFixed: "navbar autohide navbar-expand-lg bg-light py-3",
    };
  },
  mounted() {
    this.path = window.location.pathname;

    window.document.onscroll = () => {
      if (window.scrollY > 50) {
        console.log("hello");
        this.navFixed =
          "navbar autohide navbar-expand-lg bg-light py-3 fixed-top";
      } else {
        this.navFixed = "navbar autohide navbar-expand-lg bg-light  py-3 ";
      }
    };
  },
};
</script>

<style  scoped>
.navbar {
  transition: all 0.5s ease;
  z-index: 1000;
  color: #13b955;
}
/* .nav-transparent {
  background: transparent;
} */
ul li a {
  color: #111;
}
.active-link {
  color: #13b955;
}
.modal {
  background-color: #a6e6c01f;
}
.dropdown-item:hover {
  background-color: #13b955;
}
.form-control:focus {
  border-color: #13b955;
}
.registerLink {
  text-decoration: none;
}
</style>