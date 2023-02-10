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
        <!-- <section class="grid md:grid-cols-2 mt-10">
            <section>
            </section>
            <v-form @submit.prevent="register">
                <div class="grid md:grid-cols-2 gap-4">
                    <v-text-field v-model="form.first_name" label="First name"></v-text-field>
                    <v-text-field v-model="form.last_name" label="Last name"></v-text-field>
                    <div class="md:col-span-2">
                        <v-text-field v-model="form.email" label="Email"></v-text-field>
                    </div>
                    <div class="md:col-span-2">
                        <v-text-field v-model="form.password" label="Password"></v-text-field>
                    </div>
                    <div class="md:col-span-2">
                        <v-text-field v-model="form.confirm_password" label="Confirm Password"></v-text-field>
                    </div>
                </div>
                <v-btn type="submit" class="w-full" color="bg-black">Register</v-btn>
            </v-form>

        </section> -->


    </HomeLayout>
</template>
