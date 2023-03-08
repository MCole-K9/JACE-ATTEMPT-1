<script setup lang="ts">
import DashboardLayout from '../Layout/DashboardLayout.vue';
import { Organization } from '../Lib/types';
import { defineProps, reactive, ref } from 'vue';
import { router } from '@inertiajs/core';
import { usePage } from '@inertiajs/vue3';
import { userStore } from '../Stores/userStore';
import Input from '../Components/Input.vue';

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
    <h3>Organization</h3>
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
                        <Input label="Organization Name" type="text" :value="org.name" />
                        <Input label="Email" type="email" :value="org.email" />
                        <Input label="Website" type="url" :value="org.website" />
                        <Input label="Phone" type="tel" :value="org.phone" />
                        <Input label="Street Address" type="text" :value="org.street_address" />
                        <Input label="City" type="text" :value="org.city" />
                        <Input label="State" type="text" :value="org.state" />
                        <Input label="Zip" type="text" :value="org.zip" />
                    </div>

                    <btn class="btn btn-primary mt-4 px-20" @click="register">Register</btn>
                </form>
            </section>
            <section id="connect"  class="text-center p-3" v-else>
                <p class="mt-4 text-2xl font-bold">Connect to an existing organization.</p>
                <form @submit.prevent="">
                    <Input label="Organization Code" type="text" :value="organization_code" :error="usePage().props?.errors?.organization_code != undefined" :error-message="usePage().props?.errors?.organization_code"  />
                    <btn class="btn btn-primary mt-4 px-20" @click="connect">Connect</btn>
                </form>
            </section>
        </section>



        </section>
        <section v-else id="organization">
            <section class="text-center p-3">
                <p class="my-2 text-2xl font-bold">Code: {{ props.organization.code }}</p>
                <form @submit.prevent="">
                    <div class="grid md:grid-cols-2 gap-4">
                        <Input label="Organization Name" type="text" :value="org.name" :disabled="!user.isOrgAdmin"  @update:value="org.name = $event" />
                        <Input label="Email" type="email" :value="org.email" :disabled="!user.isOrgAdmin"  @update:value="org.name = $event" />
                        <Input label="Website" type="url" :value="org.website" :disabled="!user.isOrgAdmin"  @update:value="org.website = $event" />
                        <Input label="Phone" type="tel" :value="org.phone" :disabled="!user.isOrgAdmin"  @update:value="org.phone = $event" />
                        <Input label="Street Address" type="text" :value="org.street_address" :disabled="!user.isOrgAdmin"  @update:value="org.street_address = $event" />
                        <Input label="City" type="text" :value="org.city" :disabled="!user.isOrgAdmin"  @update:value="org.city = $event" />
                        <Input label="State" type="text" :value="org.state" :disabled="!user.isOrgAdmin"  @update:value="org.state = $event" />
                        <Input label="Zip" type="text" :value="org.zip" :disabled="!user.isOrgAdmin"  @update:value="org.zip = $event" />
                    </div>

                    <btn v-if="user.isOrgAdmin"  class="btn btn-primary mt-4 px-20" @click="updateOrg">Update</btn>
                </form>
            </section>
        </section>
    </DashboardLayout>
</template>


<style scoped></style>
