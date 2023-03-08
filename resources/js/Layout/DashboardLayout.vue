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

<!-- <template>
    <q-layout view="hHh LpR fFf">

        <q-header elevated class="bg-primary text-white">
            <q-toolbar>
                <q-btn dense flat round icon="menu" @click="toggleLeftDrawer" />

                <q-toolbar-title>
                    <q-avatar>
                        <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
                    </q-avatar>
                    Title
                </q-toolbar-title>
            </q-toolbar>
        </q-header>

        <q-drawer show-if-above v-model="leftDrawerOpen" side="left" elevated>
            <q-scroll-area class="fit py-6 px-1">
                <q-list>
                    <Link href="/dashboard">
                        <q-item clickable v-ripple>
                            <q-item-section avatar>
                                <q-icon name="dashboard" />
                            </q-item-section>
                            <q-item-section>
                                <q-item-label>Dashboard</q-item-label>
                            </q-item-section>
                        </q-item>
                    </Link>
                    <Link  href="/organization">
                        <q-item clickable v-ripple>
                            <q-item-section avatar>
                                <q-icon name="corporate_fare" />
                            </q-item-section>
                            <q-item-section>
                                <q-item-label>Organization</q-item-label>
                            </q-item-section>
                        </q-item>
                    </Link>
                </q-list>
            </q-scroll-area>

        </q-drawer>

        <q-page-container>
            <slot />
        </q-page-container>

    </q-layout>
</template>
 -->



 <!-- <input type="checkbox" id="drawer-left" value={true} class="drawer-toggle" />

 <label for="drawer-left" class="btn btn-primary">Open Left</label>
 <label class="overlay" for="drawer-left"></label>
 <div class="drawer">
     <div class="drawer-content pt-10 flex flex-col h-full">
         <label for="drawer-left" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
         <nav class="menu bg-gray-2 p-2 rounded-md">
             <section class="menu-section">
                 <ul class="menu-items">
                     <Link href="/dashboard">
                         <li class="menu-item">Dashboard</li>
                     </Link>
                     <Link  href="/organization">
                         <li class="menu-item">Organization</li>
                     </Link>
                     <li class="menu-item">Projects</li>
                     <li class="menu-item">Calendar</li>
                 </ul>
             </section>
         </nav>

     </div>
 </div> -->

<template>
    <main class="grid grid-cols-12">
        <aside class="hidden md:block md:col-span-2 transition-all ">
            <div class="flex h-screen flex-col justify-between border-r ">
                <div class="px-4 py-6">
                    <span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
                        Logo
                    </span>
                    <nav class="menu bg-gray-2 p-2 rounded-md">
                        <section class="menu-section">
                            <ul class="menu-items">
                                <Link href="/dashboard">
                                    <li class="menu-item">Dashboard</li>
                                </Link>
                                <Link href="/organization">
                                    <li class="menu-item">Organization</li>
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

