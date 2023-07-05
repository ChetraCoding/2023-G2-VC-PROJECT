import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '@/views/CategoryView.vue'
import LoginView from "@/views/LoginView.vue";
import HomeView from "@/views/HomeView";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
    meta: {
      isRequiredAuth: true,
    },
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
  },
  {
    path: '/category',
    name: 'cateView',
    component: CategoryView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
