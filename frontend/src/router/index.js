import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '@/views/restuarant_owner/CategoryView.vue'
import LoginView from "@/views/LoginView.vue";
import HomeView from "@/views/HomeView";
import WaiterView from "@/views/waiter/WaiterView";
import OrderDetailsView from "@/views/waiter/OrderDetailsView";
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
  {
    path: '/waiter',
    name: 'waiter',
    component: WaiterView,
  },
  {
    path: '/order-details',
    name: 'order-details',
    component: OrderDetailsView
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;