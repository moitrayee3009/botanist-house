import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Page from '../views/Page.vue'
import Articles from '@/components/Articles.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/:page',
    name: 'Page',
    component: Page
  },
  {
    path: '/articles/:article',
    name: 'article',
    component: Articles
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
