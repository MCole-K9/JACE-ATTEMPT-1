<script setup lang="ts">
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';


</script>

<template>

  <v-app>
    <v-app-bar title="Job Ace">
        <v-spacer/>
        <v-btn text><Link href="/">Home</Link></v-btn>
        <v-btn text>Jobs</v-btn>
        <v-btn  text>Candidates</v-btn>
        <v-btn text><Link href="/register">Register</Link></v-btn>
    </v-app-bar>
    <v-main>
      <v-container>
        <slot/>
      </v-container>
    </v-main>
  </v-app>

</template>
