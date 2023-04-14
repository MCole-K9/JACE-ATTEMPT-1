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

                    </td>
                    <td>
                        <button class="btn" @click="">Approve Request</button>
                        <button class="btn" @click="">Deny Request</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </DashboardLayout>
</template>