<template>
    <product></product>
    <description></description>
    <h1>{{ greeting }}</h1>
    
</template>
<script>
import Product from './Product.vue';
import Description from './Description.vue';
export default {
    components: {
        'product': Product,
        'description' : Description
    },
    setup: () => ({
        greeting: 'Hello World from Vue 3!',
        
    })
}
</script>