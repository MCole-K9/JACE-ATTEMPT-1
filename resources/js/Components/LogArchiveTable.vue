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
                    <td>{{ log.name }}</td>
                    <td>{{ log.description }}</td>
                    <td>{{ log.subject }}</td>
                    <td>{{ log.causerName }} (ID: {{ log.causer }})</td>
                    <td>{{ log.timestamp }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>