import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '@/views/restuarant_owner/CategoryView.vue'
import LoginView from "@/views/LoginView.vue";
import HomeView from "@/views/HomeView";
import WaiterView from "@/views/waiter/WaiterView";
import ProductView from "@/views/restuarant_owner/ProductView";
import TableView from "@/views/restuarant_owner/TableView";

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
    path: '/waiter',
    name: 'waiter',
    component: WaiterView,
  },
  {
    path: '/product',
    name: 'product',
    component: ProductView,
  },
  {
    path: '/table',
    name: 'table',
    component: TableView,
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;