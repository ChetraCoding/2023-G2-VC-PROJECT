import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router';
import vuetify from './plugins/vuetify'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
// don't know
import 'gitart-vue-dialog/dist/style.css'
import { GDialog } from 'gitart-vue-dialog'
// 
import LoginForm from '@/components/form/LoginForm.vue'
import SideBar from '@/components/aside/SideBar';
import BaseSideBar from '@/components/aside/BaseSideBar';
import HeaderComponent from '@/components/widget/header/HeaderComponent';
import CategoryListTable from '@/components/table/CategoryListTable';
import ProductListTable from '@/components/table/ProductListTable';
import OrderListTable from '@/components/table/OrderListTable';
const app = createApp(App);
const pinia = createPinia();

// Components
app.component('base-side-bar', BaseSideBar);
app.component('side-bar', SideBar);
app.component('header-component', HeaderComponent);

// Restaurant owner component
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)

// Cashier component
app.component('order-list-table', OrderListTable)

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')

// Dialog of list orders
app.component('GDialog', GDialog)