import './bootstrap';
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router/index";


import Notifications from '@kyvg/vue3-notification'

import api from './interceptor/interceptors'

import flatPickr from 'vue-flatpickr-component';

import 'flatpickr/dist/flatpickr.css';

import 'flowbite';
import helper from "./helper";

const app = createApp(App)

app
    .use(router)
    .use(Notifications)
    .component("flatPickr",flatPickr)
    .mount("#app");

app.config.globalProperties.$helper = helper;
app.config.globalProperties.$api = api;

