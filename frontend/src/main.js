import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// import 'bootstrap/dist/css/bootstrap.min.css'

import 'mdb-vue-ui-kit/css/mdb.min.css';

import './fonts/fontawesome-free-6.1.2-web/css/all.min.css'
createApp(App).use(router).mount('#app')

