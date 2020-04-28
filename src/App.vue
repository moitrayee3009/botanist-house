<template>
  <div id="app">
    <!-- <div id="nav">
      <router-link to="/">Home</router-link>|
      <router-link to="/about">About</router-link>
    </div>-->

    <router-view />
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss">
@import '@/assets/styles/main.scss';
@import '@/assets/styles/_variables.scss';
#app {
  font-family: Freight, Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  /* padding: 30px; */

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
.entry-content {
  margin-bottom: 2rem !important;
}
.wp-block-cover .wp-block-cover__inner-container {
  width: calc(100% - 70px);
  z-index: 1;
  color: #f8f9f9;
  text-align: center;
  font-size: 3rem;
  font-family: Freight !important;
  font-weight: 500;
  letter-spacing: -2px;
  color: #ffffff;
  opacity: 1;
  p {
    margin: 0;
  }
}
.wp-block-buttons .wp-block-button {
  margin: 0 !important;
}
.wp-block-button .is-style-fill .wp-block-button__link {
  background-color: white;
  :focus {
    border: none !important;
  }
}
.wp-block-button__link:not(.has-background) {
  background-color: white;
  padding: 0.3rem 2rem;
  font-weight: 500 !important;
  letter-spacing: 1.44px;
  :focus {
    border: none !important;
  }
}
</style>
