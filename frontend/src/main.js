import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import CategoryListTable from './components/table/CategoryListTable.vue';
const app = createApp(App);
const pinia = createPinia()

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Login component
import LoginForm from './components/form/LoginForm.vue'

// Restaurant owner component
app.component('category-list-table', CategoryListTable)

const vuetify = createVuetify({
  components,
  directives,
})

// Waiter component
import NavWaiterComponent from './components/nav/NavWaiterComponent.vue';
app.component('nav-waiter-component', NavWaiterComponent);

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')
