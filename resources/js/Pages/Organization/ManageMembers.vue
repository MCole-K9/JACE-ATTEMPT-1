<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';

import { defineProps, reactive, ref } from 'vue';
import { OrgRep} from '../../Lib/types';
import { OrgRoles } from '../../Lib/const';


const props = defineProps<{
    members: OrgRep[];
}>();
</script>

<template>
    <DashboardLayout>

        <div class="flex justify-between items-center">
            <h1>Manage Users</h1>
            <button class="btn btn-primary">Invite Member</button>
        </div>

        <div class="flex w-full overflow-x-auto my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Member Since</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="member in members" :key="member.id">
                        <td>
                            {{member.user?.first_name}} {{member.user?.last_name}}
                        </td>
                        <td>
                            {{member.org_role_id === OrgRoles.Admin ? 'Admin' : 'Member'}}
                        </td>
                        <td>
                            {{member.created_at}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<style scoped>

</style>
