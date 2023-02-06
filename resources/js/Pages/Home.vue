<script setup lang="ts">
    import { ref } from 'vue';
    import HomeLayout from '../Layout/HomeLayout.vue';

    let name = ref('Matthew | Elliot | Khalid');


</script>


<template>
    <HomeLayout>
        <h1 class="text-center m-2 text-2xl">Hello {{ name }} You're Changing The World</h1>
    </HomeLayout>
</template>


