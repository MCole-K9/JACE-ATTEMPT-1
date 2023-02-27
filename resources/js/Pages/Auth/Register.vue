<script setup lang="ts">
import { onMounted, reactive, ref, computed, Ref, VNodeRef } from 'vue';
import Vue from 'vue';
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import { getUrl } from '../../Lib/helper';
import { Roles } from '../../Lib/const';
import { QForm } from 'quasar';
import { Logger, ILogObj } from "tslog";

const log: Logger<ILogObj> = new Logger();


let myForm: any = ref();

function validate () {
    console.log(myForm);
    (myForm as unknown as QForm).validate().then((success: any) => {
      if (success) {
        // yay, models are correct
        console.log('yay');
        
      }
      else {
        // oh no, user has filled in
        // at least one invalid value
        console.log('oh no');
      }
    })
    // myForm.value?.validate().then((success: any) => {
    //   if (success) {
    //     // yay, models are correct
    //     console.log('yay');
        
    //   }
    //   else {
    //     // oh no, user has filled in
    //     // at least one invalid value
    //     console.log('oh no');
    //   }
    // })
  }
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
</script>

<template>
    <HomeLayout>
        <section class="flex flex-col items-center space-y-5 mt-10">
            <section class="flex flex-col space-y-5 text-center">
                <h1 class="text-3xl font-bold">Register</h1>
                <p class="text-gray-800">Register to get started (logo can go under)</p>
            </section>
            <div class="w-full bg-gray-800 p-5 h-full rounded-lg max-w-5xl">
            <q-form :ref="myForm" @submit.prevent="register" >
                <div class="grid md:grid-cols-2 gap-4">
                    <q-input v-model="form.first_name" label="First name" :error="usePage().props?.errors.first_name != undefined" :errorMessage="usePage().props?.errors.first_name"></q-input>
                    <q-input v-model="form.last_name" label="Last name" :error="usePage().props?.errors.last_name != undefined" :errorMessage="usePage().props?.errors.last_name"></q-input>
                    <div class="md:col-span-2">
                        <q-input type="email"  v-model="form.email" label="Email" :error="usePage().props?.errors.email != undefined" :errorMessage="usePage().props?.errors.email"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input type="password" v-model="form.password" label="Password" :error="usePage().props?.errors.password != undefined" :errorMessage="usePage().props?.errors.password"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input type="password" v-model="form.confirm_password" label="Confirm Password"></q-input>
                    </div>
                </div>
                <q-btn  type="submit" color="primary" class="full-width mt-3" @click="loading = true" :loading="loading">Register</q-btn>
                <!-- <q-btn  @click="log.info(errors)" >toggle</q-btn> -->
               
            </q-form>
            </div>

        </section>


    </HomeLayout>
</template>
