<template>
    <q-toolbar class="bg-gray-800 h-16 text-white shadow-2">
        <q-btn flat round dense icon="menu" class="q-mr-sm" />
        <q-separator dark vertical inset />
        <q-btn class="ml-2" flat label="Job Ace" />
        <q-space />
          <Link href="/"><q-btn flat stack label="Home" icon="home"/></Link>
          <Link href="/register"><q-btn flat label="Register" stack icon="assignment_ind" /></Link>
          <Link href="/"><q-btn flat label="Dashboard" icon="dashboard" stack /></Link>
          <Link href="/"><q-btn flat label="Jobs" icon="work" stack/></Link>
          <Link href="/"><q-btn flat label="Candidates" icon="people" stack /></Link>
      </q-toolbar>
</template>
<script setup lang="ts">
import { defineComponent, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
defineComponent({
  name: 'AppBar',
});
// let bool = ref(true);
</script>