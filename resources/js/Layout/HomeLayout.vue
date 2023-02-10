<script setup lang="ts">
import { defineComponent, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import AppBar from '../Components/AppBar.vue';
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






</script>

<template>
    <q-layout>
        <q-header elevated>
            <AppBar @register-clicked="openDialog" @update:drawer="setDrawer" />
        </q-header>

        <q-drawer v-model="drawer" :width="200" :breakpoint="500" bordered class="bg-gray-800">
            <q-scroll-area class="fit">
                <q-list>
                    <template v-for="(menuItem, index) in menuList" :key="index">
                        <q-item clickable :active="menuItem.label === 'Outbox'" v-ripple>
                            <q-item-section avatar>
                                <q-icon :name="menuItem.icon" />
                            </q-item-section>
                            <q-item-section>
                                {{ menuItem.label }}
                            </q-item-section>
                        </q-item>
                        <q-separator :key="'sep' + index" v-if="menuItem.separator" />
                    </template>
                </q-list>
            </q-scroll-area>
        </q-drawer>

        <q-page-container class="cont">
            <q-page padding>
                <slot />
            </q-page>
        </q-page-container>
    </q-layout>

    <q-dialog v-model="dialog" persistent :maximized="maximizedToggle" transition-show="slide-up"
        transition-hide="slide-down">
        <q-card class="bg-primary text-white">
            <q-bar>
                <q-space />

                <q-btn dense flat icon="minimize" @click="maximizedToggle = false" :disable="!maximizedToggle">
                    <q-tooltip v-if="maximizedToggle" class="bg-white text-primary">Minimize</q-tooltip>
                </q-btn>
                <q-btn dense flat icon="crop_square" @click="maximizedToggle = true" :disable="maximizedToggle">
                    <q-tooltip v-if="!maximizedToggle" class="bg-white text-primary">Maximize</q-tooltip>
                </q-btn>
                <q-btn dense flat icon="close" v-close-popup>
                    <q-tooltip class="bg-white text-primary">Close</q-tooltip>
                </q-btn>
            </q-bar>

            <!-- properly align the content for me if you can -->
            <q-card-section class="grid md:grid-cols-2 items-center align-middle gap-10 mt-52">
                <q-card-section class="border-b-2">
                    <Link href="register?role=2" class="flex justify-around">
                       <h5> Sign up as a Candidate</h5>
                       <q-icon size="32px" name="arrow_right_alt" />
                    </Link>
                </q-card-section>

                <q-card-section class="q-pt-none border-b-2">
                    <Link href="register?role=2" class="flex justify-around">
                       <h5> Sign up as an Organization Representative</h5>
                       <q-icon size="32px" name="arrow_right_alt" />
                    </Link>
                </q-card-section>
            </q-card-section>

        </q-card>
    </q-dialog>
</template>

<style>
.cont {
    background: linear-gradient(-45deg, #f2c211, #1b5dac, #227C70);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    height: 100vh;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}
</style>
