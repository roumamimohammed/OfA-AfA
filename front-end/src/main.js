import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from "@/router/index";
import './assets/index.css'
import '@fortawesome/fontawesome-free/css/all.css';
// import "vue-star-rating/dist/star-rating.css";



//js flowbite
import  "flowbite/dist/flowbite.js";
//config axios
import './axios.config'
//router

// import '@vue-star-rating/dist/star-rating.css'import router from './router/index'


//sweet alert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)




//app
const app = createApp(App)
app.use(pinia)
app.use(VueSweetalert2)
app.use(router)
app.mount('#app')
