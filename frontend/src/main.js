import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import CategoryListTable from './components/table/CategoryListTable.vue';
const app = createApp(App);

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Restaurant owner component
app.component('category-list-table', CategoryListTable)

const vuetify = createVuetify({
  components,
  directives,
})

app.use(router).use(vuetify).mount('#app')