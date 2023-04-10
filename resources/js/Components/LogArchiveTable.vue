<script setup lang="ts">
    import type {UserActivityLog} from '../Lib/types';

    defineProps<{logs: UserActivityLog[] | undefined}>();

</script>
<template>
    <div class="flex w-full overflow-x-auto">
        <table class="table-zebra table-hover table">
            <thead>
                <tr>
                    <th>Log Name</th>
                    <th>Description</th>
                    <th>Subject</th>
                    <th>Causer</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="log in logs">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>