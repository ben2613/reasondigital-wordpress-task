import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Post from '../pages/Post.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/post/:id', component: Post },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router
