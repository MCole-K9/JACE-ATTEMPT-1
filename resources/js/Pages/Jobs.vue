<template>
    <HomeLayout background="bg-white">
         <section class=" flex justify-center bgGold h-56 w-full items-center px-10">
            <article class="prose text-center w-full">
               <h1>Find the right job for you</h1>
               <p>Search for jobs in your area and apply for the ones you like.</p>
            </article>
         </section>
         <section class="px-5">
            <div class="flex flex-col items-center space-y-5 pt-10" v-if="false">
               <div class="w-full bg-gray-100 p-10 h-full rounded-lg max-w-5xl">
                  <section class="flex flex-col text-center mb-10">
                     <h1 class="text-3xl text-gray-1100 font-bold">Register</h1>
                     <p class="text-gray-1000">Register for an account to apply for jobs.</p>
                  </section>
               </div>
            </div>
            <section class="pt-5 xl:px-16 xl:py-10 grid grid-cols-4 gap-3 min-h-screen">
               <div class="h-1/1 bg-gray-200 col-span-1 rounded-xl hidden xl:flex p-5 flex-col space-y-3">
                  <span class="bg-white rounded-xl p-2 h-10 font-bold flex items-center justify-center w-full shadow-lg">Filter</span>
                  <div class="bg-white rounded-xl h-fit w-full shadow-lg p-5">
                     <label class="form-label font-bold mb-2 text-base">Date Posted</label>
                     <select class="select select-block">
                        <option>Anytime</option>
                        <option>Last 24 hours</option>
                        <option>Last 3 days</option>
                        <option>Last Week</option>
                        <option>Last Month</option>
                     </select>
                     <div class="divider"></div>
                     <label class="form-label font-bold mb-2 text-base">Job type</label>
                     <div class="grid grid-cols-2 cursor-pointer gap-2">
                           <label class="flex gap-x-2">
                              <input type="checkbox" class="checkbox checkbox-success" />
                              <span>Job Type 1</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="checkbox" class="checkbox checkbox-success" />
                              <span>Job Type 2</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="checkbox" class="checkbox checkbox-success" />
                              <span>Job Type 3</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="checkbox" class="checkbox checkbox-success" />
                              <span>Job Type 4</span>
                           </label>
                        </div>
                        <div class="divider"></div>
                        <label class="form-label font-bold mb-2 text-base">Range Salary</label>
                        <div class="grid grid-cols-2 cursor-pointer gap-2">
                           <label class="flex gap-x-2">
                              <input type="radio" class="radio-success radio" name="salary" />
                              <span>Under $10,000</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="radio" class="radio-success radio" name="salary" />
                              <span>$10,000 - $50,000</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="radio" class="radio-success radio" name="salary" />
                              <span>$50,000 - $100,000</span>
                           </label>
                           <label class="flex gap-x-2">
                              <input type="radio" class="radio-success radio" name="salary" />
                              <span>$100,000+</span>
                           </label>
                        </div>
                  </div>
               </div>
               <div class="h-1/1 p-5 bg-gray-200 xl:col-span-3 col-span-4 rounded-xl">
                  <section class="w-full justify-center flex">
                     <button class="flex xl:hidden btn btn-secondary mr-2">Filter</button>
                     <input type="text" class="input input-block max-w-3xl rounded-r-none" placeholder="Search for jobs" />
                     <button class="btn btn-primary rounded-l-none">Search</button>
                  </section>
                  <section class="space-y-5 flex flex-col">
                     <JobCard v-for="i in 5" :key="i" />
                  </section>
                  <section class="flex justify-center pt-5">
                     <div class="pagination ">
                     <button class="btn">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2574 5.59165C11.9324 5.26665 11.4074 5.26665 11.0824 5.59165L7.25742 9.41665C6.93242 9.74165 6.93242 10.2667 7.25742 10.5917L11.0824 14.4167C11.4074 14.7417 11.9324 14.7417 12.2574 14.4167C12.5824 14.0917 12.5824 13.5667 12.2574 13.2417L9.02409 9.99998L12.2574 6.76665C12.5824 6.44165 12.5741 5.90832 12.2574 5.59165Z" fill="#969696" />
                        </svg>
                     </button>
                     <button class="btn btn-active">1</button>
                     <button class="btn">2</button>
                     <button class="btn">3</button>
                     <button class="btn">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74375 5.2448C7.41875 5.5698 7.41875 6.0948 7.74375 6.4198L10.9771 9.65314L7.74375 12.8865C7.41875 13.2115 7.41875 13.7365 7.74375 14.0615C8.06875 14.3865 8.59375 14.3865 8.91875 14.0615L12.7437 10.2365C13.0687 9.91147 13.0687 9.38647 12.7437 9.06147L8.91875 5.23647C8.60208 4.9198 8.06875 4.9198 7.74375 5.2448Z" fill="#969696" />
                        </svg>
                     </button>
                  </div>
                  </section>
                  

                  
               </div>
            </section>
         </section>
    </HomeLayout>
   </template>
   
   <script setup lang="ts">
   import { defineComponent } from 'vue';
   import HomeLayout from '../Layout/HomeLayout.vue';
   import JobCard from '../Components/JobCard.vue';
   
   

   </script>
   
   <style scoped>
   
   </style>
