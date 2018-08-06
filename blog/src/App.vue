<template>
  <div id="app">
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="container">
          <div class="navbar-brand">
            <router-link class="navbar-item" to="/"><img src="./assets/logo.png"> blog博客</router-link>
            <button class="button navbar-burger">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
    </nav>

    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
/*#app {*/
  /*font-family: 'Avenir', Helvetica, Arial, sans-serif;*/
  /*-webkit-font-smoothing: antialiased;*/
  /*-moz-osx-font-smoothing: grayscale;*/
  /*text-align: center;*/
  /*color: #2c3e50;*/
  /*margin-top: 60px;*/
/*}*/
</style>
