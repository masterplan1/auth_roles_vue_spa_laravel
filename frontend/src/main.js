import './assets/main.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'

import { abilitiesPlugin } from '@casl/vue';
import ability from './services/ability';

const app = createApp(App)

app.use(abilitiesPlugin, ability)
app.use(createPinia())
app.use(router)

app.mount('#app')
