import { createApp } from "vue";
import { createPinia } from "pinia";
import OneSignal from "@onesignal/onesignal-vue3";
import oneSignalConfig from "./onesignal";
import firebase from "firebase";
import App from "./App.vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import PrimaryButton from "@/components/widget/button/PrimaryButton";
import SecondaryButton from "@/components/widget/button/SecondaryButton";
import DangerButton from "@/components/widget/button/DangerButton";
import DarkButton from "@/components/widget/button/DarkButton";
import BaseAlert from "@/components/widget/alert/BaseAlert";
import ResOwnerSideBar from "@/components/aside/ResOwnerSideBar";
import HeaderComponent from "@/components/widget/header/HeaderComponent";
import ProductListTable from "@/components/table/ProductListTable";
import ProductForm from "@/components/form/ProductForm";
import ProductCard from "@/components/widget/card/ProductCard";
import CategoryForm from "@/components/form/CategoryForm";
import TableForm from "@/components/form/TableForm";
import StaffCard from "@/components/widget/card/StaffCard";
import StaffForm from "@/components/form/StaffForm";
import BaseSideBar from "@/components/aside/BaseSideBar";
import OrderListTable from "@/components/table/OrderListTable";
import BaseDialog from "@/components/widget/dialog/BaseDialog";
import ChefOrderCard from "@/components/widget/card/ChefOrderCard";
import ProductResOwnerCard from "@/components/widget/card/ProductResOwnerCard";
import SummaryComponent from "@/components/summary/SummaryComponent";
// categoryCard
import CategoryCard from "@/components/widget/card/CategoryCard";
import TableCard from "@/components/widget/card/TableCard";
// Product report
import VueApexCharts from "vue3-apexcharts";

const app = createApp(App);
const pinia = createPinia();

// Card
app.component("product-res-owner-card", ProductResOwnerCard);
app.component("product-card", ProductCard);
app.component("category-card", CategoryCard);
app.component("table-card", TableCard);

// Components
app.component("res-owner-side-bar", ResOwnerSideBar);
app.component("base-side-bar", BaseSideBar);
app.component("header-component", HeaderComponent);
app.component("chef-order-card", ChefOrderCard);
app.component("summary-component", SummaryComponent);

// Buttons
app.component("primary-button", PrimaryButton);
app.component("secondary-button", SecondaryButton);
app.component("danger-button", DangerButton);
app.component("dark-button", DarkButton);

// Alert
app.component("base-alert", BaseAlert);

// Dislog
app.component("base-dialog", BaseDialog);

// Restaurant owner component
app.component("category-form", CategoryForm);
app.component("product-list-table", ProductListTable);
app.component("product-form", ProductForm);
app.component("staff-form", StaffForm);
app.component("table-form", TableForm);

// Cashier component
app.component("order-list-table", OrderListTable);

// List staff
app.component("staff-card", StaffCard);
// List Order Compoment
app.component("chef-order-card", ChefOrderCard);

const firebaseConfig = {
  apiKey: "AIzaSyDpjEd1HdFG-DdKxnrdYHEtp6VvKNX6cY4",
  authDomain: "vc-2023.firebaseapp.com",
  projectId: "vc-2023",
  storageBucket: "vc-2023.appspot.com",
  messagingSenderId: "564664352923",
  appId: "1:564664352923:web:6fe762ace4e6c762ad463e",
  measurementId: "G-Z9600B42T2",
};
firebase.initializeApp(firebaseConfig);

app
  .use(pinia)
  .use(vuetify)
  .use(router)
  .use(VueApexCharts)
  .use(OneSignal, oneSignalConfig)
  .mount("#app");
