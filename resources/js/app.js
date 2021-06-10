import { createApp } from 'vue';

import HelloWorld from './components/HelloWorld.vue';

const app = createApp({
    
 
    setup() {
        return {
            product: 'Boots', // updated data value //
            description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, earum.'
        }
    }
});
// registers our HelloWorld component globally
// and mount the app to the DOM
app.component('hello-world', HelloWorld)
    .mount('#app');

require('./bootstrap');

require('alpinejs');