<script setup lang="ts">
    import { ref } from 'vue';
    import HomeLayout from '../Layout/HomeLayout.vue';
    import SVGAnimation from '../Components/SVGAnimation.vue';
    // import 
    let name = ref('Matthew | Elliot | Khalid');
    let string = ref('');
    let age = ref(0);
    let accept = ref(false);


</script>


<template>
    <HomeLayout>
      <SVGAnimation />

    
    </HomeLayout>
</template>
