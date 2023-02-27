<script setup lang="ts">
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';


const form = reactive({
    email: '',
    password: '',
    remember: false,
});

function login() {
    router.post('/login', form);
}

let loading = ref(false);
</script>



<template>
    <HomeLayout>
        <!-- <section class="flex justify-center items-center pt-40">
             <section>
            </section> -->
            <!-- <section class="flex flex-col justify-center items-center w-full max-w-6xl bg-gray-800 h-80"> -->
                
                
            <!-- </section> -->
            <!-- <h1 class="text-4xl font-bold">Login</h1>
                <p class="text-gray-200 font-bold">Login to your account</p>
                <div class="bg-gray-800 p-5">
                    <q-form @submit.prevent="login">
                <div class="flex flex-col space-y-2">
                    <q-input v-model="form.email" label="Email"></q-input>
                    <q-input type="password" v-model="form.password" label="Password"></q-input>
                </div>
                <q-btn type="submit" class="full-width mt-3">Login</q-btn>
            </q-form>
                </div> -->

        <!-- </section> -->
        <div class="h-full flex items-center justify-center">
            <!-- <section class="flex flex-col justify-center items-center w-full max-w-6xl h-96"></section> -->
		<div class="max-w-md w-full bg-gray-800 p-6 rounded-md shadow-lg">
            
			<h1 class="text-3xl font-bold text-center mb-6">Log In</h1>
            <p class="text-gray-200 font-bold text-center">Login to your account</p>
			<q-form class="space-y-6" @submit.prevent="login">
				<div>
					<q-input v-model="form.email" label="Email"></q-input>
				</div>
				<div>
                    <q-input type="password" v-model="form.password" label="Password"></q-input>
				</div>
                <div class="flex items-center justify-between">
                    <q-checkbox v-model="form.remember" label="Remember me" />
                    <q-btn flat label="Forgot password?" />
                </div>
                <div class="flex items-center justify-between">
                    <q-btn  flat label="Don't have an account?" />
                    <q-btn flat label="Register" />
                </div>
				<div>
					<q-btn label="log in" class="full-width" :loading="loading" @click="loading = true" type="submit" color="blue"/>
				</div>
			</q-form>
		</div>
	</div>

    </HomeLayout>


</template>
