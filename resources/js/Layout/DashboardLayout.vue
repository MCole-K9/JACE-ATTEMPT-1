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

   user.setUser(usePage().props?.user as User ?? null);


});






</script>

<template>
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




