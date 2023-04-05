<script setup lang="ts">
    import LogTable from '../Components/LogTable.vue';
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import {Head} from '@inertiajs/vue3';
    import {UserActivityLog} from '../Lib/types';

    const props = defineProps<{logs: UserActivityLog[]}>();

</script>
<template>
    <DashboardLayout>
        <h1>User Logs</h1>
        <LogTable :logs="logs"/>

    </DashboardLayout>
</template>