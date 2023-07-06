import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import CategoryListTable from '@/components/table/CategoryListTable.vue';
import LoginForm from '@/components/form/LoginForm.vue'
import CategoryForm from '@/components/form/CategoryForm.vue';
const app = createApp(App);
const pinia = createPinia()

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Restaurant owner component
app.component('category-list-table', CategoryListTable)
app.component('category-form', CategoryForm)

const vuetify = createVuetify({
  components,
  directives,
})

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')
