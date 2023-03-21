<script setup lang="ts">
    import {Head} from '@inertiajs/vue3';
    import HomeLayout from '../Layout/HomeLayout.vue';

    defineProps({tokenString: Object});

</script>
<template>
    <HomeLayout>
        <div>   
            <p>Here's your new API Token</p>
            <p>{{tokenString}}</p>
        </div>
    </HomeLayout>

</template>