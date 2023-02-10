<script setup lang="ts">
import { defineComponent, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
defineComponent({
    name: 'AppBar',
});
let drawer = ref(false);
let emit = defineEmits<{
    (e: 'update:drawer', value: boolean): void
    (e: 'registerClicked'): void

}>();

</script>

<template>
    <q-toolbar class="bg-gray-800 h-20 ">
        <q-btn flat round dense icon="menu" @click="emit('update:drawer', drawer = !drawer)"
            class="q-mr-sm touch-only" />
        <q-separator dark vertical inset class="touch-only" />
        <q-btn class="ml-2" flat label="Job Ace" />
        <q-space />
        <Link href="/" class="hover:text-indigo-500">
        <q-btn flat stack label="Home" icon="home" class="gt-xs" />
        <!-- <q-btn flat icon="home" class="touch-only lt-xs"/> -->
        </Link>
        <!-- <Link href="/register" class="hover:text-indigo-500"> -->
        <q-btn @click="emit('registerClicked')" flat label="Register" stack icon="assignment_ind" class="gt-xs" />
        <!-- <q-btn flat stack icon="assignment_ind" class="lt-md"/> -->
        <!-- </Link> -->
        <Link href="/" class="hover:text-indigo-500">
        <q-btn flat label="Dashboard" icon="dashboard" stack class="gt-xs" />
        <!-- <q-btn flat icon="dashboard" stack class="lt-md"/> -->
        </Link>
        <Link href="/">
        <q-btn flat label="Jobs" icon="work" stack class="gt-xs" />
        <!-- <q-btn flat icon="work" stack class="lt-md"/> -->
        </Link>
        <Link href="/">
        <q-btn flat label="Candidates" icon="people" stack class="gt-xs" />
        <!-- <q-btn flat icon="people" stack class="lt-md"/> -->
        </Link>

    </q-toolbar>
</template>
