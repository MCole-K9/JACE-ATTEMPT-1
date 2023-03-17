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
    role_id: 2
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
                    <Input @update:value="form.first_name = $event" :value="form.first_name" label="First name" :error="usePage().props?.errors.first_name != undefined" type="email" :errorMessage="usePage().props?.errors.first_name"></Input>
                    <Input @update:value="form.last_name = $event" :value="form.last_name" label="Last name" :error="usePage().props?.errors.last_name != undefined" type="email" :errorMessage="usePage().props?.errors.last_name"></Input>
                    <div class="md:col-span-2">
                        <Input @update:value="form.email = $event" :value="form.email" label="Email" :error="usePage().props?.errors.email != undefined" type="email" :errorMessage="usePage().props?.errors.email"></Input>
                    </div>
                    <div class="md:col-span-2">
                        <Input @update:value="form.password = $event" :value="form.password" label="Password" :error="usePage().props?.errors.password != undefined" type="password" :errorMessage="usePage().props?.errors.password"></Input>
                    </div>
                    <div class="md:col-span-2">
                        <Input @update:value="form.confirm_password = $event" :value="form.confirm_password" label="Confirm Password" :error="usePage().props?.errors.confirm_password != undefined" type="password" :errorMessage="usePage().props?.errors.confirm_password"></Input>
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
