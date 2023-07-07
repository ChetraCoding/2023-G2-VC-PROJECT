import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router';
import vuetify from './plugins/vuetify'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import LoginForm from '@/components/form/LoginForm.vue'
import SideBar from '@/components/aside/SideBar';
import HeaderComponent from '@/components/widget/header/HeaderComponent';
import CategoryListTable from '@/components/table/CategoryListTable';
import ProductListTable from '@/components/table/ProductListTable';
import ProductCard from '@/components/widget/card/ProductCard';
const app = createApp(App);
const pinia = createPinia();

// Components
app.component('side-bar', SideBar);
app.component('header-component', HeaderComponent);
app.component('product-card', ProductCard);

// Restaurant owner component
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)

// Waiter component
import NavWaiterComponent from './components/nav/NavWaiterComponent.vue';
app.component('nav-waiter-component', NavWaiterComponent);

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')