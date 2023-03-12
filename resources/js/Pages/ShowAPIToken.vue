<script setup lang="ts">
    import {Head} from '@inertiajs/vue3';

    defineProps({tokenString: Object});

</script>
<template>
    <div>
        <p>Here's your new API Token</p>
        <p>{{tokenString}}</p>
    </div>
</template>