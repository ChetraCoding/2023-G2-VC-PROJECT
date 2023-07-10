import { createRouter, createWebHistory } from "vue-router";
import CategoryView from "@/views/restuarant_owner/CategoryView";
import LoginView from "@/views/LoginView";
import HomeView from "@/views/HomeView";
import WaiterView from "@/views/waiter/WaiterView";
import ProductView from "@/views/restuarant_owner/ProductView";
import OrdersView from "@/views/cashier/OrdersView";

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
    path: "/category",
    name: "cateView",
    component: CategoryView,
  },
  {
    path: "/product",
    name: "product",
    component: ProductView,
  },
  {
    path: "/orders",
    name: "orders",
    component: OrdersView,
  },
  {
    path: '/waiter',
    name: 'waiter',
    component: WaiterView,
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;