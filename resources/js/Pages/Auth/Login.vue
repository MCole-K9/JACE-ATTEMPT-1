<script setup lang="ts">
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';


const form = reactive({
    email: '',
    password: '',
});

function login() {
    router.post('/login', form);
}

</script>



<template>
    <HomeLayout>
        <section class="grid md:grid-cols-2 mt-10">
            <section>
            </section>
            <q-form @submit.prevent="login" class="mt-40">
                <div class="flex flex-col space-y-2">
                    <q-input v-model="form.email" label="Email"></q-input>
                    <q-input type="password" v-model="form.password" label="Password"></q-input>
                </div>
                <q-btn type="submit" class="full-width mt-3">Login</q-btn>
            </q-form>

        </section>

    </HomeLayout>


</template>
