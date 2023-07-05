import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '../views/CategoryView.vue'

const routes = [
  {
    path: '/category',
    name: 'cateView',
    component: CategoryView,
  },


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
