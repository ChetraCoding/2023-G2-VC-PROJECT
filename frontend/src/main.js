import { createApp } from 'vue'
import { createPinia } from 'pinia'
import firebase from 'firebase';
import App from './App.vue'
import router from './router';
import vuetify from './plugins/vuetify'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import PrimaryButton from '@/components/widget/button/PrimaryButton';
import SecondaryButton from '@/components/widget/button/SecondaryButton';
import DangerButton from '@/components/widget/button/DangerButton';
import BaseAlert from '@/components/widget/alert/BaseAlert';
import ResOwnerSideBar from '@/components/aside/ResOwnerSideBar';
import HeaderComponent from '@/components/widget/header/HeaderComponent';
import LoginForm from '@/components/form/LoginForm.vue'
import CategoryListTable from '@/components/table/CategoryListTable';
import ProductListTable from '@/components/table/ProductListTable';
import ProductForm from '@/components/form/ProductForm';
import TableListTable from '@/components/table/TableListTable';
import ProductCard from '@/components/widget/card/ProductCard';
import CategoryForm from '@/components/form/CategoryForm';	
import TableForm from '@/components/form/TableForm';
import ListStaffTable from "@/components/table/ListStaffTable";
import CreateStaffForm from "@/components/form/CreateStaffForm";
import BaseSideBar from "@/components/aside/BaseSideBar";
import OrderListTable from "@/components/table/OrderListTable";
import BaseDialog from '@/components/widget/dialog/BaseDialog';
import ChefOrderCard from "@/components/widget/card/ChefOrderCard";
import ProductResOwnerCard from "@/components/widget/card/ProductResOwnerCard";
import SummaryComponent from "@/components/summary/SummaryComponent";
// categoryCard
import CategoryCard from '@/components/widget/card/CategoryCard';
const app = createApp(App);
const pinia = createPinia();

// Card
app.component('product-res-owner-card', ProductResOwnerCard);
app.component('product-card', ProductCard);
app.component('category-card', CategoryCard);

// Components
app.component('res-owner-side-bar', ResOwnerSideBar);
app.component('base-side-bar', BaseSideBar);
app.component('header-component', HeaderComponent);
app.component('chef-order-card', ChefOrderCard);
app.component('summary-component', SummaryComponent);

// Buttons
app.component('primary-button', PrimaryButton);
app.component('secondary-button', SecondaryButton);
app.component('danger-button', DangerButton);

// Alert
app.component('base-alert', BaseAlert);

// Dislog
app.component('base-dialog', BaseDialog);

// Restaurant owner component
app.component('category-form', CategoryForm)
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)
app.component('product-form', ProductForm)
app.component('table-list-table', TableListTable)
app.component('create-staff-form', CreateStaffForm);
app.component('table-form', TableForm)

// Cashier component
app.component('order-list-table', OrderListTable)

// Login component
app.component('login-form', LoginForm);

// List staff
app.component('list-staff-table', ListStaffTable )
// List Order Compoment
app.component('chef-order-card',ChefOrderCard)

const firebaseConfig = {
  apiKey: "AIzaSyDpjEd1HdFG-DdKxnrdYHEtp6VvKNX6cY4",
  authDomain: "vc-2023.firebaseapp.com",
  projectId: "vc-2023",
  storageBucket: "vc-2023.appspot.com",
  messagingSenderId: "564664352923",
  appId: "1:564664352923:web:6fe762ace4e6c762ad463e",
  measurementId: "G-Z9600B42T2"
};
firebase.initializeApp(firebaseConfig);
app.use(pinia).use(vuetify).use(router).mount('#app')
