<script setup lang="ts">
    import { ref } from 'vue';

    let name = ref('Matthew | Elliot | Khalid');

    defineProps({
        testProp: String
    })

</script>


<template>
    <h1>Hello {{ name }} You're Changing The World</h1>
    <h2>From Server: {{ testProp }}</h2>
</template>


