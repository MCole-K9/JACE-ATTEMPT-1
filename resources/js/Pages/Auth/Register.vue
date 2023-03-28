<script setup lang="ts">
import { onMounted, reactive, ref, computed, Ref, VNodeRef } from 'vue';
import Vue from 'vue';
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import { getUrl } from '../../Lib/helper';
import { Roles } from '../../Lib/const';
import { Logger, ILogObj } from "tslog";
import Input from '../../Components/Input.vue';

const log: Logger<ILogObj> = new Logger();


let myForm: any = ref();

let form = reactive({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    confirm_password: '',
    role_id: 3
});

let errors = reactive({
    first_name: (usePage().props?.errors.first_name != undefined),
    last_name: (usePage().props?.errors.last_name != undefined),
    email: computed(() => usePage().props?.errors.email ? true : false).value,
    password: computed(() => usePage().props?.errors.password ? true : false).value,
    role_id: computed(() => usePage().props?.errors.role_id ? true : false).value,
});

let bool = ref(true);

function register() {
    router.post('/register', form);
}

onMounted(() => {

    //probably could have used usePage from @inertiajs/inertia-vue3
    let url = getUrl();

    let usrRole = url.searchParams.get("role");


    if (usrRole && parseInt(usrRole) == Roles.Candidate || usrRole && parseInt(usrRole) == Roles.OrganizationRep) {
        form.role_id = parseInt(usrRole);
    }

});

let loading = ref(false);
log.info("loading: ", loading.value);
log.info("form: ", form);
log.info("errors: ", usePage().props?.errors.first_name);
</script>

<template>
    <HomeLayout>
        <section class="flex flex-col items-center space-y-5 pt-10">

            <div class="w-full bg-gray-100 p-10 h-full rounded-lg max-w-5xl">
                <section class="flex flex-col text-center mb-10">
                    <h1 class="text-3xl text-gray-1100 font-bold">Register</h1>
                    <p class="text-gray-1100 font-bold">Sign up to get started</p>
                </section>
            <form :ref="myForm" @submit.prevent="register" >
                <div class="grid md:grid-cols-2 gap-4">
                    <Input v-model="form.first_name" v-bind:value="form.first_name" label="First name" type="text" :error="usePage().props?.errors.first_name != undefined"  :errorMsg="usePage().props?.errors.first_name" />
                    <Input v-model="form.last_name"  v-bind:value="form.last_name" label="Last name" type="text"  :error="usePage().props?.errors.last_name != undefined"  :errorMsg="usePage().props?.errors.last_name" />
                    <div class="md:col-span-2">
                        <Input v-model="form.email" v-bind:value="form.email" label="Email" type="email" :error="usePage().props?.errors.email != undefined"  :errorMsg="usePage().props?.errors.email" />
                    </div>
                    <div class="md:col-span-2">
                        <Input v-model="form.password" v-bind:value="form.password" label="Password" type="password" :error="usePage().props?.errors.password != undefined"  :errorMsg="usePage().props?.errors.password"/>
                    </div>
                    <div class="md:col-span-2">
                        <Input v-model="form.confirm_password" v-bind:value="form.confirm_password" label="Confirm Password" type="password" :error="usePage().props?.errors.confirm_password != undefined"  :errorMsg="usePage().props?.errors.confirm_password" />
                    </div>
                </div>
                <!-- <q-btn  type="submit" color="primary" class="full-width mt-3" @click="loading = true" :loading="loading">Register</q-btn> -->
                <p class="text-error">{{  }}</p>
                <button type="submit" :class="`btn btn-primary btn-block mt-3 ${Object.keys(usePage().props?.errors as Object).length === 0 && loading ? 'btn-loading' : '' }`" @click="loading = true">Register</button>
                <!-- <q-btn  @click="log.info(errors)" >toggle</q-btn> -->
            </form>
            </div>

        </section>


    </HomeLayout>
</template>
