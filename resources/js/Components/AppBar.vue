<script setup lang="ts">
import { defineComponent, ref } from 'vue';
import { Link } from '@inertiajs/vue3';

import { userStore } from '../Stores/userStore';
defineComponent({
    name: 'AppBar',
});

const user = userStore();
let drawer = ref(false);
let emit = defineEmits<{
    (e: 'update:drawer', value: boolean): void
    (e: 'registerClicked'): void

}>();

</script>

<template>
    <q-toolbar class="bg-gray-800 h-20 ">
        <div class="sm:hidden">
          <q-btn flat round dense icon="menu" @click="emit('update:drawer', drawer = !drawer)" class="q-mr-sm" />
        </div>
        <q-separator dark vertical inset class="touch-only" />
        <q-btn class="ml-2" flat label="Job Ace" />
        <q-space />
        <Link href="/" class="hover:text-indigo-500">
        <q-btn flat stack label="Home" icon="home" class="gt-xs" />
        </Link>
        <Link href="/">
        <q-btn flat label="Jobs" icon="work" stack class="gt-xs" />
        </Link>
        <Link href="/" class="hover:text-indigo-500"> 
        <q-btn flat label="Candidates" icon="people" stack class="gt-xs" />
        </Link >
        <q-btn v-if="!user.user" @click="emit('registerClicked')" flat label="Register" stack icon="assignment_ind" class="gt-xs" />
        <q-btn v-if="user.user" @click="user.logOut()" flat label="Logout" stack icon="logout" class="gt-xs" />
        <q-btn icon="account_circle" class="hover:text-indigo-500" round size="lg"  >
          <q-menu>
            <div class="row no-wrap q-pa-md">
              <div class="column">
                <q-btn icon="dashboard" label="Dashboard" />
              </div>
              <q-separator vertical inset class="q-mx-lg" />
              <div class="column items-center">
                <q-avatar size="72px">
                  <img src="https://cdn.quasar.dev/img/avatar4.jpg">
                </q-avatar>
                <div class="text-subtitle1 q-mt-md q-mb-xs">John Doe</div>
                <q-btn
                  color="primary"
                  label="Logout"
                  @click="user.logOut()"
                  size="sm"
                  v-close-popup
                />
              </div>
            </div>
          </q-menu>
        </q-btn>
    </q-toolbar>
</template>
