<template>
   <div class="avatar avatar-ring avatar-md mx-2">
			<div class="dropdown-container">
				<div class="dropdown">
					<label class="btn btn-ghost flex cursor-pointer px-0" tabindex="0">
						<img :src="user.getAvatarUrl ?? (user.profileChanged ? user.getTempAvatarUrl : 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png')" alt="avatar" />
					</label>
					<div class="dropdown-menu dropdown-menu-bottom-left">
                        <label class="text-xs text-center"> Signed In As</label>
                        <label class="font-bold text-center text-lg">{{ user.getFullName }}</label>
						<Link href="/dashboard" class="dropdown-item text-sm flex flex-row items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                            <span>Dashboard</span>
                        </Link>
						<Link tabindex="-1" class="dropdown-item text-sm flex flex-row items-center space-x-2" href="/profile">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Profile</span>
                        </Link>

                        <button class="btn btn-sm btn-primary text-sm mt-1" @click="user.logOut()">Logout</button>
					</div>
				</div>
			</div>
		</div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { userStore } from '../Stores/userStore';
const user = userStore();

</script>

<style scoped>

</style>
