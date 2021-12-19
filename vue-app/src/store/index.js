import { createStore } from "vuex"

const state = createStore({
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
      state.indexJson = obj
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
    setMediaById(state, id, obj) {
      state.media[id] = obj
    },
  }
})

export default state
