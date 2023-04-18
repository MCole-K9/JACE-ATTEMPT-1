<script setup lang="ts">
    import { InfractionLog } from '../Lib/types';

    const props = defineProps<{isVisible: boolean, infractionNumber: number | null}>();
    defineEmits<{(e: 'closeModal'): void}>();

</script>
<template>
    <input class="modal-state" id="infractionActions" type="checkbox" :checked="props.isVisible"/>
    <div class="modal" @click="$emit('closeModal')">
        <label class="modal-overlay"></label>
        <div class="modal-content flex flex-col gap-5">
            <h1>Pick an Action for Infraction {{props.infractionNumber}}</h1>
            <div class="flex">
                <button class="btn">Delete</button>
                <button class="btn">Resolve</button>
            </div>
        </div>
    </div>
</template>