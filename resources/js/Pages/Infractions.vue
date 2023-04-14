<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import InfractionTable from '../Components/InfractionTable.vue';
    import {InfractionLog} from '../Lib/types';
    import {Head} from '@inertiajs/vue3';

    defineProps<{infraction: InfractionLog[]}>();

</script>
<template>
    <DashboardLayout>
        <h1>Infractions</h1>
        <InfractionTable/>
    </DashboardLayout>
</template>