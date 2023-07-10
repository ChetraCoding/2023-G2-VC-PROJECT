import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router';
import vuetify from './plugins/vuetify'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import PrimaryButton from '@/components/widget/button/PrimaryButton';
import DangerButton from '@/components/widget/button/DangerButton';
import SideBar from '@/components/aside/SideBar';
import HeaderComponent from '@/components/widget/header/HeaderComponent';
import LoginForm from '@/components/form/LoginForm.vue'
import CategoryListTable from '@/components/table/CategoryListTable';
import ProductListTable from '@/components/table/ProductListTable';
import TableListTable from '@/components/table/TableListTable';
import ProductCard from '@/components/widget/card/ProductCard';
import CategoryForm from '@/components/form/CategoryForm';	
import ListStaffTable from "@/components/table/ListStaffTable";

const app = createApp(App);
const pinia = createPinia();

// Components
app.component('side-bar', SideBar);
app.component('header-component', HeaderComponent);
app.component('product-card', ProductCard);

// Buttons
app.component('primary-button', PrimaryButton);
app.component('danger-button', DangerButton);

// Restaurant owner component
app.component('category-form', CategoryForm)
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)
app.component('table-list-table', TableListTable)

// Waiter component
import NavWaiterComponent from './components/nav/NavWaiterComponent.vue';
app.component('nav-waiter-component', NavWaiterComponent);

// Login component
app.component('login-form', LoginForm);

// List staff
app.component('list-staff-table', ListStaffTable )

app.use(router).use(vuetify).use(pinia).mount('#app')