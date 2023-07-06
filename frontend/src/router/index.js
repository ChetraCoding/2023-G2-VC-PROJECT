import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '@/views/CategoryView'
import LoginView from "@/views/LoginView";
import HomeView from "@/views/HomeView";
import ProductView from "@/views/restuarant_owner/ProductView";

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
  {
    path: '/product',
    name: 'product',
    component: ProductView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
