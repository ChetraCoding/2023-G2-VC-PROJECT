import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
const app = createApp(App);

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives,
})

// Waiter component
import NavWaiterComponent from './components/nav/NavWaiterComponent.vue';
app.component('nav-waiter-component', NavWaiterComponent);

app.use(vuetify).use(router).mount('#app')
