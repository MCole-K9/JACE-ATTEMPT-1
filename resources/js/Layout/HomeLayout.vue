<script setup lang="ts">
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import AppBar from '../Components/AppBar.vue';


</script>

<template>

  <q-layout>    
    <AppBar/>
      <q-page-container class="cont p-10">
        <slot />
      </q-page-container>
  </q-layout>

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