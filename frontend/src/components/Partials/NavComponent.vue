<template>
  <div>
    <nav :class="navFixed">
      <div class="container text-center">
        <a class="navbar-brand" href="#"
          ><strong class="me-1">Job</strong
          ><span class="text-success"><strong>Portal</strong></span></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarColor01"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
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
              <router-link to="/jobs" class="nav-link" href="#">Job Posts</router-link>
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
            class="btn btn-success"
            data-mdb-ripple-color="dark"
            to="/login&register"
          >
            <i class="fa-sharp fa-solid fa-right-to-bracket"></i> login
          </router-link>
        </div>
      </div>
    </nav>
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
      if (window.scrollY > 1) {
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
.nav-link:hover{
  color : #13b955;
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