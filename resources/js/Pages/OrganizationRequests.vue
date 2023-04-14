<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';

    defineProps<{}>();
</script>
<template>
    <DashboardLayout>
        <h1>View Organization Requests</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Request Type
                    </th>
                    <th>
                        Information
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        User ID
                    </th>
                    <th>
                        Timestamp
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <button>Approve Request</button>
                        <button>Deny Request</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </DashboardLayout>
</template>