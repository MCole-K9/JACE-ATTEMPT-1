<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import InfractionTable from '../Components/InfractionTable.vue';
  
    import {Head} from '@inertiajs/vue3';

    defineProps<{}>();

</script>
<template>
    <DashboardLayout>
        <h1>Infractions</h1>
        <InfractionTable/>
    </DashboardLayout>
</template>