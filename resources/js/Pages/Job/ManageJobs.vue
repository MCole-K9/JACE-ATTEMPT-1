<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import { ref, defineProps, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3';

</script>

<template>
    <DashboardLayout>
        <div class="flex justify-between items-center">
            <h1>Manage Jobs</h1>
            <Link href="/jobs/create">
                <button class="btn btn-primary">Create Job</button>
            </Link>
        </div>
    </DashboardLayout>
</template>


<style scoped>

</style>
