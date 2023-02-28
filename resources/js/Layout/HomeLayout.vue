<script setup lang="ts">
import { defineComponent, onMounted, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import AppBar from '../Components/AppBar.vue';
import { Roles } from '../Lib/const';
import { userStore } from '../Stores/userStore';
import { User } from '../Lib/types';
import { getUrl } from '../Lib/helper';
import SVGAnimation from '../Components/SVGAnimation.vue';

const user = userStore();

let drawer = ref(false);
function setDrawer(bool: boolean) {
    drawer.value = bool;
}
const menuList = [
    {
        icon: 'assignment_ind',
        label: 'Register',
        separator: false
    },
    {
        icon: 'work',
        label: 'Jobs',
        separator: false
    },
    {
        icon: 'people',
        label: 'Candidates',
        separator: false
    },
    {
        icon: 'dashboard',
        label: 'Dashboard',
        separator: true
    },
]

let maximizedToggle = ref(true);
let dialog = ref(false);

function openDialog() {
    dialog.value = true;
}

const candidateRegisterLink = `/register?role=${Roles.Candidate}` ;
const orgRepRegisterLink = `/register?role=${Roles.OrganizationRep}`;




onMounted(() => {
    //need a better way to do this
    //adding to each layout for now
    //need to to figure out for when persisting layout
   user.setUser(usePage().props?.user as User ?? null);
});


</script>

<template>
    <!-- <section></section> -->
    <AppBar @register-clicked="openDialog" @update:drawer="setDrawer" />
    <input type="checkbox" id="drawer-left" class="drawer-toggle" />

    
    <label class="overlay" for="drawer-left"></label>
    <div class="drawer">
        <div class="drawer-content flex flex-col h-full">
            <label for="drawer-left" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
            <div class="text-2xl font-bold text-center my-10">Job Ace</div>
            <nav class="menu bg-gray-100 p-2 rounded-md">
            <section class="menu-section">
                <ul class="menu-items">
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Home
                    </li>
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        Candidates
                    </li>
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        Jobs
                    </li>
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                        Organizations
                    </li>
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        About
                    </li>
                    <li class="menu-item flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        Contact
                    </li>

                </ul>
            </section>
</nav>
        </div>
    </div>
    <section :class="`${getUrl().pathname != '/' ? 'bgBlue p-5' : 'bgGold'}`" style="min-height: calc(100vh - 80px);">
        <slot />
    </section>
</template>

<style>
.bgGold {
    background-color: #f2c111ad;
    z-index: 1;
    background-size: 400% 400%;
}
.bgBlue {
    background-color: hsl(217, 88%, 33.7%);
    z-index: 1;
    background-size: 400% 400%;
}

</style>
