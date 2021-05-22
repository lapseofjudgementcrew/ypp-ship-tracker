import { createApp } from 'vue'

import HelloWorld from './components/HelloWorld.vue';

const app = createApp({
    data() {
        return {
            product: 'Boots',
            description: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, asperiores'     

        }
    }
});

// registers our HelloWorld component globally
app.component('hello-world', HelloWorld);

// mount the app to the DOM
app.mount('#app');

require('./bootstrap');

require('alpinejs');