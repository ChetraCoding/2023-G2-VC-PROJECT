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
const app = createApp(App);
const pinia = createPinia();

// Components
app.component('side-bar', SideBar);
app.component('header-component', HeaderComponent);

// Restaurant owner component
app.component('category-list-table', CategoryListTable)
app.component('product-list-table', ProductListTable)

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')
