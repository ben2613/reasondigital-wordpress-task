<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup
import Header from './components/Header.vue'
</script>

<template>
  <Header />
  <router-view></router-view>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  // margin-top: 60px;
  padding: 2% 5%;
  a {
    text-decoration: none;
    color: initial;
  }
}
html {
  box-sizing: border-box;
  font-family: 'Courier New', Courier, monospace;
}
*, *:before, *:after {
  box-sizing: inherit;
}
</style>

<script>
export default {
  created() {
    this.axios.defaults.baseURL = import.meta.env.VITE_API_URL
  },
  async mounted() {
    this.axios
      .get()
      .then(({ data }) => {
        this.$store.commit('setIndexJson', data)
        this.$store.commit('setSiteTitle', data.name)
        return this.axios.get(`/wp/v2/media/${data.site_logo}`)
      })
      .then(({ data }) => {
        this.$store.commit('setSiteLogoUrl', data.media_details.sizes.thumbnail.source_url)
      })
    this.axios.get('/wp/v2/posts').then(({ data }) => {
      this.$store.commit('setPosts', data)
    })
    this.axios.get('/wp/v2/categories').then(({ data }) => {
      this.$store.commit('setCategories', data)
    })
  },
}
</script>
