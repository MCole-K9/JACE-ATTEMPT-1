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
    <main class="grid grid-cols-12">
        <aside class="hidden md:block md:col-span-2 transition-all w-64 ">
            <div class="flex h-screen flex-col justify-between  ">
                <div class="px-4 py-6">
                    <span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-white">
                        Job Ace
                    </span>
                    <nav class="menu bg-gray-2 p-2 rounded-md">
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
                                <Link v-if="user.isAdmin" href="/administration/logs">
                                    <li>Logs</li>
                                </Link>
                                <Link v-if="user.isAdmin" href="/administration/infractions">
                                    <li>Infractions</li>
                                </Link>
                                <Link href="/tokens/generate">
                                    <li>Generate API Key</li>
                                </Link>
                            </ul>
                        </section>
                    </nav>
                </div>
            </div>
        </aside>
        <section class="col-span-full md:col-span-10 p-10">
            <slot />
        </section>
    </main>
</template>

