<template>
    <HomeLayout>
        <div class="p-16">
<div class="p-8 bg-white shadow mt-24 rounded-xl">
  <div class="grid grid-cols-1 md:grid-cols-3">
    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
      <div>
        <p class="font-bold text-gray-1100 text-xl">Joined</p>
        <p class="text-indigo-600">Jan 25, 2023</p>
      </div>
      <div>
           <p class="font-bold text-gray-1100 text-xl">Current Org</p>
        <p class="text-indigo-600">An Organization name</p>
      </div>
          <div>
           <p class="font-bold text-gray-1100 text-xl">Jobs Done</p>
        <p class="text-indigo-600">9</p>
      </div>
    </div>
    <div class="relative">
      <div class="w-44 h-44 bg-gray-700 outline outline-primary mx-auto rounded-full shadow-2xl inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500 relative">

        <img :key="avatarChanged" :src="user.getAvatarUrl ?? 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png'" class="rounded-full aspect-square">
   
    <div class="dropdown dropdown-hover absolute bottom-0 right-3">
        <label class="btn btn-circle btn-primary">
        <svg fill="none"  class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
        </svg>
    </label>
	<div class="dropdown-menu dropdown-menu-bottom-right">
		<a tabindex="-1" class="dropdown-item text-primary text-sm">Remove Photo</a>
		<a tabindex="-1" class="dropdown-item text-primary text-sm" @click="uploadFile">Upload Photo</a>
	</div>
</div>
      </div>
    </div>

    <div class="space-x-8 flex justify-center md:justify-end mt-32 md:mt-0">
        <button class="btn btn-primary">Connect</button>
    </div>
  </div>

  <div class="mt-20 text-center border-b pb-12">
    <h1 class="text-4xl font-medium text-gray-1100">John Doe</h1>
    <p class="font-light text-gray-1100 mt-3">Bucharest, Romania</p>

    <p class="mt-8 text-gray-1100">Solution Manager - Creative Tim Officer</p>
    <p class="mt-2 text-gray-1100">University of Computer Science</p>
  </div>

  <div class="mt-12 flex flex-col justify-center">
    <p class="text-gray-1100 text-center font-light lg:px-16">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus pariatur quod quia illum quas minima vero quisquam qui amet dolorum adipisci nostrum accusamus repudiandae, repellendus, beatae blanditiis totam dolore fugit.</p>
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
  import { userStore } from '../Stores/userStore'
  import { router } from '@inertiajs/vue3';
  import { ref } from 'vue';
  import { Logger } from 'tslog';
  let logger = new Logger();
  const user  = userStore();
  let profileUrl = ref<string>(user.getAvatarUrl);
let avatarChanged = ref<number>(0);
  console.log(user.getAvatarUrl);
  
  
  function updateAvatar(url:string) {
    router.post('/profile', {avatar_url: url})
    
  }

  // function setAvatarVariable() {
  //   profileUrl.value = user.getAvatarUrl ?? (user.profileChanged ? user.getTempAvatarUrl : 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png');
  // }

  // setAvatarVariable();
  // Initialize once (at the start of your app).
  const uploader = Uploader({ apiKey:  "public_kW15bD7FEoSdPpyfcwPiPUtS4UUa"}); // Your real API key.

  function uploadFile(event: PreventableEvent) {
        openUploadModal({
          event,
          uploader,
          options: {
            multi: false,
            editor: {
              images:{
                crop: true,
                cropRatio: 1,
                cropShape: "circ",
              }
            }
          },
          onComplete: (files: UploadWidgetResult[]) => {
            // if (files.length === 0) {
            //   alert("No files selected.");
            // } else {
            //   alert(files.map(f => f.fileUrl).join("\n"));
            // }
            console.log(files[0].fileUrl);
            
            // profileUrl.value = files[0].fileUrl;
            // user.avatar_url = files[0].fileUrl;
            updateAvatar(files[0].fileUrl);
              user.setAvatarUrl(files[0].fileUrl)
              // location.reload();
              avatarChanged.value++;
          }
        })
      }
</script>

<style scoped>

</style>