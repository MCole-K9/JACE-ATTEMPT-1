<script setup lang="ts">
    import { ref } from 'vue';
    import HomeLayout from '../Layout/HomeLayout.vue';
    // import 
    let name = ref('Matthew | Elliot | Khalid');
    let string = ref('');
    let age = ref(0);
    let accept = ref(false);


</script>


<template>
    <HomeLayout>
        <h1 class="text-center text-2xl">Hello {{ name }} welcome to the Frontend Battlefield</h1>
        <div class="bg-rose-500 sm:hidden">hello</div>
        <div class="grid grid-cols-3 p-10">
            <q-input outlined v-model="name" label="Name" />
            <div class="q-pa-md q-gutter-sm">
                <q-btn color="white" text-color="black" label="Standard" />
                <q-btn color="primary" label="Primary" />
                <q-btn color="secondary" label="Secondary" />
                <q-btn color="amber" glossy label="Amber" />
                <q-btn color="brown-5" label="Brown 5" />
                <q-btn color="deep-orange" glossy label="Deep Orange" />
                <q-btn color="purple" label="Purple" />
                <q-btn color="black" label="Black" />
                
            </div>
        </div>
        <div class="q-pa-md" style="max-width: 400px">

        <q-form
        class="q-gutter-md"
        >
        <q-input
            filled
            v-model="string"
            color="white"
            label="Your name *"
            hint="Name and surname"
            lazy-rules
            :rules="[ val => val && val.length > 0 || 'Please type something']"
        />

        <q-input
            filled
            type="number"
            v-model="age"
            label="Your age *"
            lazy-rules
            :rules="[
            val => val !== null && val !== '' || 'Please type your age',
            val => val > 0 && val < 100 || 'Please type a real age'
            ]"
        />

        <q-toggle v-model="accept" label="I accept the license and terms" />

        <div>
            <q-btn label="Submit" type="submit" color="primary"/>
            <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
        </div>
        
        </q-form>

        </div>
    </HomeLayout>
</template>
