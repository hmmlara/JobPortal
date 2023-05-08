import { createApp } from "vue";
import App from './App.vue';
import 'mdb-vue-ui-kit/css/mdb.min.css';
import router from "./routes/index.js";
import 'vue-multiselect/dist/vue-multiselect.min.css';

const app = createApp(App)

app.use(router).mount('#app');
