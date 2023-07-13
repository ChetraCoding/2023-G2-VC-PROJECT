import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router';
import vuetify from './plugins/vuetify'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import PrimaryButton from '@/components/widget/button/PrimaryButton';
import DangerButton from '@/components/widget/button/DangerButton';
import BaseAlert from '@/components/widget/alert/BaseAlert';
import SideBar from '@/components/aside/SideBar';
import HeaderComponent from '@/components/widget/header/HeaderComponent';
import LoginForm from '@/components/form/LoginForm.vue'
import CategoryListTable from '@/components/table/CategoryListTable';
import ProductListTable from '@/components/table/ProductListTable';
import CreateProduct from '@/components/form/CreateProduct';
import TableListTable from '@/components/table/TableListTable';
import ProductCard from '@/components/widget/card/ProductCard';
import CategoryForm from '@/components/form/CategoryForm';	
import TableForm from '@/components/form/TableForm';
import ListStaffTable from "@/components/table/ListStaffTable";
import CreateStaffForm from "@/components/form/CreateStaffForm";
import BaseSideBar from "@/components/aside/BaseSideBar";
import OrderListTable from "@/components/table/OrderListTable";
import ChefOrderCard from "@/components/widget/card/ChefOrderCard";

const app = createApp(App);
const pinia = createPinia();

// Components
app.component('base-side-bar', BaseSideBar);
app.component('side-bar', SideBar);
app.component('base-side-bar', BaseSideBar);
app.component('header-component', HeaderComponent);
app.component('product-card', ProductCard);
app.component('chef-order-card', ChefOrderCard);

// Buttons
app.component('primary-button', PrimaryButton);
app.component('danger-button', DangerButton);

// Alert
app.component('base-alert', BaseAlert);

// Restaurant owner component
app.component('category-form', CategoryForm)
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)
app.component('create-product', CreateProduct)
app.component('table-list-table', TableListTable)
app.component('create-staff-form', CreateStaffForm);
app.component('table-form', TableForm)

// Cashier component
app.component('order-list-table', OrderListTable)
// Waiter component
import NavWaiterComponent from './components/nav/NavWaiterComponent.vue';
app.component('nav-waiter-component', NavWaiterComponent);

// Login component
app.component('login-form', LoginForm);

// List staff
app.component('list-staff-table', ListStaffTable )
// List Order Compoment
app.component('chef-order-card',ChefOrderCard)

app.use(pinia).use(vuetify).use(router).mount('#app')
