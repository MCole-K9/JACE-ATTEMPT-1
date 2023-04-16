<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import {router} from "@inertiajs/vue3"
import { defineProps, reactive, ref } from 'vue';
import { CustomRequest, OrgRep } from '../../Lib/types';
import { OrgRoles } from '../../Lib/const';
import { userStore } from '../../Stores/userStore';
import Input from '../../Components/Input.vue';


const props = defineProps<{
    members: OrgRep[];
}>();


const request = reactive<CustomRequest>({
    type: "Role Change",
    info: '',
    status: 'Pending',
    user_id: userStore().user?.id ?? 0,
});

const invitation = reactive({
    email: '',
})

const requestModal = ref(false);
const invitationModal = ref(false);
const changeRoleTo = ref("");

function confirmRequest(type:  CustomRequest['type'], user_id: CustomRequest['user_id']) {
    request.type = type;
    request.user_id = user_id;
    request.info = `${getUserName(user_id)} from Org with ID: ${userStore().user?.org_rep?.organization_id} ${type === 'Role Change' ? `to ${changeRoleTo.value}`   : ''}`;
}

function getUserName(user_id: number) {
    const member = props.members.find(member => member.user_id === user_id);
    return `${member?.user?.first_name} ${member?.user?.last_name}`;
}

function sendRequest() {

    //todo: add role to be changed on request info
    //todo: message to indicate request was sent
    router.post("/requests", request, {
        onFinish: () => {
            requestModal.value = false;
            alert("Request Sent");
        }
    });


}

function sendInvitation() {

   router.post("/mail/invitation-wqr", invitation, {
    onFinish: () => {
        invitationModal.value = false;
        alert("Invitation Sent");
    }
   });


}


</script>

<template>
    <DashboardLayout>

        <div class="flex justify-between items-center">
            <h1>Manage Members</h1>
            <label class="btn btn-primary" for="invitation-modal">Invite Member</label>
        </div>

        <div class="flex w-full overflow-x-auto my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Member Since</th>
                        <th>Actions (Request)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="member in members" :key="member.id">
                        <td>
                            {{ member.user?.first_name }} {{ member.user?.last_name }}
                        </td>
                        <td>
                            {{ member.org_role_id === OrgRoles.Admin ? 'Admin' : 'Member' }}
                        </td>
                        <td>
                            {{new Date(member.created_at).toDateString()}}
                        </td>
                        <td class="flex space-x-2">
                            <label for="modal-1" class="btn btn-sm btn-primary" @click="confirmRequest('Role Change', member.user_id)">
                                Change Role
                            </label>
                            <label for="modal-1" class="btn btn-sm btn-primary"
                                @click="confirmRequest('Member Removal', member.user_id)">
                                Remove
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>





<!-- <label class="btn btn-primary" for="modal-1">Open Modal</label> -->
<input class="modal-state" id="modal-1" type="checkbox" :checked="requestModal" @change="requestModal = !requestModal"/>
<div class="modal">
	<label class="modal-overlay" for="modal-1"></label>
	<div class="modal-content flex flex-col gap-5">
		<label for="modal-1" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" >✕</label>
		<h2 class="text-xl">Request for {{ request.type }}</h2>
		<span class="capitalize ">You are requesting  {{ request.type }} for {{ getUserName(request.user_id) }}</span>
        {{ changeRoleTo }}
        <select class="select" v-model="changeRoleTo" v-if="request.type === 'Role Change'" name="" id="">
            <option value="" disabled>Select Role</option>
            <option value="Admin">Admin</option>
            <option value="Member">Member</option>
        </select>
		<div class="flex gap-3">
			<button class="btn btn-primary btn-block" @click="sendRequest">Confirm</button>
			<label for="modal-1" class="btn btn-block " >Cancel</label>
		</div>
	</div>
</div>

<input class="modal-state" id="invitation-modal" type="checkbox" :checked="invitationModal" @change="invitationModal = !invitationModal"/>
<div class="modal">
	<label class="modal-overlay" for="invitation-modal"></label>
	<div class="modal-content flex flex-col gap-5">
		<label for="invitation-modal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
		<h2 class="text-xl">Member Invitation</h2>
        <Input label="Email" type="email" v-model="invitation.email" :value="invitation.email" />
        <button class="btn btn-primary btn-block" @click="sendInvitation">Send Invitation</button>

	</div>
</div>


    </DashboardLayout>

</template>

<style scoped></style>
