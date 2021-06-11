import { createApp } from 'vue';

import HelloWorld from './components/HelloWorld.vue';


const app = createApp({});
// registers our HelloWorld component globally
// and mount the app to the DOM
app.component('hello-world', HelloWorld)
    .mount('#app');


require('./bootstrap');

require('alpinejs');