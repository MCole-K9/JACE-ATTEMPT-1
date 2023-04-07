<template>
    <HomeLayout>
        <div class="p-16">
<div class="p-8 bg-gray-1100 shadow mt-24">
  <div class="grid grid-cols-1 md:grid-cols-3">
    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
      <div>
        <p class="font-bold text-gray-700 text-xl">Joined</p>
        <p class="text-gray-400">Jan 25, 2023</p>
      </div>
      <div>
           <p class="font-bold text-gray-700 text-xl">Current Org</p>
        <p class="text-gray-400">An Organization name</p>
      </div>
          <div>
           <p class="font-bold text-gray-700 text-xl">Jobs Done</p>
        <p class="text-gray-400">9</p>
      </div>
    </div>
    <div class="relative">
      <div class="w-48 h-48 bg-gray-800 mx-auto rounded-full shadow-2xl inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500 relative">

        <img :src="profileUrl" alt="profile_picture">
   
    <div class="dropdown dropdown-hover absolute bottom-0 right-3">
        <label class="btn btn-circle">
        <svg fill="none"  class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
        </svg>
    </label>
	<div class="dropdown-menu dropdown-menu-bottom-right">
		<a tabindex="-1" class="dropdown-item text-sm">Remove Photo</a>
		<a tabindex="-1" class="dropdown-item text-sm" @click="uploadFile">Upload Photo</a>
	</div>
</div>
      </div>
    </div>

    <div class="space-x-8 flex justify-center md:justify-end mt-32 md:mt-0">
        <button class="btn btn-primary">Connect</button>
    </div>
  </div>

  <div class="mt-20 text-center border-b pb-12">
    <h1 class="text-4xl font-medium text-gray-700">Jessica Jones</h1>
    <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p>

    <p class="mt-8 text-gray-500">Solution Manager - Creative Tim Officer</p>
    <p class="mt-2 text-gray-500">University of Computer Science</p>
  </div>

  <div class="mt-12 flex flex-col justify-center">
    <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
    <button
  class="text-indigo-500 py-2 px-4  font-medium mt-4"
>
  Show more
</button>
  </div>

</div>
</div>
        </HomeLayout>
</template>

<script setup lang="ts">
import HomeLayout from '../Layout/HomeLayout.vue';
  // Installed by "@upload-io/vue-uploader".
  import { Uploader } from "uploader";
  import { openUploadModal } from "@upload-io/vue-uploader";
  import type { UploadWidgetResult } from "uploader";
  import type { PreventableEvent } from "@upload-io/vue-uploader";
import { ref } from 'vue';

  let profileUrl = ref<string>('');
  // Initialize once (at the start of your app).
  const uploader = Uploader({ apiKey: "public_kW15bD7FEoSdPpyfcwPiPUtS4UUa" }); // Your real API key.

  function uploadFile(event: PreventableEvent) {
        openUploadModal({
          event,
          uploader,
          options: {
            multi: false
          },
          onComplete: (files: UploadWidgetResult[]) => {
            // if (files.length === 0) {
            //   alert("No files selected.");
            // } else {
            //   alert(files.map(f => f.fileUrl).join("\n"));
            // }
            console.log(files[0].fileUrl);
            
            profileUrl.value = files[0].fileUrl;
          }
        })
      }
</script>

<style scoped>

</style>