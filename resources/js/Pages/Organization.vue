<script setup lang="ts">
import DashboardLayout from '../Layout/DashboardLayout.vue';
import { Organization } from '../Lib/types';
import { defineProps, reactive, ref } from 'vue';
import { router } from '@inertiajs/core';
import { usePage } from '@inertiajs/vue3';


const props = defineProps<{
    organization: Organization | null,
}>()

const tabOptions = {
    register: 'register',
    connect: 'connect'
} as const;

let tab = ref<keyof typeof tabOptions>('register');

type NewOrg = Omit<Organization, "id" | "code" | "created_at" | "updated_at">;

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


</script>


<template>
    <DashboardLayout>
        <div class="q-pa-md">
            <h3>Organization</h3>
            <section id="register-connect" class="mt-5  mx-auto w-full " v-if="!props.organization">
                <q-tabs v-model="tab" inline-label class="text-white shadow-2">
                    <q-tab :name="tabOptions.register" icon="corporate_fare" label="Register Organization" />
                    <q-tab :name="tabOptions.connect" icon="connect_without_connect" label="Connect To Organization" />
                </q-tabs>
                <q-separator />
                <q-tab-panels v-model="tab">
                    <q-tab-panel :name="tabOptions.register">
                        <section class="text-center p-3">
                            <p class="my-2 text-2xl font-bold">Register a new organization.</p>
                            <q-form @submit.prevent="register" class="mx-auto">
                                <div class="grid md:grid-cols-2 gap-4">
                                    <q-input v-model="org.name" label="Organization Name"></q-input>
                                    <q-input v-model="org.email" label="Email"></q-input>
                                    <q-input type="url" v-model="org.website" label="Website"></q-input>
                                    <q-input v-model="org.phone" label="Phone"></q-input>
                                    <q-input v-model="org.street_address" label="Street Address"></q-input>
                                    <q-input v-model="org.city" label="City"></q-input>
                                    <q-input v-model="org.state" label="State"></q-input>
                                    <q-input v-model="org.zip" label="Zip"></q-input>
                                </div>
                                <q-btn type="submit" color="primary" class="mt-3">Register</q-btn>

                            </q-form>
                        </section>
                    </q-tab-panel>
                    <q-tab-panel :name="tabOptions.connect">
                        <section class="text-center p-8">
                            <p class="mt-4 text-2xl font-bold">Connect to an existing organization.</p>
                            <q-form @submit.prevent="connect">
                                <q-input v-model="organization_code" :error="usePage().props?.errors?.organization_code != undefined" :error-message="usePage().props?.errors?.organization_code" label="Organization Code"></q-input>
                                <q-btn type="submit" class="mt-4" color="primary" label="Connect" />
                            </q-form>

                        </section>
                    </q-tab-panel>
                </q-tab-panels>
            </section>
            <section v-else id="organization">
                <section class="text-center p-3">
                    <p class="my-2 text-2xl font-bold">Code: {{ props.organization.code }}</p>
                    <q-form @submit.prevent="" class="mx-auto">
                        <div class="grid md:grid-cols-2 gap-4">
                            <q-input v-model="org.name" label="Organization Name"></q-input>
                            <q-input v-model="org.email" label="Email"></q-input>
                            <q-input type="url" v-model="org.website" label="Website"></q-input>
                            <q-input v-model="org.phone" label="Phone"></q-input>
                            <q-input v-model="org.street_address" label="Street Address"></q-input>
                            <q-input v-model="org.city" label="City"></q-input>
                            <q-input v-model="org.state" label="State"></q-input>
                            <q-input v-model="org.zip" label="Zip"></q-input>
                        </div>
                        <q-btn type="submit" color="primary" class="mt-3">Update</q-btn>
                    </q-form>
                </section>
            </section>
        </div>
    </DashboardLayout>
</template>


<style scoped></style>
