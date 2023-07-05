import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
const app = createApp(App);
const pinia = createPinia()
import LoginForm from './components/form/LoginForm.vue'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives,
})

// Login component
app.component('login-form', LoginForm);

app.use(router).use(vuetify).use(pinia).mount('#app')
