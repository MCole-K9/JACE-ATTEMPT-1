<script setup lang="ts">
    import { ref } from 'vue';
    import HomeLayout from '../Layout/HomeLayout.vue';
    import SVGAnimation from '../Components/SVGAnimation.vue';
    import Footer from '../Components/Footer.vue';
import { Link } from '@inertiajs/vue3';
    // import 
    let name = ref('Matthew | Elliot | Khalid');
    let string = ref('');
    let age = ref(0);
    let accept = ref(false);
    let show = ref(false);

    document.addEventListener("scroll", () => {
        let scrollPosition = window.scrollY;
        console.log(scrollPosition);
        if (scrollPosition > 220) {
            show.value = true;
        } else {
            show.value = false;
        }
    
    });

</script>


<template>
    <HomeLayout background="bgGold">
      <!-- <SVGAnimation /> -->
      <section class="overflow-hidden bgBlue sm:grid sm:grid-cols-2">
  <div class="p-8 md:p-12 lg:px-16 lg:py-24 flex flex-col justify-center">
    <div class="mx-auto max-w-xl text-center sm:text-left">
      <Transition name="heading-animation" mode="out-in" appear>
      <h2 class="text-3xl font-bold text-white md:text-3xl">
        Kickstart your career with Job Ace
      </h2>
      </Transition>
      <Transition name="heading-animation" mode="out-in" appear>
      <p class="hidden text-gray-500 md:mt-4 md:block">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas
        tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et
        fermentum, augue. Aliquet amet volutpat quisque ut interdum tincidunt
        duis.
      </p>
    </Transition>
    <Transition name="heading-animation" mode="out-in" appear>
      <div class="mt-4 md:mt-8">
        <Link
          href="/register"
          class="btn btn-success"
        >
          Get Started Today
          <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </Link>
      </div>
      </Transition>
    </div>
  </div>

  <img
    alt="Student"
    src="https://images.unsplash.com/photo-1464582883107-8adf2dca8a9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
    class="h-56 w-full object-cover sm:h-full"
  />
</section>

<section class="bgGold text-black">
  <div
    class="mx-auto max-w-screen-xl px-4 py-8 sm:py-12 sm:px-6 lg:py-16 lg:px-8"
  >
    <div class="mx-auto max-w-lg text-center">
      <h2 class="text-3xl font-bold sm:text-4xl">Kickstart your marketing</h2>

      <p class="mt-4 text-black">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
        aliquam doloribus nesciunt eos fugiat. Vitae aperiam fugit consequuntur
        saepe laborum.
      </p>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
      <Transition name="slide-fade" v-for="i in 6">
      <Link v-if="show"
        class="block rounded-xl border border-gray-800 bgBlue p-8 shadow transition hover:shadow-xl  hover:shadow-gray-900"
        href="/services/digital-campaigns"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-10 w-10 text-white"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path d="M12 14l9-5-9-5-9 5 9 5z" />
          <path
            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
          />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
          />
        </svg>

        <h2 class="mt-4 text-xl font-bold text-white">Digital campaigns</h2>

        <p class="mt-1 text-sm text-gray-300">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ut quo
          possimus adipisci distinctio alias voluptatum blanditiis laudantium.
        </p>
      </Link>
    </Transition>
      
    </div>

    <div class="mt-12 text-center">
      <Link
        href="#"
        class="btn btn-primary w-56 rounded-md"
      >
        Browse Jobs
    </Link>
    </div>
  </div>
</section>

    </HomeLayout>
    <Footer />

</template>



<style scoped>
  .slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateY(-20px);
  opacity: 0;
}

.heading-animation-enter-active {
  transition: all 1s ease-out;
}

.heading-animation-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.heading-animation-enter-from,
.heading-animation-leave-to {
  transform: translateX(-20px);
  opacity: 0;
}
</style>