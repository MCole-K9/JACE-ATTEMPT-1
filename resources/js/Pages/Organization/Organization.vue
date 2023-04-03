<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import { Organization } from '../../Lib/types';
import { defineProps, reactive, ref } from 'vue';
import { router } from '@inertiajs/core';
import { usePage } from '@inertiajs/vue3';
import { userStore } from '../../Stores/userStore';
import Input from '../../Components/Input.vue';

const props = defineProps<{
    organization: Organization | null,
}>()

const tabOptions = {
    register: 'register',
    connect: 'connect'
} as const;

let tab = ref<keyof typeof tabOptions>('register');


function changeTab(selected: keyof typeof tabOptions) {

  tab.value = selected;
}

type NewOrg = Omit<Organization, "id" | "code" | "created_at" | "updated_at">;

const user = userStore();

let org = reactive({
    name: props.organization?.name ?? "",
    email: props.organization?.email ?? "",
    website: props.organization?.website ?? "",
    phone: props.organization?.phone ?? "",
    street_address: props.organization?.street_address ?? "",
    city: props.organization?.city ?? "",
    state: props.organization?.state ?? "",
    zip: props.organization?.zip ?? "",

});

let organization_code = ref('');

function register() {

    router.post('/organization', org);

}

function connect() {
    console.log(organization_code.value);

    router.post('/organization/connect', { organization_code: organization_code.value });
}

function updateOrg() {

   router.put(`/organization/${props.organization?.id}`, org);
}

</script>


<template>
    <DashboardLayout>
    <h3 class="text-4xl text-center font-bold">Manage Organization</h3>
    <p class="text-center mb-5">Edit your Organizations Details Below</p>
    <section id="register-connect" class="mt-5  mx-auto w-full " v-if="!props.organization">

        <div class="tabs mx-auto ">
            <btn :class="`tab tab-bordered px-6 ${tab == tabOptions.register ? 'tab-active' : '' } `" @click="changeTab(tabOptions.register)">Register Organization</btn>
            <btn :class="`tab tab-bordered px-6 ${tab == tabOptions.connect ? 'tab-active' : '' } `" @click="changeTab(tabOptions.connect)">Connect To Organization</btn>
        </div>
        <section id="tab-panel">
            <section id="register" class="text-center p-3" v-if="tab === tabOptions.register">
                <p class="my-3 text-2xl font-bold">Register a new organization.</p>

                <form @submit.prevent="">
                    <div class="grid md:grid-cols-2 gap-4">
                        <Input label="Organization Name" type="text" v-model="org.name" v-bind:value="org.name"/>
                        <Input label="Email" type="email" v-model="org.email" v-bind:value="org.email"/>
                        <Input label="Website" type="url" v-model="org.website" v-bind:value="org.website"/>
                        <Input label="Phone" type="tel" v-model="org.phone" v-bind:value="org.phone"/>
                        <Input label="Street Address" type="text" v-model="org.street_address" v-bind:value="org.street_address"/>
                        <Input label="City" type="text" v-model="org.city" v-bind:value="org.city"/>
                        <Input label="State" type="text" v-model="org.state" v-bind:value="org.state"/>
                        <Input label="Zip" type="text" v-model="org.zip" v-bind:value="org.zip"/>
                    </div>

                    <btn class="btn btn-primary mt-4 px-20" @click="register">Register</btn>
                </form>
            </section>
            <section id="connect"  class="text-center p-3" v-else>
                <p class="mt-4 text-2xl font-bold">Connect to an existing organization.</p>
                <form @submit.prevent="">
                    <Input label="Organization Code" type="text" v-model="organization_code" v-bind:value="organization_code" :error="usePage().props?.errors?.organization_code != undefined" :error-message="usePage().props?.errors?.organization_code"  />
                    <btn class="btn btn-primary mt-4 px-20" @click="connect">Connect</btn>
                </form>
            </section>
        </section>



        </section>
        <section v-else id="organization">
            <section class="text-center p-3">
                <div class="bgBlue p-3 flex justify-between items-center rounded-lg text-white">
                    <p class="my-2 text-2xl font-bold">Code: {{ props.organization.code }}</p>
                    <button class="btn">
                        <svg fill="none" stroke="currentColor" class="w-6 h-6" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"></path>
                    </svg>
                    </button>
                </div>
                
                <form @submit.prevent="" class="my-5 p-5 bgGold text-white rounded-lg">
                    <div class="grid md:grid-cols-2 gap-4">
                        <Input label="Organization Name" type="text" v-model="org.name" :value="org.name" :disabled="!user.isOrgAdmin" />
                        <Input label="Email" type="email" v-model="org.email" :value="org.email" :disabled="!user.isOrgAdmin"  />
                        <Input label="Website" type="url" v-model="org.website" :value="org.website" :disabled="!user.isOrgAdmin"  />
                        <Input label="Phone" type="tel" v-model="org.phone" :value="org.phone" :disabled="!user.isOrgAdmin" />
                        <Input label="Street Address" type="text" v-model="org.street_address" :value="org.street_address" :disabled="!user.isOrgAdmin" />
                        <Input label="City" type="text" v-model="org.city" :value="org.city" :disabled="!user.isOrgAdmin"  />
                        <Input label="State" type="text" v-model="org.state" :value="org.state" :disabled="!user.isOrgAdmin"  />
                        <Input label="Zip" type="text" v-model="org.zip" :value="org.zip" :disabled="!user.isOrgAdmin"   />
                    </div>

                    <btn v-if="user.isOrgAdmin"  class="btn btn-primary mt-4 px-20" @click="updateOrg">Update</btn>
                </form>
            </section>
        </section>
    </DashboardLayout>
</template>


<style scoped></style>
