<template>
 <HomeLayout background="bgGold">
  <section class=" flex justify-center bgBlue h-56 w-full items-center px-10">
    <article class="prose text-center text-white w-full">
        <h1 class="text-white">Find a candidate</h1>
        <p>Search and recruit the right candidate for your company.</p>
    </article>
  </section>
  <section class="flex ">
    <nav class="menu hidden lg:flex p-4 bg-white max-w-xs min-h-screen">
    <section class="menu-section">
      <span class="menu-title">Main menu</span>
      <ul class="menu-items">
        <li>
          <input type="checkbox" id="menu-2" class="menu-toggle [&:checked~.menu-item>.menu-icon]:-rotate-90" />
          <label class="menu-item justify-between" for="menu-2">
            <span>General</span>
            <span class="menu-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-4 h-4 stroke-content3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </label>

          <div class="menu-item-collapse">
            <div class="min-h-0">
              <label class="menu-item-disabled menu-item ml-6">Accounts</label>
              <label class="menu-item ml-6">Billing</label>
              <label class="menu-item ml-6">Security</label>
            </div>
          </div>
        </li>
        <li>
          <label class="menu-item" tabindex="0" role="button">Settings</label>
        </li>
        <li class="menu-item">Profile</li>
      </ul>
    </section>
  </nav>

   <section class="p-10 w-full ">
    <section class="w-full justify-center flex">
                     <!-- <button class="flex xl:hidden btn btn-secondary mr-2">Filter</button> -->
                     <input type="text" class="input input-block rounded-r-none" placeholder="Search for a candidate" />
                     <button class="btn btn-primary rounded-l-none">Search</button>
                  </section>
                  <section class="py-10 grid grid-cols-2 xl:grid-cols-3 Cxl:grid-cols-4 gap-5">
                    <div class="w-full border border-gray-200 rounded-lg bg-white outline outline-gray-500 shadow-xl relative p-5" v-for="i in 10">
                    <div class="flex justify-between">
                      <div class="flex items-center">
                          <img class="w-16 h-16 mb-3 rounded-full shadow-lg" src="https://i.pravatar.cc/150?u=a042581f4e29026024d" alt="Bonnie image"/>
                          <span class="ml-3 -mt-3">
                            <h5 class="text-lg font-bold text-black">Bonnie Green</h5>
                            <p class="text-sm text-gray-1100">Visual Designer</p> 
                          </span>
                          
                          <!-- <div class="flex mt-4 space-x-3 md:mt-6">
                            <button class="btn bgGold btn-block">Default</button>
                          </div>  -->
                      </div>
                      
                      <div class="dropdown">
                        <label class="btn btn-ghost" tabindex="0">
                          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </label>
                        <div class="dropdown-menu">
                          <a class="dropdown-item text-sm">Profile</a>
                          <a tabindex="-1" class="dropdown-item text-sm">Recruit</a>
                          <a tabindex="-1" class="dropdown-item text-sm">Subscriptions</a>
                        </div>
                      </div>
                    </div>
                    <div class="bg-gray-500 w-full h-24 rounded-lg my-5">

                    </div>
                    <button class="btn btn-primary w-full">View</button>
                    
                </div>
                
                  </section>
                  <section class="flex justify-center pt-5">
                     <div class="pagination ">
                     <button class="btn btn-ghost" @click="pagination.previousPage" :disabled="pagination.range.value.start == 0">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2574 5.59165C11.9324 5.26665 11.4074 5.26665 11.0824 5.59165L7.25742 9.41665C6.93242 9.74165 6.93242 10.2667 7.25742 10.5917L11.0824 14.4167C11.4074 14.7417 11.9324 14.7417 12.2574 14.4167C12.5824 14.0917 12.5824 13.5667 12.2574 13.2417L9.02409 9.99998L12.2574 6.76665C12.5824 6.44165 12.5741 5.90832 12.2574 5.59165Z" fill="#000" />
                        </svg>
                     </button>
                     <!-- <button class="btn btn-active">1</button> -->
                     <button :class="`btn ${i != pagination.currentPageNumber.value || 'btn-active'}`" v-for="i in pagination.numberOfPages" @click="pagination.goToPage(i)">{{ i }}</button>
                     <!-- <button class="btn">3</button> -->
                     <button class="btn btn-ghost" @click="pagination.nextPage" :disabled="pagination.currentPageNumber.value == pagination.numberOfPages">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74375 5.2448C7.41875 5.5698 7.41875 6.0948 7.74375 6.4198L10.9771 9.65314L7.74375 12.8865C7.41875 13.2115 7.41875 13.7365 7.74375 14.0615C8.06875 14.3865 8.59375 14.3865 8.91875 14.0615L12.7437 10.2365C13.0687 9.91147 13.0687 9.38647 12.7437 9.06147L8.91875 5.23647C8.60208 4.9198 8.06875 4.9198 7.74375 5.2448Z" fill="#000" />
                        </svg>
                     </button>
                  </div>
                  </section>

   </section>
  </section>


   


 </HomeLayout>
</template>

<script setup lang="ts">
import { defineComponent } from 'vue';
import HomeLayout from '../Layout/HomeLayout.vue';
import { Pagination } from '../Lib/handlePagination';

let pagination = new Pagination([1,2,3,4,5,6,7,8,9],3);

</script>

<style scoped>

</style>
