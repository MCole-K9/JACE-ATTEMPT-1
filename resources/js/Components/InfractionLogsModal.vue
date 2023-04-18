<script setup lang="ts">
    import { InfractionLog } from '../Lib/types';

    const props = defineProps<{isVisible: boolean}>();
    defineEmits<{(e: 'closeModal'): void}>();

</script>
<template>
    <input class="modal-state" id="infractionActions" type="checkbox" :checked="props.isVisible"/>
    <div class="modal" @click="$emit('closeModal')">
        <label class="modal-overlay"></label>
        <div class="modal-content flex flex-col gap-5">
            <h1>Pick an Action for Infraction #</h1>
            <p>I hate tests</p>
        </div>
    </div>
</template>