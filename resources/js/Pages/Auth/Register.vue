<script setup lang="ts">
import { reactive, ref } from 'vue';
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router } from '@inertiajs/vue3';


let form = reactive({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    confirm_password: '',
});

function register() {
    router.post('/register', form);
}

</script>

<template>
    <HomeLayout>
        <section class="grid md:grid-cols-2 mt-10">
            <section>
            </section>
            <q-form @submit.prevent="register" >
                <div class="grid md:grid-cols-2 gap-4">
                    <q-input v-model="form.first_name" label="First name"></q-input>
                    <q-input v-model="form.last_name" label="Last name"></q-input>
                    <div class="md:col-span-2">
                        <q-input  v-model="form.email" label="Email"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input v-model="form.password" label="Password"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input v-model="form.confirm_password" label="Confirm Password"></q-input>
                    </div>
                </div>
                <q-btn  type="submit" class="full-width mt-3" >Register</q-btn>
            </q-form>

        </section>


    </HomeLayout>
</template>
