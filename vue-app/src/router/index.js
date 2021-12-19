import { createRouter, createWebHashHistory } from 'vue-router'
import PostList from '../pages/PostList.vue'
import Post from '../pages/Post.vue'

const routes = [
  { path: '/', component: PostList },
  { path: '/cat/:id', component: PostList },
  { path: '/post/:id', component: Post },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router
