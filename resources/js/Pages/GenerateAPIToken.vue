<script setup lang="ts">
    import {Head, router} from '@inertiajs/vue3';
    import {ref} from 'vue';
    import {Ref} from 'vue';
    import HomeLayout from '../Layout/DashboardLayout.vue';

    const tokenName: Ref<string> = ref('');

    function postString(){
        router.post('/tokens/yourtoken', {
            token: tokenName.value,
        });
    }


    function generateString(){
        // 1. Prompt the user for the text (perhaps include a random generator)
    }

    // 2. Make them click "generate token"
    // 3. Take the entered string, pass it to the route closure to generate the Key
    
</script>
<template>
    <HomeLayout>
        <div>
            <p>Enter a new name for the token and click "Create New Token" to generate a new API Token. Note: 
                This deletes your old key.
            </p>
            <!--<p>{{ plaintextString }}</p>-->
            <div>
                <input v-model="tokenName" class="input">
                <button @click="postString" class="btn">Create New Token</button>
            </div>
        </div>
    </HomeLayout>
    
</template>