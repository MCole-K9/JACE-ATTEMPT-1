<script setup lang="ts">
import DashboardLayout from '../Layout/DashboardLayout.vue';
import { Organization } from '../Lib/types';
import { defineProps, reactive, ref } from 'vue';
import { router } from '@inertiajs/core';


const props = defineProps<{
    organization: Organization | null,
    test: string

}>()

const tabOptions = {
    register: 'register',
    connect: 'connect'
} as const;

let tab = ref<keyof typeof tabOptions>('register');

let newOrg = reactive({
    name: '',
    email: '',
    phone: '',
    website: '',
    street_address: '',
    city: '',
    state: '',
    zip: ''
});

let org_code = ref('');

function register() {

    router.post('/organizations', newOrg);

}

function connect() {
    console.log(org_code);
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
                                    <q-input v-model="newOrg.name" label="Organization Name"></q-input>
                                    <q-input v-model="newOrg.email" label="Email"></q-input>
                                    <q-input type="url" v-model="newOrg.website" label="Website"></q-input>
                                    <q-input v-model="newOrg.phone" label="Phone"></q-input>
                                    <q-input v-model="newOrg.street_address" label="Street Address"></q-input>
                                    <q-input v-model="newOrg.city" label="City"></q-input>
                                    <q-input v-model="newOrg.state" label="State"></q-input>
                                    <q-input v-model="newOrg.zip" label="Zip"></q-input>
                                </div>
                                <q-btn type="submit" color="primary" class="mt-3">Register</q-btn>

                            </q-form>
                        </section>
                    </q-tab-panel>
                    <q-tab-panel :name="tabOptions.connect">
                        <section class="text-center p-8">
                            <p class="mt-4 text-2xl font-bold">Connect to an existing organization.</p>
                            <q-form @submit.prevent="connect">
                                <q-input v-model="org_code" label="Organization Code"></q-input>
                            </q-form>

                            <q-btn class="mt-4" color="primary" label="Connect" />

                        </section>
                    </q-tab-panel>
                </q-tab-panels>
            </section>
        </div>
    </DashboardLayout>
</template>


<style scoped></style>
