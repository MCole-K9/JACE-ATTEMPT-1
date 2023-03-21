<script setup lang="ts">
    import SVGAnimation from './SVGAnimation.vue';
</script>
<template>
    <Suspense>
        <!--Genuinely don't remember whether or not this works, fingers crossed-->
        <template #default>
            <div>
                <h2>Issue Infraction for [User]</h2>
                <p>Specify the following information</p>
                
                <label>Reason</label>
                <input class="input">
            </div>
        </template>
        <template #fallback>
            <div>
                <h2>Loading Infraction Form</h2>
                <SVGAnimation/>
            </div>
        </template>
    </Suspense>
    
</template>