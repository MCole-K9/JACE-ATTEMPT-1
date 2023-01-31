<script setup lang="ts">
    import { ref } from 'vue';
    import  demo  from "../Components/demo.vue";
    let name = ref('Matthew | Elliot | Khalid');

    defineProps({
        testProp: String
    })

</script>


<template>
    <h1 class="bg-black m-2 text-2xl">Hello {{ name }} You're Changing The World</h1>
    <h2>From Server: {{ testProp }}</h2>
    <demo />
</template>


