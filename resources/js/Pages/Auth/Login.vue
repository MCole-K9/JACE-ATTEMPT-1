<script setup lang="ts">
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
import { Link } from '@inertiajs/vue3';


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
        <div class="h-full flex items-center justify-center">
		<div class="max-w-md w-full mt-20 bg-gray-100 p-6 rounded-md shadow-lg">
			<h1 class="text-3xl font-bold text-center">Log In</h1>
            <p class="text-gray-1100 font-bold text-center">Login to your account</p>
			<form class="space-y-6 mt-5" @submit.prevent="login">
				<div>
                    <input v-model="form.email" class="input-ghost-primary input-block input" placeholder="Email" />
				</div>
				<div>
                    <input type="password" v-model="form.password" class="input-ghost-primary input-block input" placeholder="Password" />
				</div>
                <div class="flex items-center justify-between">
                    <label class="flex cursor-pointer gap-2">
                        <input type="checkbox" class="checkbox" v-model="form.remember"/>
                        <span>Remember me?</span>
                    </label>
                    <Link class="link" href="/register">Don't have an account?</Link>
                </div>
                <div class="flex items-center justify-between">
                    
                    
                </div>
				<div>
					<!-- <q-btn label="log in" class="full-width" :loading="loading" @click="loading = true" type="submit" color="blue"/> -->
                    <button class="btn btn-block btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>

    </HomeLayout>


</template>
