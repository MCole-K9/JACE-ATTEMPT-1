<script setup lang="ts">
import { ref, defineProps, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3';
import { User } from '../Lib/types';
import { userStore } from '../Stores/userStore';

let user = userStore();
const leftDrawerOpen = ref(false)

function toggleLeftDrawer() {
    leftDrawerOpen.value = !leftDrawerOpen.value
}

onMounted(() => {
    //need a better way to do this
    //adding to each layout for now
    //need to to figure out for when persisting layout
    // console.log(usePage().props?.user);
    user.setUser(usePage().props?.global?.user , usePage().props?.global?.org_rep);


});



</script>


<template>
    <main class="flex">
        <aside class="hidden md:block md:col-span-2 transition-all w-64 ">
            <div class="flex h-screen flex-col justify-between bgBlue">
                <div class="px-4 py-6 flex items-center flex-col">
                    <Link class="grid h-10 mb-5 text-black font-bold w-32 place-content-center rounded-lg bg-gray-100 text-xs" href="/">
                        Job Ace
                    </Link>
                    <nav class="menu bgGold p-2 rounded-md">
                        <section class="menu-section">
                            <ul class="menu-items">
                                <Link href="/dashboard">
                                    <li class="menu-item">Dashboard</li>
                                </Link>
                                <Link v-if="user.isOrgRep" href="/organization">
                                    <li class="menu-item">Organization</li>
                                </Link>
                                <Link v-if="user.isOrgRep" href="/jobs">
                                    <li class="menu-item">Manage Jobs</li>
                                </Link>
                                <Link v-if="user.isOrgAdmin" href="organization/manage-members" >
                                    <li class="menu-item">Manage Members</li>
                                </Link>
                                <Link v-if="user.isAdmin" href="/administration/logs">
                                    <li class="menu-item">Logs</li>
                                </Link>
                                <Link v-if="user.isAdmin" href="/administration/infractions">
                                    <li class="menu-item">Infractions</li>
                                </Link>
                                <!--For now, I think it's fine that the API key is available to all users-->
                                <Link v-if="user.isAdmin" href="/tokens/generate">
                                    <li class="menu-item" >Generate API Key</li>
                                </Link>
                                <Link v-if="user.isAdmin" href="/administration/orgrequests">
                                    <li class="menu-item">View Organization Requests</li>
                                </Link>
                            </ul>
                        </section>
                    </nav>
                </div>
            </div>
        </aside>
        <section class="w-full p-10">
            <slot />
        </section>
    </main>
</template>

