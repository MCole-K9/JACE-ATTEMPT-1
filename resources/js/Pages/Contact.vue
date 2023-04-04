<template>
    <HomeLayout>
        <section class=" flex justify-center bgBlue h-56 w-full items-center px-10">
            <article class="prose text-center text-white w-full">
               <h1 class="text-white">Find the right job for you</h1>
               <p>Search for jobs in your area and apply for the ones you like.</p>
            </article>
         </section>

<section class="bg-gray-100">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
      <div class="lg:col-span-2 lg:py-12">
        <p class="max-w-xl text-lg">
          We would love to hear from you and answer any questions you may have.
            Please fill out the form and we will get back to you as soon as
            possible.
        </p>

        <div class="mt-8">
          <a href="" class="text-2xl font-bold text-pink-600">
            0151 475 4450
          </a>

          <address class="mt-2 not-italic">
            282 Kevin Brook, Imogeneborough, CA 58517
          </address>
        </div>
      </div>

      <div class="rounded-lg bg-white p-8 outline outline-primary shadow-lg lg:col-span-3 lg:p-12">
        <form action="" class="space-y-4">
          <div>
            <input
              class="input input-block"
              placeholder="Name"
              type="text"
              id="name"
            />
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label class="sr-only" for="email">Email</label>
              <input
                class="input input-block"
                placeholder="Email address"
                type="email"
                id="email"
              />
            </div>

            <div>
              <label class="sr-only" for="phone">Phone</label>
              <input
                class="input input-block"
                placeholder="Phone Number"
                type="tel"
                id="phone"
              />
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
            <div>
              <input
                class="peer sr-only"
                id="option1"
                type="radio"
                tabindex="-1"
                name="option"
              />

              <label
                for="option1"
                class="block w-full rounded-lg border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                tabindex="0"
              >
                <span class="text-sm font-medium"> Option 1 </span>
              </label>
            </div>

            <div>
              <input
                class="peer sr-only"
                id="option2"
                type="radio"
                tabindex="-1"
                name="option"
              />

              <label
                for="option2"
                class="block w-full rounded-lg border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                tabindex="0"
              >
                <span class="text-sm font-medium"> Option 2 </span>
              </label>
            </div>

            <div>
              <input
                class="peer sr-only"
                id="option3"
                type="radio"
                tabindex="-1"
                name="option"
              />

              <label
                for="option3"
                class="block w-full rounded-lg border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                tabindex="0"
              >
                <span class="text-sm font-medium"> Option 3 </span>
              </label>
            </div>
          </div>

          <div>
            <label class="sr-only" for="message">Message</label>

            <textarea
              class="textarea textarea-block"
              placeholder="Message"
              rows="8"
              id="message"
            ></textarea>
          </div>

          <div class="mt-4">
            <button
              type="submit"
              class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
            >
              Send
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

    </HomeLayout>
    <Footer/>
</template>

<script setup lang="ts">
import HomeLayout from '../Layout/HomeLayout.vue';
import Footer from '../Components/Footer.vue';

</script>

<style scoped>

</style>