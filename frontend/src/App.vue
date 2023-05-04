<template>
  <router-view />
</template>

<script>
export default {
  name: "App",
  components: {
  },

};
</script>
<style>
#app {
  font-family: Roboto, Helvetica, Arial, sans-serif;
  background-image: linear-gradient(to right, #c1e8ce4e 20%, #c1e8ce72 50%, #c1e8ceb8);
}


nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

/* nav a.router-link-exact-active {
  color: #42b983;
} */
</style>
