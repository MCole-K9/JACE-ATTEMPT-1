<script setup lang="ts">
import { defineComponent } from 'vue';


</script>

<template>

  <v-app>
    <v-app-bar title="Job Ace"></v-app-bar>
    <v-main>
      <v-container>
        <slot/>
      </v-container>
    </v-main>
  </v-app>

</template>
