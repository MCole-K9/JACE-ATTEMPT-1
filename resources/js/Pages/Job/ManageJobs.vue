<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import { ref, defineProps, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3';
import { Job } from '../../Lib/types';

const props = defineProps<{
    jobs: Job[]
}>()

</script>

<template>
    <DashboardLayout>
        <div class="flex justify-between items-center">
            <h1>Manage Jobs</h1>
            <Link href="/jobs/create">
            <button class="btn btn-primary">Create Job</button>
            </Link>
        </div>
        <div class="flex w-full overflow-x-auto my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Open Date</th>
                        <th>Deadline</th>
                        <th>Visibility</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="job in jobs" :key="job.id">
                        <td>
                            <Link :href="'/jobs/' + job.id">
                                {{job.title}}
                            </Link>
                        </td>
                        <td>
                            {{job.open_date}}
                        </td>
                        <td>
                            {{job.close_date}}
                        </td>
                        <td>
                            {{job.is_visible ? 'Public' : 'Private'}}
                        </td>
                        <td>
                            <Link :href="'/jobs/' + job.id + '/edit'">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>


<style scoped></style>
