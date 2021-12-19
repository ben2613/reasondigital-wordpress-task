import { createApp } from 'vue'
import { createStore } from "vuex"
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const store = createStore({
  state() {
    return {
      indexJson: {},
      siteTitle: "",
      siteLogoUrl: null,
      categories: [],
      posts: [],
      media: [],
    }
  },
  mutations: {
    setIndexJson(state, obj) {
      state.indexJson = obj;
    },
    setSiteTitle(state, t) {
      state.siteTitle = t
    },
    setSiteLogoUrl(state, url) {
      state.siteLogoUrl = url
    },
    setCategories(state, arr) {
      state.categories = arr
    },
    setPosts(state, arr) {
      state.posts = arr
    },
    setMedia(state, arr) {
      state.media = arr
    },
  }
})

const app = createApp(App)
app.use(store)
app.use(VueAxios, axios)
app.mount('#app')
