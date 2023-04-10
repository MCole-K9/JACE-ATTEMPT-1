<template>
                <section class="bg-white mt-8 outline outline-success shadow-lg rounded-lg overflow-hidden">
                  <div class="px-6 py-4">
                     <h3 class="font-bold text-xl">{{ job.title }}</h3>
                     <span class="flex items-center text-xs text-gray-800 font-semibold mb-3">{{job.organization?.name}} <br> {{ job.organization?.street_address }}
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg> -->
                     </span>                          
                     <p class="font-sans text-base" v-html="job.description">
                     </p>
                  </div>
                  <div class="px-6 py-4 bg-gray-100 flex items-center space-x-2">
                     <span class="text-xs text-gray-800 font-semibold">Job type: {{job.type}}</span>
                     <span class="text-xs text-gray-800 font-semibold">Salary: {{job.salary}}</span>
                     <span class="text-xs text-gray-800 font-semibold">Location: {{job.location}}</span>
                  </div>
                  <div class="px-6 py-4 flex justify-between items-center">
                     <span class="text-xs text-gray-800 font-semibold">Date posted: {{job.open_date}}</span>
                     <!-- <button class="btn btn-success">Apply now</button> -->
                     <label class="btn btn-success" for="drawer-right">Apply Now</label>
                  </div>
                  </section>
                  <input type="checkbox" id="drawer-right" class="drawer-toggle" />

                  <!-- <label for="drawer-right" class="btn btn-primary">Open Right</label> -->
                  <label class="overlay" for="drawer-right"></label>
                  <div class="drawer drawer-right">
                     <div class="drawer-content pt-10 flex flex-col h-full">
                        <label for="drawer-right" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                        <div>
                           <h2 class="text-xl font-medium">Create your account</h2>
                           <input class="input py-1.5 my-3" placeholder="Type here..." />
                        </div>
                        <div class="h-full flex flex-row justify-end items-end gap-2">
                           <button class="btn btn-ghost">Cancel</button>
                           <button class="btn btn-primary">Create</button>
                        </div>
                     </div>
                  </div>

</template>

<script setup lang="ts">
import type { Job } from '../Lib/types';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
page.props?.orgs
const props = defineProps<{ job: Job }>();
</script>

<style scoped>

</style>