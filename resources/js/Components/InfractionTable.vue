<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import {Log} from '../Lib/types';

    defineProps<{infractionLogs: Log[]}>();


</script>
<template>
    <div class="flex w-full overflow-x-auto">
        <table class="table table-zebra table-hover">
            <thead>
                <tr>
                    <th>
                        Supm
                    </th>
                    <th>
                        Naaah
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="infractionLog in infractionLogs">
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</template>